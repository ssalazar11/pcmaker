<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\deskComputer;


class deskComputerController extends Controller
{

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Computadores de escritorio - Tienda";
        $viewData["subtitle"] =  "Lista de Computadores de escritorio";
        $viewData["deskComputer"] = deskComputer::all();
        return view('deskComputer.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View
    {
        $viewData = [];
        $deskComputer = deskComputer::findOrFail($id);
        $viewData["title"] = $deskComputer["name"]." - Tienda en linea";
        $viewData["subtitle"] =  $deskComputer["name"]." - Informacion";
        $viewData["deskComputer"] = $deskComputer;
        return view('deskComputer.show')->with("viewData", $viewData);
    }
    
    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Crear Computador solo admin";

        return view('deskComputer.create')->with("viewData",$viewData);
    }

    public function save(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            "name"=> "required",
            "cpu" => "required",
            "ram" => "required",
            "HDD" => "required",
            "graphicCard" => "required"
        ]);

        deskComputer::create($request->only(["name","cpu", "ram", "HDD", "graphicCard"]));

        return back();
    }
}
