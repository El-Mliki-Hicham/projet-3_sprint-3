<?php

namespace App\Models;
use App\Models\Briefs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable=[
     'Name_promotion'
    ];

    public $timestamps=false;

    public function Briefs(){
        return $this->belongsToMany(Briefs::class);
    }
}
