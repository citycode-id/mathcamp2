<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Discussion;
use App\Models\Group;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DiscussionController extends Controller
{
    public function index($id)
    {
        // $topic = Topic::where('_id', $id)->with('groups.discussions')->get();
        $groups = Group::where('topic_id', $id)->with('discussions.user')->orderBy('group', 'ASC')->get();
        return view('pages.guru.diskusi_topik', compact('groups'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null, $validator->errors(), 422);
        };

        $user = Auth::user();
        $group = Group::find($request->id);
        $discussion = $group->discussions()->create([
            'user_id' => $user->id,
            'message' => $request->message,
        ]);

        $discussions = Discussion::where('_id', $discussion->id)->with('group', 'user')->first();

        if ($discussions) {
            return ResponseFormatter::success($discussions, 'Data berhasil disimpan');
        } else {
            return ResponseFormatter::error(null, 'Data gagal disimpan');
        }
    }
}
