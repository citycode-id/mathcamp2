<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Group;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role == 'teacher') {
            if($request->ajax()) {
                return ResponseFormatter::success(Auth::user()->topics, 'Data ditemukan');
            }
            return view('pages.guru.topik');
        }
    }

    public function show($id)
    {
        $topic = Topic::find($id);
        if ($topic) {
            return view('pages.guru.topik_detail', compact('topic'));
        }
        abort(404);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null, $validator->errors(), 422);
        }

        // create topic
        $topic = Topic::create([
            'name' => ucwords(strtolower($request->name)),
            'current_meeting' => 1
        ]);

        // create 5 meetings
        for ($i=1; $i <= 5 ; $i++) {
            $topic->meetings()->create(['meeting' => $i]);
        }

        // create 6 groups
        for ($i=1; $i <= 6 ; $i++) {
            $topic->groups()->create(['group' => $i]);
        }

        // Attach topic to user
        $topic->users()->attach(Auth::user());

        if ($topic) {
            return ResponseFormatter::success($topic, 'Data berhasil disimpan.', 201);
        } else {
            return ResponseFormatter::error(null, 'Data gagal disimpan.', 500);
        }
    }

    public function pointUpdate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required',
            'poin' => 'required'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null, $validator->errors(), 422);
        };

        $topic = Topic::where('_id', $request->id)->update([
            'points' => base64_encode($request->poin)
        ]);

        if ($topic) {
            return ResponseFormatter::success($topic, 'Data berhasil disimpan.', 201);
        } else {
            return ResponseFormatter::error(null, 'Data gagal disimpan.', 500);
        }
    }

    public function group($id)
    {
        $groups = Group::where('topic_id', $id)->get();
        return view('pages.guru.kelompok_topik', compact('groups', 'id'));
    }

    public function meetingUpdate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id_topic' => 'required',
            'meeting' => 'required'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null, $validator->errors(), 422);
        };

        $topic = Topic::where('_id', $request->id_topic)->update([
            'current_meeting' => intval($request->meeting)
        ]);

        if ($topic) {
            return ResponseFormatter::success($topic, 'Data berhasil disimpan.', 201);
        } else {
            return ResponseFormatter::error(null, 'Data gagal disimpan.', 500);
        }
    }
}
