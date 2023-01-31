@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Dashboard</h1>
            <div>
                <h3>Numero di post: {{count($posts)}}</h3>
                @if(count($posts) !== 0)
                    <ul>
                        @foreach($posts as $post)
                            <li><a href="{{route('admin.posts.show', $post)}}">{{$post->title}}</a></li>
                        @endforeach
                    </ul>
                @endif
                <h3>Numero di categorie: {{count($categories)}}</h3>
                @if(count($categories) !== 0)
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{route('admin.categories.show', $category)}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                @endif
                <h3>Numero di tag: {{count($tags)}}</h3>
                @if(count($tags) !== 0)
                    <ul>
                        @foreach($tags as $tag)
                            <li><a href="{{route('admin.tags.show', $tag)}}">{{$tag->name}}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
