@extends('layouts.app')

@section('content')
    <h1>{{ $viewData['title'] }}</h1>
    <p>{{ $viewData['subtitle'] }}</p>

    <div>
        <strong>ID de la Entrevista:</strong> {{ $viewData['interview']->id }}
    </div>

    <div>
        <strong>Fecha de la Entrevista:</strong> {{ $viewData['interview']->dateInterview }}
    </div>

    <div>
        <strong>Preguntas:</strong> {{ $viewData['interview']->questions }}
    </div>

    <div>
        <strong>Usuario Asociado:</strong> {{ $viewData['user']->name }}
    </div>
@endsection
