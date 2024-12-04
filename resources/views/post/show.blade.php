@extends('layouts.app')

@section('content')
    <div class="container">
        {{--    AFFICHAGE DU TOUIT --}}
        <div class="row justify-content-center my-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <p class="my-0">{{ $post->user->pseudo }}</p>
                    </div>
                    <div class="card-body">
                        <p class="my-0">{{$post->content}}</p>
                        <div class="my-3 d-flex justify-content-between">
                            <p class="my-0">Tags : {{$post->tags}}</p>
                            <time>{{$post->created_at}}</time>
                        </div>
                        <a href="" class="text-decoration-none text-black">Commentaires
                            : {{$post->comments->count()}}</a>
                    </div>
                </div>
            </div>
        </div>

        {{--    AFFICHAGE DES COMMENTAIRES --}}
        @if($post->comments->count() !== 0)
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3>Commentaires : </h3>
                    @foreach($post->comments as $comment)
                        <div class="card my-3">
                            <div class="card-header d-flex justify-content-between">
                                <p class="my-0">{{ $comment->user->pseudo }}</p>
                            </div>
                            <div class="card-body">
                                <p class="my-0">{{$comment->content}}</p>
                                <div class="my-3 d-flex justify-content-between">
                                    <p class="my-0">Tags : {{$comment->tags}}</p>
                                    <time>{{$comment->created_at}}</time>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{--    FORMULAIRE D'AJOUT DE COMMENTAIRE --}}
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card my-3">
                    <div class="card-header d-flex justify-content-between">
                        <p class="my-0">Revendiquer !</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('comment.store')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="content" class="form-label">Revendication</label>
                                <textarea class="form-control" id="content" name="content" rows="5"
                                          placeholder="Revendication"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tags" class="form-label">Motifs de la revendication</label>
                                <input type="text" class="form-control" id="tags" name="tags"
                                       placeholder="Motifs de la revendication">
                            </div>
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
