<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelStoreRequest;
use App\Http\Requests\LevelUpdateRequest;
use App\Models\Level;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LevelController extends Controller
{
    public function index(Request $request): Response
    {
        $levels = Level::all();
    }

    public function create(Request $request): Response
    {
        $level = Level::find($level);
    }

    public function edit(Request $request, Level $level): Response
    {
        $level = Level::find($level);
    }

    public function store(LevelStoreRequest $request): Response
    {
        $level = Level::create($request->validated());

        return redirect()->route('level.index');
    }

    public function show(Request $request, Level $level): Response
    {
        $level = Level::find($level);
    }

    public function update(LevelUpdateRequest $request, Level $level): Response
    {
        $level->save();

        return redirect()->route('level.index');
    }

    public function destroy(Request $request, Level $level): Response
    {
        $level->delete();
    }
}
