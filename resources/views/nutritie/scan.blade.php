@extends('layouts.app')
@section('hd')
<title>Calculează valorile nutriționale</title>
@endsection
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="bg"></div>
    <div class="container-fluid text-center">
        <h1 class="display-4">Calculator valori nutriționale</h1>
    </div>
</div>
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Calculator valori nutritionale</h4>
                    <small>Introduceți cantitatea și scanați codul de bare al produsului.</small>
                </div>
                <div class="card-body">
                   <div class='row'>
                       <div class='col'>
                       <div class='input-group'>
                            <form action="{{ route('nutritie.calculator') }}" method="POST">
                            @csrf
                           <input id='cantitate' name='cantitate' placeholder="Cantitate" type='number' min=0 required>
                           <label>g(sau ml)</label>
                           <input id='barcode' name='barcode' placeholder="Cod de bare" required>
                           <button class='btn btn-primary' type='submit'><i class="fa fa-search" aria-hidden="true"></i></button>
                           </form>
                       </div>
                       </div>
                    </div>
                    <hr>
                    <div>sau</div>
                    <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                        <button class="btn btn-outline-primary btn-sm" type="button" data-toggle="modal" data-target="#livestream_scanner">
                                            <div>Scanați codul de bare</div>
                                            <i class="fa fa-barcode"></i>
                                        </button>
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                        <div class="modal" id="livestream_scanner">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Scanner cod de bare</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="position: static">
                                        <div id="interactive" class="viewport"></div>
                                        <div class="error"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    
                    @if(isset($denumire)&&$denumire!=null)
                    <div class='row m-2'><h5>Produs: {{$denumire}}</h5></div>
                    @endif
                    @if(isset($img)&&$img!=null)
                    <img class='row m-2' height="200px" src="{{$img}}">
                    @endif
					@if(isset($nutriscore_grade)&&$nutriscore_grade!=null)
                    <div class='row m-2'><h5>Scor nutritional: {{$nutriscore_grade}}</h5></div>
					<img class='row m-2' height="80px" src="{{$nutriscore_image}}">
                    @endif
					@if(isset($nutrient_levels)&&$nutrient_levels!=null)
                    <div class='row'>
                        <div class='col'>
                            <table class='table table-striped table-bordered'>
                                <thead><th colspan="3" class=". text-center">Nivele nutritionale</th>
                                </thead>
                    @foreach($nutrient_levels as $key=>$val)
                    <tr>
                    <td>{{$key}}</td>
                    <td>{{$nutrient_levels[$key]}}</td>
                    </tr>
                    @endforeach
                            </table>
                        </div>
                    </div>
                    @endif
                    @if(isset($valoriNutritionale)&&$valoriNutritionale!=null)
                    <div class='row'>
                        <div class='col'>
                            <table class='table table-striped table-bordered'>
                                <thead><th colspan="3" class=". text-center">Valori nutriționale</th>
                                </thead>
                                <thead>
                                    <th scope='col'>Denumire</th>
                                    <th scope='col'>Valoare ({{$cantitate}} g/ml)</th>
                                    <th scope='col'>Valoare (100 g/ml)</th>
                                </thead>
                    @foreach($valoriNutritionale as $key=>$val)
                    <tr>
                    <td>{{$key}}</td>
                    <td>{{$valoriNutritionale[$key]}}</td>
                    <td>{{$valoriNutritionale_100[$key.'_100g']}}</td>
                    </tr>
                    @endforeach
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.rawgit.com/serratus/quaggaJS/0420d5e0/dist/quagga.min.js"></script>
    <script src="{{asset('js/scanner.js')}}"></script>
@endsection
