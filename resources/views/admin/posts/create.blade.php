@extends('layouts.admin')

@section('content')
    <h1>Crea Post</h1>
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul class="list-unstyled">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
      <div>
        <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo" value="{{old('title')}}">
              </div>
              <div class="mb-3">
                <label for="content" class="form-label">Descrizione</label>
                <textarea class="form-control" id="content" name="content" rows="3" placeholder="Inserisci la descrizione del progetto">{{old('content')}}</textarea>
              </div>
              <div class="mb-3">
                <label for="cover_image" class="form-label">Immagine</label>
                <div class="mb-2">
                  <script>
                    var loadFile = function(event) {
                      var output = document.getElementById('output');
                      output.src = URL.createObjectURL(event.target.files[0]);
                      output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                      }
                    };
                  </script>
                  </div>
                  <img width="100" id="output">
                  <input type="file" class="form-control" id="cover_image" name="cover_image" value="{{old('cover_image')}}" onchange="loadFile(event)">          
                </div>
                <div class="mb-3">
                  <label for="category_id" class="form-label">Categoria</label>
                  <select class="form-select" name="category_id" id="category_id">
                    <option value="">Senza Categoria</option>
                    @foreach ($categories as $category)
                      <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  @foreach($tags as $tag)
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}"{{in_array($tag->id, old('tags', [])) ? 'checked' : ""}}>
                      <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                    </div>
                  @endforeach
                </div>
              <button type="submit" class="btn btn-success">Conferma</button>
          </form>
      </div>
    <a href="{{route('admin.posts.index')}}" class="btn btn-primary my-4">Torna alla Lista</a>
    @extends('errors')
@endsection