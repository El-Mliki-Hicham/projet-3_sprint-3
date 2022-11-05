<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assigner extends Model
{
    use HasFactory;


    public $table= "briefs_student";
    public $timestamps= false;
}
