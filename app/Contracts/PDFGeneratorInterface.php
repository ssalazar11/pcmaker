<?php

namespace App\Contracts;

interface PDFGeneratorInterface{
    public function loadView($view, $data=[], $mergeData=[]);
    public function download($filename);
}