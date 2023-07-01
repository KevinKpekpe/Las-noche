@extends('admin.base')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Ajouter une chambre</h2>
        <form action="{{route($room->exists ? 'admin.room.update': 'admin.room.store',$room)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method($room->id ? "PATCH" : "POST")
            <div class="form-group">
                <label for="Title">Nom:</label>
                <input type="text" class="form-control" name="title" value="{{old('title',$room->title)}}">
                @error('title')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="Title">Slug:</label>
                <input type="text" class="form-control" name="slug" value="{{old('slug',$room->slug)}}">
            </div>
            <div class="form-group ">
                <label for="Title">Content:</label>
                <textarea name="content" class="form-control" id="" cols="30" rows="10">{{old('content',$room->content)}}</textarea>
                @error('content')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="categorie_chambre">Catégorie de chambre :</label>
                <select name="category_id" class="form-control" id="">
                    <option value="">Selection une categorie</option>
                    @foreach ($categories as $category)
                        <option @selected(old('category_id',$room->category_id) == $category->id) value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                @error('category_id')
                    {{$message}}
                @enderror
            </div>
            @php
                $specificitiesId = $room->specificities()->pluck('id');
            @endphp
            <div class="form-group mb-2">
                <label for="tag">specificities</label>
                <select name="specificities[]" class="form-control" id="" multiple>
                    @foreach ($specificities as $specificity)
                        <option @selected($specificitiesId->contains($specificity->id)) value="{{$specificity->id}}" >{{$specificity->title}}</option>
                    @endforeach
                </select>
                @error('specificities')
                    {{$message}}
                @enderror
            </div>
            <div class="form-group">
                <label for="prix_chambre">Prix de chambre :</label>
                <input type="text" class="form-control" name="price" value="{{old('price',$room->price)}}" >
            </div>
            <div class="form-group">
                <label for="prix_chambre">Nombre de Personne :</label>
                <input type="text" class="form-control"name="numberofperson" value="{{old('numberofperson',$room->numberofperson)}}" >
            </div>
            <div class="form-group">
                <label for="image_chambre">Image de chambre :</label>
                <input type="file" class="form-control-file" id="image_chambre" name="iimage" value="{{old('image',$room->image)}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter la chambre</button>
        </form>
    </div>
</div>
@endsection
