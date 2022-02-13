<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Group;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function student(Request $request, $id_group)
    {
        if ($request->ajax()) {
            $student = User::whereHas('groups', function($q) use($id_group) {
                $q->where('_id', $id_group);
            })->get();
        }

        return ResponseFormatter::success($student, "Data ditemukan");
    }

    public function addStudent($id_group, $id)
    {

        $group = Group::find($id_group);
        $user = User::find($id);

        // attach student to group
        $group->users()->attach($user);

        // attach to topic
        $topic_id = $group->topic_id;
        $topic = Topic::find($topic_id);
        $topic->users()->attach($user);

        return ResponseFormatter::success($group, 'Berhasil disimpan');
    }

    public function removeStudent($id_group, $id)
    {
        $group = Group::find($id_group);
        $user = User::find($id);

        // detach student from group
        $group->users()->detach($user);

        // dettach from topic
        $topic_id = $group->topic_id;
        $topic = Topic::find($topic_id);
        $topic->users()->detach($user);

        return ResponseFormatter::success($group, 'Berhasil disimpan');
    }
}
