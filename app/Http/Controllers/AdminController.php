<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Course_order;
use App\Navbar;
use App\Course_order_product;
use DB;

class AdminController extends Controller
{
    public function course_order()
    {
        // $data= DB::table('course_orders')->join('courseorderproducts','courseorders.user_id','courseorder_products.user_id')->get();
        //print_r($data);
        $data = Course_order::all();
        return view('admin.course_order',Compact('data'));

    }
    public function view_order($id)
    {
        // $data= DB::table('course_orders')->join('courseorderproducts','courseorders.user_id','courseorder_products.user_id')->get();
        //print_r($data);
        $course_user = Course_order::all();
        $navf= Navbar::all();
        $data = Course_order_product::where('course_order_id',$id)->get();
        return view('admin.view_order',Compact('data','navf','course_user'));

    }
    public function update_order_status(Request $z)
    {
        $co = Course_order::find($z->id);
        $co->order_status =$z->order_status;
        $co->save();
        if($co)
        {
            return redirect('admin/course_order');
        }
    }
     public function invoice($id)
    {
        $course_user = Course_order::all();
        $navf= Navbar::all();
        $data = Course_order_product::where('course_order_id',$id)->get();
        return view('admin.invoice',compact('data','navf','course_user'));
    }
}
