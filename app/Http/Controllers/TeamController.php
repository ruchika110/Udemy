<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function create()
    {
    	return view('admin.team');
    }

    public function save(Request $b)
    {
    	// print_r($b->all());
    	$file = $b->file('image');
        $filename = 'image'. time().'.'.$b->image->extension(); //time k through unique number generate krega jisse overwrite nhi hogi image
        // dd($filename);
        $file->move("upload/",$filename);
        // dd($file);
    	$data = new Team;
    	$data->name = $b->name;
    	$data->description = $b->description;
    	$data->image = $filename;
    	$data->save();
    	if ($data) 
    	{
    		return redirect('admin/our_team')->with('message','Registered successfully');
    	}
    }

    public function display()
    {
        // echo "hii";
        $show = Team::all();
        // print_r($d);
        return view('admin/team', compact('show')); 
    }

    public function edit($id)
    {
        // echo $id;
        $edit = Team::find($id);
        // echo "<pre>";
        // print_r($show);
        return view("admin.team_edit",compact('edit'));
    }

    public function update(Request $u)
    {
        $file = $u->file('image');
        $filename = 'image'. time().'.'.$u->image->extension();
        $file->move("upload/",$filename);
        $data = Team::find($u->id);
        $data->name = $u->name;
    	$data->description = $u->description;
    	$data->image = $filename;
        $data->save();
        if($data)
        {
            return redirect('admin/our_team');
        }
    }

    public function delete($id)
    {
        // echo $id;
        $d = Team::find($id);
        $delete = $d->delete();
        if ($delete) {
        return redirect('admin/our_team')->with('message','Registered successfully');
        } 
    }
}
