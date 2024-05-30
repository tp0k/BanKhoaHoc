<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Coupon;
use App\Models\CourseCategory;
use App\Models\Student;
use Illuminate\Support\Facades\Auth; 

class CartController extends Controller
{
    public function index()
    {
        $course = Course::all();
        $category = CourseCategory::all();
        return view('frontend.searchCourse', compact('course', 'category'));
    }

    public function cart()
    {
        return view('frontend.cart'); 
    }
    public function addToCart(Request $request, $id)
    {
        // Tìm khóa học dựa trên id
        $course = Course::findOrFail($id);

        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);

        // Thêm thông tin của khóa học vào giỏ hàng
        $cart[$id] = [
            "title_en" => $course->title_en,
            "quantity" => 1,
            "price" => $course->price,
            "old_price" => $course->old_price,
            "image" => $course->image,
            "difficulty" => $course->difficulty,
            "instructor" => $course->instructor ? $course->instructor->name_en : 'Không tìm thấy giảng viên!',
        ];
        
        // Lưu giỏ hàng vào session
        session()->put('cart', $cart);

        // Tính toán học phí và cập nhật session 'cart_details'
        $this->cart_total();

        // Nếu người dùng nhấn vào nút "Mua ngay", thêm thông tin khoá học vào session 'course_to_buy' và chuyển hướng đến trang thanh toán
        if ($request->has('checkout')) {
            session()->put('course_to_buy', $cart[$id]);
            return redirect()->route('checkout');
        }

        // Nếu người dùng nhấn vào nút "Thêm vào giỏ hàng", chuyển hướng về trang trước đó
        $message = "Thêm khóa học vào giỏ hàng thành công!";
        return redirect()->back()->with('success', $message);
    }










    // public function addToCart($id)
    // {
    //     $course = Course::findOrFail($id);

    //     // $userId = Auth::id();
    //     // if ($userId) {
    //     //     // Nếu người dùng đã đăng nhập, kiểm tra xem họ đã đăng ký khóa học này hay chưa
    //     //     if (Enrollment::isEnrolled($id, $userId)) {
    //     //         // Nếu đã đăng ký, trả về thông báo lỗi
    //     //         $message = "Bạn đã sở hữu khóa học này, không thể thêm vào giỏ hàng.";
    //     //         return redirect()->back()->with('warning', $message);
    //     //     }
    //     // }
    //         // Tiếp tục thêm vào giỏ hàng
    //     $cart = session()->get('cart', []);
    //     if (isset($cart[$id])) {
    //         $message="Thêm khoá học vào giỏ hàng.";
    //         return redirect()->back()->with('warning', $message);
    //     } else {
    //         $cart[$id] = [
    //             "title_en" => $course->title_en,
    //             "quantity" => 1,
    //             "price" => $course->price,
    //             "old_price" => $course->old_price,
    //             "image" => $course->image,
    //             "difficulty" => $course->difficulty,
    //             "instructor" => $course->instructor ? $course->instructor->name_en : 'Không tìm thấy giảng viên!',
    //         ];
    //         session()->put('cart', $cart);
    //         $this->cart_total();
    //         $message="Thêm khoá học thành công!";
    //         return redirect()->back()->with('Thành công', $message);
    //     }
    // } 

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            $this->cart_total();
            session()->flash('Thành công', 'Xoá khoá học thành công!');
        }
    }

    public function cart_total(){
        $total = 0;
        if (session('cart')){
            foreach (session('cart') as $id => $details){
               $total += $details['price'] * $details['quantity'];
            }
        }
        if(isset(session('cart_details')['coupon_code'])){
            $cart_total=$total;
            $discount=($cart_total*(session('cart_details')['discount']/100));
            // $tax=(($cart_total-$discount)*0.15);
            // $total_amount=(($cart_total+$tax)-$discount);
            $total_amount=($cart_total-$discount);
            $coupondata=array(
                'cart_total'=>$cart_total,
                'coupon_code'=>session('cart_details')['coupon_code'],
                'discount'=>session('cart_details')['discount'],
                'discount_amount'=>$discount,
                // 'tax'=>$tax,
                'total_amount'=>$total_amount
            );
            session()->put('cart_details', $coupondata);
        }else{
            // $cart_data=array('cart_total'=>$total,'tax'=>($total*0.15),'total_amount'=>($total + ($total*0.15)));
            $cart_data=array('cart_total'=>$total,'tax'=>($total*0.1),'total_amount'=>($total));
            session()->put('cart_details', $cart_data);
        }
    }

    public function coupon_check(Request $request){
        $coupon = Coupon::where('code',$request->coupon)
                        ->where('valid_from','<=',date('Y-m-d'))
                        ->where('valid_until','>=',date('Y-m-d'))
                        ->pluck('discount')->toArray();

        if(!empty($coupon)){
            $cart_total=session('cart_details')['cart_total'];
            $discount=($cart_total*($coupon[0]/100));
            // $tax=(($cart_total-$discount)*0.1);
            // $total_amount=(($cart_total+$tax)-$discount);
            $total_amount=($cart_total-$discount);
            $coupondata=array(
                'cart_total'=>$cart_total,
                'coupon_code'=>$request->coupon,
                'discount'=>$coupon[0],
                'discount_amount'=>$discount,
                // 'tax'=>$tax,
                'total_amount'=>$total_amount
            );
            session()->put('cart_details', $coupondata);
        }
        return redirect()->back()->with('Thành công', 'Áp voucher thành công!');
    }
}
