<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    //Tutte le colonne abilitate al mass-assignment
    protected $fillable = [
        'title',
        'slug',
        'content',
        'type_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    
}
