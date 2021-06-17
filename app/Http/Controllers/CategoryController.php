<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
    	return view('admin.index');
    }

    public function save(Request $a)
    {
    	// print_r($a->all());
        $file = $a->file('image');
        $filename = 'image'. time().'.'.$a->image->extension(); //time k through unique number generate krega jisse overwrite nhi hogi image
        // dd($filename);
        $file->move("upload/",$filename);
        // dd($file);
    	$data = new Category;
    	$data->name = $a->name;
    	$data->status = 1;
        $data->image = $filename;
    	$data->save();
    	if ($data) 
    	{
    		return redirect('admin/category');
    	}
    }

    public function display()
    {
    	$view = Category::all();
    	return view('admin.category' , compact('view'));
    }

    public function edit($id)
    {
    	$edit = Category::find($id);
    	return view('admin.edit' , compact('edit'));
    }

    public function update(Request $u)
    {
        $file = $u->file('image');
        $filename = 'image'. time().'.'.$u->image->extension();
        $file->move("upload/",$filename);
    	$update = Category::find($u->id);
    	$update->name = $u->name;
        $update->image = $filename;
    	$update->save();
    	if ($update) 
    	{
    		return redirect('admin/category');
    	}
    }

    public function delete($id)
    {
    	$delete = Category::find($id);
    	$d = $delete->delete();
    	if ($d) {
    		return redirect('admin/category');
    	}
    }
}
