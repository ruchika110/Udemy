<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Banner;

class BannerController extends Controller
{
    public function create()
    {
    	return view('admin.banner');
    }

    public function save(Request $c)
    {
    	// print_r($c->all());
    	$file = $c->file('image');
        $filename = 'image'. time().'.'.$c->image->extension(); //time k through unique number generate krega jisse overwrite nhi hogi image
        // dd($filename);
        $file->move("upload/",$filename);
        // dd($file);
    	$data = new Banner;
    	$data->title = $c->title;
    	$data->description = $c->description;
    	$data->image = $filename;
    	$data->save();
    	if ($data) 
    	{
    		return redirect('admin/banner')->with('message','Registered successfully');
    	}
    }

    public function display()
    {
        // echo "hii";
        $display = Banner::all();
        // print_r($display);
        return view('admin.banner', compact('display')); 
    }

    public function edit($id)
    {
        // echo $id;
        $edit = Banner::find($id);
        // echo "<pre>";
        // print_r($edit);
        return view("admin.banner_edit",compact('edit'));
    }

    public function update(Request $u)
    {
        $file = $u->file('image');
        $filename = 'image'. time().'.'.$u->image->extension();
        $file->move("upload/",$filename);
        $data = Banner::find($u->id);
        $data->title=$u->title;
        $data->description = $u->description;
        $data->image = $filename;
        $data->save();
        if($data)
        {
            return redirect('admin/banner');
        }
    }

    public function delete($id)
    {
        // echo $id;
        $d = Banner::find($id);
        $delete = $d->delete();
        if ($delete) {
        return redirect('admin/banner')->with('message','Registered successfully');; 
        } 
    }
}
