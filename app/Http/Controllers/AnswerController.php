<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Answer;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AnswerController extends Controller
{
    public function show($id)
    {
        $answers = Answer::where('meeting_id', $id)->with('user')->get();
        return ResponseFormatter::success($answers, 'Data ditemukan');
    }

    public function individual(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'file' => 'required|file',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null, $validator->errors(), 422);
        };

        // upload file
        $filename = Str::random(8).".".$request->file('file')->getClientOriginalExtension();
        Storage::putFileAs(
            'public/answers', $request->file('file'), $filename
        );

        $meeting = Meeting::find($request->id);
        $assignment = $meeting->answers()->updateOrCreate([
            'user_id' => auth()->user()->id,
        ],[
          'individual' => $filename
        ]);

        if ($assignment) {
            return ResponseFormatter::success($assignment, 'Data berhasil disimpan.', 201);
        } else {
            return ResponseFormatter::error(null, 'Data gagal disimpan.', 500);
        }
    }

    public function group(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'file' => 'required|file',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null, $validator->errors(), 422);
        };

        // upload file
        $filename = Str::random(8).".".$request->file('file')->getClientOriginalExtension();
        Storage::putFileAs(
            'public/answers', $request->file('file'), $filename
        );

        $meeting = Meeting::find($request->id);
        $assignment = $meeting->answers()->updateOrCreate([
            'user_id' => auth()->user()->id,
        ],[
          'group' => $filename
        ]);

        if ($assignment) {
            return ResponseFormatter::success($assignment, 'Data berhasil disimpan.', 201);
        } else {
            return ResponseFormatter::error(null, 'Data gagal disimpan.', 500);
        }
    }
}
