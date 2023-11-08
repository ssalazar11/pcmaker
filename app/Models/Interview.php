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
     * $this->attributes['user_id'] - int - contains the user primary key (id)
     * $this->attributes['questions'] - string - contains the interview questions
     * $this->user - User - contains the associated User
     */
    protected $fillable = [
        'questions',
        'user_id',
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

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $uId): void
    {
        $this->attributes['user_id'] = $uId;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }
}
