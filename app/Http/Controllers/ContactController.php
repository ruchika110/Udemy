<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Contact_form;

class ContactController extends Controller
{
    public function contact()
    {
    	return view('admin.contact');
    }

    public function save(Request $b)
    {
    	$data = new Contact;
    	$data->phone_number = $b->phone_number;
    	$data->email = $b->email;
    	$data->address = $b->address;
    	$data->office = $b->office;
    	$data->save();
    	if ($data) 
    	{
    		return redirect('admin/contact')->with('message','Registered successfully');
    	}
    }

    public function display()
    {
        // echo "hii";
        $display = Contact::all();
        // print_r($d);
        return view('admin.contact',compact('display')); 
    }

     public function edit($id)
    {
        // echo $id;
        $edit = Contact::find($id);
        // echo "<pre>";
        // print_r($show);
        return view("admin.contact_edit",compact('edit'));
    }

    public function update(Request $u)
    {
        $data = Contact::find($u->id);
        $data->phone_number = $u->phone_number;
    	$data->email = $u->email;
    	$data->address = $u->address;
    	$data->office = $u->office;
        $data->save();
        if($data)
        {
            return redirect('admin/contact');
        }
    }

    public function delete($id)
    {
        // echo $id;
        $d = Contact::find($id);
        $delete = $d->delete();
        if ($delete) {
        return redirect('admin/contact')->with('message','Registered successfully');
        } 
    }

    public function contact_data()
    {
        $cd = Contact_form::all();
        return view('admin.contact_data',compact('cd'));
    }
}
