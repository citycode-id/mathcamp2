<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = User::where('role', 'student')->orderBy('classroom', 'asc')->get();

            return ResponseFormatter::success($user, 'Data ditemukan');
        }
    }

    public function filter($id_topic)
    {
        $topic = Topic::find($id_topic);
        $student = User::where('role', 'student');
        $exception = $topic->groups->pluck('_id')->toArray();
        $students = $student->whereNotIn('group_ids', $exception)->get();

        return ResponseFormatter::success($students, 'Data ditemukan');
    }
}
