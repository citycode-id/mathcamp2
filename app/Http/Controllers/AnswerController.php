<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AnswerController extends Controller
{
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
        $assignment = $meeting->answers()->create([
            'user_id' => auth()->user()->id,
            'type' => 'individual',
            'file' => $filename
        ]);

        if ($assignment) {
            return ResponseFormatter::success($meeting, 'Data berhasil disimpan.', 201);
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
        $assignment = $meeting->answers()->create([
            'user_id' => auth()->user()->id,
            'type' => 'group',
            'file' => $filename
        ]);

        if ($assignment) {
            return ResponseFormatter::success($meeting, 'Data berhasil disimpan.', 201);
        } else {
            return ResponseFormatter::error(null, 'Data gagal disimpan.', 500);
        }
    }
}
