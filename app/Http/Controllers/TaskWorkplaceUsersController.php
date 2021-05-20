<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskWorkplaceUser;

class TaskWorkplaceUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskWorkplaceUser::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task_workplace_user = new TaskWorkplaceUser();
        $task_workplace_user->task = $request['task'];
        $task_workplace_user->workplace = $request['workplace'];
        $task_workplace_user->user = $request['user'];
        $task_workplace_user->save();
        return $task_workplace_user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $task_workplace_user = TaskWorkplaceUser::find($id);
        $task_workplace_user->task = $request['task'];
        $task_workplace_user->workplace = $request['workplace'];
        $task_workplace_user->user = $request['user'];
        $task_workplace_user->save();
        return $task_workplace_user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task_workplace_user = TaskWorkplaceUser::find($id);
        if ($task_workplace_user) {
            $task_workplace_user->delete();
            return "This task workplace user was deleted";
        } else {
            return "This task workplace user was deleted erlier";
        }
    }
}
