<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Banner;
use App\Navbar;
use App\Category;
use App\Courses;
use App\Online_course;
use App\User;
use App\cart;
use App\Team;
use App\Intern;
use App\Placement;
use App\Contact;
use App\Notification;
use App\Workshop;
Use App\Coupon;
use App\Rating;
use App\Course_order;
use App\Course_order_product;
use Session;
use DB;
use Auth;

class FrontendController extends Controller
{
    public function create()
    {
        $cart = Cart::all();
        $notify = Notification::all();
    	$display = Banner::all();
        $disp = Navbar::all();
        $dis = Online_course::all();
        $view = Category::all();
        $show = Courses::all();
    	return view('front.index',compact('cart','display','disp','dis','view','show','notify'));
    }

    public function save(Request $b)
    {
    	// print_r($b->all());
    	$file = $b->file('image');
        $filename = 'image'. time().'.'.$b->image->extension(); //time k through unique number generate krega jisse overwrite nhi hogi image
        // dd($filename);
        $file->move("upload/",$filename);
        // dd($file);
    	$data = new Online_course;
    	$data->title = $b->title;
    	$data->description = $b->description;
    	$data->image = $filename;
    	$data->save();
    	if ($data) 
    	{
    		return redirect('front/online_course')->with('message','Registered successfully');
    	}
    }

    public function display()
    {
        // echo "hii";
        $dis = Online_course::all();
        // print_r($d);
        return view('front.online_course', compact('dis')); 
    }

    public function edit($id)
    {
        // echo $id;
        $edit = Online_course::find($id);
        // echo "<pre>";
        // print_r($show);
        return view("front.online_course_edit",compact('edit'));
    }

    public function update(Request $u)
    {
        $file = $u->file('image');
        $filename = 'image'. time().'.'.$u->image->extension();
        $file->move("upload/",$filename);
        $data = Online_course::find($u->id);
        $data->title = $u->title;
    	$data->description = $u->description;
    	$data->image = $filename;
        $data->save();
        if($data)
        {
            return redirect('front/online_course');
        }
    }

    public function delete($id)
    {
        // echo $id;
        $d = Online_course::find($id);
        $delete = $d->delete();
        if ($delete) {
        return redirect('front/online_course')->with('message','Registered successfully');; // 'attendance/display'=url
        } 
    }

    //frontend course detail

    public function course_detail($id)
    {
        $cart = Cart::all();
        $disp = Navbar::all();
        $show = Courses::find($id);
        $rate = Rating::all();
        $user = User::all();
        return view('front.course_detail',compact('cart','disp','show','rate','user'));
    }

    public function courses_nav()
    {
        $cart = Cart::all();
        $disp = Navbar::all();
        $show = Courses::all();
        return view('front.category_courses',compact('cart','disp','show'));
    }

    public function category_course($id)
    {
        $cart = Cart::all();
        $disp = Navbar::all();
        $show = Courses::all(); 
        $view = Category::find($id);  
        $dis = Online_course::all();
        return view('front.category_course',compact('cart','disp','show','view','dis'));
    }

    public function signup()
    {
        $cart = Cart::all();
        $disp = Navbar::all();
        return view('front.signup',compact('cart','disp'));
    }

    public function signup_save(Request $x)
    {
        $data = new User;
        $data->name = $x->name;
        $data->email = $x->email;
        $data->password = Hash::make($x->password);
        $data->role = 1;
        $data->save();
        if($data)
        {
            return redirect('front/signup')->with('message','Added successfully');
        }
    }

    public function login()
    {
        $cart = Cart::all();
        $disp = Navbar::all();
        return view('front.login',compact('cart','disp'));
    }

