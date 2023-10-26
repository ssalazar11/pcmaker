<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

     /**
     * INTERVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the interview primary key (id)
     * $this->attributes['questions'] - string - contains the interview questions
    */
    
    protected $fillable = [
        'questions',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getQuestions(): string
    {
        return $this->attributes['questions'];
    }

    public function setQuestions($questions): void
    {
        $this->attributes['questions'] = $questions;
    }

}
