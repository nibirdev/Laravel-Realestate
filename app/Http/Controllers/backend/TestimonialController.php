<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    //
    function all_testimonial()
    {
        $types = Testimonial::latest()->get();
        return view('admin.testimonial.all_testimonial', compact('types'));
    }
    //
    function add_testimonial()
    {

        return view('admin.testimonial.add_testimonial');
    }

    function store_testimonial(Request $request)
    {

        $image = $request->file('tem_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 250)->save(public_path('upload/testimonial/' . $name_gen));
        $save_url = 'upload/testimonial/' . $name_gen;


        $data = new Testimonial();
        $data->tem_name = $request->tem_name;
        $data->tem_position = $request->tem_position;
        $data->tem_message = $request->tem_message;
        $data->tem_image = $save_url;

        $data->save();

        $notification = array(
            'message' => 'New Testimonial Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    function delete_testimonial($id)
    {
        $id = Testimonial::find($id);
        $id->delete();
        return back();
    }

    function edit_testimonial($id)
    {

        $editid = Testimonial::find($id);
        return view('admin.testimonial.edit_testimonial', compact('editid'));
    }

    function update_testimonial($id, Request $request)
    {

        $editid = Testimonial::find($id);

        if ($request->file('tem_image')) {

            // Delete the old photo if it exists
            if ($editid->tem_image && file_exists(public_path($editid->tem_image))) {
                @unlink(public_path($editid->tem_image)); // Ensure the path is correct
            }

            $image = $request->file('tem_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(100, 100)->save(public_path('upload/testimonial/' . $name_gen));
            $save_url = 'upload/testimonial/' . $name_gen;

            $editid->tem_image = $save_url;
        }

        $editid->tem_name = $request->tem_name;
        $editid->tem_position = $request->tem_position;
        $editid->tem_message = $request->tem_message;



        $editid->update();
        return redirect()->route('all.testimonial');
    }
}
