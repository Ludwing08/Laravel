<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NoteController extends Controller
{
    //
    public function index(): View
    {
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }

    public function create(): View
    {        
        return view('note.create');
    }

    public function store(NoteRequest $request) : RedirectResponse
    {
        Note::create([
            'title' => $request->input('input-title'),
            'description' => $request->input('input-description')
        ]);

        // Note::create($request->all()); 

        return redirect()->route('note.index')->with('success','Note create');
    }

    public function edit(Note $note): View
    {
        //$note = Note::find($id);

        return view('note.edit', compact('note'));
    }

    public function update(NoteRequest $request, Note $note): RedirectResponse
    {
        //$note->update($request->all());

        $note->update([
            'title' => $request->input('input-title'),
            'description' => $request->input('input-description')
        ]);

        return redirect()->route('note.index')->with('success', 'Note update');
    }

    public function show(Note $note): View
    {
        return view('note.show', compact('note'));
    }

    public function delete(Note $note): RedirectResponse
    {
        $note->delete();
        return redirect()->route('note.index')->with('danger', 'Note delete');        
    }

}

