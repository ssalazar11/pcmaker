@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
    <header class="masthead" style="background-image: url('{{ asset('/img/pc-gamer.webp') }}');">
        <div class="container">
            <div class="intro-text" style="padding-top: 119px; padding-bottom: 31px;">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('/storage/'.$viewData["product"]->getImage()) }}" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $viewData["product"]->getName() }} (${{ $viewData["product"]->getPrice() }})
                                </h5>
                                <p class="card-text">{{ $viewData["product"]->getDescription() }}</p>
                                <p class="card-text">
                                    <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">
                                        <div class="row">
                                            @csrf
                                            <div class="col-auto">
                                                <div class="input-group col-auto">
                                                    <div class="input-group-text">Quantity</div>
                                                    <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="btn bg-primary text-white" type="submit">Add to cart</button>
                                            </div>
                                            <div class="col-auto">
                                                <a href="{{ route('product.index') }}" class="btn btn-secondary">Go Back</a>
                                            </div>
                                        </div>
                                    </form>
                                </p> 
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sección de comentarios --}}
                <div class="container mt-4">
                    <h3>Comentarios</h3>
                    @forelse ($viewData["product"]->getComments() as $comment)
                        <div class="card mb-2">
                            <div class="card-body">
                                <p>{{ $comment->getText() }}</p>
                                <small>Comentado por {{ $comment->user->getName() }} en {{ $comment->created_at->format('d/m/Y') }}</small>

                            </div>
                        </div>
                    @empty
                        <p>No hay comentarios para este producto.</p>
                    @endforelse
                </div>

                {{-- Formulario para agregar comentarios --}}
                <div class="container mt-4">
                    <h3>Agregar un comentario</h3>
                    <form method="POST" action="{{ route('comment.store') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $viewData['product']->getId() }}">
                        <textarea name="text" class="form-control" placeholder="Escribe un comentario..." required></textarea>
                        <button type="submit" class="btn btn-primary mt-2">Enviar Comentario</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
@endsection
