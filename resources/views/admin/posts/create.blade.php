@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header">Adaugă o rețetă nouă
                <div class="card-body">
                    <form action="{{ route('admin.posts.store')}}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Denumire:</h5>
                                <textarea class="form-control" style="height:150px" id="denumire"
                                                name="denumire" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Ingrediente:</h5>
                            <textarea class="form-control" style="height:150px" id="ingrediente"
                                                name="ingrediente" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Mod de preparare:</h5>
                            <textarea class="form-control" style="height:150px" id="preparare"
                                                name="preparare" required></textarea>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-success mt-2">Adaugă</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
