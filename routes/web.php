<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TaskController;

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TapeController;
use App\Http\Controllers\HandelController;

use App\Http\Controllers\MeasurementController;

use App\Http\Controllers\AssemblyChecklistController;
use App\Http\Controllers\FinishingMaterialController;


use App\Http\Controllers\DesigningController;
use App\Http\Controllers\CNCController;
use App\Http\Controllers\EdgeBenderController; 
use App\Http\Controllers\AssemblyController; 
use App\Http\Controllers\InstallingController; 


use App\Exports\TasksExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return redirect()->route('login');
});

Route::fallback(function () {
    return redirect()->route('dashboard');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/image/{id}', [ProfileController::class, 'updateImage'])->name('profile.img.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/employees', [UserController::class, 'index'])->name('employees');
    Route::get('/create/employees', [UserController::class, 'create'])->name('create.employee');
    Route::post('/employee/store', [UserController::class, 'store'])->name('employee.store');
    Route::post('/employee/delete/{id}', [UserController::class, 'destroy'])->name('del.employee');
    Route::put('/employee/password/{id}',[UserController::class, 'resetPassword'])->name('update.password');

    Route::get('/departments', [DepartmentsController::class, 'index'])->name('departments');
    Route::post('/department/create', [DepartmentsController::class, 'create'])->name('create.department');
    Route::post('/department/delete/{id}',[DepartmentsController::class,'destroy'])->name('del.department');
    Route::get('/user/role', [RolesController::class, 'index'])->name('roles');
    Route::post('/role/create', [RolesController::class, 'create'])->name('role.store');

    
    Route::get('/task', [TaskController::class, 'index'])->name('tasks');
    Route::post('/create/task', [TaskController::class, 'store'])->name('create.task');
    Route::get('/single/task/{id}', [TaskController::class, 'show'])->name('single.task');
    Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');

     Route::get('/materials', [MaterialController::class, 'index'])->name('materials');
     Route::post('/material/create', [MaterialController::class, 'store'])->name('create.material');
     Route::post('/material/delete/{id}', [MaterialController::class, 'destroy'])->name('del.material');

     Route::get('/tapes', [TapeController::class, 'index'])->name('tapes');
     Route::post('/tape/create', [TapeController::class, 'store'])->name('create.tape'); 
     Route::post('/tape/delete/{id}', [TapeController::class, 'destroy'])->name('del.tape');

     Route::get('/handels', [HandelController::class, 'index'])->name('handels');
     Route::post('/handel/create', [HandelController::class, 'store'])->name('create.handel');
     Route::post('/handel/delete/{id}', [HandelController::class, 'destroy'])->name('del.handel');


     Route::get('/assembly/checklist', [AssemblyChecklistController::class, 'index'])->name('assembly.checklist');
     Route::post('/assembly/checklist/create', [AssemblyChecklistController::class, 'store'])->name('create.assembly.checklist');
     Route::post('/assembly/checklist/delete/{id}', [AssemblyChecklistController::class, 'destroy'])->name('del.assembly.checklist');
     

     Route::get('/finishing/materials', [FinishingMaterialController::class, 'index'])->name('finishing.material');
     Route::post('/finishing/material/create', [FinishingMaterialController::class, 'store'])->name('create.finishing.material');
     Route::post('/finishing/material/delete/{id}', [FinishingMaterialController::class, 'destroy'])->name('del.finishing.material');


    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::put('/settings/update/{id}', [SettingsController::class, 'update'])->name('settings.update');


    Route::post('/create/measurement/{id}',[MeasurementController::class,'store'])->name('store.measurement');
    Route::put('/update/measurement/{measurement}',[MeasurementController::class,'update'])->name('measurement.update');

    Route::post('/create/designing/{id}',[DesigningController::class,'store'])->name('store.designing');
    Route::put('/update/designing/{designing}',[DesigningController::class,'update'])->name('update.designing');
    Route::post('/update/designing/pdf/{id}',[DesigningController::class,'update_pdf'])->name('update.designing.pdf');

    Route::post('/cnc/start/{cnc}', [CNCController::class, 'start'])->name('cnc.start');
    Route::post('/cnc/pause/{cnc}', [CNCController::class, 'pause'])->name('cnc.pause');
    Route::post('/cnc/end/{cnc}',   [CNCController::class, 'end'])->name('cnc.end');
    Route::post('/cnc/{cnc}/save', [CncController::class, 'update'])->name('cnc.save');

    Route::post('/edge-bender/{edge}/start', [EdgeBenderController::class,'start'])->name('edge-bender.start');
    Route::post('/edge-bender/{edge}/pause', [EdgeBenderController::class,'pause'])->name('edge-bender.pause');
    Route::post('/edge-bender/{edge}/end',   [EdgeBenderController::class,'end'])->name('edge-bender.end');
    Route::post('/edge-bender/{edge}/finishing/save',   [EdgeBenderController::class,'saveFinishingMaterials'])->name('edge.finishing.save');
    Route::post('/edge-bender/{edge}/save',  [EdgeBenderController::class,'update'])->name('edge-bender.save');
    
    Route::post('/store/assembly/{id}',[AssemblyController::class,'store'])->name('store.assembly');
    Route::post('/update/assembly/cabinate/{task}',[AssemblyController::class, 'updateCabinate'])->name('assembly.update.cabinate');
     Route::post('/assembly/save-missing-pieces/{task}',
[AssemblyController::class,'saveMissingPieces'])
->name('assembly.saveMissingPieces');

    Route::post('/store/installing/{id}',[InstallingController::class,'store'])->name('store.installing');
     Route::get('/finished/tasks', [InstallingController::class, 'index'])->name('finished.tasks');

    Route::get('/export-tasks', function () {
    return Excel::download(new TasksExport, 'tasks.xlsx');
})->name('export.task');
});

require __DIR__.'/auth.php';
