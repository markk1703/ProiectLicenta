@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Adauga reteta</h1>
                </div>
                <form action="{{ action('RetetaController@store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="form-control-label">Denumire</label>
                                        <input name="denumire" placeholder="Adauga o denumire" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="form-control-label">Ingrediente</label>
                                        <textarea class="form-control" style="height:150px" id="ingrediente"
                                            name="ingrediente" placeholder="Adauga ingrediente" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="form-control-label">Mod de preparare</label>
                                        <textarea class="form-control" style="height:150px" id="preparare"
                                            name="preparare" placeholder="Descrie modul de preparare"
                                            required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="form-control-label">Categorii</label>
                                        <input name="categorii" placeholder="Adauga categorii" class="form-control"
                                            required>
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
