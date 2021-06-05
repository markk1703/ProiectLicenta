@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4 class="card-header">Dashboard Administrator</h4>

                <div class="card-body">
                    <div class="row">
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
                            <div class="card text-white bg-info">
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
                                        <div>Recenzii</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
