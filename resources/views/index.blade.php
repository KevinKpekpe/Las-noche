@extends('base')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<section class="jumbotron text-center">
    <div class="container">
        <h1>Spectre Hôtel</h1>
        <p>Bienvenue dans notre hôtel de luxe</p>
        <a href="#" class="btn btn-dark">Réservez maintenant</a>
    </div>
</section>
<main>
<section id="services" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Nos services</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://images.pexels.com/photos/261101/pexels-photo-261101.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="Piscine">
                    <div class="card-body">
                        <h3 class="card-title">Piscine</h3>
                        <p class="card-text">Profitez de notre piscine extérieure pour vous rafraîchir lors des
                            journées ensoleillées.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://media.istockphoto.com/id/875640820/fr/photo/homme-et-femme-couch%C3%A9e-sur-massage-lits-au-centre-de-bien-%C3%AAtre-asiatique.jpg?b=1&s=612x612&w=0&k=20&c=rKuec0mI_zog_MpEli5JKJSce4j7I1tg1sBlOYuDvW4=" class="card-img-top" alt="Spa">
                    <div class="card-body">
                        <h3 class="card-title">Spa</h3>
                        <p class="card-text">Détendez-vous et profitez d'un moment de bien-être dans notre spa.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://images.pexels.com/photos/67468/pexels-photo-67468.jpeg?auto=compress&cs=tinysrgb&w=600" class="card-img-top" alt="Restaurant">
                    <div class="card-body">
                        <h3 class="card-title">Restaurant</h3>
                        <p class="card-text">Dégustez notre cuisine raffinée dans notre restaurant
                            gastronomique.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://media.istockphoto.com/id/903405254/fr/photo/petit-centre-de-gym-au-complexe-h%C3%B4telier.jpg?b=1&s=612x612&w=0&k=20&c=UCLqzZDbdiNIDVHpznIbFA7jZpAnOYkneFXmxTEJX4M=" class="card-img-top" alt="Salle de sport">
                    <div class="card-body">
                        <h3 class="card-title">Salle de sport</h3>
                        <p class="card-text">Restez en forme pendant votre séjour dans notre salle de sport bien
                            équipée.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://images.pexels.com/photos/6474521/pexels-photo-6474521.jpeg?auto=compress&cs=tinysrgb&w=600" class="card-img-top" alt="Conciergerie">
                    <div class="card-body">
                        <h3 class="card-title">Conciergerie</h3>
                        <p class="card-text">Notre équipe de conciergerie est à votre dispositionpour répondre à
                            tous vos besoins et demandes spéciales.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="rooms">
    <div class="container">
        <h2>Nos chambres</h2>
        <div class="row">
            @foreach ($rooms as $room)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('images/'.$room->image)}}" class="card-img-top" alt="Chambre de Luxe">
                    <div class="card-body">
                        <h3 class="card-title">{{$room->title}}</h3>
                        <p class="card-text">A partir de {{$room->price}}€/nuit</p>
                        <a href="{{route('show',['slug'=> $room->slug,'room'=> $room->id])}}" class="btn btn-primary">voir</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="about m-5">
    <div class="container">
        <h2 class="text-center">À propos de nous</h2>
        <div class="row">
            <div class="col-md-6">
                <img src="https://images.pexels.com/photos/2844474/pexels-photo-2844474.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Photo de l'hôtel" class="img-fluid">
            </div>
            <div class="col-md-6">
                <p>Bienvenue au Spectre Hôtel, le plus luxueux hôtel de la région. Nous sommes fiers de vous
                    offrir une expérience de séjour inoubliable dans un cadre magnifique, avec des chambres
                    somptueuses, des services exceptionnels et une cuisine gastronomique de classe mondiale.</p>
                <p>Notre hôtel est idéalement situé au cœur de la ville, à proximité des principales attractions
                    touristiques et des centres d'affaires.</p>
                <p>Nous sommes impatients de vous accueillir et de vous offrir un séjour de rêve au Spectre
                    Hôtel.</p>
            </div>
        </div>
    </div>
</section>
@endsection
