@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["specification"] as $specification)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="https://hiraoka.com.pe/media/mageplaza/blog/post/t/a/tarjeta_grafica-que_es_y_como_funciona.jpg" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('specification.show', ['id'=> $specification["id"]]) }}"
          class="btn bg-primary text-white">{{ $specification["id"] }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
