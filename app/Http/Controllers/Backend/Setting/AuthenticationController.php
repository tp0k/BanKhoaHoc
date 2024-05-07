<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Http\Requests\Authentication\SignUpRequest;
use App\Http\Requests\Authentication\SignInRequest;
use Illuminate\Support\Facades\Hash; //Dùng để băm mật khẩu trước khi add lên csdl
use Exception;

//mật khẩu tk superadmin: superadmin@gmail.com - Admin@123
class AuthenticationController extends Controller
{
    public function signUpForm()
    {
        return view('backend.Authentication.register');
    }

    public function signUpStore(SignUpRequest $request)
    {
        try {
            // Kiểm tra mật khẩu có đáp ứng yêu cầu không
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $request->password)) {
                return redirect()->back()->withInput()->with('danger', 'Mật khẩu không đủ mạnh. Vui lòng nhập lại.');
            }
    
            $user = new User;
            $user->name_en = $request->name;
            $user->contact_en = $request->contact_en;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); //Hàm Hash::make dùng để băm mật khẩu trước khi đưa vào csdl
            // $user->image = 
            $user->role_id = 2;
            if ($user->save())
                return redirect('login')->with('Thành công', 'Đăng ký thành công');
            else
                return redirect()->back()->withInput()->with('Nguy hiểm', 'Đã xảy ra lỗi. Vui lòng thử lại.');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('Nguy hiểm', 'Đã xảy ra lỗi. Vui lòng thử lại.');
        }
    }

    public function signInForm()
    {
        return view('backend.Authentication.login');
    }

    public function signInCheck(SignInRequest $request)
    {
        try {
            $user = User::where('contact_en', $request->username)->orWhere('email', $request->username)->first();
            if ($user) {
                if ($user->status == 1) {
                    if (Hash::check($request->password, $user->password)) {
                        $this->setSession($user);
                        return redirect()->route('dashboard')->with('Thành công', 'Đăng nhập thành công');
                    } else
                        return redirect()->route('login')->with('Lỗi', 'Username hoặc Password không đúng!');
                } else
                    return redirect()->route('login')->with('Lỗi', 'Bạn không có quyền truy cập! Vui lòng liên hệ với Cơ quan có thẩm quyền');
            } else
                return redirect()->route('login')->with('Lỗi', 'Username hoặc Password không đúng!');
            
        } catch (Exception $e) {
            // dd($e);
            return redirect()->route('login')->with('Lỗi', 'không tìm thấy người dùng');
        }
    }

    public function setSession($user)
    {
        return request()->session()->put(
            [
                'userId' => encryptor('encrypt', $user->id),
                'userName' => encryptor('encrypt', $user->name_en),
                'emailAddress' => encryptor('encrypt', $user->email),
                'role_id' => encryptor('encrypt', $user->role_id),
                'accessType' => encryptor('encrypt', $user->full_access),
                'role' => encryptor('encrypt', $user->role->name),
                'roleIdentitiy' => encryptor('encrypt', $user->role->identity),
                'language' => encryptor('encrypt', $user->language),
                'image' => $user->image ?? 'Không tìm thấy ảnh',
                'instructorImage' => $user?->instructor->image ?? 'Không tìm thấy ảnh giảng viên',
            ]
        );
    }

    public function signOut()
    {
        request()->session()->flush();
        // return redirect('login')->with('danger', 'Đăng xuất thành công!');
        return redirect('login');
    }

    public function show(User $data)
    {
        return view('backend.user.userProfile', compact('data'));
    }
}
