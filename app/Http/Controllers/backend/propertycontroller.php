<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\propertytype;
use App\Models\Amenities;
use App\Models\User;
use App\Models\package;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;


class propertycontroller extends Controller
{
    //========= Property Type ============

    function Adminalltype()
    {
        $types = propertytype::latest()->get();
        return view('admin.type.all_type', compact('types'));
    }
    //
    function addpropertytype()
    {

        return view('admin.type.add_type');
    }
    function updatepropertytype(Request $request)
    {
        $request->validate([
            'Type_Name' => 'required|unique:propertytypes',
            'type_icon' => 'required'

        ]);
        propertytype::insert([
            'type_name' => $request->Type_Name,
            'type_icon' => $request->type_icon
        ]);
        $notification = array(
            'message' => 'Property Inserted Successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
    }

    function deletepropertytype($id)
    {
        $id = propertytype::find($id);
        $id->delete();
        return back();
    }

    function editpropertytype($id)
    {

        $editid = propertytype::find($id);
        return view('admin.type.edit_type', compact('editid'));
    }
    function editpropertyupdate($id, Request $request)
    {

        $editid = propertytype::find($id);
        $editid->type_name = $request->Type_Name;
        $editid->type_icon = $request->type_icon;
        $editid->update();
        return redirect()->route('all.type');



        return view('admin.type.edit_type', compact('editid'));
    }



    ////////////////////////////////Amenities///////////////////////////////

    function Adminallamenities()
    {
        $AllAmenities = Amenities::latest()->get();
        return view('admin.amenities.all_amenities', compact('AllAmenities'));
    }
    //Add page url
    function addamenities()
    {

        return view('admin.amenities.add_amenities');
    }
    //Store
    function storeamenities(Request $request)
    {
        $data = new Amenities();
        $data->amenities_name =  $request->amenities_name;
        $data->save();

        $notification = array(
            'message' => 'Amenities Inserted Successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
    }

    //delete
    function deleteamenities($id)
    {
        $id = Amenities::find($id);
        $id->delete();
        return back();
    }

    //Edit page Url with compact
    function editamenities($id)
    {

        $editid = Amenities::find($id);
        return view('admin.amenities.edit_amenities', compact('editid'));
    }
    //Update edit data
    function editamenitiesupdate($id, Request $request)
    {

        $editid = Amenities::find($id);
        $editid->amenities_name = $request->amenities_name;
        $editid->update();
        return redirect()->route('all.amenities');
    }




    ////////////////////////////////Agent///////////////////////////////
    function allagent()
    {
        $allagent = User::where('role', 'agent')->get();
        return view('admin.agent.all_agent', compact('allagent'));
    }
    function addagent()
    {
        return view('admin.agent.add_agent');
    }

    function storeagent(Request $request)
    {
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => 'agent',
            'status' => 'active',
            'password' => Hash::make($request->password),
        ]);


        $note = array(
            'message' => 'Amenities Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($note);
    }
    function editagent($id)
    {
        $agent = User::find($id);


        return view('admin.agent.edit_agent', compact('agent'));
    }
    function updateagent($id, Request $request)
    {
        $agent = User::find($id);
        $agent->name = $request->name;
        $agent->phone = $request->phone;
        $agent->address = $request->address;
        $agent->email = $request->email;
        $agent->update();



        return redirect()->route('all.agent');
    }
    function deleteagent($id)
    {
        $agent = User::find($id);

        $agent->delete();
        return redirect()->back();
    }
    function atoiagent($id)
    {
        $agent = User::find($id);
        $agent->status = 'inactive';
        $agent->update();
        return redirect()->back();
    }
    function itoaagent($id)
    {
        $agent = User::find($id);
        $agent->status = 'active';
        $agent->update();
        return redirect()->back();
    }

    //=============package==============
    function historypackage()
    {

        $package = package::latest()->get();
        return view('admin.package.history_package', compact('package'));
    }
    function downloadhistorypackage($id)
    {
        $packhistory = package::find($id);
        $pdf = Pdf::loadView('admin.package.download_package_history', compact('packhistory'))->setPaper('a4')
            ->setOption([
                'tempDir' => public_path(),
                'chroot' => public_path(),
            ]);
        return $pdf->download('invoice.pdf');
    }
}
