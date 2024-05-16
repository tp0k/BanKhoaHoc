<?php

namespace App\Http\Controllers\Students;
use DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Payment;
use App\Models\Enrollment;
use App\Models\Checkout;
use Mail;

class VnpayController extends Controller
{
    public function store(Request $request){
        dd($request->all());
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
        $vnp_TmnCode = "OZ0Q0KY0";//Mã website tại VNPAY 
        $vnp_HashSecret = "EBZ8ZFZYI5VW9XYRF52UX5PDWS7JSKRT"; //Chuỗi bí mật
        
        $vnp_TxnRef = rand(1,10000); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        //$vnp_TxnRef = rand(1,10000);
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        //$vnp_OrderType = 'billpayment';
        $vnp_Amount = session('cart_details')['total_amount'] * 100; // Số tiền thanh toán
        //$vnp_Amount = 1800000 * 100;
        $vnp_Locale = $request->language; //Ngôn ngữ chuyển hướng thanh toán
        //$vnp_Locale = 'vn';
        $vnp_BankCode = $request->bank_code; //Mã phương thức thanh toán
        //$vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        // $vnp_Bill_Email = $_POST['txt_billing_email'];
        // $fullName = trim($_POST['txt_billing_fullname']);
        // if (isset($fullName) && trim($fullName) != '') {
        //     $name = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName = array_pop($name);
        // }
        // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
        // $vnp_Bill_City=$_POST['txt_bill_city'];
        // $vnp_Bill_Country=$_POST['txt_bill_country'];
        // $vnp_Bill_State=$_POST['txt_bill_state'];
        // // Invoice
        // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
        // $vnp_Inv_Email=$_POST['txt_inv_email'];
        // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
        // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
        // $vnp_Inv_Company=$_POST['txt_inv_company'];
        // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type=$_POST['cbo_inv_type'];
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
            // "vnp_ExpireDate"=>$vnp_ExpireDate
            // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
            // "vnp_Bill_Email"=>$vnp_Bill_Email,
            // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
            // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
            // "vnp_Bill_Address"=>$vnp_Bill_Address,
            // "vnp_Bill_City"=>$vnp_Bill_City,
            // "vnp_Bill_Country"=>$vnp_Bill_Country,
            // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
            // "vnp_Inv_Email"=>$vnp_Inv_Email,
            // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
            // "vnp_Inv_Address"=>$vnp_Inv_Address,
            // "vnp_Inv_Company"=>$vnp_Inv_Company,
            // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
            // "vnp_Inv_Type"=>$vnp_Inv_Type
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

    public function postPay(Request $request)
    {
        
        $data = $request -> except("_token", 'payment');
        if(!\Auth::user()->id){
            //Thông báo
            \Session::flash('toastr', [
                'type' => 'error',
                'message' => 'Đăng nhập để thực hiện tính năng này!'
            ]);

            return redirect()->back();
        }
        $data['tst_user_id'] = \Auth::user()->id;
        $data['tst_total_amount'] = session('cart_details')['total_amount'];
        $data['created_at'] = Carbon::now();

        if($request->payment == 2){
            $totalAmount = session('cart_details')['total_amount'];
            session(['info_custormer' => $data]);
            return view('frontend/vnpay/index', compact('total_amount'));
        } else{
            $data['tst_code'] = rand(1,10000);
            $transactionID = Payment::insertGetId($data);
            if ($transactionID){
                $shopping = \cart::content();

                foreach ($shopping as $key => $item){
                    
                    //Lưu chi tiết đơn hàng
                    Checkout::insert([
                        'od_transacsion_id' => $transactionID,
                        'od_product_id' => $item->id,
                        'od_sale' => $item->option->sale,
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
                'message' => 'Đơn hàng của bạn đã được lưu!'
            ]);
            // \Cart::destroy();
            // return redirect()->to('/');
        }
    }
    public function vnpay_return(Request $request){
        dd($request->toArray());
    }    
}
