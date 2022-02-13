<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (Auth::user()->role) {
            case 'teacher':
                return view('pages.guru.home');
                break;
            case 'student':
                $topics = Topic::whereHas('users', function ($q) {
                    $q->where('_id', Auth::user()->id);
                })->get();
                return view('pages.siswa.home', compact('topics'));
                break;
            default:
                # code...
                break;
        }
    }
}
