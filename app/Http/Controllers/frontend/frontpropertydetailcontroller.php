<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\propertytype;
use App\Models\Amenities;
use App\Models\User;
use App\Models\package;
use App\Models\MultiImage;
use App\Models\Propertydetail;
use App\Models\Facility;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Carbon\carbon;

class frontpropertydetailcontroller extends Controller
{

    function propertydetail($id, $slug)
    {
        $details = Propertydetail::find($id);
        $images = MultiImage::where('property_id', $id)->get();
        $aminities = $details->amenities_id;
        $amen = explode(',', $aminities);
        $Facility =  Facility::where('property_id', $id)->get();
        $data = $details->ptype_id;
        $related = Propertydetail::where('ptype_id', $data)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(3)->get();
        return view('frontend.property.property_details', compact('details', 'images', 'amen', 'Facility', 'related'));
    }
    function agentpropertydetail($id)
    {
        $details = User::find($id);
        $items = Propertydetail::where('agent_id', $id)->get();
        $trent = Propertydetail::where('property_status', 'rent')->where('status', '1')->get();
        $tbuy = Propertydetail::where('property_status', 'buy')->where('status', '1')->get();


        return view('frontend.property.agent_details', compact('details', 'items', 'tbuy', 'trent'));
    }
    function rentproperty()
    {

        $trent = Propertydetail::where('property_status', 'rent')->where('status', '1')->get();
        $tbuy = Propertydetail::where('property_status', 'buy')->where('status', '1')->get();


        return view('frontend.property.all_rent_property', compact('trent', 'tbuy'));
    }
    function buyproperty()
    {

        $trent = Propertydetail::where('property_status', 'rent')->where('status', '1')->get();
        $tbuy = Propertydetail::where('property_status', 'buy')->where('status', '1')->get();


        return view('frontend.property.all_buy_property', compact('trent', 'tbuy'));
    }
    function typeproperty($id)
    {

        $ttype = Propertydetail::where('ptype_id', $id)->where('status', '1')->get();
        $type = Propertytype::find($id);
        $trent = Propertydetail::where('property_status', 'rent')->where('status', '1')->get();
        $tbuy = Propertydetail::where('property_status', 'buy')->where('status', '1')->get();



        return view('frontend.property.type_all_property', compact('ttype', 'type', 'trent', 'tbuy'));
    }

    function buySearch(Request $request)
    {
        $request->validate(['search' => 'required']);
        $item = $request->search;
        $sstate = $request->state;
        $stype = $request->ptype_id;

        $search = Propertydetail::where('property_name', 'like', '%' . $item . '%')->where('property_status', 'buy')->with('type', 'pstate')
            ->whereHas('pstate', function ($q) use ($sstate) {
                $q->where('state_name', 'like', '%' . $sstate . '%');
            })
            ->whereHas('type', function ($q) use ($stype) {
                $q->where('type_name', 'like', '%' . $stype . '%');
            })
            ->get();

        $trent = Propertydetail::where('property_status', 'rent')->where('status', '1')->get();
        $tbuy = Propertydetail::where('property_status', 'buy')->where('status', '1')->get();

        return view('frontend.property.all_rent_property', compact('search', 'trent', 'tbuy'));
    }
    function rentSearch(Request $request)
    {
        $request->validate(['search' => 'required']);
        $item = $request->search;
        $sstate = $request->state;
        $stype = $request->ptype_id;

        $search = Propertydetail::where('property_name', 'like', '%' . $item . '%')->where('property_status', 'rent')->with('type', 'pstate')
            ->whereHas('pstate', function ($q) use ($sstate) {
                $q->where('state_name', 'like', '%' . $sstate . '%');
            })
            ->whereHas('type', function ($q) use ($stype) {
                $q->where('type_name', 'like', '%' . $stype . '%');
            })
            ->get();

        $trent = Propertydetail::where('property_status', 'rent')->where('status', '1')->get();
        $tbuy = Propertydetail::where('property_status', 'buy')->where('status', '1')->get();

        return view('frontend.property.all_rent_property', compact('search', 'trent', 'tbuy'));
    }

    //Schedule
    public function StoreSchedule(Request $request)
    {

        $aid = $request->agent_id;
        $pid = $request->property_id;
        if (Auth::check()) {
            Schedule::insert([
                'user_id' => Auth::user()->id,
                'property_id' => $pid,
                'agent_id' => $aid,
                'tour_date' => $request->tour_date,
                'tour_time' => $request->tour_time,
                'message' => $request->message,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Send Request Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Plz Login Your Account First',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    } // End Method 
}
