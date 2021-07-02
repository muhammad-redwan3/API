<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\lesson;
use Illuminate\Http\Request;
use App\http\Resources\Lesson as LessonResource;


class LessonController extends Controller
{

    /**
     * a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.basic.once')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = LessonResource::collection(lesson::all());
        return $user->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new LessonResource(lesson::create($request->all()));
        return $user->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = new LessonResource(lesson::find($id));
        return $lesson->response()->setStatusCode(200, "Lesson Returned Succefully")
            ->header('Additional Header', 'True');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lesson = new LessonResource(lesson::findOrFail($id));
        $lesson->update($request->all());
        return $lesson->response()->setStatusCode(200, "Lesson UpDated Succefully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        lesson::findOrFail($id)->delete();
        return 204;
    }
}
