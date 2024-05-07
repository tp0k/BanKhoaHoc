<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\Backend\Permission\SaveRequest;
use Exception;

class PermissionController extends Controller
{
    public function index($id)
    {
        $role = Role::findOrFail(encryptor('decrypt', $id));
        $permission = Permission::where('role_id', encryptor('decrypt', $id))->get();
        return view('backend.permission.index', compact('role', 'permission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
 
    public function save(SaveRequest $request, $role)
    { 
        try { 
            // delete permission before saved
            Permission::where('role_id', encryptor('decrypt', $role))->delete();
            foreach ($request->permission as $permission) {
                $data = new Permission;
                $data->role_id = encryptor('decrypt', $role);
                $data->name = $permission;
                $data->save();
            }
            $this->notice::success('Lưu vai trò thành công!');
            return redirect()->route('role.index');
        } catch (Exception $e) {
            $this->notice::error('Vui lòng thử lại!');
            dd($e);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
