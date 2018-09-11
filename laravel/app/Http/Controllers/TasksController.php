<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $user = Auth::user();
            $tasks = DB::table('tasks AS t')
                ->join('user_tasks as ut', 't.id', '=', 'ut.taskId')
                ->where('ut.userId', '=', $user->id)
                ->get(['t.*']);
            return view('tasks.index', compact('tasks'));
        }
        $tasks = array();
        return view('tasks.index', compact('tasks'));
    }

    public function saveTask(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);
        $user = Auth::user();
        $taskId  = DB::table('tasks')->insertGetId(
            ['name' => $request->name, "created_at" =>  \Carbon\Carbon::now(),"updated_at" => \Carbon\Carbon::now()]
        );

        DB::table('user_tasks')->insert(
            ['userId'=>$user->id,'taskId'=>$taskId,"created_at" =>  \Carbon\Carbon::now(),"updated_at" => \Carbon\Carbon::now()]
        );
        return redirect('/');
    }


    public function updateTask(){

    }

    public function deleteTask(Request $request){
        $user = Auth::user();
        $taskId = $request->route('task');
        DB::table('user_tasks')->where([['taskId', $taskId],['userId',$user->id]])->delete();
        DB::table('tasks')->where('id',  $taskId)->delete();
        return redirect('/');
    }
}
