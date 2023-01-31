@extends('layouts.admin')

@section('content')
    <h1>Lista Posts</h1>

    @if(session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
    @endif
    <div class="my-4">
      <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Crea un nuovo Post</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Descrizione Progetto</th>
            <th scope="col">Slug</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
          <tr>
            <th scope="row"></th>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->slug}}</td>
            <td>
              <div class="d-flex align-items-center">
                <a href="{{route('admin.posts.show', $post)}}" class="btn btn-primary my-1 d-inline-block mx-1 main-post-button"><i class="fa-solid fa-eye"></i></a>
                <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-warning my-1 d-inline-block mx-1 main-post-button"><i class="fa-solid fa-pen"></i></a>
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger d-inline-block mx-1 main-post-button" data-bs-toggle="modal" data-bs-target="#modal-{{$post->id}}">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Modal -->
          <div class="modal fade" id="modal-{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Sei sicuro di voler eliminare il post "{{$post->title}}"
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                  <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Si</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </tbody>
      </table>
    
@endsection