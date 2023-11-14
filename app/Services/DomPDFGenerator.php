<?php

// Ubicación: app/Services/DomPDFGenerator.php

namespace App\Services;

use App\Contracts\PDFGeneratorInterface;
use PDF; // Asegúrate de importar la fachada correcta

class DomPDFGenerator implements PDFGeneratorInterface {
    private $view;
    private $data;
    private $mergeData;

    public function loadView($view, $data = [], $mergeData = []) {
        $this->view = $view;
        $this->data = $data;
        $this->mergeData = $mergeData;

        return PDF::loadView($view, $data, $mergeData);
    }

    public function download($filename) {
        return PDF::loadView($this->view, $this->data, $this->mergeData)->download($filename);
    }
}

