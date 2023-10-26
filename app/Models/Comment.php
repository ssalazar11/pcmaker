<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

     /**
     * COMMENT ATTRIBUTES
     * $this->attributes['id'] - int - contains the comment primary key (id)
     * $this->attributes['text'] - string - contains the comment text
    */


    protected $fillable = [
        'text',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getText(): string
    {
        return $this->attributes['text'];
    }

    public function setText($text): void
    {
        $this->attributes['text'] =  $text;
    }

}
