<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    //
    public function AgentScheduleRequest()
    {
        $id = Auth::user()->id;
        $usermsg = Schedule::where('agent_id', $id)->get();
        return view('agent.Schedule.request', compact('usermsg'));
    }
    public function AgentDetailsSchedule($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('agent.Schedule.schedule_details', compact('schedule'));
    }

    public function AgentUpdateSchedule(Request $request)
    {
        $sid = $request->id;
        Schedule::findOrFail($sid)->update([
            'status' => '1',
        ]);
        $notification = array(
            'message' => 'You have Confirm Schedule Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('agent.schedule.request')->with($notification);
    } // End Method
}
