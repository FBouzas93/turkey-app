<?php

namespace App\Http\Controllers;

use App\Models\Turkey;
use App\Models\Ability;
use Illuminate\Http\Request;
use App\Http\Requests\TurkeyRequest;

class TurkeyController extends Controller {

    public function index() {
        $turkeys = Turkey::with('ability')->get();

        return view('turkeys.index', compact('turkeys'));
    }

    public function create()
    {
        $abilities = Ability::all();
        
        return view('turkeys.create', compact('abilities'));
    }

    public function store(TurkeyRequest $request) {
        Turkey::create($request->validated);

        return redirect()->route('turkeys.index');
    }

    public function edit($id)
    {
        $turkey = Turkey::findOrFail($id);

        $abilities = Ability::all();

        return view('turkeys.edit', compact('turkey', 'abilities'));
    }

    public function update(TurkeyRequest $request, $id)
    {
        $turkey = Turkey::findOrFail($id);

        $turkey->update($request->validated());

        return redirect()->route('turkeys.index');
    }

    public function destroy($id)
    {
        $turkey = Turkey::findOrFail($id);

        $turkey->delete();
        
        return redirect()->route('turkeys.index');
    }
}