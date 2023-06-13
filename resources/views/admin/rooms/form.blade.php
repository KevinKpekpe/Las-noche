@extends('admin.base')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Ajouter une chambre</h2>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="Title">Nom:</label>
                <input type="text" class="form-control" id="numero_chambre" name="numero_chambre" required>
            </div>
            <div class="form-group">
                <label for="Title">Slug:</label>
                <input type="text" class="form-control" id="numero_chambre" name="numero_chambre" required>
            </div>
            <div class="form-group">
                <label for="categorie_chambre">Catégorie de chambre :</label>
                <select class="form-control" id="categorie_chambre" name="categorie_chambre" required>
                    <option value="">-- Sélectionner une catégorie --</option>
                    <option value="simple">Simple</option>
                    <option value="double">Double</option>
                    <option value="luxury">Luxury</option>
                </select>
            </div>
            <div class="form-group">
                <label for="specifications_chambre">Spécifications de chambre :</label>
                <textarea class="form-control" id="specifications_chambre" name="specifications_chambre" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="prix_chambre">Prix de chambre :</label>
                <input type="text" class="form-control"id="prix_chambre" name="prix_chambre" required>
            </div>
            <div class="form-group">
                <label for="image_chambre">Image de chambre :</label>
                <input type="file" class="form-control-file" id="image_chambre" name="image_chambre" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter la chambre</button>
        </form>
    </div>
</div>
@endsection