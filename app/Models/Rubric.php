<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    use HasFactory;

    public $color = 'info';
    public $faIcon = 'fa fa-ruler';
    public $route = 'rubricLearner';
    
    protected $guarded = [];
}
