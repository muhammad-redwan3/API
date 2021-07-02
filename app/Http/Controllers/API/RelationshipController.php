<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\lesson;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;

class RelationshipController extends Controller
{

    public function userlesson($id)
    {
        $user = User::find($id)->lessons;

        $fileds = array();
        $filtered = array();
        foreach ($user as $lesson) {
            $fileds['Title'] = $lesson->titel;
            $fileds['content'] = $lesson->body;
            $filtered[] = $fileds;
        }
        return Response::json([
            'data' => $filtered
        ], 200);
    }

    public function lessontag($id)
    {
        $lesson = lesson::find($id)->tags;

        $fileds = array();
        $filtered = array();
        foreach ($lesson as $tag) {
            $fileds['Tag'] = $tag->name;
            $filtered[] = $fileds;
        }
        return Response::json([
            'data' => $filtered
        ], 200);
    }

    public function taglessons($id)
    {
        // $tag = Tag::with('lessons')->findOrFail($id);
        $tag = Tag::findOrFail($id)->lessons;

        $fileds = array();
        $filtered = array();
        foreach ($tag as $lesson) {
            $fileds['Title'] = $lesson->titel;
            $fileds['content'] = $lesson->body;
            $filtered[] = $fileds;
        }
        return Response::json([
            'data' => $filtered
        ], 200);
    }
}
