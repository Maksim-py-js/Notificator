<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskFile;
use App\Models\User;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        $data = [];
        foreach($tasks as $task) {
            $files = $task->files('task')->get();
            $users = $task->users('user')->get();

            $workplaces = $task->workplaces('workplace')->get();
            $worplace_users = [];
            foreach($workplaces as $workplace) {
                $user = User::find($workplace->id);
                array_push($worplace_users, $user);
            }
            array_push($data, compact(
                'task',
                'files',
                'users',
                'worplace_users'
            ));
        }
        return json_encode($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request['title'];
        $task->text = $request['text'];
        $task->term = $request['term'];
        $task->day = $request['day'];
        $task->time = $request['time'];
        $task->save();
        return $task;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        $data = [];
        $files = $task->files('task')->get();
        array_push($data, compact(
            'task',
            'files'
        ));        
        return json_encode($data);
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
        $task = Task::find($id);
        $task->title = $request['title'];
        $task->text = $request['text'];
        $task->term = $request['term'];
        $task->day = $request['day'];
        $task->time = $request['time'];
        $task->save();
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if ($task) {
            return "This $task->title was deleted";
        } else {
            return "This Task was deleted erlier";
        }
    }
}
