<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propertydetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\User;
use App\Models\Amenities;
use App\Models\propertytype;
use App\Models\State;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Intervention\Image\Facades\Image;
use Carbon\carbon;
use Illuminate\Support\Facades\DB;

class AgentPropertyController extends Controller
{



    //Show Agent all property
    function agentallproperty()
    {
        $aid = Auth::user()->id;
        $properties = Propertydetail::where('agent_id', $aid)->latest()->get();
        return view('agent.property.all_property', compact('properties'));
    }

    //Show Agent add property
    function agentaddproperty()
    {

        $Amenities = Amenities::all();
        $PropertyType = propertytype::all();
        $uid = auth::user()->id;
        $StateType = State::all();

        $udata = User::find($uid);
        $count = $udata->credit;
        if ($count == 1) {
            return redirect()->route('all.package');
        } else if ($count == 7) {
            return redirect()->route('all.package');
        } else {
            return view('agent.property.add_property', compact('Amenities', 'PropertyType', 'StateType'));
        }
    }
    function agentstoreproperty(Request $request)
    {

        $aid = auth::user()->id;
        $fid = User::find($aid);
        $data = $fid->credit;
        // $amen = $request->amenities_id;
        $amen = $request->input('amenities_id'); // Make sure to get the array input
        $amenities = implode(",", $amen);

        $pcode = IdGenerator::generate(['table' => 'Propertydetails', 'field' => 'property_code', 'length' => 5, 'prefix' => 'PC']);

        $image = $request->file('property_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 250)->save(public_path('upload/property/thambnail/' . $name_gen));
        $save_url = 'upload/property/thambnail/' . $name_gen;

        $property_id = Propertydetail::insertGetId([
            'ptype_id' => $request->ptype_id,
            'amenities_id' => $amenities,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),
            'property_code' => $pcode,
            'property_status' => $request->property_status,
            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,
            'property_thambnail' => $save_url,
            'short_des' => $request->short_des,
            'long_des' => $request->tinymce,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'garage_size' => $request->garage_size,
            'property_size' => $request->property_size,
            'property_video' => $request->property_video,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'featured' => $request->featured,
            'hot' => $request->hot,
            'agent_id' =>  $aid,
            'status' => 1,

        ]);

        /////Multi Image/////

        $image = $request->file('multi_image');
        foreach ($image as $img) {
            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(770, 520)->save('upload/property/mul_image/' . $name_gen);
            $img_url = 'upload/property/mul_image/' . $name_gen;

            MultiImage::insert([
                'property_id' => $property_id,
                'photo_name' => $img_url,


            ]);
        }

        ////Facilities/////
        $facilities = count($request->facility_name);
        if ($facilities != NULL) {
            for ($i = 0; $i < $facilities; $i++) {
                $df = new Facility();
                $df->property_id = $property_id;
                $df->facilities_name = $request->facility_name[$i];
                $df->distance = $request->distance[0];
                $df->save();
            }
        }

        User::find($aid)->update([
            'credit' => DB::raw('1+' . $data),
        ]);

        return redirect()->route('agent.all.property');
    }

    function agenteditproperty($id)
    {
        $property = propertydetail::find($id);
        $amen = $property->amenities_id; // Make sure to get the array input
        $amenit = explode(',', $amen);
        $StateType = State::all();



        $Amenities = Amenities::all();
        $PropertyType = propertytype::all();

        $mulimage = MultiImage::where('property_id', $id)->get();

        $facilities = Facility::where('property_id', $id)->get();

        return view('agent.property.edit_property', compact('property', 'Amenities', 'PropertyType', 'amenit', 'mulimage', 'facilities', 'StateType'));
    }

    function agentupdateproperty($id, Request $request)
    {
        $amen = $request->amenities_id; // Make sure to get the array input
        $amenities = implode(",", $amen);

        $property_id = Propertydetail::find($id)->update([
            'ptype_id' => $request->ptype_id,
            'amenities_id' => $amenities,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),

            'property_status' => $request->property_status,
            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,

            'short_des' => $request->short_des,
            'long_des' => $request->tinymce,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'garage_size' => $request->garage_size,
            'property_size' => $request->property_size,
            'property_video' => $request->property_video,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'featured' => $request->featured,
            'hot' => $request->hot,



        ]);

        $notification = array(
            'message' => 'Property Updated Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('agent.all.property')->with($notification);
    }
    function agentthumbnailupdateproperty(Request $request)
    {
        $p_id = $request->id;
        $old_image = $request->old_image;

        $image = $request->file('property_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 250)->save(public_path('upload/property/thambnail/' . $name_gen));
        $save_url = 'upload/property/thambnail/' . $name_gen;

        if (file_exists($old_image)) {
            unlink($old_image);
        }

        Propertydetail::find($p_id)->update([
            'property_thambnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Thumbnail Image Updated Successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
    }

    function agentmulimageupdateproperty(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImage::findOrFail($id);

            if (file_exists($imgDel->photo_name)) {
                unlink($imgDel->photo_name);
            }


            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(770, 520)->save('upload/property/thambnail/' . $make_name);
            $uploadPath = 'upload/property/thambnail/' . $make_name;

            MultiImage::where('id', $id)->update([

                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);
        } // End Foreach 


        $notification = array(
            'message' => 'Property Multi Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    function agentmulimagedeleteproperty($id)
    {
        $imgDel = MultiImage::findOrFail($id);
        if (file_exists($imgDel->photo_name)) {
            unlink($imgDel->photo_name);
        }
        $imgDel->delete();

        $notification = array(
            'message' => 'Property Multi Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    function agentmulimageaddproperty(Request $request)
    {

        $id = $request->id;
        $img = $request->file('addmulti_img');
        $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
        Image::make($img)->resize(770, 520)->save('upload/property/thambnail/' . $make_name);
        $uploadPath = 'upload/property/thambnail/' . $make_name;
        $imgDel = MultiImage::insert([
            'property_id' => $id,
            'photo_name' => $uploadPath,

        ]);


        $notification = array(
            'message' => 'Property Multi Image Add Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    function agentfacilitiesupdateproperty(Request $request)
    {

        $id = $request->id;

        $facilities = count($request->facility_name);
        Facility::where('property_id', $id)->delete();
        if ($facilities != NULL) {
            for ($i = 0; $i < $facilities; $i++) {
                $df = new Facility();
                $df->property_id = $id;
                $df->facilities_name = $request->facility_name[$i];
                $df->distance = $request->distance[0];
                $df->save();
            }
        }

        $notification = array(
            'message' => 'Property Facility Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    function agentdeleteproperty($id)
    {
        $pdetail = Propertydetail::find($id);
        if (file_exists($pdetail->property_thambnail)) {
            unlink($pdetail->property_thambnail);
        }
        $pdetail->delete();

        $mimage = MultiImage::where('property_id', $id)->latest()->get();
        foreach ($mimage as $image) {
            unlink($image->photo_name);
            MultiImage::where('property_id', $id)->delete();
        }
        Facility::where('property_id', $id)->delete();

        $notification = array(
            'message' => 'Property Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
