<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    //
    function dashboard()
    {
        $role = Auth::user()->role;

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'agent') {
            return redirect()->route('agent.dashboard');
        }


        return view('dashboard');
    }
    function index()
    {
        return view('frontend.index');
    }
    function setting()
    {

        $id = Auth::user()->id;
        $userdata = User::find($id);
        return view('frontend.user_setting', compact('userdata'));
    }

    function setting_store(Request $request)
    {
        $adminid = Auth::user()->id;
        $data = User::find($adminid);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->email = $request->email;

        if ($request->file('photo')) {

            // Delete the old photo if it exists
            if ($data->photo && file_exists(public_path('upload/admin_images/' . $data->photo))) {
                @unlink(public_path('upload/user_images/' . $data->photo)); // Ensure the path is correct
            }

            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data->photo = $filename; // Ensure the path is correct
        }

        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function user_logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    function user_password()
    {
        return view('frontend.changepassword');
    }
    function userpasswordupdate(Request $request)
    {   //validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'

        ]);

        //Match password
        if (!Hash::check($request->old_password, auth::user()->password)) {

            $notification = array(
                'message' => 'Old password does not match',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'password change successful',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function UserScheduleRequest()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        $srequest = Schedule::where('user_id', $id)->get();
        return view('frontend.request', compact('userData', 'srequest'));
    }
}
