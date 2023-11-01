<!-- resources/views/interviews/create.blade.php

@extends('layouts.app') 

@section('content')
    <div class="container">
        <h1>Nueva Entrevista</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('interview.store') }}">
            @csrf
            <div class="form-group">
                <label for="questions">Preguntas:</label>
                <textarea name="questions" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Entrevista</button>
        </form>
    </div>
@endsection -->
