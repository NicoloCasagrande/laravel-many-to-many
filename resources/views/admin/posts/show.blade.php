@extends('layouts.admin')

@section('content')
    <h1>{{$post->title}}</h1>
    {{-- Con il punto interrogativo prima del nome della proprietà si intende 'se esiste stampa se no non farlo' --}}
    <a href="{{route('admin.categories.show', $post->category)}}"><h3>{{$post->category?->name ?: 'Nessuna Categoria'}}</h3></a>
    <p>{{$post->content}}</p>
    <div class="mt-3">
        <div>
            @if($post->cover_image)
                <img class="w-25" src="{{asset("storage/$post->cover_image")}}" alt="">
            @endif
        </div>
    </div>
    @if($post->tags)
        <div class="mb-3">
            @foreach($post->tags as $tag)
            <a href="{{route('admin.tags.show', $tag)}}"><span class="badge text-bg-success">{{$tag->name}}</span></a>
            @endforeach
        </div>
    @endif
    
    <div>
        <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-warning my-1 d-inline-block">Modifica</a>
        <form action="{{route('admin.posts.destroy', $post)}}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
    </div>
    <a href="{{route('admin.posts.index')}}" class="btn btn-primary my-1">Torna alla Lista</a>
@endsection