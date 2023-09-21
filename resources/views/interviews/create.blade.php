@extends('layouts.app')

@section('content')
    <h1>{{ $viewData['title'] }}</h1>

    <form method="POST" action="{{ route('interviews.store') }}">
        @csrf
        <div class="form-group">
            <label for="dateInterview">Fecha de la Entrevista:</label>
            <input type="date" name="dateInterview" id="dateInterview" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="questions">Preguntas:</label>
            <textarea name="questions" id="questions" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Crear Entrevista</button>
    </form>
@endsection
