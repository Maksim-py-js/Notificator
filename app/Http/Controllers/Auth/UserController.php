<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Workplace;
use App\Models\Job;
use App\Models\Group;
use App\Models\Task;

class UserController extends Controller
{
    /**
     * Get authenticated user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function current(Request $request)
    {
        return response()->json($request->user());
    }
    public function index() 
    {
        $users = User::all();
        $data = [];
        foreach ($users as $user) {
            $tasks = [];
            $groups = [];

            $workplace = Workplace::find($user->work_place);
            $job = Job::find($user->job);
            $userGroups = $user->groups()->get();
            $data_tasks = $user->tasks('user')->get();

            foreach($userGroups as $userGroup) {
                $userGroup = Group::find($userGroup->group);
                array_push($groups, $userGroup);
            }
            foreach($data_tasks as $data_task) {
                $task = Task::find($data_task->task);
                array_push($tasks, $task);
            }

            array_push($data, compact(
                'user',
                'workplace',
                'job',
                'groups',
                'tasks'
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
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->cell_phone_number = $request['cell_phone_number'];
        $user->office_phone_number = $request['office_phone_number'];
        $user->work_place = $request['work_place'];
        $user->job = $request['job'];
        $user->department_name = $request['department_name'];
        $user->tasks = $request['tasks'];
        $user->numbers = $request['numbers'];
        $user->notifications = $request['notifications'];
        $user->sms = $request['sms'];
        $user->moderator_index = $request['moderator_index'];
        $user->status = $request['status'];
        $user->role = $request['role'];
        $user->save();
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $data = [];
        $tasks = [];
        $groups = [];

        $workplace = Workplace::find($user->work_place);
        $job = Job::find($user->job);
        $userGroups = $user->groups()->get();
        $data_tasks = $user->tasks('user')->get();

        foreach($userGroups as $userGroup) {
            $userGroup = Group::find($userGroup->group);
            array_push($groups, $userGroup);
        }
        foreach($data_tasks as $data_task) {
            $task = Task::find($data_task->user);
            array_push($tasks, $task);
        }
        array_push($data, compact(
            'user',
            'workplace',
            'job',
            'groups',
            'tasks'
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
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->cell_phone_number = $request['cell_phone_number'];
        $user->office_phone_number = $request['office_phone_number'];
        $user->work_place = $request['work_place'];
        $user->job = $request['job'];
        $user->department_name = $request['department_name'];
        $user->tasks = $request['tasks'];
        $user->numbers = $request['numbers'];
        $user->notifications = $request['notifications'];
        $user->sms = $request['sms'];
        $user->moderator_index = $request['moderator_index'];
        $user->status = $request['status'];
        $user->role = $request['role'];
        $user->save();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return "This user was deleted";
        } else {
            return "This user was deleted erlier";
        }
    }
    public function getModerators(Request $request) {
        return 'its work';
        $users = DB::table('users')->where('role', '=', $request->role)->get();
        return response()->json($users);
    }
}
