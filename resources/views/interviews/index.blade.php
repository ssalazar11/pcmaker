resources/views/interviews/index.blade.php

@extends('layouts.app') 

@section('content')
    <div class="container">
        <h1>Lista de Entrevistas</h1>

        @foreach($viewData["interviews"] as $interview)
            <div>
                <p>Preguntas: {{ $interview->getQuestions() }}</p>
                <p>Usuario: {{ $interview->user->name }}</p>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
