@extends('base')
@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('images/'.$room->image)}}" class="img-fluid" alt="Chambre de Luxe">
            </div>
            <div class="col-md-6">
                <h1>{{$room->title}}</h1>
                <p class="lead">A partir de {{$room->price}}€/nuit</p>
                <p class="badge bg-dark">{{$room->category->title}}</p>
                <p> 
                    {{$room->content}}
                </p>
                <h4>specificities:</h4>
                <ul>
                    @foreach ($room->specificities as $specificity)
                        <li> {{$specificity->title}}</li>
                    @endforeach
                </ul>
                <hr>
                <a href="{{route('reservation',['slug'=> $room->slug,'room'=> $room->id])}}" class="btn btn-primary">Réserver</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h2>Chambres similaires</h2>
            </div>
        @foreach ($rooms as $item)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('images/'.$item->image)}}" class="card-img-top" alt="Chambre de Luxe">
                    <div class="card-body">
                        <h3 class="card-title">{{$item->title}}</h3>
                        <p class="card-text">A partir de {{$item->price}}€/nuit</p>
                        <a href="{{route('show',['slug'=> $item->slug,'room'=> $item->id])}}" class="btn btn-primary">voir</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    
</main>
@endsection