<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Validator;
use App\Models\Task;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function view(){
        //$today = date('Y-m-d');
        //$tomorrow = date('Y-m-d', strtotime($today. ' + 1 day')); 
        //$nextweek = date('Y-m-d', strtotime($tomorrow. ' + 7 days')); 
        //$todayquery = 'duedate <= '.$today.' AND status = "completed"';
        //$tomorrowquery = 'duedate <= '.$tomorrow.' AND status = "completed"';
        //$nextquery = 'duedate <= '.$nextweek.' AND status = "completed"';
        //$data['todaystasks'] = Task::select('*')->where($todayquery)->get();
        //$data['tomorrow'] = Task::select('*')->where($tomorrowquery)->get();
        //$data['tomorrow'] = Task::select('*')->where($nextquery)->get();
        return view('index');
    }

    public function submitTask(Request $request){
        $tovalidate = [
            'task' => 'required',
            'description' => 'required',
            'startdate' => 'required',
            'duedate' => 'required',
            'recurring' => 'required'
        ];
        if($request->recurring == 'yes'){
            if($request->customize == 'on'){
                $tovalidate['period'] = 'required';
                $tovalidate['day'] = 'required';
                if($request->period == 'yearly'){
                    $tovalidate['month'] = 'required';
                }
            }else{
                $tovalidate['days'] = 'required';
            }
        }
        $validator = Validator::make($request->all(), $tovalidate);
        if($validator->fails()){
            return response()->json(['error' => true, 'message' => $validator->errors()]);
        }
        $tasks = array();
        foreach($request->all() as $key => $value){
            if($key != '_token'){
                $tasks[$key] = $value;
            }
        }
        $task = new Task;
        $addtasks = $task->save($tasks);
        if($addtasks){
            return response()->json(['error' => true, 'message' => 'Task added successfully']);
        }else{
            return response()->json(['error' => true, 'message' => 'Something went wrong. Try again']);
        }
    }

}
