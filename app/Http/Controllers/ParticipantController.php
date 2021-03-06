<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Term;
use App\Models\User;

class ParticipantController extends Controller
{

    public function addParticipantToTerm($term_id, $user_id, $role_id)
    {
       
        $participantCount = Participant::where('term_id', $term_id)
            ->where('user_id', $user_id)
            ->where('role_id', $role_id)
            ->count();

        if ($participantCount > 0)
            return redirect(route('term.show', ['term' => $term_id]))
                ->with('danger', 'user is exist');

        Participant::create([
            'term_id' => $term_id,
            'user_id' => $user_id,
            'role_id' => $role_id,
        ]);

        return redirect(route('term.show', ['term' => $term_id]))
            ->with('success', __('successfull added'));
    }


    public function deleteParticipantAsTerm(Term $term, User $user){
        $term->Participants()->detach($user);

        return redirect(route('term.show', ['term' => $term->id]))
            ->with('danger', __('successfull deleted'));
    }
}
