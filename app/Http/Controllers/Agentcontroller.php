<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class Agentcontroller extends Controller
{
    //
    public function Agentdashboard()
    {
        return view('agent.agent_dashboard');
    }

    //
    public function agentlogin()
    {
        return view('agent.agent_login');
    }
    public function agentregister(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'agent',
            'status' => 'inactive',

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::agent);
    }

    public function Agentprofile()
    {
        $id = Auth::user()->id;
        $profiledata = User::find($id);

        return view('agent.agent_profile', compact('profiledata'));
    }
    public function agentprofilestore(Request $request)

    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->email = $request->email;

        if ($request->file('photo')) {

            // Delete the old photo if it exists
            if ($data->photo && file_exists(public_path('upload/agent_images/' . $data->photo))) {
                @unlink(public_path('upload/agent_images/' . $data->photo)); // Ensure the path is correct
            }

            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/agent_images'), $filename);
            $data->photo = $filename; // Ensure the path is correct
        }

        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
    public function agentpasswordchange()
    {
        $id = Auth::user()->id;
        $profiledata = User::find($id);

        return view('agent.agent_changepassword', compact('profiledata'));
    }

    function agentpasswordupdate(Request $request)
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

    public function agentlogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
