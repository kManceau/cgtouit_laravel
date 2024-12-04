@extends('layouts.app')

@section('content')
<div class="container">
    @auth
        <h2>Bienvenue, {{Auth::user()->pseudo}}.</h2>
        <div class="row justify-content-center mt-3 mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Revendiquer
                    </div>
                    <div class="card-body">
                        <form action="{{route('home')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="content" class="form-label">Revendication</label>
                                <textarea class="form-control" id="content" name="content" rows="5" placeholder="Revendication"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tags" class="form-label">Motifs de la revendication</label>
                                <input type="text" class="form-control" id="tags" name="tags" placeholder="Motifs de la revendication">
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <h2>Dernières Revendications</h2>
    @foreach($posts as $post)
    <div class="row justify-content-center my-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($post->user->pseudo) }}</div>
                <div class="card-body">
                    <p>{{$post->content}}</p>
                    <div class="mt-5 d-flex flex-column">
                        <p>Tags : {{$post->tags}}</p>
                        <time>{{$post->created_at}}</time>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row justify-content-center my-3">
        <div class="col-md-8">
                    {{$posts->links()}}
        </div>
    </div>
</div>
@endsection
