<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intern;

class InternController extends Controller
{
    public function create()
    {
    	return view('admin.intern');
    }

    public function save(Request $b)
    {
    	// print_r($b->all());
    	$file = $b->file('image');
        $filename = 'image'. time().'.'.$b->image->extension(); //time k through unique number generate krega jisse overwrite nhi hogi image
        // dd($filename);
        $file->move("upload/",$filename);
        // dd($file);
    	$data = new Intern;
    	$data->name = $b->name;
    	$data->company_name = $b->company_name;
    	$data->designation = $b->designation;
    	$data->image = $filename;
    	$data->save();
    	if ($data) 
    	{
    		return redirect('admin/intern')->with('message','Registered successfully');
    	}
    }

    public function display()
    {
        // echo "hii";
        $i_show = Intern::all();
        // print_r($d);
        return view('admin/intern', compact('i_show')); 
    }

    public function edit($id)
    {
        // echo $id;
        $edit = Intern::find($id);
        // echo "<pre>";
        // print_r($show);
        return view("admin.intern_edit",compact('edit'));
    }

    public function update(Request $u)
    {
        $file = $u->file('image');
        $filename = 'image'. time().'.'.$u->image->extension();
        $file->move("upload/",$filename);
        $data = Intern::find($u->id);
        $data->name = $u->name;
        $data->company_name = $u->company_name;
    	$data->designation = $u->designation;
    	$data->image = $filename;
        $data->save();
        if($data)
        {
            return redirect('admin/intern');
        }
    }

    public function delete($id)
    {
        // echo $id;
        $d = Intern::find($id);
        $delete = $d->delete();
        if ($delete) {
        return redirect('admin/intern')->with('message','Registered successfully'); 
        } 
    }

}
