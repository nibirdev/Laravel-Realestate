<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class Admincontroller extends Controller
{
    public function Admindashboard()
    {
        return view('admin.index');
    }
    public function Adminlogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function Adminlogin()
    {
        return view('admin.login');
    }

    public function Adminprofile()
    {
        $adminid = Auth::user()->id;
        $profiledata = User::find($adminid);
        return view('admin.admin_profile', compact('profiledata'));
    }
    function Adminprofilestore(Request $request)
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
                @unlink(public_path('upload/admin_images/' . $data->photo)); // Ensure the path is correct
            }

            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename; // Ensure the path is correct
        }

        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
    function Adminpasswordchange()
    {
        $adminid = Auth::user()->id;
        $profiledata = User::find($adminid);
        return view('admin.admin_changepassword', compact('profiledata'));
    }
    function Adminpasswordupdate(Request $request)
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


    /////////// Admin User All Method ////////////

    public function AllAdmin()
    {

        $alladmin = User::where('role', 'admin')->get();
        return view('admin.pages.admin.all_admin', compact('alladmin'));
    } // End Method 


    public function AddAdmin()
    {

        $roles = Role::all();
        return view('admin.pages.admin.add_admin', compact('roles'));
    } // End Method 


    public function StoreAdmin(Request $request)
    {

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password =  Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New Admin User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    } // End Method 


    public function EditAdmin($id)
    {

        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.pages.admin.edit_admin', compact('user', 'roles'));
    } // End Method

    public function UpdateAdmin(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New Admin User Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    } // End Method 


    public function DeleteAdmin($id)
    {

        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'New Admin User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 


}
