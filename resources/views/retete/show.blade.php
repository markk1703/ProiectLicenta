@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        @if($reteta->imagine_principala)
                        <div class="col">
                            <img src="/uploads/retete/{{$reteta->utilizator_id}}/{{$reteta->id}}/{{$reteta->imagine_principala}}"
                                style="max-width:200px;max-height:100%;left:10px;margin-top:0px;">
                        </div>
                        @endif
                            <div class="col">
                                @if($reteta->utilizator_id==Auth::id())
                                <form action="{{route('retete.destroy',$reteta->id)}}" method="POST">
                                    <a class="btn btn-primary"
                                        href="{{route('retete.edit',$reteta->id)}}">Editeaza</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Șterge</button>
                                </form>
                                @endif
                            </div>
                        <div class="col">
                            <h5>Imagini:</h5>
                            <div class="row">
                                @foreach($imagini as $imagine)
                                <div class="col">
                                    <img src="/uploads/retete/{{$reteta->utilizator_id}}/{{$reteta->id}}/{{$imagine}}"
                                        style="max-width:100%;max-height:100%;left:10px;margin-top:0px;">
                                </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <h5>Categorii:</h5>
                                    <div>{{$reteta->categorii}}</div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <h5>Denumire:</h5>
                                    <div>{{$reteta->denumire}}</div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-10">
                                <h5>Ingrediente:</h5>
                                <div>{{$reteta->ingrediente}}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-10">
                                <h5>Mod de preparare:</h5>
                                <div>{{$reteta->mod_de_preparare}}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-10">
                                <h5>Valori nutritionale (100 g produs):</h5>
                                @foreach ($tabValori as $val)
                                    <div>{{$val}}</div>
                                @endforeach
                                    <hr>
                                    <div>TOTAL: {{$totalValori}}</div>
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

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
    }

</script>
@endsection
