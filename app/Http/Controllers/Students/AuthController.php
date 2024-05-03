<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Student;
use App\Http\Requests\Students\Auth\SignUpRequest;
use App\Http\Requests\Students\Auth\SignInRequest;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthController extends Controller
{
    public function signUpForm()
    {
        return view('students.auth.register');
    }

    public function signUpStore(SignUpRequest $request,$back_route)
    {
        try {
            // Kiểm tra mật khẩu có đáp ứng yêu cầu không
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $request->password)) {
                return redirect()->back()->withInput()->with('danger', 'Mật khẩu không đủ mạnh. Vui lòng nhập lại.');
            }
            $student = new Student;
            $student->name_en = $request->name;
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            if ($student->save()){
                $this->setSession($student);
                return redirect()->route($back_route)->with('success', 'Đăng ký thành công!');
            }
        } catch (Exception $e) {
            //dd($e);
            return redirect()->back()->with('danger', 'Vui lòng thử lại!');
        }
    }

    public function signInForm()
    {
        return view('students.auth.login');
    }

    public function signInCheck(SignInRequest $request,$back_route)
    {
        try {
            $student = Student::Where('email', $request->email)->first();
            if ($student) {
                if ($student->status == 1) {
                    if (Hash::check($request->password, $student->password)) {
                        $this->setSession($student);
                        return redirect()->route($back_route)->with('success', 'Đăng nhập thành công!');
                    } else
                        return redirect()->back()->with('error', 'Username hoặc Password không đúng!');
                } else
                    return redirect()->back()->with('error', 'Bạn không có quyền truy cập trang này. Vui lòng liên hệ cơ quan có thẩm quyền!');
            } else
                return redirect()->back()->with('error', 'Username hoặc Password không đúng!');

        
            } catch (Exception $e) {
            //dd($e);
            return redirect()->back()->with('error', 'Username hoặc Password không đúng!');
        }
    }

    public function setSession($student)
    {
        return request()->session()->put(
            [
                'userId' => encryptor('encrypt', $student->id),
                'userName' => encryptor('encrypt', $student->name_en),
                'emailAddress' => encryptor('encrypt', $student->email),
                'studentLogin' => 1,
                'image' => $student->image ?? 'Không tìm thấy ảnh!' 
            ]
        );
    }

    public function signOut()
    {
        request()->session()->flush();
        return redirect()->route('studentLogin')->with('danger', 'Đăng xuất thành công!');
    }
}
