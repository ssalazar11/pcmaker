<?php

namespace App\Services;

use App\Contracts\PDFGeneratorInterface;
use PDF;

class DomPDFGenerator implements PDFGeneratorInterface{
    public function loadView($view, $data=[], $mergeData=[]){
        return PDF::loadView($view, $data, $mergeData);
    }

    public function download($filename){
        return $this->loadView()->download($filename);
    }
}