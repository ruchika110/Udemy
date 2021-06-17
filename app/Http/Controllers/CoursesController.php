<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Courses;
use App\Category;

class CoursesController extends Controller
{
    public function create()
    {
    	return view('admin.courses');
    }

    public function save(Request $b)
    {
    	// print_r($b->all());
    	$file = $b->file('image');
        $filename = 'image'. time().'.'.$b->image->extension(); //time k through unique number generate krega jisse overwrite nhi hogi image
        // dd($filename);
        $file->move("upload/",$filename);
        // dd($file);
    	$data = new Courses;
    	$data->name = $b->name;
    	$data->description = $b->description;
    	$data->price = $b->price;
    	$data->detail = $b->detail;
    	$data->course_include = $b->course_include;
    	$data->course_content = $b->course_content;
    	$data->category = $b->category;
    	$data->image = $filename;
    	$data->save();
    	if ($data) 
    	{
    		return redirect('admin/courses')->with('message','Registered successfully');
    	}
    }

    public function display()
    {
        // echo "hii";
        $show = Courses::all();
        $view = Category::all();
        // print_r($d);
        return view('admin.courses', compact('show','view')); 
    }

    public function edit($id)
    {
        // echo $id;
        $edit = Courses::find($id);
        // echo "<pre>";
        // print_r($show);
        return view("admin.course_edit",compact('edit'));
    }

    public function update(Request $u)
    {
        $file = $u->file('image');
        $filename = 'image'. time().'.'.$u->image->extension();
        $file->move("upload/",$filename);
        $data = Courses::find($u->id);
        $data->name=$u->name;
        $data->description = $u->description;
        $data->price = $u->price;
        $data->detail = $u->detail;
        $data->course_include = $u->course_include;
        $data->course_content = $u->course_content;
        $data->category = $u->category;
        $data->image = $filename;
        $data->save();
        if($data)
        {
            return redirect('admin/courses');
        }
    }

    public function delete($id)
    {
        // echo $id;
        $d = Courses::find($id);
        $delete = $d->delete();
        if ($delete) {
        return redirect('admin/courses')->with('message','Registered successfully');; // 'attendance/display'=url
        } 
    }
}
