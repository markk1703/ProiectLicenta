@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{$reteta->denumire}}</h1>
                </div>
                    <div class="card-body">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="form-control-label">Denumire</label>
                                        <div>{{$reteta->denumire}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <label class="form-control-label">Ingrediente</label>
                                    <div>{{$reteta->ingrediente}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <label class="form-control-label">Mod de preparare</label>
                                    <div>{{$reteta->modDePreparare}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
