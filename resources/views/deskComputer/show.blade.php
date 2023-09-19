@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://www.popsci.com/uploads/2019/01/07/3NMKQYZQFLZ75SDQVEI7LAV3UY.jpg?auto=webp" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["deskComputer"]["name"] }}
        </h5>
        <p class="card-text">{{ $viewData["deskComputer"]["cpu"] }}</p>
        <p class="card-text">{{ $viewData["deskComputer"]["ram"] }}</p>
        <p class="card-text">{{ $viewData["deskComputer"]["HDD"] }}</p>
        <p class="card-text">{{ $viewData["deskComputer"]["graphicCard"] }}</p>
      </div>
    </div>
  </div>
</div>
@endsection
