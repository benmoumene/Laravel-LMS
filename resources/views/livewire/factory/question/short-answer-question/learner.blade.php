<div class="col-12 text-left mt-4 p-4">

    <div class="card shadow p-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $question->title }}</h6>
        </div>
        <div class="card-body">
            
            <p>
                {{ $question->question_body }}
            </p>


            @forelse($answer->answers as $index => $answer)
                <div class=" p-2">
                    <input type="text" class="form-control" id="answer-{{ $question->id }}">                
                </div>
            @empty 
            @endforelse
        </div>
   
    </div>

</div>