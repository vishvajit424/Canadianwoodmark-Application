<?php
namespace App\Exports;

use App\Models\Task;
use App\Models\Measurement;
use App\Models\Designing;
use App\Models\CNC;
use App\Models\EdgeBender;
use App\Models\Assembly;
use App\Models\Installing;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TasksExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Task::all()->map(function ($task) {

            $measurement = Measurement::where('task_id', $task->id)->first();
            $designings = Designing::where('task_id', $task->id)->first();
            $cnc = CNC::where('task_id', $task->id)->first();
            $edgeBender = EdgeBender::where('task_id', $task->id)->first();
            $assembly = Assembly::where('task_id', $task->id)->first();
            $installing = Installing::where('task_id', $task->id)->first();
            return [
                $task->title,
                $measurement->comment ?? '',
                $designings->name ?? '',
                $designings->email ?? '',
                $designings->phone_no ?? '',
                $designings->lock_code ?? '',
                $designings->address ?? '',
                $designings->delivery_date ?? '',
                $designings->material ?? '',
                $designings->tape ?? '',
                $designings->handle ?? '',
                $designings->content ?? '',
                $designings->status ?? '',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Task Name',
            'Measurement Comments',
            'Customer Name',
            'Customer Email',
            'Customer Phone No',
            'Customer lock code',
            'Customer address',
            'Customer Delivery Date',
            'Material',
            'Tape',
            'Handle',
            'Content',
            'Status'
        ];
    }
}
