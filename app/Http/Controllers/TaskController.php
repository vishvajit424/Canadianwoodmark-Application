<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use App\Models\Measurement;
use App\Models\Material;
use App\Models\Tape;
use App\Models\Handel;
use App\Models\FinishingMaterial;
use App\Models\AssemblyChecklist;
use App\Models\Designing;
use App\Models\CNC;
use App\Models\EdgeBender;
use App\Models\Assembly;
use App\Models\Installing;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //   $users=User::orderBy('id')->get();
    //   $measurements = Task::where('status', 'measurements')->get();
    //   $designings = Task::where('status', 'designings')->get();
    //   $cncs = Task::where('status', 'cnc')->get();
    //   $edgebenders = Task::where('status', 'edge-bender')->get();
    //   $assemblys = Task::where('status', 'assembly')->get();
    //   $installings = Task::where('status', 'installing')->get();
    //   return view('tasks.tasks',compact('users','measurements','designings','cncs','edgebenders','assemblys','installings'));
    // }
     public function index()
    {
       $users=User::orderBy('id')->get();
       $measurements = Task::where('status', 'measurements')->whereHas('users.userDetails.department', function ($q) {
                $q->where('slug', ['admin','measurements','designings','cnc','edge-bender','assembly']);
                })->whereHas('users', function ($q) {
                    $q->where('users.id', auth()->id());
                })->get();
       $designings = Task::where('status', 'designings')->whereHas('users.userDetails.department', function ($q) {
                $q->where('slug', ['admin','measurements','designings','cnc','edge-bender','assembly']);
                })->whereHas('users', function ($q) {
                    $q->where('users.id', auth()->id());
                })->get();
       $cncs = Task::where('status', 'cnc')->whereHas('users.userDetails.department', function ($q) {
                $q->where('slug', ['admin','measurements','designings','cnc','edge-bender','assembly']);
                })->whereHas('users', function ($q) {
                    $q->where('users.id', auth()->id());
                })->get();
       $edgebenders = Task::where('status', 'edge-bender')->whereHas('users.userDetails.department', function ($q) {
                $q->where('slug', ['admin','measurements','designings','cnc','edge-bender','assembly']);
                })->whereHas('users', function ($q) {
                    $q->where('users.id', auth()->id());
                })->get();
       $assemblys = Task::where('status', 'assembly')->whereHas('users.userDetails.department', function ($q) {
                $q->where('slug', ['admin','measurements','designings','cnc','edge-bender','assembly']);
                })->whereHas('users', function ($q) {
                    $q->where('users.id', auth()->id());
                })->get();
       $installings = Task::where('status', 'installing')->whereHas('users.userDetails.department', function ($q) {
                $q->where('slug', ['admin','measurements','designings','cnc','edge-bender','assembly','installing']);
                })->whereHas('users', function ($q) {
                    $q->where('users.id', auth()->id());
                })->get();
       return view('tasks.tasks',compact('users','measurements','designings','cncs','edgebenders','assemblys','installings'));
    }
    public function all_tasks()
    {
       $users=User::orderBy('id')->get();
       
       $user = auth()->user();
 

        if ($user->userdetails->role->name === 'Admin') {

            // Admin → see ALL installing tasks
            $tasks = Task::with('designings')->whereIn('status', ['installing', 'finished'])->latest() ->get();

        } else {

            // installing user → only assigned tasks
            $tasks = Task::with('designings')->whereIn('status', ['installing', 'finished'])->whereHas('users.userDetails.department', function ($q) {
                $q->where('slug', 'installing');
                })->whereHas('users', function ($q) {
                    $q->where('users.id', auth()->id());
                })->get();
        }
     

       return view('tasks.installing-tasks',compact('users','tasks'));
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
    public function store(Request $request)
    {
      //  dd($request);
        $request->validate([
        'task_title'   => 'required|string|max:100',
        'task_date' => 'required',
        'task_tag'  => 'nullable',
        'description'  => 'nullable|string|max:1000',
        'employees'   => 'required',
    ]);
        $task = Task::create([
            'title' => $request->task_title,
            'date' => $request->task_date,
            'tag' =>'dddd',
            'description' =>$request->description ?? null,
            'created_by' => auth()->user()->id,
        ]);
        $task->employees()->sync($request->employees);

        return redirect()->back()->with('success', 'Task created and assigned to employees');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task,$id)
    {

        $task = Task::find($id);
        if (!$task) {
        return redirect()->route('dashboard')->with('error', 'Task not found');
        }else{
        $measurement = Measurement::with('images')->where('task_id', $id)->latest()->first();
        $designing = Designing::with('images','kitchenColor')->where('task_id', $id)->latest()->first(); 
        $cnc = CNC::firstOrCreate(['task_id' => $id],['user_id' => auth()->id()]);
        $edge = EdgeBender::firstOrCreate(['task_id' => $task->id],['user_id' => auth()->id()]);
        $assembly = Assembly::where('task_id', $id)->latest()->first();
        $materials=Material::orderBy('id')->get(); 
        $tapes=Tape::orderBy('id')->get(); 
        $handels=Handel::orderBy('id')->get(); 
        $finishing_materials=FinishingMaterial::orderBy('id')->get();
        $assembly_checklists=AssemblyChecklist::orderBy('id')->get();
        $installing=Installing::where('task_id', $id)->latest()->first();
        return view('tasks.task-details',compact('task', 'measurement','designing','materials','assembly','cnc','edge','installing','tapes','handels','finishing_materials','assembly_checklists'));
    }
      
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
         // Detach employees (important)
    $task->employees()->detach();

    // Delete task
    $task->delete();

    return back()->with('success', 'Task deleted successfully');
    }
}
