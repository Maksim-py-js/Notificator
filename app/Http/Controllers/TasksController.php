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
            $arr_users = [];
            $users = [];

            $files = $task->files('task')->get();
            $data_users = $task->users('user')->get();
            $data_workplaces = $task->workplaces('workplace')->get();            
            $shipping_times = $task->shipping_times('task')->get();

            foreach($data_users as $data_user) {
                $user = User::find($data_user->user);
                if (!in_array($user, $arr_users)) {                    
                    array_push($arr_users, $user);
                }                
            }
            foreach($data_workplaces as $data_workplace) {
                $user = User::find($data_workplace->id);
                if (!in_array($user, $arr_users)) {                    
                    array_push($arr_users, $user);
                }
            }
            
            foreach($arr_users as $user) {
                foreach($shipping_times as $shipping_time) {
                    if($user->id == $shipping_time->user) {
                        array_push($users, compact(
                            'user',
                            'shipping_time'
                        ));
                    }
                }
            }

            array_push($data, compact(
                'task',
                'files',
                'users'
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
        $task->state = $request['state'];

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
        $arr_users = [];
        $users = [];

        $files = $task->files('task')->get();
        $data_users = $task->users('user')->get();
        $data_workplaces = $task->workplaces('workplace')->get();          
        $shipping_times = $task->shipping_times('task')->get();

        foreach($data_users as $data_user) {
            $user = User::find($data_user->user);
            if (!in_array($user, $arr_users)) {                    
                array_push($arr_users, $user);
            }
        }
        foreach($data_workplaces as $data_workplace) {
            $user = User::find($data_workplace->id);
            if (!in_array($user, $arr_users)) {                    
                array_push($arr_users, $user);
            }
        }
        foreach($arr_users as $user) {
            foreach($shipping_times as $shipping_time) {
                if($user->id == $shipping_time->user) {
                    array_push($users, compact(
                        'user',
                        'shipping_time'
                    ));
                }
            }
        }

        array_push($data, compact(
            'task',
            'files',
            'users'
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
        $task->state = $request['state'];
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
