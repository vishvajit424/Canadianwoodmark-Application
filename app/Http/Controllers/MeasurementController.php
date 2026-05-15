<?php

namespace App\Http\Controllers;
use App\Models\Measurement;
use App\Models\MeasurementImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Services\TaskService;

class MeasurementController extends Controller
{

    protected $taskService;

    // Inject the service into the constructor
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    //
    public function store(Request $request, $task_id)
{
    $request->validate([
        'files' => 'required|array|min:1|max:50',
        'files.*' => 'image|max:2048', // validate each file
        'comment' => 'nullable|string',
    ]);

    $measurement = Measurement::create([
        'task_id' => $task_id,
        'user_id' => auth()->id(),
        'comment' => $request->comment,
    ]);

    if ($request->hasFile('files')) {

        $folder = public_path('uploads/measurements');

        // Create folder if not exists
        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }

        foreach ($request->file('files') as $image) {

            // Better unique filename
            $name = uniqid() . '_' . time() . '_' . preg_replace('/\s+/', '_', $image->getClientOriginalName());

            $image->move($folder, $name);

            $measurement->images()->create([
                'image_path' => 'uploads/measurements/' . $name,
            ]);
        }
    }

    // Update task status
    $this->taskService->taskStatusUpdate($task_id, 'designings');

    return redirect()->back()->with('measurement_id', $measurement->id);
}
    public function show(Task $task)
   {
    $measurement = Measurement::with('images')
        ->where('task_id', $task->id)
        ->latest()
        ->first();

    return view('tasks.task-details', compact('task', 'measurement'));
   }

public function update(Request $request, Measurement $measurement)
{
   
    $measurement->update([
        'comment' => $request->comment,
    ]);
    if ($request->filled('deleted_images')) {

        foreach ($request->deleted_images as $imgId) {

            // IMPORTANT: Find IMAGE, not Measurement
            $img = MeasurementImage::where('measurement_id',$measurement->id)
                                   ->where('id', $imgId)
                                   ->first();

            if ($img) {
                // Delete file
                if (file_exists(public_path($img->image_path))) {
                    unlink(public_path($img->image_path));
                }

                // Delete DB record
                $img->delete();
            }
        }
    }
    if ($request->hasFile('files')) {

    foreach ($request->file('files') as $image) {

        $name = time().'_'.$image->getClientOriginalName();

        $image->move(public_path('uploads/measurements'), $name);

        $measurement->images()->create([
            'image_path' => 'uploads/measurements/'.$name
        ]);
    }
}

    return back()->with('success', 'Measurement updated successfully');
}

}
