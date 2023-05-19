<?php

namespace App\Http\Controllers;


use App\Models\Kaban\Task;
use App\Models\Auth\Command;
use App\Models\Auth\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataBaseName = (new Project)->getConnection()->getDatabaseName();
        $tableProjectName = (new Project)->getTable();
        $dbTableProject = $dataBaseName . "." . $tableProjectName;

        $tableTeamName = (new Command)->getTable();
        $dbTableTeam = $dataBaseName . "." . $tableTeamName;

        $tasks = Task::join($dbTableProject, function ($join) use ($dbTableProject) {
            $join->on($dbTableProject . ".id", "=", "tasks.project_id");
        })
            ->join($dbTableTeam, function ($join) use ($dbTableTeam) {
                $join->on($dbTableTeam . ".id", "=", "tasks.team_id");
            })
            ->get();
        return $tasks;



        //Task::all();

        // нужно join между task, project, team
        // возвращать название задачи
        // id задачи
        // название проекта
        // id проекта
        // тег команды
        // id команды
        // фамилия имя ответственного
        // id ответственного
        // дату дедлайна


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {

    //     $task = Task::create([
    //         'parent_id' => $request->parent_id,
    //         'project_id' => $request->project_id,
    //         'team_id' => $request->team_id,
    //         'name' => $request->name,
    //         'is_on_kanban' => false,
    //         'is_completed' => false,
    //         'status_id' => 1, // В работу
    //         'planned_start_date' => $request->planned_start_date,
    //         'planned_final_date' => $request->planned_final_date,
    //         'deadline' => $request->deadline,
    //         'completed_at' => null,
    //         'description' => $request->description,
    //     ]);
    //     $executors = Executors::create([
    //         'task_id' => $task->id,
    //         'user_id' => $request->user_id, // переделать на авторизированного пользователя
    //         'role_id' => 1, // ответственный
    //         'time_spent' => 0
    //     ]);


    //     $stages = array();
    //     $res = [];
    //     if ($request->stages !== null) {
    //         foreach ($request->stages as $key => $stage) {
    //             $stages[] = new Stage(['description' => $stage, 'is_ready' => false]);
    //         }
    //         $res = $task->stages()->saveMany($stages);
    //     }

    //     return $res = ["task" => $task, "stages" => $res, "executors" => $executors];
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // join task и team и project.
        // вернуть название задачи
        // статус задачи
        // название проекта
        // дедлайн
        // тег команды
        // планируемая дата начала
        // планируемая дата финала
        // описание задачи
        // фио ответственного
        // чек лист
        // затраченное время
        // комментарии
        // 



        // $task = Task::join()


        // $task = Task::join('projects', function ($join) {
        //     $join->on("tasks.project_id", "=", "projects.id");
        // })
        //     ->join('users', function ($join) {
        //         $join->on("tasks.contractor_id", "=", "users.id");
        //     })
        //     ->join('statuses', function ($join) {
        //         $join->on("tasks.status_id", "=", "statuses.id");
        //     })
        //     ->join('priorities', function ($join) {
        //         $join->on("tasks.priority_id", "=", "priorities.id");
        //     })
        //     ->where('tasks.project_id', '=', $request->projectId)
        //     ->select([
        //         'projects.name AS project_name', 'tasks.project_id',
        //         'tasks.id AS task_id', 'tasks.name AS task_name',
        //         'tasks.contractor_id', 'users.name AS contractor_name',
        //         'users.surname AS contractor_surname',
        //         'tasks.priority_id', 'priorities.name AS priority_name',
        //         'tasks.status_id', 'statuses.name AS status_name',
        //         'tasks.deadline', 'tasks.description', 'tasks.actual_time',
        //     ])
        //     ->find($request->taskId);
        // $stages = Stage::where('task_id', '=', $request->taskId)
        //     ->get(['stages.id', 'stages.description', 'stages.is_ready']);

        // $task->stages = $stages;
        // return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputArr = $request->valid;
        $stages = false;
        if (array_key_exists("stages", $inputArr)) {
            $stages = $inputArr["stages"];
            unset($inputArr["stages"]);
        }
        if (sizeof($inputArr) !== 0) {
            if ($request->status_id === 2) { // статус = Выполнено
                $inputArr["completed_at"] = now();
                // добавить is_completed true и убрать с канбана?
            }
            Task::where('project_id', '=', $request->projectId)
                ->where('id', '=', $request->taskId)
                ->update($inputArr);
        }
        Task::where('id', '=', $request->taskId)
            ->update($inputArr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
