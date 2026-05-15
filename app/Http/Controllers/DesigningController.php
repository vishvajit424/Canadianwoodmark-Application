<?php

namespace App\Http\Controllers;

use App\Models\Designing;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Services\TaskService;

class DesigningController extends Controller
{
    protected $taskService;

    // Inject the service into the constructor
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    public function index()
    {
       $materials=Material::orderBy('id')->get(); 
       return view('tasks.tasks-details',compact('materials'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$task_id)
    {

     //  dd($request);
        $validated = $request->validate([
            'name'         => 'required',
            'email'        => 'nullable',
            'phone_no'     => 'required',
            'lock_code'    => 'nullable',
            'address'      => 'nullable',

            'installation_date'=> 'nullable|date',

            'material'     => 'nullable',
            'tape'         => 'nullable',
            'handle_name_size'       => 'nullable',

            'layout_pdf'   => 'required',
            'content'      => 'nullable|string',
        ]);
        if ($request->hasFile('layout_pdf')) {

            $file = $request->file('layout_pdf');
        
            // Generate unique name
            $name = uniqid() . '_' . time() . '.' . $file->extension();
        
            // Move file to public folder
            $file->move(public_path('uploads/designing'), $name);
        
            // Save path (store this in DB)
            $path = 'uploads/designing/' . $name;
        }


        $designing = Designing::create([
                'task_id' => $task_id,
                'user_id' => auth()->id(),
                'name'          => $request['name'],
                'email'         => $request['email'],
                'phone_no'      => $request['phone_no'],
                'lock_code'     => $request['lock_code'],
                'address'       => $request['address'],
                'installation_date' => $request['delivery_date'],
                'material'      => $request['material'],
                'tape'          => $request['tape'],
                'handle'        => $request['handle_name_size'],
                'layout_pdf'    => $path,
                'content'       => $request['content'] ?? null,
                'status'        => 'completed',
            ]);
         /* ================= Kitchen Colors ================= */
            $designing->kitchenColor()->create([
                'upper_cabinet' => $request['upper_cabinet'],
                'riser'         => $request['riser'],
                'base_cabinet'  => $request['base_cabinet'],
                'handle'        => $request['handle'],
                'island'        => $request['island'],
                'garbage_bin'   => $request['garbage_bin'],
                'vanities'      => $request['vanities'],
                'spice_rack'    => $request['spice_rack'],
            ]);
            $statusUpdate = $this->taskService->taskStatusUpdate($task_id,'cnc');
            return redirect()->back()->with('designing_id', $designing->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Designing $designing)
    {
        $designing = Designing::where('task_id', $task->id)
        ->latest()
        ->first();

    return view('tasks.task-details', compact('task', 'designing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designing $designing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designing $designing)
{
   
    $validated = $request->validate([
        'name'             => 'required',
        'email'            => 'nullable',
        'phone_no'         => 'required',
        'lock_code'        => 'nullable',
        'address'          => 'nullable',
        'delivery_date'    => 'nullable|date',

        'material'         => 'nullable',
        'tape'             => 'nullable',
        'handle_name_size' => 'nullable',
 
        // PDF is OPTIONAL in update
        'layout_pdf'       => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp,gif|max:20480',
        'updated_pdf'       => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp,gif|max:20480',

        'content'          => 'nullable|string',
    ]);
// dd($request);
    /* ================= PDF UPDATE ================= */
  if ($request->hasFile('layout_pdf')) {

    // Delete old PDF (from public folder)
    if (!empty($designing->layout_pdf) && file_exists(public_path($designing->layout_pdf))) {
        unlink(public_path($designing->layout_pdf));
    }

    $file = $request->file('layout_pdf');

    // Generate unique name
    $name = uniqid() . '_' . time() . '.' . $file->extension();

    // Move file
    $file->move(public_path('uploads/designing'), $name);

    // Save path
    $path = 'uploads/designing/' . $name;

} else {
    $path = $designing->layout_pdf; // keep old file
}

    /* ================= UPDATE DESIGNING ================= */
    $designing->update([
        'name'          => $validated['name'],
        'email'         => $validated['email'],
        'phone_no'      => $validated['phone_no'],
        'lock_code'     => $validated['lock_code'],
        'address'       => $validated['address'],
        'installation_date' => $validated['delivery_date'],
        'material'      => $validated['material'],
        'tape'          => $validated['tape'],
        'handle'        => $validated['handle_name_size'],
        'layout_pdf'    => $path,
        'content'       => $validated['content'] ?? null,
        'updated_pdf_user_role' => '',
        'status'        => 'completed',
    ]);

    /* ================= UPDATE KITCHEN COLORS ================= */
    $designing->kitchenColor()->updateOrCreate(
        ['design_id' => $designing->id],
        [
            'upper_cabinet' => $request->upper_cabinet,
            'riser'         => $request->riser,
            'base_cabinet'  => $request->base_cabinet,
            'handle'        => $request->handle,
            'island'        => $request->island,
            'garbage_bin'   => $request->garbage_bin,
            'vanities'      => $request->vanities,
            'spice_rack'    => $request->spice_rack,
        ]
    );

    /* ================= UPDATE TASK STATUS ================= */
    $this->taskService->taskStatusUpdate($designing->task_id, 'cnc');

    return redirect()->back()->with('designing_id', $designing->id);
}

public function update_pdf(Request $request, $id)
{

    $designing = Designing::where('task_id', $id)->first();
    $validated = $request->validate([ 

        'updated_pdf'       => 'required|file|mimes:pdf|max:20480',
    ]);

    /* ================= PDF UPDATE ================= */
   if ($request->hasFile('updated_pdf')) {

    // Delete old file (from public folder)
    if (!empty($designing->updated_pdf) && file_exists(public_path($designing->updated_pdf))) {
        unlink(public_path($designing->updated_pdf));
    }

    $file = $request->file('updated_pdf');

    // Generate unique name
    $name = uniqid() . '_' . time() . '.' . $file->extension();

    // Move file
    $file->move(public_path('uploads/designing'), $name);

    // Save path
    $path = 'uploads/designing/' . $name;

} else {
    $path = $designing->updated_pdf; // keep old file
}
    /* ================= UPDATE DESIGNING ================= */
    $designing->update([
        'updated_pdf'    => $path,
        'updated_by'    => $request->updated_by,
        'updated_pdf_user_role'    => $request->updated_pdf_user_role,
    ]);

    return redirect()->back()->with('designing_id', $designing->id);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designing $designing)
    {
        //
    }
}
