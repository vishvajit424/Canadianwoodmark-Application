<?php

namespace App\Http\Controllers;

use App\Models\EdgeBender;
use App\Services\TaskService;
use Illuminate\Http\Request;

class EdgeBenderController extends Controller
{
    protected $taskService;

    // Inject the service into the constructor
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    public function start(EdgeBender $edge)
    {
        $user = auth()->user();

    if ($edge->end_time && $user->userDetails->role->name !== 'Admin') {
        abort(403, 'Unauthorized');
    }
     // Restart after end
    if ($edge->end_time) {
        $edge->update([
            'timer_start' => now(),
            'start_time' => now(),
            'end_time' => null,
            'total_time' => 0 // or keep if needed
        ]);
    } else {
        $edge->update([
            'timer_start' => now(),
            'start_time' => now()
        ]);
    }
        // if (!$edge->start_time) {
        //     $edge->update(['timer_start' => now(),'start_time' => now()]);
        // }

        return back();
    }

    public function pause(EdgeBender $edge)
    {
        if ($edge->start_time) {
            $seconds = $edge->start_time->diffInSeconds(now());
            $edge->increment('total_time', max(0,$seconds));
            $edge->update(['start_time' => null]);
        }

        return back();
    }

    public function end(EdgeBender $edge)
    {
        if ($edge->start_time) {
            $seconds = $edge->start_time->diffInSeconds(now());
            $edge->increment('total_time', max(0,$seconds));
        }

        $edge->update([
            'start_time' => null,
            'end_time' => now(),
        ]);

        return back();
    }
    public function saveFinishingMaterials(Request $request, EdgeBender $edge)
    {
        //abort_if($edge->end_time, 403);
       $materials = $request->input('finishing_material', []);

    $edge->update([
        'finishing_materials' => $materials,
    ]);
        return back();
    }

    
    public function update(Request $request, EdgeBender $edge)
    {
       $edge->update(['missing_pieces' => $request->missing_pieces,'special_instructions' => $request->special_instructions,
            'status' => 'completed']);
       $statusUpdate = $this->taskService->taskStatusUpdate($edge->task_id,'assembly');
       return redirect()->back()->with('edgeBender_id', $edge->id);

        //return back()->with('success','Edge Bender data saved');
    }

}
