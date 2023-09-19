@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["deskComputer"] as $deskComputer)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="https://www.popsci.com/uploads/2019/01/07/3NMKQYZQFLZ75SDQVEI7LAV3UY.jpg?auto=webp" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('deskComputer.show', ['id'=> $deskComputer["id"]]) }}"
          class="btn bg-primary text-white">{{ $deskComputer["name"] }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
