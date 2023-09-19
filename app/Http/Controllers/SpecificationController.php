<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Specification;

class SpecificationController extends Controller
{



    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Especificaciones - Tienda en linea";
        $viewData["subtitle"] =  "Lista de especificaciones";
        $viewData["specification"] = Specification::all();
        return view('specification.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View
    {
        $viewData = [];
        $specification = Specification::findOrFail($id);
        $viewData["title"] = $specification["id"]." - Tienda en linea";
        $viewData["subtitle"] =  $specification["id"]." - Informacion de las especificaciones";
        $viewData["specification"] = $specification;
        return view('specification.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Crear especificacion";

        return view('specification.create')->with("viewData",$viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            "cpu" => "required",
            "ram" => "required",
            "HDD" => "required",
            "graphicCard" => "required"
        ]);
        Specification::create($request->only(["cpu","ram", "HDD", "graphicCard"]));

        return back();

    }

}
