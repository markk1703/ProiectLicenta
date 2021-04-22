@extends('layouts.app')
@section('hd')
<link href="{{ asset('css/home-index.css') }}" rel="stylesheet">
<title>Noutăți</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Noutăți (retete de la pers urmarite)</h1>
                </div>
                <div class="card-body">
                    <div class="col-md-7">
                        @foreach($retete as $reteta)
                        <div class="social-feed-box">
                            <div class="social-avatar">
                                <a href="{{route('retete.index',['utilizator_id'=>$reteta->utilizator_id])}}" class="pull-left">
                                    <img alt="image" src="/uploads/avatars/{{$reteta->imagine}}">
                                </a>
                                <div class="media-body">
                                    <a href="{{route('retete.index',['utilizator_id'=>$reteta->utilizator_id])}}">
                                        {{$reteta->prenume}} {{$reteta->nume}}
                                    </a>
                                    <small class="text-muted">{{$reteta->created_at}}</small>
                                </div>
                            </div>
                            <div class="social-body">
                                <h4><a href="{{route('retete.show',$reteta->id)}}" class="col">{{$reteta->denumire}}</a>
                                </h4>
                                <p>
                                    {{$reteta->ingrediente}}
                                </p>
                                @if($reteta->imagine_principala)
                                <img src="/uploads/retete/{{$reteta->utilizator_id}}/{{$reteta->id}}/{{$reteta->imagine_principala}}"
                                    class="img-responsive">
                                @else
                                <img src="http://www.coraf.org/wp-content/themes/consultix/images/no-image-found-360x250.png"
                                    class="img-responsive">
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
