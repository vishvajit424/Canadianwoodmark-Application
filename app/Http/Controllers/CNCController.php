<?php

namespace App\Http\Controllers;

use App\Models\CNC;
use Illuminate\Http\Request;
use App\Services\TaskService;
class CNCController extends Controller
{
    /**
     * Display a listing of the resource.
     */
protected $taskService;

    // Inject the service into the constructor
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    // public function start(CNC $cnc)
    // {
    //    abort_if($cnc->end_time, 403, 'CNC already ended');

    //     if (!$cnc->start_time) {
    //         $cnc->update([     
    //             'timer_start' => now(),
    //             'start_time' => now(),
    //         ]);
    //     }
    //     return redirect()->back()->with('cnc_id', $cnc->id);
    // }
  public function start(Cnc $cnc)
{
    $user = auth()->user();

    if ($cnc->end_time && $user->userDetails->role->name !== 'Admin') {
        abort(403, 'Unauthorized');
    }

    // Restart after end
    if ($cnc->end_time) {
        $cnc->update([
            'timer_start' => now(),
            'start_time' => now(),
            'end_time' => null,
            'total_time' => 0 // or keep if needed
        ]);
    } else {
        $cnc->update([
            'start_time' => now(),
            'timer_start' => now(),
        ]);
    }

    return back()->with('cnc_id', $cnc->id);
}
 
    public function pause(Cnc $cnc)
{
    abort_if($cnc->end_time, 403, 'CNC already ended');

    if ($cnc->start_time) {
        $seconds = $cnc->start_time->diffInSeconds(now());

        $cnc->increment('total_time', $seconds);

        $cnc->update([
            'start_time' => null
        ]);
    }

    return back()->with('cnc_id', $cnc->id);
}

    public function end(Cnc $cnc)
{
    if ($cnc->start_time) {

        $seconds = $cnc->start_time->diffInSeconds(now());

        $cnc->increment('total_time', $seconds);
    }

    $cnc->update([
        'end_time' => now(),
        'start_time' => null
    ]);

    return back()->with('cnc_id', $cnc->id);
}

    public function update(Request $request, CNC $cnc)
    {
        $cnc->update(['recut_pieces' => $request->recut_pieces, 'content' => $request->special_instructions,'status' => 'completed']);
         $statusUpdate = $this->taskService->taskStatusUpdate($cnc->task_id,'edge-bender');
         //dd($statusUpdate);
        return redirect()->back()->with('cnc_id', $cnc->id);
    }


}
