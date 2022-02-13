<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Reference;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReferenceController extends Controller
{
    public function showByTopic($id)
    {
        $refs = Reference::where("topic_id", $id)->get();

        return ResponseFormatter::success($refs, "Data ditemukan");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'url' => 'required',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null, $validator->errors(), 422);
        }

        $topic = Topic::find($request->id);

        $ref = $topic->references()->create([
            "name" => $request->name,
            "url" => $request->url,
        ]);

        if ($ref) {
            return ResponseFormatter::success($ref, 'Data berhasil disimpan.', 201);
        } else {
            return ResponseFormatter::error(null, 'Data gagal disimpan.', 500);
        }
    }

    public function destroy($id)
    {
        $ref = Reference::find($id);
        if ($ref) {
            Reference::destroy($id);
            return ResponseFormatter::success(null, 'Data berhasil dihapus');
        }

        return ResponseFormatter::error(null, 'Data gagal dihapus', 500);
    }
}
