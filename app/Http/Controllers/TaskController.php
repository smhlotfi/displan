<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function new($userId){
        return view('Tasks/new' , ['userId' => $userId]);
    }

    public function save(Request $request){

        $userId = (int)$request->userId;
        $user = \App\Models\User::whereId($userId)->first();

        $taskDate = $this->convertDateNumbersToEnglish($request->date);

        Task::create([
            'description' => $request->description,
            'priority'    => $request->priority,
            'date'        => $taskDate,
            'time'        => $request->time,
            'userId'      => $user->getAttribute('id'),
            'isDone'      => false
        ]);


        return redirect("/user/".$request->userId);
    }


    public function edit(Request $request , $id){
        $task   = Task::whereId($id)->first();

        return view('Tasks/edit' , [
            'task' => $task
        ]);
    }

    public function update(Request $request){
        $taskId = $request->taskId;
        $task   = Task::whereId($taskId)->first();
        $userId = $task->getAttribute('userId');

        $task->update([
            'description' => $request->description,
            'priority'    => $request->priority,
            'date'        => $request->date,
            'time'        => $request->time
        ]);

        return redirect("/user/".$userId);
    }

    public function delete(Request $request){
        $taskId = $request->id;
        $task = Task::whereId($taskId)->first();

        $task->delete();

        return redirect("/user/".$task->getAttribute('userId'));
    }

    public function done($id){
        $task = Task::whereId($id)->first();
        $task->update([
            'isDone' => true
        ]);

        return redirect("/user/".$task->getAttribute('userId'));
    }

    public function convertDateNumbersToEnglish($date){
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = [ 0 ,  1 ,  2 ,  3 ,  4 ,  5 ,  6 ,  7 ,  8 ,  9 ];
        return str_replace($persian, $english, $date);
    }
}
