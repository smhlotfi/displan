<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Task;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function new($userId){
        return view('Goals/new' , ['userId' => $userId]);
    }

    public function save(Request $request){

        $userId = (int)$request->userId;
        $user = \App\Models\User::whereId($userId)->first();


        Goal::create([
            'description' => $request->description,
            'priority'    => $request->priority,
            'date'        => $request->date,
            'time'        => $request->time,
            'userId'      => $user->getAttribute('id'),
            'isDone'      => false
        ]);


        return redirect("/user/".$request->userId);
    }


    public function edit(Request $request , $id){
        $goal   = Goal::whereId($id)->first();

        return view('Goals/edit' , [
            'goal' => $goal
        ]);
    }

    public function update(Request $request){
        $goalId = $request->goalId;
        $goal   = Task::whereId($goalId)->first();
        $userId = $goal->getAttribute('userId');

        $goal->update([
            'description' => $request->description,
            'priority'    => $request->priority,
            'date'        => $request->date,
            'time'        => $request->time
        ]);

        return redirect("/user/".$userId);
    }

    public function delete(Request $request){
        $goalId = $request->id;
        $goal = Task::whereId($goalId)->first();

        $goal->delete();

        return redirect("/user/".$goal->getAttribute('userId'));
    }

    public function done($id){
        $goal = Task::whereId($id)->first();
        $goal->update([
            'isDone' => true
        ]);

        return redirect("/user/".$goal->getAttribute('userId'));
    }
}
