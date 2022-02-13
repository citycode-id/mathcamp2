<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
    public function goal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'tujuan' => 'required',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null, $validator->errors(), 422);
        };

        $meeting = Meeting::where('_id', $request->id)->update([
            'goals' => base64_encode($request->tujuan)
        ]);

        if ($meeting) {
            return ResponseFormatter::success($meeting, 'Data berhasil disimpan.', 201);
        } else {
            return ResponseFormatter::error(null, 'Data gagal disimpan.', 500);
        }
    }
}
