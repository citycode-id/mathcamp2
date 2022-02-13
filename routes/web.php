<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Teacher
Route::group(['middleware' => ['auth', 'role:teacher'], 'prefix' => 'teacher', 'as' => 'teacher.'], function() {

    // Topic
    Route::group(['prefix' => 'topic', 'as' => 'topic.'] , function() {
        Route::get('/', [App\Http\Controllers\TopicController::class, 'index'])->name('index');
        Route::get('/detail/{id}', [App\Http\Controllers\TopicController::class, 'show'])->name('show');
        Route::post('/', [App\Http\Controllers\TopicController::class, 'store'])->name('store');
        Route::put('/point', [App\Http\Controllers\TopicController::class, 'pointUpdate'])->name('poin');
        Route::put('/meeting', [App\Http\Controllers\TopicController::class, 'meetingUpdate'])->name('meeting');
        Route::get('/group/{id}', [App\Http\Controllers\TopicController::class, 'group'])->name('group.index');
    });

    // Reference
    Route::group(['prefix' => 'reference', 'as' => 'reference.'] , function() {
        Route::get('/topic/{id}', [App\Http\Controllers\ReferenceController::class, 'showByTopic'])->name('topic');
        Route::post('/', [App\Http\Controllers\ReferenceController::class, 'store'])->name('store');
        Route::delete('/{id}', [App\Http\Controllers\ReferenceController::class, 'destroy'])->name('destroy');
    });

    // Meetings
    Route::group(['prefix' => 'meeting', 'as' => 'meeting.'] , function() {
        Route::put('/goal/{id}', [App\Http\Controllers\MeetingController::class, 'goal'])->name('goal');
        // video
        Route::post('/video', [App\Http\Controllers\VideoController::class, 'store'])->name('video.store');
        Route::get('/video/{id}', [App\Http\Controllers\VideoController::class, 'show'])->name('video.show');
        Route::delete('/video/{id}/{meeting}', [App\Http\Controllers\VideoController::class, 'destroy'])->name('video.destroy');
        // module
        Route::post('/module', [App\Http\Controllers\ModuleController::class, 'store'])->name('module.store');
        Route::get('/module/{id}', [App\Http\Controllers\ModuleController::class, 'show'])->name('module.show');
        Route::delete('/module/{id}/{meeting}', [App\Http\Controllers\ModuleController::class, 'destroy'])->name('module.destroy');
        // task
        Route::post('/task', [App\Http\Controllers\TaskController::class, 'store'])->name('task.store');
        Route::get('/task/{id}', [App\Http\Controllers\TaskController::class, 'show'])->name('task.show');
        Route::delete('/task/{id}/{meeting}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('task.destroy');
    });

    // Group
    Route::group(['prefix' => 'group', 'as' => 'group.'] , function() {
        Route::get('/{id}/student', [App\Http\Controllers\GroupController::class, 'student'])->name('student.index');
        Route::post('/{id_topic}/student/{id}', [App\Http\Controllers\GroupController::class, 'addStudent'])->name('student.store');
        Route::delete('/{id_topic}/student/{id}', [App\Http\Controllers\GroupController::class, 'removeStudent'])->name('student.remove');
    });

    // Siswa
    Route::group(['prefix' => 'student', 'as' => 'student.'] , function() {
        Route::get('/', [App\Http\Controllers\StudentController::class, 'index'])->name('index');
        Route::get('/filter/{id_topic}', [App\Http\Controllers\StudentController::class, 'filter'])->name('filter');
    });

    // Discussion
    Route::group(['prefix' => 'discussion', 'as' => 'discussion.'] , function() {
        Route::get('/{id}/topic', [App\Http\Controllers\DiscussionController::class, 'index'])->name('index');
        Route::post('/', [App\Http\Controllers\DiscussionController::class, 'store'])->name('store');
    });
});

// Student
Route::group(['middleware' => ['auth', 'role:student'], 'prefix' => 'student', 'as' => 'student.'], function() {
    // Topic
    Route::group(['prefix' => 'topic', 'as' => 'topic.'], function() {
        Route::get('/{id}/pembuka', [App\Http\Controllers\Student\TopicController::class, 'index'])->name('pembuka');
        Route::get('/{id}/pengenalan', [App\Http\Controllers\Student\TopicController::class, 'pengenalan'])->name('pengenalan');
        Route::get('/{id}/teori', [App\Http\Controllers\Student\TopicController::class, 'teori'])->name('teori');
        Route::get('/{id}/video', [App\Http\Controllers\Student\TopicController::class, 'video'])->name('video');
        Route::get('/{id}/diskusi', [App\Http\Controllers\Student\TopicController::class, 'diskusi'])->name('diskusi');
        Route::get('/{id}/tugas', [App\Http\Controllers\Student\TopicController::class, 'tugas'])->name('tugas');
    });

    // Discussion
    Route::group(['prefix' => 'discussion', 'as' => 'discussion.'], function() {
        Route::post('/', [App\Http\Controllers\DiscussionController::class, 'store'])->name('store');
    });
});
