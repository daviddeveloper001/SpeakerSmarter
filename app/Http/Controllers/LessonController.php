<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonStoreRequest;
use App\Http\Requests\LessonUpdateRequest;
use App\Lession;
use App\Models\Lesson;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LessonController extends Controller
{
    public function index(Request $request): Response
    {
        $lessons = Lesson::all();
    }

    public function create(Request $request): Response
    {
        $lession = Lession::find($lession);
    }

    public function edit(Request $request, Lesson $lesson): Response
    {
        $lession = Lession::find($lession);
    }

    public function store(LessonStoreRequest $request): Response
    {
        $lession = Lession::create($request->validated());

        return redirect()->route('lession.index');
    }

    public function show(Request $request, Lesson $lesson): Response
    {
        $lession = Lession::find($lession);
    }

    public function update(LessonUpdateRequest $request, Lesson $lesson): Response
    {
        $lession->save();

        return redirect()->route('lession.index');
    }

    public function destroy(Request $request, Lesson $lesson): Response
    {
        $lession->delete();
    }
}
