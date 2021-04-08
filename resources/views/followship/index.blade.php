@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Urmariri/Urmaritori</h1>
                </div>
                <div class="card-body">
                    <div class='row'>
                        <div class='col'><h3>Followers</h3>
                            @foreach($followers as $key=>$follower)
                                <div class='row' >
                                    <a href="{{route('retete.index',['utilizator_id'=>$followers[$key]->id] )}}">{{$followers[$key]->nume}} {{$followers[$key]->prenume}}</a>
                                </div>
                        @endforeach
                        </div>
                        
                        <div class='col'><h3>Following</h3>
                            @foreach($followings as $key=>$following)
                                <div class='row'>
                                    <a href="{{route('retete.index',['utilizator_id'=>$followings[$key]->id] )}}">{{$followings[$key]->nume}} {{$followings[$key]->prenume}}</a>
                                </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
