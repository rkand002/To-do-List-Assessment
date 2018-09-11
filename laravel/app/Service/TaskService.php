<?php
namespace App\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TaskService{

    public function __construct(){

    }

    public function getUserTasks($user_id){

        $tasks = DB::table('tasks AS t')
        ->join('user_tasks as ut', 't.id', '=', 'ut.taskId')
        ->where('ut.userId', '=', $user_id)
        ->get(['t.*']);
        return $tasks;
    }

    public function insertTask(Request $request){

        $taskId = DB::table('tasks')->insertGetId(
            ['name' => $request->name, "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()]);
        return $taskId;
    }

    public function insertUserTask($userId,$taskId){

        DB::table('user_tasks')->insert(
            ['userId' => $userId, 'taskId' => $taskId, "created_at" => \Carbon\Carbon::now(), "updated_at" => \Carbon\Carbon::now()]
        );
    }

    public function  updateTask($taskId,$name)
    {

        DB::table('tasks')->where('id', $taskId)
            ->update(['name' => $name]);

    }

    public function deleteTask($taskId,$userId){

        DB::table('user_tasks')->where([['taskId', $taskId], ['userId', $userId]])->delete();
        DB::table('tasks')->where('id', $taskId)->delete();
    }
}

?>