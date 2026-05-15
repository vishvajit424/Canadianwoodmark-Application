<?php

namespace App\Http\Controllers;

use App\Models\Assembly;
use App\Services\TaskService;
use Illuminate\Http\Request;

class AssemblyController extends Controller
{
    protected $taskService;

    // Inject the service into the constructor
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$task_id)
    {

       $request->validate([
        'missing_pieces' => 'nullable|string',
    ]);

    $assembly = Assembly::updateOrCreate(
        ['task_id' => $task_id], // condition
        [
            'user_id' => auth()->id(),
            'missing_pieces' => $request->missing_pieces,
            'status' => 'completed',
        ]
    );
    // update task status
    $this->taskService->taskStatusUpdate($task_id, 'installing');

    // ✅ AJAX response
    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'data' => $assembly
        ]);
    }
       return redirect()->back()->with('assembly_id', $assembly->id);
    }

   public function saveMissingPieces(Request $request, $task_id)
{
    $request->validate([
        'completed_items' => 'nullable|array',
        'cabinets_no' => 'nullable'
    ]);

$assembly = Assembly::updateOrCreate(
        ['task_id' => $task_id], // condition
        [
            'user_id' => auth()->id(),
            'completed_items' => $request->completed_items ?? [],
        'cabinets_size'   => $request->cabinets_no,
        ]
    );


    return back();
}
    /**
     * Display the specified resource.
     */
    public function show(Assembly $assembly)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assembly $assembly)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assembly $assembly)
    {
        //
    }
     /**
     * Update the specified resource in storage.
     */
    public function updateCabinate(Request $request, $taskId)
    {

     $request->validate([
        'cabinets_size' => 'nullable|integer'
     ]);

    $task = Assembly::findOrFail($taskId);

    $task->update([
        'cabinets_size' => $request->cabinets_size
    ]);

    return response()->json([
        'success' => true,
        'value' => $task->cabinets_size
    ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assembly $assembly)
    {
        //
    }
}
