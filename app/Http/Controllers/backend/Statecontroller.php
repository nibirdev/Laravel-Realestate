<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Propertydetail;

class Statecontroller extends Controller
{


    function all_state()
    {
        $types = State::latest()->get();
        return view('admin.state.all_state', compact('types'));
    }
    //
    function add_state()
    {

        return view('admin.state.add_state');
    }
    function store_state(Request $request)
    {
        $request->validate([
            'state_name' => 'required|unique:states',


        ]);

        $data = new State();
        $data->state_name = $request->state_name;

        if ($request->file('state_image')) {


            $file = $request->file('state_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/state/'), $filename);
            $data->state_image = $filename; // Ensure the path is correct
        }

        $data->save();

        $notification = array(
            'message' => 'New State Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    function delete_state($id)
    {
        $id = State::find($id);
        $id->delete();
        return back();
    }

    function edit_state($id)
    {

        $editid = State::find($id);
        return view('admin.state.edit_state', compact('editid'));
    }

    function update_state($id, Request $request)
    {

        $editid = State::find($id);
        $editid->state_name = $request->state_name;
        if ($request->file('state_image')) {

            // Delete the old photo if it exists
            if ($editid->state_image && file_exists(public_path('upload/admin_images/state/' . $editid->state_image))) {
                @unlink(public_path('upload/admin_images/state/' . $editid->state_image)); // Ensure the path is correct
            }

            $file = $request->file('state_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/state/'), $filename);
            $editid->state_image = $filename; // Ensure the path is correct
        }


        $editid->update();
        return redirect()->route('all.state');
    }

    function state_details($id)
    {

        $property = Propertydetail::where('state', $id)->where('status', 1)->get();
        $name = State::find($id);

        return view('frontend.property.state_details', compact('property', 'name'));
    }
}
