<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class AgentPackageController extends Controller
{
    //
    function allpackage()
    {
        return view('agent.buy.all_package');
    }
    function businesspackage()
    {
        $uid = auth::user()->id;
        $agentid = User::find($uid);
        return view('agent.buy.business_package', compact('agentid'));
    }
    function buybusinesspackage()
    {
        $uid = auth::user()->id;
        $agentid = User::find($uid);
        $data = $agentid->credit;
        $agentid = package::insert([
            'user_id' => $uid,

            'package_name' => 'Business',
            'package_credits' => '3',
            'package_amount' => '20',
            'invoice' => 'ERS' . mt_rand(10000000, 99999999),
            'created_at' => Carbon::now(),

        ]);
        User::find($uid)->update([
            'credit' => DB::raw('3+' . $data),
        ]);


        return view('agent.buy.business_package', compact('agentid'));
    }

    function professionalpackage()
    {
        $uid = auth::user()->id;
        $agentid = User::find($uid);
        return view('agent.buy.professional_package', compact('agentid'));
    }
    function buyprofessionalpackage()
    {
        $uid = auth::user()->id;
        $agentid = User::find($uid);
        $data = $agentid->credit;
        $agentid = package::insert([
            'user_id' => $uid,

            'package_name' => 'Professional',
            'package_credits' => '10',
            'package_amount' => '50',
            'invoice' => 'ERS' . mt_rand(10000000, 99999999),
            'created_at' => Carbon::now(),

        ]);
        User::find($uid)->update([
            'credit' => DB::raw('10+' . $data),
        ]);

        $notification = array(
            'message' => 'Professional Package Add Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('all.package')->with($notification);
    }
    function historypackage()
    {
        $id = auth::user()->id;
        $package = package::where('user_id', $id)->latest()->get();
        return view('agent.buy.history_package', compact('package'));
    }
    function downloadhistorypackage($id)
    {
        $packhistory = package::find($id);
        $pdf = Pdf::loadView('agent.buy.download_package_history', compact('packhistory'))->setPaper('a4')
            ->setOption([
                'tempDir' => public_path(),
                'chroot' => public_path(),
            ]);
        return $pdf->download('invoice.pdf');
    }
}
