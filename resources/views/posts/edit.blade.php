@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row justify-content-center my-3">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <p class="my-0">{{ __($post->user->pseudo) }}</p>
                        </div>
                        <div class="card-body">
                            <form action="{{route('post.update', $post->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3">
                                    <label for="content" class="form-label">Revendication</label>
                                    <textarea class="form-control" id="content" name="content" rows="5">{{$post->content}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="tags" class="form-label">Motifs de la revendication</label>
                                    <input type="text" class="form-control" id="tags" name="tags" value="{{$post->tags}}">
                                </div>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
