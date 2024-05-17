<?php

namespace App\Http\Controllers\Students;
use DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Enrollment;
use App\Models\Checkout;
use App\Models\Transaction;
use Mail;

class VnpayController extends Controller
{
    public function postPay(Request $request)
    {
        // dd($request->all());
        
        $data = $request -> except("_token", 'payment');
        //Kiểm tra tài khoản học sinh đã đăng nhập chưa
        // if(!\Auth::user()->student_id){
        //     //Thông báo
        //     \Session::flash('toastr', [
        //         'type' => 'error',
        //         'message' => 'Đăng nhập để thực hiện tính năng này!'
        //     ]);

        //     return redirect()->back();
        // }

        $student = Student::findOrFail(currentUserId());
        $data['tst_user_id'] = $student->id;
        $data['tst_total_amount'] = $total_amount = session('cart_details')['total_amount'];
        $data['created_at'] = Carbon::now();
        $transactionID = Transaction::insertGetId($data);

        if($request->payment == 2){
            $totalAmount = session('cart_details')['total_amount'];
            session(['info_custormer' => $data]);
            return view('frontend/vnpay/index', compact('total_amount'));
        } else{
            $data['tst_code'] = rand(1,10000);
            $transactionID = Transaction::insertGetId($data);
            if ($transactionID){
                $shopping = Checkout::content();

                foreach ($shopping as $key => $item){
                    
                    //Lưu chi tiết đơn hàng
                    Checkout::insert([
                        'od_transacsion_id' => $transactionID,
                        'od_product_id' => $item->id,
                        // 'od_sale' => $item->option->sale,
                        'od_price' => $item->price,
                    ]);

                    //Tăng pay (số lượt mua)
                    // \DB::table('course')
                    // ->where('id', $item->id)
                    // ->increment("course_pay");
                }
            }
            \Session::flash('toastr',[
                'type' => 'success',
                'message' => 'Đăng ký thành công!'
            ]);
            // \Cart::destroy();
            // return redirect()->to('/');
        }
    }
    public function store(Request $request){
        // dd($request->toArray());
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
        $vnp_TmnCode = "OZ0Q0KY0";//Mã website tại VNPAY 
        $vnp_HashSecret = "EBZ8ZFZYI5VW9XYRF52UX5PDWS7JSKRT"; //Chuỗi bí mật
        
        $vnp_TxnRef = rand(1,10000); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->order_desc;
        //$vnp_OrderInfo = 'Thanh toán học phí';
        //$vnp_OrderType = $request->order_type;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->amount * 100; // Số tiền thanh toán
        //$vnp_Amount = 1800000 * 100;
        $vnp_Locale = $request->language; //Ngôn ngữ chuyển hướng thanh toán
        //$vnp_Locale = 'vn';
        $vnp_BankCode = $request->bank_code; //Mã phương thức thanh toán
        //$vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        //var_dump($inputData); Khi thanh toán thành công sẽ trả về một đường dẫn
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        // dd($vnp_Url);
        return redirect($vnp_Url);
        // vui lòng tham khảo thêm tại code demo
    }

    
    public function vnpay_return(Request $request){
         dd($request->toArray());
    }    
}
