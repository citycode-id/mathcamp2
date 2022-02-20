<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\User;
use Illuminate\Http\Request;

class StepController extends Controller
{
    public function index(Request $request)
    {
      $user = User::find(auth()->user()->id);
      $step = $user->steps()->where('meeting_id', $request->id)->first();

      if ($step) {
        return ResponseFormatter::success($step, 'Data ditemukan');
      } else {
        return ResponseFormatter::error(null, 'Data tidak ditemukan', 404);
      }
    }

    public function store(Request $request)
    {
      $user = User::find(auth()->user()->id);
      $step = $user->steps()->where('meeting_id', $request->id)->first();

      if ($step) {
        if ($step->last_step < $request->last_step) {
          $step->update(['last_step' => $request->last_step]);
        }
      } else {
        $step = $user->steps()->create([
          'meeting_id' => $request->id,
          'last_step' => $request->last_step,
        ]);
      }

      if ($step) {
        return ResponseFormatter::success($step, 'Data berhasil disimpan');
      } else {
        return ResponseFormatter::error(null, 'Data gagal disimpan', 500);
      }
    }
}
