<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['cpu'] - string - contains a cpu product
     * $this->attributes['ram'] - string - contains a ram product
    */

    protected $fillable = ['id', 'name', 'cpu','ram', 'HDD', 'graphicCard'];


    
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id) : void
    {
        $this->attributes['id'] = $id;
    }


    public function getCpu(): string
    {
        return $this->attributes['cpu'];
    }

    public function setCpu($cpu) : void
    {
        $this->attributes['cpu'] = $cpu;
    }



    public function getRam(): string
    {
        return $this->attributes['ram'];
    }

    public function setRam($ram) : void
    {
        $this->attributes['ram'] = $ram;
    }




    public function getHDD(): string 
    {
        return $this -> attributes ['HDD'];
    } 

    public function setHDD($HDD) : void
    {
        $this->attributes['HDD'] = $HDD;
    }

    


    public function getGrapicCard(): string 
    {
        return $this -> attributes ['graphicCard'];
    } 

    public function setGraphicCard($graphicCard) : void
    {
        $this->attributes['graphicCard'] = $graphicCard;
    }


}