    public function login_save(Request $a)
    {
        $session_id = Session::getId();
        $data=$a->all();
        $check_role= User::where('email',$data['email'])->first();
        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'role'=>$data['role']]))
        {
            if($check_role->role==0)
            {
               return redirect('/admin');
            }
            elseif($check_role->role==1)
            {
                Session::put('ruchika',$data['email']);
                cart::where('session_id',$session_id)->update(['user_email'=>$data['email']]);
            return redirect("front/cart")->with('message','Login Successfully');
            }
            else{

            }
        }
        else{
            return redirect()->back()->with('message','Login Unsuccessfully');
        }
    }

    public function add_cart(Request $a)
    {
        Session::forget('coupanAmount');
        Session::forget('coupanCode');
        // print_r($a->all());
        // die;
        if(Auth::check()) {
        $session_id = Session::getId();
        $user_email= Auth::User()->email;
        // print_r($session_id);
        // die;
        $data = new cart();
        $data->course_name = $a->course_name;
        $data->course_id = $a->course_id;
        $data->course_price = $a->course_price;
        $data->image = $a->course_image;
        $data->session_id = $session_id;
        $data->user_email = $user_email;
        $data->save();
        // print_r($data);
        // die;
        if ($data) {
            return redirect('front/cart');
        }

        }
        else {
        $session_id = Session::getId();
        // print_r($session_id);
        // die;
        $data = new cart();
        $data->course_name = $a->course_name;
        $data->course_id = $a->course_id;
        $data->course_price = $a->course_price;
        $data->image = $a->course_image;
        $data->session_id = $session_id;
        $data->save();
        // print_r($data);
        // die;
        if ($data) {
            return redirect('front/cart');
        }
        }
    }

    public function cart()
    {
        Session::forget('coupanAmount');
        Session::forget('coupanCode');
        $session_id = Session::getId();
        // print_r($session_id);
        $disp = Navbar::all();
        if (Auth::check()) 
        {
            $user_email = Auth::User()->email;
            $cart =Cart::where('user_email',$user_email)->get();

        }
        else
        {
            $session_id = Session::getId();
            $cart =Cart::where('session_id',$session_id)->get();
        }
        
        return view('front.cart',compact('disp','cart'));
    }

    public function our_team()
    {
        $cart = Cart::all();
        $disp = Navbar::all();
        $t = Team::all();
        return view('front.our_team',compact('cart','disp','t'));
    }

    public function interns()
    {
        $cart = Cart::all();
        $disp = Navbar::all();
        $i = Intern::all();
        return view('front.interns',compact('cart','disp','i'));
    }

    public function placements()
    {
        $cart = Cart::all();
        $disp = Navbar::all();
        $p = Placement::all();
        return view('front.placements',compact('cart','disp','p'));
    }

    public function contact()
    {
        $cart = Cart::all();
        $disp = Navbar::all();
        $con = Contact::all();
        return view('front.contact',compact('cart','disp','con'));
    }

    public function MPCT_workshop()
    {
        $cart = Cart::all();
        $disp= Navbar::all();
        $work = Workshop::where('workshop_title','MPCT College')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.MPCT',compact('cart','disp','work'));
    }
    
     public function Xiaomi_workshop()
    {
        $cart = Cart::all();
        $disp= Navbar::all();
        $work = Workshop::where('workshop_title','Xiaomi MI Company')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.Xiaomi',compact('cart','disp','work'));
    }

    public function Bentchair_workshop()
    {
        $cart = Cart::all();
        $disp= Navbar::all();
        $work= Workshop::where('cart','workshop_title','Bentchair Company')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.Bentchair',compact('disp','work'));
    }

    public function RJIT_workshop()
    {
        $cart = Cart::all();
        $disp= Navbar::all();
        $work = Workshop::where('workshop_title','RJIT College')->get();
        // echo "<pre>";
        // print_r($view);
         return view('front.RJIT',compact('cart','disp','work'));
    }

    public function quantity_update($id=null,$course_quantity=null)
    {
        Session::forget('coupanAmount');
        Session::forget('coupanCode');
        // echo $id;
        // echo $course_quantity;
        DB::table('carts')->where('id',$id)->increment('course_quantity',$course_quantity);
        return redirect('front/cart')->with('message','Product Quantity has been updated');
    }

    public function cart_remove($id)
    {
        Session::forget('coupanAmount');
        Session::forget('coupanCode');
        $y= Cart::find($id);
        $delete= $y->delete();
        if($delete)
      {
        return redirect('front/cart');
      }
    }

    public function checkout()
    {
        $cart = Cart::all();
        $disp = Navbar::all();
        if (Auth::check()) 
        {
            $user_email = Auth::User()->email;
            $cart =Cart::where('user_email',$user_email)->get();

        }
        return view('front.checkout',compact('cart','disp','cart'));
    }

    public function search_course(Request $request)
    {
        $cart = Cart::all();
      $disp = Navbar::all();
      $search= $request->get('search');
      //print($search);
      $result= DB::table('courses')->where('name','like', '%'.$search.'%')->get();

      return view('front.search',Compact('cart','disp','result')); 
    }

    public function applyCoupon(Request $request)
    {
        Session::forget('coupanAmount');
        Session::forget('coupanCode');
        if($request->isMethod('post'))
      {
        $data = $request->all();
        // echo "<pre>";
        // print_r($data);
        // die;
        $couponcount= Coupon::where('coupon_code',$data['coupon_code'])->count();
        if($couponcount==0)
        {
            return redirect()->back()->with('message','Coupon Code does not exist');
        }
        else{
            // echo "success";die;
            $couponDetails = Coupon::where('coupon_code',$data['coupon_code'])->first();
            $expiry_date = $couponDetails->expiry_date;
            $current_date = date('Y-m-d');
            if($expiry_date < $current_date)
            {
              return redirect()->back()->with('message','Coupon Code is Expired');  
            }
        }
        //Coupan is ready for discount
            $session_id = Session::getId();
            $userCart = Cart::where('session_id',$session_id)->get();
            $total_amount = 0;
            foreach($userCart as $item)
            {
                $total_amount = $total_amount + ($item->price*$item->course_quantity);
            }
            //check if counpon amount is fixed or percentage
            if($couponDetails->amount_type=="fixed")
            {
                $couponAmount = $couponDetails->amount;
                // print_r($coupanAmount);
                // die;
                //Add coupan Code in session
            Session::put('couponAmount',$couponAmount);
            Session::put('couponCode',$data['coupon_code']);
            // echo Session::get('couponAmount');die;
            return redirect()->back()->with('message','Coupon Code is Successfully Applied. You are Availing Discount');
            }
            else
            {
              $couponAmount = $total_amount * ($couponDetails->amount/100);  
              //Add coupan Code in session
            Session::set('couponAmount',$couponAmount);
            Session::set('couponCode',$data['coupon_code']);
            return redirect()->back()->with('message','Coupon Code is Successfully Applied. You are Availing Discount');
            }
    }
    }

    public function insert_rating(Request $a)
    {
        $ir = new Rating();
        $ir->user_id=$a->user_id;
        $ir->course_id=$a->course_id;
        $ir->rating=$a->rating;
        $ir->message=$a->message;
        $ir->save();
        if($ir)
        {
            return redirect()->back()->with('message','Rating successfully Given');
        }
    }

    public function forgot_password()
    {
        return view('front.forgot_password');
    }

    public function profile()
    {
        $disp= Navbar::all();
        $cart= Cart::all();
        $data= Course_order::all();
        return view('front.profile',Compact('disp','data','cart'));
    }
    public function user_order_data($user_id)
    {
        $disp= Navbar::all();
        $cart= Cart::all();
        $data= Course_order::where('user_id',$user_id)->get();
        return view('front.user_order_data',Compact('disp','data','cart'));
    }
    public function view_order($id)
    {
        $course_user = Course_order::all();
        $cart= Cart::all();
        $disp= Navbar::all();
        $data = Course_order_product::where('course_order_id',$id)->get();
        return view('front.view_order',Compact('data','disp','course_user','cart'));

    }
     public function invoice($id)
    {
        $course_user = Course_order::all();
        $cart= Cart::all();
        $disp= Navbar::all();
        $data = Course_order_product::where('course_order_id',$id)->get();
        return view('front.invoice',compact('data','disp','course_user','cart'));
    }
}





