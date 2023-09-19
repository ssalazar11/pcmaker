@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Crear Computador Escritorio</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('deskComputer.save') }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter cpu" name="cpu" value="{{ old('cpu') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter ram" name="ram" value="{{ old('ram') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter HDD" name="HDD" value="{{ old('HDD') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter graphicCard" name="graphicCard" value="{{ old('graphicCard') }}" />
              <input type="submit" class="btn btn-primary" value="Send" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection