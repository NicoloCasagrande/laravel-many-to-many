@extends('layouts.admin')

@section('content')
    <h1>{{$tag->name}}</h1>
    {{-- Con il punto interrogativo prima del nome della proprietà si intende 'se esiste stampa se no non farlo' --}}
    <h3>{{$tag->slug}}</h3>
    <ul>
        @foreach ( $tag->posts as $post )
            <li><a href="{{route('admin.posts.show', $post)}}">{{$post->title}}</a></li>
        @endforeach
    </ul>
    <div>
        <a href="{{route('admin.tags.edit', $tag)}}" class="btn btn-warning my-1 d-inline-block">Modifica</a>
        <form action="{{route('admin.tags.destroy', $tag)}}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
    </div>
    <a href="{{route('admin.tags.index')}}" class="btn btn-primary my-1">Torna alla Lista</a>
@endsection