<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Rules\StrongPassword;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\Backend\User\AddNewRequest;
use App\Http\Requests\Backend\User\UpdateRequest;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use File;

class UserController extends Controller
{
    public function index()
    {
        $data = User::paginate(10);
        return view('backend.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::get();
        return view('backend.user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewRequest $request)
    {
        // Kiểm tra mật khẩu đã nhập có đáp ứng yêu cầu không
        $validator = Validator::make($request->all(), [
            'password' => ['required', new StrongPassword],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->first('password'));
        }


        // Mật khẩu hợp lệ, tiếp tục xử lý tạo tài khoản
        try {
            $data = new User();
            $data->name_en = $request->userName_en;
            $data->name_bn = $request->userName_bn;
            $data->email = $request->emailAddress;
            $data->contact_en = $request->contactNumber_en;
            $data->contact_bn = $request->contactNumber_bn;
            $data->role_id = $request->roleId;
            $data->language = 'en';
            $data->full_access = $request->fullAccess;
            $data->status = $request->status;
            $data->password = Hash::make($request->password);

            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/users'), $imageName);
                $data->image = $imageName;
            }
            if ($data->save())
                return redirect()->route('user.index')->with('Thành công', 'Đã lưu dữ liệu!');
            else
                return redirect()->back()->withInput()->with('Lỗi', 'Vui lòng thử lại!');
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->withInput()->with('Lỗi', 'Vui lòng thử lại!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::get();
        $user = User::findOrFail(encryptor('decrypt', $id));
        return view('backend.user.edit', compact('role', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        // Kiểm tra mật khẩu có đáp ứng yêu cầu không
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $request->password)) {
            return redirect()->back()->withInput()->with('danger', 'Mật khẩu không đáp ứng yêu cầu. Vui lòng nhập lại.');
        }

        try {
            $data = User::findOrFail(encryptor('decrypt', $id));
            $data->name_en = $request->userName_en;
            $data->name_bn = $request->userName_bn;
            $data->email = $request->emailAddress;
            $data->contact_en = $request->contactNumber_en;
            $data->contact_bn = $request->contactNumber_bn;
            $data->role_id = $request->roleId;
            $data->language = 'en';
            $data->full_access = $request->fullAccess;
            $data->status = $request->status;

            // if ($request->password)
            //     $data->password = Hash::make($request->password);

            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/users'), $imageName);
                $data->image = $imageName;
            }
            if ($data->save())
                return redirect()->route('user.index')->with('Thành công', 'Đã lưu dữ liệu');
            else
                return redirect()->back()->withInput()->with('Lỗi', 'Vui lòng thử lại');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('Lỗi', 'Vui lòng thử lại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { 
        $data = User::findOrFail(encryptor('decrypt', $id));
        $image_path = public_path('uploads/users/') . $data->image;

        #if ($data->delete()) {
            #if (File::exists($image_path))
                #File::delete($image_path);
      
            #return redirect()->back();
        #} 
    }
}
