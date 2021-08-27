@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">Dashboard Administrator</h4>

                <div class="card-body">
                    <div class="row" style="display: flex;align-items: center;justify-content: center;">
                        <div class="col-sm-6 col-lg-3">
                            <a href="{{route('admin.users')}}">
                            <div class="card text-white bg-primary">
                                <div class="card-body card-body pb-4 d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="text-value-lg">{{$utilizatori}}</div>
                                        <div>Utilizatori</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <a href="{{route('admin.posts')}}">
                            <div class="card text-white bg-success">
                                <div class="card-body card-body pb-4 d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="text-value-lg">{{$retete}}</div>
                                        <div>Rețete</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <a href="{{route('admin.ratings')}}">
                            <div class="card text-white bg-warning">
                                <div class="card-body card-body pb-4 d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="text-value-lg">{{$ratings}}</div>
                                        <div>Rating-uri</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="wrapper">
                        <h5 class="toggle_switch-text" tabindex="0" for="content_switcher">Evidența zilnică
                        </h5>
                        <div class="switch">
                        <input id="content_switcher" class="toggle_switch toggle_switch-ios" type="checkbox" /> 
                        <label class="toggle_switch-button" tabindex="0" for="content_switcher">
                        </label>
                        </div>
                        <h5 class="toggle_switch-text" tabindex="0" for="content_switcher">Evidența cumulativă
                        </h5>
                        </div>
                    <div class="row py-2 first-content">
            {!!$fresh_chart->container()!!}
            {!!$fresh_chart->script()!!}
                    </div>
                    <div class="row second-content">
                        {!!$total_chart->container()!!}
                        {!!$total_chart->script()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
