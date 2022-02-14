<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Discussion;
use App\Models\Group;
use App\Models\Meeting;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function index($id)
    {
        $topic = Topic::find($id);
        if ($topic) {
            return view('pages.siswa.topik_pembuka', compact('topic'));
        }

        abort(404);
    }

    public function pengenalan($id)
    {
        $topic = Topic::find($id);

        if ($topic) {
            return view('pages.siswa.topik_pengenalan', compact('topic'));
        }

        abort(404);
    }

    public function teori($id)
    {
        $topic = Topic::find($id);
        $meeting = Meeting::where('topic_id', $id)->where('meeting', intval($topic->current_meeting))->first();

        if ($topic) {
            return view('pages.siswa.topik_teori', compact('topic', 'meeting'));
        }

        abort(404);
    }

    public function video($id)
    {
        $topic = Topic::find($id);
        $meeting = Meeting::where('topic_id', $id)->where('meeting', intval($topic->current_meeting))->first();

        if ($topic) {
            return view('pages.siswa.topik_video', compact('topic', 'meeting'));
        }

        abort(404);
    }

    public function diskusi($id)
    {
        $topic = Topic::find($id);
        $group = Group::where('topic_id', $id)->where('user_ids', Auth::user()->id)->first();
        $discussion = Discussion::where('group_id', $group->id)->get();
        $member = User::whereHas('groups', function($q) use($group) {
            $q->where('_id', $group->id);
        })->get();
        if ($topic) {
            return view('pages.siswa.topik_diskusi', compact('topic', 'group', 'discussion', 'member'));
        }

        abort(404);
    }

    public function tugas($id)
    {
        $topic = Topic::find($id);
        $meeting = Meeting::where('topic_id', $id)->where('meeting', intval($topic->current_meeting))->first();

        $assign = $meeting->answers()->where('type', 'group')->where('user_id', auth()->user()->id)->get()->last();
        $answer = $meeting->answers()->where('type', 'individual')->where('user_id', auth()->user()->id)->first();
        if ($topic) {
            return view('pages.siswa.topik_tugas', compact('topic', 'meeting', 'assign', 'answer'));
        }

        abort(404);
    }
}
