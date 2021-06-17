<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
    public function coupon()
    {
    	return view('admin.coupon');
    }

    public function save(Request $a)
    {
    	$coupon = new Coupon();
    	$coupon->coupon_code=$a->coupon_code;
    	$coupon->amount=$a->amount;
    	$coupon->amount_type=$a->amount_type;
    	$coupon->status=1;
        $coupon->expiry_date=$a->expiry_date;
    	$coupon->save();
    	if($coupon)
    	{
    		return redirect('admin/coupon')->with('message','Addded successfully');
    	}

    }

    public function display()
    {
        $data = Coupon::all();
        return view("admin.coupon",Compact('data'));
    }

    public function edit($id)
    {
        $edit = Coupon::find($id);
        return view("admin.coupon_edit",Compact('edit'));
    }
    public function update(Request $z)
    {
        $r = Coupon::find($z->id);
        $r->coupon_code=$z->coupon_code;
    	$r->amount=$z->amount;
    	$r->amount_type=$z->amount_type;
        $r->expiry_date=$z->expiry_date;
    	$r->save();
        
        if($r)
        {
            return redirect('admin/coupon');
        }

    }

    public function delete($id)
    {
        $y= Coupon::find($id);
        $delete= $y->delete();
        if($delete)
        {
            return redirect('admin/coupon');
        }

    }
}
