@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="bg"></div>
    <div class="container-fluid text-center">
        <h1 class="display-4">Modifică rețeta</h1>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('retete.update',$reteta->id)}}" method="POST">
                @csrf
            <div class="card">
                    <div class="card-body">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="form-control-label">Denumire</label>
                                        <input name="denumire" placeholder="Adaugă o denumire" value="{{$reteta->denumire}}" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="form-control-label">Ingrediente</label>
                                        <textarea class="form-control" style="height:150px" id="ingrediente"
                                            name="ingrediente" placeholder="Adaugă ingrediente" required>{{$reteta->ingrediente}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="form-control-label">Mod de preparare</label>
                                        <textarea class="form-control" style="height:150px" id="preparare"
                                            name="preparare" placeholder="Adaugă mod de preparare"
                                            required>{{$reteta->mod_de_preparare}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="form-control-label">Taguri</label>
                                        <textarea class="form-control" style="height:150px" id="categorii"
                                            name="categorii" placeholder="Adaugă categorii"
                                            required>{{$taguri}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="card-footer bg-light text-left mt-3">
                    <button type="submit" class="btn btn-success">Mai departe</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
