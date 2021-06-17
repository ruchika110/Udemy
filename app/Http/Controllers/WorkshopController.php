<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workshop;

class WorkshopController extends Controller
{
    public function workshop()
    {
    	return view('admin.workshop');
    }

    public function save(Request $a)
    {
    	
        $file=$a->file('workshop_image');
        $filename = 'workshop_image'. time().'.'. $a->workshop_image->extension();
        $file->move("upload/",$filename);
    	$work = new Workshop();
    	$work->workshop_title=$a->workshop_title;
    	$work->workshop_image=$filename;
    	$work->save();
    	if ($work) 
    	{
    		return redirect('admin/workshop');
    	}
    }

    public function display()
    {
        $data = Workshop::all();
        return view("admin.workshop",Compact('data'));
    }

    public function edit($id)
    {
        $edit = Workshop::find($id);
        return view("admin.workshop_edit",Compact('edit'));
    }
    public function update(Request $z)
   {
        if($z->hasFile('workshop_image'))
        {
        $file = $z->file('workshop_image');
        $filename = 'workshop_image'. time().'.'.$z->workshop_image->extension();
        $file->move("upload/",$filename);
        $r = Workshop::find($z->id);
        $r->workshop_title=$z->workshop_title;
        $r->workshop_image=$filename;
        $r->save();
        if($r){
            return redirect('admin/workshop');
        }
    }
    else
    {
        $r = Workshop::find($z->id);
        $r->workshop_title=$z->workshop_title;
        $r->save();
        if($r)
        {
            return redirect('admin/workshop');
        }

    }
   }

   public function delete($id)
    {
        $y= Workshop::find($id);
        $delete= $y->delete();
        if($delete)
        {
            return redirect('admin/workshop');
        }

    }
}
