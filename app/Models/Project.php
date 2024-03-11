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

    //One To Many
    public function category()
    {
        return $this->belongsTo(Type::class);
    }

    //Many To Many
    public function tags()
    {
        return $this->belongToMany(Technology::class);
    }    
}
