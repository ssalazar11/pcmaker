<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Interview;
use App\Models\User;

class InterviewController extends Controller
{
    public function index()
    {
        // Obtén el usuario autenticado actual
        $currentUser = Auth::user();

        // Filtra las entrevistas asociadas al usuario actual
        $interviews = $currentUser->interviews()->get();

        $viewData = [
            'title' => 'List of Interviews',
            'subtitle' => 'Your Interviews', // Puedes personalizar el subtítulo
            'interviews' => $interviews,
        ];

        return view('interviews.index')->with("viewData", $viewData);
    }

    public function create()
    {
        $viewData = [];
        $viewData["title"] = "Create Interview";
        $viewData["users"] = User::all();

        return view('interviews.create')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
    // Valida los datos del formulario
    $request->validate([
        'dateInterview' => 'required|date',
        'questions' => 'required',
    ]);

    // Crea una nueva instancia de Interview
    $interview = new Interview();
    
    // Establece el usuario asociado a la entrevista como el usuario autenticado actual
    $interview->idUser = Auth::id(); // Utilizamos Auth::id() para obtener el ID del usuario autenticado
    
    $interview->dateInterview = $request->input('dateInterview');
    $interview->questions = $request->input('questions');

    // Guarda la entrevista en la base de datos
    $interview->save();

    // Redirecciona a la vista de detalles de la entrevista
    return redirect()->route('interviews.show', ['interview' => $interview]);
    }

    public function show(Interview $interview)
    {
        // Obtener el usuario actualmente autenticado
        $currentUser = Auth::user();

        // Comprobar si el usuario actual es el propietario de la entrevista
        if ($currentUser && $currentUser->id === $interview->idUser) {
            // Si el usuario actual es el propietario, mostrar los detalles de la entrevista
            $viewData = [
                'title' => 'Details of the Interview',
                'subtitle' => 'Interview ID: ' . $interview->id,
                'interview' => $interview,
                'user' => $currentUser, // Puedes utilizar $currentUser para mostrar detalles del usuario si es necesario
            ];
            
            return view('interviews.show')->with("viewData", $viewData);
        } else {
            // Si el usuario actual no es el propietario, redirigir o mostrar un mensaje de error
            return redirect()->route('home.index')->with('error', 'No tienes permiso para ver esta entrevista.');
        }
    }
}
