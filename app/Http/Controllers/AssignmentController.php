<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AssignmentController extends Controller
{
    public function show($id)
    {
        $meeting = Meeting::find($id);
        return ResponseFormatter::success($meeting->assignments, 'Data ditemukan');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nama' => 'required',
            'file' => 'required|file',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null, $validator->errors(), 422);
        };

        // upload file
        $filename = Str::random(8).".".$request->file('file')->getClientOriginalExtension();
        Storage::putFileAs(
            'public/assignments', $request->file('file'), $filename
        );

        $meeting = Meeting::find($request->id);
        $assignment = $meeting->assignments()->create([
            'name' => $request->nama,
            'file' => $filename
        ]);

        if ($assignment) {
            return ResponseFormatter::success($meeting, 'Data berhasil disimpan.', 201);
        } else {
            return ResponseFormatter::error(null, 'Data gagal disimpan.', 500);
        }
    }

    public function destroy($id, $meeting) {
        $meeting =  Meeting::where('_id', $meeting)->first();
        $assignment = $meeting->assignments->where('_id', $id)->first();

        // delete assignment file
        if(Storage::exists('public/assignments/'.$assignment->file)){
            Storage::delete('public/assignments/'.$assignment->file);
        }

        $delete = $assignment->delete();
        if ($delete) {
            return ResponseFormatter::success($delete, 'Data berhasil dihapus');
        } else {
            return ResponseFormatter::error(null, 'Data gagal dihapus', 500);
        }
    }
}
