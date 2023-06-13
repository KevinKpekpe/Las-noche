@extends('admin.base')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Liste des chambres</h2>
        <a href="{{route('admin.room.form')}}" class="btn btn-success">Créer une nouvelle chambre</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                <tr>
                    <td><img src="{{asset('images/'.$room->image)}}" class="img-fluid" style="width: 100px"></td>
                    <td>{{$room->title}}</td>
                    <td>{{$room->category->title}}</td>
                    <td>{{$room->price}}€/nuit</td>
                    <td>
                      <a href="{{route('admin.room.show',['slug'=> $room->slug,'room'=> $room->id])}}" class="btn btn-primary">Modifier</a>
                      <a href="#" class="btn btn-danger">supprimer</a>
                    </td>
                </tr>
                @endforeach
                <!-- Ajouter d'autres chambres ici -->
            </tbody>
        </table>
        {{$rooms->links()}}
    </div>
</div>
@endsection