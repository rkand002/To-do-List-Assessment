<?php

namespace App\Http\Controllers;
use App\Service\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    private $TaskService;

    public function __construct(TaskService $TaskService)
    {

        $this->TaskService=$TaskService;

    }
    public function index(){
        if (Auth::check()) {
            $user = Auth::user();
           $userTasks=$this->TaskService->getUserTasks($user->id);

        }else {
            $userTasks = array();
        }
        return view('tasks.index', compact('userTasks'));
    }

    public function saveTask(Request $request){
        if (Auth::check()) {
            $this->validate($request, [
                'name' => 'required|max:255'
            ]);
            $user = Auth::user();

            $insertedTaskId=$this->TaskService->insertTask($request);
            $this->TaskService->insertUserTask($user->id, $insertedTaskId);

            return redirect('/');
        }
        $tasks = array();
        return view('tasks.index', compact('tasks'));
    }


    public function updateTask(Request $request){
        if (Auth::check()) {
            $user = Auth::user();
            $taskId = $request->route('task');

            $this->TaskService-> updateTask($taskId,  $request->name);
            return redirect('/');
        }
        $tasks = array();
        return view('tasks.index', compact('tasks'));
    }

    public function deleteTask(Request $request){
        if (Auth::check()) {
            $user = Auth::user();
            $taskId = $request->route('task');
            $this->TaskService-> deleteTask($taskId, $user->id);
            return redirect('/');
        }
        return view('tasks.index', compact('tasks'));
    }
}
