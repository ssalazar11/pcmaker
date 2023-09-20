<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUser',
        'dateInterview',
        'questions',
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getIdUser()
    {
        return $this->attributes['idUser'];
    }

    public function setIdUser($idUser)
    {
        $this->attributes['idUser'] = $idUser;
    }

    public function getDateInterview()
    {
        return $this->attributes['dateInterview'];
    }

    public function setDateInterview($dateInterview)
    {
        $this->attributes['dateInterview'] = $dateInterview;
    }

    public function getQuestions()
    {
        return $this->attributes['questions'];
    }

    public function setQuestions($questions)
    {
        $this->attributes['questions'] = $questions;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

}
