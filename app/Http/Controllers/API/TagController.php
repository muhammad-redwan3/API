<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\tag;
use Illuminate\Http\Request;
use App\http\Resources\Tag as TagResource;


class TagController extends Controller
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
        $user = TagResource::collection(Tag::all());
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
        $Tag = new TagResource(Tag::create($request->all()));
        return $Tag->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Tag = new TagResource(Tag::find($id));
        return $Tag->response()->setStatusCode(200, "Lesson Returned Succefully")
            ->header('Additional Header', 'True');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Tag = new TagResource(Tag::findOrFail($id));
        $Tag->update($request->all());
        return $Tag->response()->setStatusCode(200, "Lesson UpDated Succefully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Tag = Tag::findOrFail($id);
        $Tag->delete();
        return 204;
    }
}
