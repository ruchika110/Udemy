<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact_form;

class ContactFormController extends Controller
{
    public function save(Request $b)
    {
    	$data = new Contact_form;
    	$data->name = $b->name;
    	$data->email = $b->email;
    	$data->phone_number = $b->phone_number;
    	$data->message = $b->message;
    	$data->save();
    	if ($data) 
    	{
    		return redirect('front/contact')->with('message','Registered successfully');
    	}
    }
}
