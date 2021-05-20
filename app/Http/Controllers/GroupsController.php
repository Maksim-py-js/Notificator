<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        $data = [];
        foreach ($groups as $group) {
            $moderator = User::find($group->moderator);

            $groupUsers = $group->users()->get();

            $users = [];
            foreach($groupUsers as $groupUser) {
                $groupUser = User::find($groupUser->user);
                array_push($users, $groupUser);
            }

            array_push($data, compact(
                'group',
                'moderator',
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
        $group = new Group();
        $group->moderator = $request['moderator'];
        $group->name = $request['name'];
        $group->save();
        return $group;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Group::find($id);
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
        $group = Group::find($id);
        $group->moderator = $request['moderator'];
        $group->name = $request['name'];
        $group->save();
        return $group;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        if ($group) {
            $group->delete();
            return "This group was deleted";
        } else {
            return "This group was deleted erlier";
        }
    }
}
