@extends('layouts.app')
@section('hd')
<link href="{{ asset('css/home-index.css') }}" rel="stylesheet">
<title>Noutăți</title>
@endsection
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="bg"></div>
    <div class="container-fluid text-center">
        <h1 class="display-4">Noutăți</h1>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        @foreach($retete as $reteta)
        <div class="social-feed-box">
            <div class="social-avatar">
                <a href="{{route('retete.index',['utilizator_id'=>$reteta->utilizator_id])}}" class="pull-left">
                    <img alt="image" src="/uploads/avatars/{{$reteta->user()->first()->imagine}}">
                </a>
                <div class="media-body">
                    <a href="{{route('retete.index',['utilizator_id'=>$reteta->utilizator_id])}}">
                        {{$reteta->user()->first()->prenume}} {{$reteta->user()->first()->nume}}
                    </a>
                    <small class="text-muted">a adăugat o postare:
                        {{toDate($reteta->created_at)->diffForHumans()}}</small>
                </div>
            </div>
            <div class="social-body">
                <div class='denumire'>
                <h4><a href="{{route('retete.show',$reteta->id)}}" class="col">{{$reteta->denumire}}</a></h4>
                </div>
                @if($reteta->imagine_principala)
                <div class="row">
                <img src="/uploads/retete/{{$reteta->utilizator_id}}/{{$reteta->id}}/{{$reteta->imagine_principala}}"
                    class="img-responsive col">
                @else
                <img src="http://www.coraf.org/wp-content/themes/consultix/images/no-image-found-360x250.png"
                    class="img-responsive col">
                @endif
                <ul class="col">
                    {{-- @foreach($reteta->ingrediente as $ingredient)
                    <li>$ingredient</li>
                    @endforeach --}}
                    <div>{{$reteta->ingrediente}}</div>
                </ul>
                <div class="col">
                    @foreach($reteta->tags()->get() as $tag)
                            <h5><a href="{{route('retete.index',['tag'=>$tag->name])}}" class="badge badge-info">{{$tag->name}}</a></h5>                                         
                    @endforeach
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $retete->links() }}
</div>
</div>

@endsection
