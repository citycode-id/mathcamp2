<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Meeting;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function show($id)
    {
        $meeting = Meeting::find($id);
        return ResponseFormatter::success($meeting->videos, 'Data ditemukan');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nama' => 'required',
            'url' => 'required',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null, $validator->errors(), 422);
        };

        $explode = explode("/", $request->url);
        $id = end($explode);

        $meeting = Meeting::find($request->id);
        $video = $meeting->videos()->create([
            'name' => $request->nama,
            'url' => "https://www.youtube.com/embed/".$id."?autoplay=1"
        ]);

        if ($video) {
            return ResponseFormatter::success($meeting, 'Data berhasil disimpan.', 201);
        } else {
            return ResponseFormatter::error(null, 'Data gagal disimpan.', 500);
        }
    }

    public function destroy($id, $meeting) {
        $meeting =  Meeting::where('_id', $meeting)->first();
        $video = $meeting->videos->where('_id', $id)->first();
        $delete = $video->delete();
        if ($delete) {
            return ResponseFormatter::success($delete, 'Data berhasil dihapus');
        } else {
            return ResponseFormatter::error(null, 'Data gagal dihapus', 500);
        }
    }
}
