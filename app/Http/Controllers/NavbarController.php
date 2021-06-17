<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Navbar;

class NavbarController extends Controller
{
    public function create()
    {
    	return view('front.navbar');
    }

    public function save(Request $b)
    {
    	// print_r($b->all());
    	$file = $b->file('image');
        $filename = 'image'. time().'.'.$b->image->extension(); //time k through unique number generate krega jisse overwrite nhi hogi image
        // dd($filename);
        $file->move("upload/",$filename);
        // dd($file);
    	$data = new Navbar;
    	$data->email = $b->email;
    	$data->phone_number = $b->phone_number;
    	$data->address = $b->address;
    	$data->description = $b->description;
    	$data->image = $filename;
    	$data->save();
    	if ($data) 
    	{
    		return redirect('front/navbar')->with('message','Registered successfully');
    	}
    }

    public function display()
    {
        // echo "hii";
        $disp = Navbar::all();
        // print_r($d);
        return view('front.navbar', compact('disp')); 
    }

     public function edit($id)
    {
        // echo $id;
        $edit = Navbar::find($id);
        // echo "<pre>";
        // print_r($show);
        return view("front.navbar_edit",compact('edit'));
    }

    public function update(Request $u)
    {
        $file = $u->file('image');
        $filename = 'image'. time().'.'.$u->image->extension();
        $file->move("upload/",$filename);
        $data = Navbar::find($u->id);
        $data->email = $u->email;
    	$data->phone_number = $u->phone_number;
    	$data->address = $u->address;
    	$data->description = $u->description;
    	$data->image = $filename;
        $data->save();
        if($data)
        {
            return redirect('front/navbar');
        }
    }

    public function delete($id)
    {
        // echo $id;
        $d = Navbar::find($id);
        $delete = $d->delete();
        if ($delete) {
        return redirect('front/navbar')->with('message','Registered successfully');; // 'attendance/display'=url
        } 
    }

}
