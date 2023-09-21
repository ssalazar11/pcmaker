@extends('layouts.app')

@section('content')
    <h1>{{ $viewData['title'] }}</h1>
    <p>{{ $viewData['subtitle'] }}</p>

    <ul>
        @foreach($viewData['interviews'] as $interview)
            <li>
                <a href="{{ route('interviews.show', ['interview' => $interview]) }}">
                    Entrevista ID: {{ $interview->id }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
