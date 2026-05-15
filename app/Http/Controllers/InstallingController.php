<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Installing;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Models\Designing;
use App\Models\Task;

class InstallingController extends Controller
{
    protected $taskService;

    // Inject the service into the constructor
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    public function index()
    {
       $users=User::orderBy('id')->get();
       
       $user = auth()->user();


        if ($user->userdetails->role->name === 'Admin') {

            // Admin → see ALL installing tasks
            $installingTasks = Task::with('designings')->whereIn('status', ['installing', 'finished'])->latest() ->get();

        } else {

            // installing user → only assigned tasks
            $installingTasks = Task::with('designings')->whereIn('status', ['installing', 'finished'])->whereHas('users.userDetails.department', function ($q) {
                $q->where('slug', 'installing');
                })->whereHas('users', function ($q) {
                    $q->where('users.id', auth()->id());
                })->get();
        }
       

       return view('tasks.installing-tasks',compact('users','installingTasks'));
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
        $validated = $request->validate([
            'special_instructions'=> 'nullable',
            'missing_stuff'=> 'nullable',
            'pdf_file'   => 'nullable',
        ]);
        if ($request->hasFile('pdf_file')) {

            $file = $request->file('pdf_file');
        
            // Generate unique name
            $name = uniqid() . '_' . time() . '.' . $file->extension();
        
            // Move file to public folder
            $file->move(public_path('uploads/installing'), $name);
        
            // Save path for DB
            $path = 'uploads/installing/' . $name;
        }
         $installing=Installing::create([
            'task_id' => $task_id,
            'user_id' => auth()->id(),
            'pdf_file' => $path,
            "special_instructions"=>$request->special_instructions,
            "missing_stuff"=>$request->missing_stuff,
            "status" => 'complete' 
        ]); 
         $statusUpdate = $this->taskService->taskStatusUpdate($task_id,'finished');
        return redirect()->back()->with('success', 'New Installing comments created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Installing $installing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Installing $installing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Installing $installing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Installing $installing)
    {
        //
    }
}
