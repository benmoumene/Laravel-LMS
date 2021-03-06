<?php

namespace App\Http\Livewire\Factory\Question\TestQuestion;

use App\Http\Livewire\Factory\Question\QuestionComponents;

class Create extends QuestionComponents
{

    public function mount(){
        $this->answers = ['' , '' , '' , ''];
        if($this->question){
            $this->setValueWithQuestion();
        }

    }

    public function render()
    {
        return view('livewire.factory.question.test-question.create');
    }
}
