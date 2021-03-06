<?php

namespace App\Http\Livewire\Factory\Question\EssayQuestion;

use App\Http\Livewire\Factory\Question\QuestionComponents;

class Create extends QuestionComponents
{

    public function mount(){
        $this->answers = [
            'min' => 0,
            'max' => 500,
        ];
        if($this->question){
            $this->setValueWithQuestion();
        }

    }

    public function render()
    {
        return view('livewire.factory.question.essay-question.create');
    }
}
