<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Validator;
use App\Models\Task;
use App\Models\TaskMeta;
use Carbon\Carbon;
use DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Input;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function view(){
        return view('index');
    }

    public function submitTask(Request $request){
        $validator = Validator::make($request->all(), [
            'task' => 'required',
            'description' => 'required',
            'startdate' => 'required',
            'duedate' => 'sometimes|nullable',
            'recurring' => 'required',
        ]);
        // ensure it passed validation rules
        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator->errors()]);
        }
        $recurring = $request->recurring == 'yes' ? 1 : 0;
        $duedate = $request->duedate;
        if($recurring == 0 && $duedate !== null){
            // submit task with a due date
            $oneOff = new Task();
            $oneOff->task = $request->task;
            $oneOff->description = $request->description;
            $oneOff->startdate = $request->startdate;
            $oneOff->duedate = $request->duedate;
            $oneOff->recurring = $recurring;
            $oneOff->status = 0; // 0 pending 1 completed
            $oneOff->save();
            return response()->json(['error' => false, 'message' => 'Task Created Successfully']);
      
        }
        elseif($recurring == 1){
            // set task for recurring tasks
            $recureTasks = new Task;
            $recureTasks->task = $request->task;
            $recureTasks->description = $request->description;
            $recureTasks->startdate = $request->startdate;
            $recureTasks->duedate = $request->duedate;
            $recureTasks->recurring = $recurring;
            $recureTasks->status = 0; // 0 pending 1 completed
            $recureTasks->save();
            // store recurring task on tasks_meta datatable using the task_id gotten from Task table 
            $meta = new TaskMeta;
            $meta->task_id = $recureTasks->id;
            $meta->repeat_start = $request->startdate;
            // differentiate between daily and spcific day task 
            $meta->repeat_interval = $request->days == 'Null' ? 7 : NULL;
            $meta->repeat_weekday = $request->days !== 'Null' ? $request->days : NULL;

            // monthly {Set the conditions}
            $now = Carbon::now();
            $meta->repeat_year = $now->year;
            $meta->repeat_day = $request->day !== "" ? $request->day : NULL ;

            // yearly  [Set the conditions]
            $meta->repeat_year = $request->year !== "" ? $request->year : NULL;
            $meta->repeat_day = $request->day !== "" ? $request->day : NULL;
            $meta->repeat_month = $request->month !== "" ? $request->month : NULL;
            $meta->save();

            return response()->json(['error' => false, 'message' => 'Task Created Successfully']);

        }
        else{
            return response()->json(['error' => true, 'message' => 'Due date is required for a non reocurring task']);
        }
        
    }

    public function dueToday(){
        $today = date('Y-m-d');
        $todaystasks = Task::select('*')->where([
            ['duedate', '=', $today],
            ['status', '=', 0],
        ])->get();
        if(count($todaystasks)){
            return response()->json(['error' => false, 'message' => $todaystasks]);
        }else{
            return response()->json(['error' => true, 'message' => 'No tasks due today']);
        }
    }

    public function dueTomorrow(){
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime($today. ' + 1 day'));
        $tomorrowtasks = Task::select('*')->where([
            ['duedate', '=', $tomorrow],
            ['status', '=', 0],
        ])->get();
        if(count($tomorrowtasks)){
            return response()->json(['error' => false, 'message' => $tomorrowtasks]);
        }else{
            return response()->json(['error' => true, 'message' => 'No tasks scheduled for tomorrow']);
        }
    }

    public function dueNextWeek(){
        $today = date('Y-m-d');
        $nextweek = date('Y-m-d', strtotime('next sunday'));
        $weekafternext = date('Y-m-d', strtotime($nextweek. ' + 7 days')); 
        $nextwtasks = Task::select('*')->where([
                ['duedate', '>=', $nextweek],
                ['duedate', '<', $weekafternext],
                ['duedate', '>', $today],
                ['status', '=', 0],
            ])->get();
        if(count($nextwtasks)){
            return response()->json(['error' => false, 'message' => $nextwtasks]);
        }else{
            return response()->json(['error' => true, 'message' => 'No tasks scheduled for next week']);
        }
    }

    public function completed(){
        $today = date('Y-m-d');
        $todaystasks = Task::select('*')->where('status', 1)->get();
        if(count($todaystasks)){
            return response()->json(['error' => false, 'message' => $todaystasks]);
        }else{
            return response()->json(['error' => true, 'message' => 'No tasks due today']);
        }
    }

    public function overdue(){
        $today = date('Y-m-d');
        $todaystasks = Task::select('*')->where([
            ['duedate', '<', $today],
            ['status', '=', 0],
        ])->get();
        if(count($todaystasks)){
            return response()->json(['error' => false, 'message' => $todaystasks]);
        }else{
            return response()->json(['error' => true, 'message' => 'No tasks due today']);
        }
    }

    public function markcomplete($id){
        $markcomplete = Task::where('id', $id)->update(['status' => 1, 'updated_at' => Carbon::now()]);
        if($markcomplete){
            return response()->json(['error' => false, 'message' => 'marked complete']);
        }else{
            return response()->json(['error' => true, 'message' => 'something went wrong. try again']);
        }
    }

    public function markuncomplete($id){
        $markcomplete = Task::where('id', $id)->update(['status' => 0, 'updated_at' => Carbon::now()]);
        if($markcomplete){
            return response()->json(['error' => false, 'message' => '']);
        }else{
            return response()->json(['error' => true, 'message' => 'something went wrong. try again']);
        }
    }
}
