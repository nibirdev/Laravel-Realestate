<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Intervention\Image\Facades\Image;
use Carbon\carbon;

class siteSettingController extends Controller
{
    //

    public function SiteSetting()
    {
        $sitesetting = SiteSetting::find(1);
        return view('admin.siteSetting.siteSetting', compact('sitesetting'));
    }

    public function UpdateSiteSetting(Request $request)
    {
        $site_id = $request->id;
        if ($request->file('logo')) {
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1500, 386)->save('upload/logo/' . $name_gen);
            $save_url = 'upload/logo/' . $name_gen;
            SiteSetting::findOrFail($site_id)->update([
                'support_phone' => $request->support_phone,
                'company_address' => $request->company_address,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
                'logo' => $save_url,
            ]);
            $notification = array(
                'message' => 'SiteSetting Updated with Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            SiteSetting::findOrFail($site_id)->update([
                'support_phone' => $request->support_phone,
                'company_address' => $request->company_address,
                'email' => $request->email,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
            ]);
            $notification = array(
                'message' => 'SiteSetting Updated without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    } // End Method 
}
