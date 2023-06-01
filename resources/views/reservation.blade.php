@extends('base')
@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Réservation de chambre</h1>
                <form action="{{route('validatereservation')}}" id="form" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputCheckIn" class="form-label">Date d'arrivée</label>
                        <input type="date" class="form-control" id="inputCheckIn" name="arrivaltime">
                    </div>
                    <div class="mb-3">
                        <label for="inputCheckOut" class="form-label">Date de départ</label>
                        <input type="date" class="form-control" id="inputCheckOut" name="departuretime">
                    </div>
                    <input type="hidden" name="room_id" value="{{$room->id}}">
                    <input type="hidden" name="price" value="{{$room->price}}">
                    <input type="hidden" name="payment_method" id="payment_method">
                    <div id="card-element"></div>
                    <button type="submit" id="submit-button" class="btn btn-primary">Réserver</button>
                </form>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('images/'.$room->image)}}" class="card-img-top" alt="Chambre de Luxe">
                    <div class="card-body">
                        <h3 class="card-title">{{$room->title}}</h3>
                        <p class="card-text">A partir de {{$room->price}}€/nuit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://js.stripe.com/v3/"></script>
        <script>
            const stripe = Stripe(" {{ env('STRIPE_KEY') }} ");
    
            const elements = stripe.elements();
            const cardElement = elements.create('card', {
                classes: {
                    base: 'StripeElement bg-white w-1/2 p-2 my-2 rounded-lg'
                }
            });
    
            cardElement.mount('#card-element');
    
            const cardButton = document.getElementById('submit-button');
            cardButton.addEventListener('click', async(e) => {
                e.preventDefault();
    
                const { paymentMethod, error } = await stripe.createPaymentMethod(
                    'card', cardElement
                );
    
                if (error) {
                    alert(error)
                } else {
                    document.getElementById('payment_method').value = paymentMethod.id;
                }
    
                document.getElementById('form').submit();
            });
        </script>
@endsection