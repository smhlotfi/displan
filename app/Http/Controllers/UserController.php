<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;
require_once ('../external_resources/PersianCalendar.php');

class UserController extends Controller
{
    public function new(){
        return view('Users/new');
    }

    public function save(Request $request){

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        $user->save();

        return redirect('/user/'.$user->id);
    }

    public function delete(){

    }

    public function edit(){

    }

    public function loginView(){
        return view('Users/login');
    }

    public function loginAction(Request $request){
        $user = User::whereEmail($request->email)->first();

        return redirect()->route('user' , ['id' => $user->getAttribute('id')]);

    }

    public function home(Request $request , $id){
        $user = User::whereId($id)->first();
        $period_mode = $request->period_mode;
        if ($period_mode == null)
            $period_mode = "روز";


        switch ($period_mode){
            case "روز":
                $dateNow = (mds_date('Y/m/d'));
                $tasks = Task::where('userId', '=', $user->getAttribute('id'))
                    ->where('date' , '=' , $dateNow)
                    ->get();
                break;
            case "هفته":
                $tasks = array();
                for ($i = 0 ; $i < 7 ; $i++){
                    $tasks[$i] = Task::where('userId', '=', $user->getAttribute('id'))
                        ->where('date' , '=' , mds_date('Y/m/d' , strtotime('+'.$i.' day')))
                        ->get();
                }
                break;
            case "ماه":
                $firstDate = (mds_date('Y/m/01'));
                $lastDate = (mds_date('Y/m/d' , strtotime("+".mds_date('t')." day")));
                $tasks = array();
                for ($i = 0 ; $i < mds_date('t') ; $i++){
                    $tasks[$i] = Task::where('userId', '=', $user->getAttribute('id'))
                        ->where('date' , '=' , mds_date('Y/m/d' ,
                            strtotime('+'.($i + 1 - mds_date('d')).' day')))
                        ->get();
                }
                break;
        }

        return view('Users/home' , [
            'name'   => $user->getAttribute('name'),
            'userId' => $user->getAttribute('id'),
            'tasks'  => $tasks,
            'period_mode' => $period_mode
        ]);
    }

    public function convertDateNumbersToEnglish($date){
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = [ 0 ,  1 ,  2 ,  3 ,  4 ,  5 ,  6 ,  7 ,  8 ,  9 ];
        return str_replace($persian, $english, $date);
    }
    public function convertDateNumbersToPersian($date){
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = [ 0 ,  1 ,  2 ,  3 ,  4 ,  5 ,  6 ,  7 ,  8 ,  9 ];
        return str_replace($english, $persian, $date);
    }
}
