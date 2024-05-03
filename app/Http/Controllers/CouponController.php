<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupon= Coupon::get();
        return view('backend.coupon.index', compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $coupon = new Coupon;
            $coupon->code = $request->code;
            $coupon->discount = $request->discount;
            $coupon->valid_from = $request->valid_from;
            $coupon->valid_until = $request->valid_until;
           
            if($coupon->save())
                return redirect()->route('coupon.index')->with('success','Đã lưu dữ liệu!');
                else 
                return redirect()->back()->withInput()->with('error', 'Vui lòng thử lại!');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('error', 'Vui lòng thử lại!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $coupon = Coupon::findOrFail($id);
            $coupon->code = $request->code;
            $coupon->discount = $request->discount;
            $coupon->valid_from = $request->valid_from;
            $coupon->valid_until = $request->valid_until;

            if ($coupon->save())
                return redirect()->route('coupon.index')->with('success', 'Đã lưu dữ liệu!');
            else
                return redirect()->back()->withInput()->with('error', 'Vui lòng thử lại!');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('error', 'Vui lòng thử lại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);

        if($coupon->delete())
        return redirect()->back()->with('error','Xoá dữ liệu!');
    }
}
