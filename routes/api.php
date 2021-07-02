<?php

// use App\Http\Controllers\API\LessonController;
// use App\Http\Controllers\API\TagController;
// use App\Http\Controllers\API\UserController;
use App\Models\lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1',)->group(function () {

    Route::apiResource('lessons', 'App\Http\Controllers\API\LessonController');
    Route::apiResource('Tag', 'App\Http\Controllers\API\TagController');
    Route::apiResource('User', 'App\Http\Controllers\API\UserController');

    // Route::get('lessons', function () {
    //     return lesson::all();
    // });

    // Route::get('lessons/{id}', function ($id) {
    //     return lesson::find($id);
    // });


    // Route::post('lessons', function (Request $request) {
    //     return lesson::create($request->all());
    // });

    // Route::put('lessons/{id}', function (Request $request, $id) {
    //     $lesson = lesson::findOrFail($id);
    //     $lesson->update($request->all());
    //     return $lesson;
    // });


    // Route::delete('lessons/{id}', function ($id) {
    //     $lesson = lesson::findOrFail($id);
    //     $lesson->delete();
    //     return 204;
    // });

    Route::any('lessonsss', function () {
        $message = "yanlış bir route yazdınız lütfen doğru bir şekilde tekrar et. lessons olmalidir ";

        return  Response::json([
            'data' => $message,
            'link' => url('doucmentation/api')
        ], 404);
    });

    Route::redirect('lesson', 'lessons');


    // kullanci icin 
    // Route::get('users', function () {
    //     return User::all();
    // });

    // Route::get('users/{id}', function ($id) {
    //     return User::find($id);
    // });


    // Route::post('users', function (Request $request) {
    //     return User::create($request->all());
    // });

    // Route::put('users/{id}', function (Request $request, $id) {
    //     $User = User::findOrFail($id);
    //     $User->update($request->all());
    //     return $User;
    // });


    // Route::delete('users/{id}', function ($id) {
    //     $User = User::findOrFail($id);
    //     $User->delete();
    //     return 204;
    // });

    // tag icin
    // Route::get('tags', function () {
    //     return Tag::all();
    // });

    // Route::get('tags/{id}', function ($id) {
    //     return Tag::find($id);
    // });

    // Route::post('tags', function (Request $request) {
    //     return Tag::create($request->all());
    // });

    // Route::put('tags/{id}', function (Request $request, $id) {
    //     $Tag = Tag::findOrFail($id);
    //     $Tag->update($request->all());
    //     return $Tag;
    // });

    // Route::delete('tags/{id}', function ($id) {
    //     $Tag = Tag::findOrFail($id);
    //     $Tag->delete();
    //     return 204;
    // });

    // Kullanıcıya dönen dersler 
    Route::get('users/{id}/lessons', 'App\Http\Controllers\API\RelationshipController@userlesson');

    // dersler dönen  tagleri
    Route::get('lessons/{id}/tags', 'App\Http\Controllers\API\RelationshipController@lessontag');

    // tagleri dönen  dersler
    Route::get('tags/{id}/lessons', 'App\Http\Controllers\API\RelationshipController@taglessons');

    //login icin 

    Route::get('/login', 'App\Http\Controllers\API\LoginController@login')->name('login');
});
