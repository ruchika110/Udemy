<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
   public function notification()
   {
   	return view('admin.notification');
   }

    public function save(Request $b)
    {
    	$data = new Notification;
    	$data->notification = $b->notification;
    	$data->start_date = $b->start_date;
    	$data->end_date = $b->end_date;
    	$data->save();
    	if ($data) 
    	{
    		return redirect('admin/notification')->with('message','Registered successfully');
    	}
    }

    public function display()
    {
        // echo "hii";
        $display = Notification::all();
        // print_r($d);
        return view('admin.notification',compact('display')); 
    }

    public function edit($id)
    {
        // echo $id;
        $edit = Notification::find($id);
        // echo "<pre>";
        // print_r($show);
        return view("admin.notification_edit",compact('edit'));
    }

    public function update(Request $u)
    {
        $data = Notification::find($u->id);
        $data->notification = $u->notification;
    	$data->start_date = $u->start_date;
    	$data->end_date = $u->end_date;
        $data->save();
        if($data)
        {
            return redirect('admin/notification');
        }
    }

    public function delete($id)
    {
        // echo $id;
        $d = Notification::find($id);
        $delete = $d->delete();
        if ($delete) {
        return redirect('admin/notification')->with('message','Registered successfully');
        } 
    }
}
