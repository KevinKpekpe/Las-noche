@extends('base')
@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Réservation de chambre</h1>
                <form>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Nom complet</label>
                        <input type="text" class="form-control" id="inputName" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Adresse email</label>
                        <input type="email" class="form-control" id="inputEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">Numéro de téléphone</label>
                        <input type="tel" class="form-control" id="inputPhone" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputCheckIn" class="form-label">Date d'arrivée</label>
                        <input type="date" class="form-control" id="inputCheckIn" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputCheckOut" class="form-label">Date de départ</label>
                        <input type="date" class="form-control" id="inputCheckOut" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputRoomType" class="form-label">Type de chambre</label>
                        <select class="form-select" id="inputRoomType" required>
                            <option value="">Sélectionnez un type de chambre</option>
                            <option value="chambre_luxe">Chambre de Luxe</option>
                            <option value="chambre_standard">Chambre Standard</option>
                            <option value="chambre_familiale">Chambre Familiale</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputMessage" class="form-label">Message (optionnel)</label>
                        <textarea class="form-control" id="inputMessage" rows="3"></textarea>
                    </div>
                    <div id="card-element"></div>
                    <button type="submit" class="btn btn-primary">Réserver</button>
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