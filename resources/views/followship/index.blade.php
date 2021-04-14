@extends('layouts.app')
<head>
    <meta charset="utf-8">
    <title>Lista de urmariri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/followship.index.css">
</head>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Urmariri/Urmaritori</h1>
                </div>
                <div class="card-body">
                    <div class="user-profile">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="profile-info-right">
                                    <ul class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom">
                                        <li class="active"><a href="#followers" data-toggle="tab">URMĂRITORI</a></li>
                                        <li><a href="#following" data-toggle="tab">URMĂRIRI</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- followers -->
                                        @if(isset($followers)&&$followers->count()>0)
                                        <div class="tab-pane active" id="followers">
                                            @foreach($followers as $key=>$follower)
                                            <div class="media user-follower">
                                                <img src="/uploads/avatars/{{$followers[$key]->imagine}}" alt="User Avatar" class="media-object pull-left">
                                                <div class="media-body">
                                                    <a href="{{route('retete.index',['utilizator_id'=>$followers[$key]->id] )}}">{{$followers[$key]->nume}} {{$followers[$key]->prenume}}<br><span class="text-muted username">{{'@'.$followers[$key]->username}}</span></a>
                                                    <button type="button" class="btn btn-sm btn-toggle-following pull-right"><i class="fa fa-checkmark-round"></i> <span>Following</span></button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @else
                                            <div class="no_reports_found">
                                                Momentan nu exista urmaritori.
                                            </div>
                                        @endif

                                        <!-- end followers -->
                                        <!-- following -->
                                        @if(isset($followings)&&$followings->count()>0)
                                        <div class="tab-pane fade" id="following">
                                            @foreach($followings as $key=>$following)
                                            <div class="media user-following">
                                                <img src="/uploads/avatars/{{$followings[$key]->imagine}}" alt="User Avatar" class="media-object pull-left">
                                                <div class="media-body">
                                                    <a href="{{route('retete.index',['utilizator_id'=>$followings[$key]->id] )}}">{{$followings[$key]->nume}} {{$followings[$key]->prenume}}<br><span class="text-muted username">{{'@'.$followings[$key]->username}}</span></a>
                                                    <button type="button" class="btn btn-sm btn-danger pull-right"><i class="fa fa-close-round"></i> Unfollow</button>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @else
                                            <div class="no_reports_found">
                                                Momentan nu exista urmariri.
                                            </div>
                                        @endif
                                        <!-- end following -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
