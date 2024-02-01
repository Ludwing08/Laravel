<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;

class NoteForm extends Component
{
    public  $value = 1.0;
    public $content = '';
    public $feedback="";

    protected $rules =[
        "value" => "required|numeric|between:1,10|regex:/^\d+(\.\d{1,2})?$/",
        "content" => "required|min:5|max:250"
    ];

    protected $messages = [
        'content.required' => 'Este campo es obligatorio',
        'content.min' => 'El campo :attribute debe tener al menos :min caracteres',
        'value.numeric' => 'El campo :attribute debe ser un número',
        'value.between' => 'El campo :attribute debe tener un valor entre :min y :max',  
        'value.regex' => 'Máximo dos décimales',      
    ];

    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $notes = Note::all();
        $sum = Note::all()->sum('value');
        $sum = number_format($sum, 2);
        return view('livewire.note-form', compact('notes', 'sum'));
    }

    public function store()
    {
        $validatedData = $this->validate();

        Note::create($validatedData);
        $this->feedback = "Note registrada";
    }

    public function destroy($note)
    {
        Note::find($note)->delete();
        $this->feedback = "Note deleted";

    }

    public function show($note)
    {
        $note = Note::find($note);
        $this->value = $note->value;
        $this->content = $note->content;
    }

    public function edit($note)
    {
        $note = Note::find($note);
        $note->value = $this->value;
        $note->content = $this->content;
        $note->update();
        $this->feedback = "Note update";
    }

    public function clear()
    {
        $this->value =1;
        $this->content="";
    }

}
