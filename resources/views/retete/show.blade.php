@extends('layouts.app')
@section('hd')
<link href="{{ asset('css/stars.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="bg"></div>
    <div class="container-fluid text-center">
        <h1 class="display-4">{{$reteta->denumire}}</h1>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        
                        <div class="col">
                            <div class="row">
                                @if($reteta->utilizator_id==Auth::id())
                                <form action="{{route('retete.destroy',$reteta->id)}}" method="POST">
                                    <a class="btn btn-primary" href="{{route('retete.edit',$reteta->id)}}">Editeaza</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Șterge</button>
                                </form>

                                @elseif(Auth::user())
                                @if(isFollowing($reteta->utilizator_id)=='following')
                                <button type="button" class="btn btn-outline-secondary">Îl urmărești</button>
                                @elseif(isFollowing($reteta->utilizator_id)=='follower')
                                <button type="button" class="btn btn-info">Te urmărește</button>
                                @else
                                <button type="button" class="btn btn-primary"> Încă nu îl urmărești</button>
                                @endif
                                @endif
                                <hr>
                            </div>
                            <div class='row'>Adăugată de:
                                <a
                                    href="{{route('retete.index',['utilizator_id'=>$reteta->user->id])}}">{{$reteta->user->username}}</a>
                            </div>
                            <div class="row"> {{$reteta->created_at->diffForHumans()}}</div>
                            @if($reteta->utilizator_id!=Auth::id())
                            <form class="row form-horizontal poststars" action="{{route('postStar', $reteta->id)}}"
                                id="addStar" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <input class="star star-5" value="5" id="star-5" type="radio" name="star" />
                                        <label class="star star-5" for="star-5"></label>
                                        <input class="star star-4" value="4" id="star-4" type="radio" name="star" />
                                        <label class="star star-4" for="star-4"></label>
                                        <input class="star star-3" value="3" id="star-3" type="radio" name="star" />
                                        <label class="star star-3" for="star-3"></label>
                                        <input class="star star-2" value="2" id="star-2" type="radio" name="star" />
                                        <label class="star star-2" for="star-2"></label>
                                        <input class="star star-1" value="1" id="star-1" type="radio" name="star" />
                                        <label class="star star-1" for="star-1"></label>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                @if(hasRated(Auth::id(),$reteta->id)!=='not_rated')
                                <h5>Ai acordat: {{hasRated(Auth::id(),$reteta->id)->rating}} stele.</h5>
                                @else
                                <h5>Încă nu ai adăugat o recenzie.</h5>
                                @endif
                                @endif
                            </div>
                            <div class="row">
                                @if(count($reteta->ratings()->get())>0)
                                <h5>Rating: {{number_format($reteta->averageRating(),2)}} din {{$reteta->usersRated()}}
                                    recenzii adăugate.</h5>
                                @else
                                <h5>Încă nu există recenzii.</h5>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="max-width:250px;height:200px;left:10px;margin-top:0px;">
                                <div class="carousel-inner">
                                  <div class="carousel-item active">
                                    <img class="d-block w-100" src="/uploads/retete/{{$reteta->utilizator_id}}/{{$reteta->id}}/{{$reteta->imagine_principala}}" alt="First slide">
                                  </div>
                                  @if(isset($reteta->imagini))
                                  @foreach($reteta->imagini as $imagine)
                                  <div class="carousel-item">
                                    <img class="d-block w-100" src="/uploads/retete/{{$reteta->utilizator_id}}/{{$reteta->id}}/{{$imagine}}"
                                    style="max-width:250px;height:200px;left:10px;margin-top:0px;">
                                  </div>
                                  @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                                @endif
                              </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <h5>Taguri:</h5>
                                    @foreach($reteta->tags()->get() as $tag)
                                    <ul style="list-style-type:none;">
                                        <li>
                                            <h5><a href="#" class="badge badge-info">{{$tag->name}}</a></h5>
                                        </li>
                                    </ul>
                                    @endforeach
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
                            <h5>Ingrediente: ({{count($reteta->ingrediente)}} ingrediente necesare)</h5>
                            <ul>
                                @foreach($reteta->ingrediente as $ingredient)
                                <li>{{$ingredient}}</li>
                                @endforeach
                                <ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Mod de preparare: ({{count($reteta->mod_de_preparare)}} pași de urmat)</h5>
                            <ol>
                                @foreach($reteta->mod_de_preparare as $mod_de_preparare)
                                <li>{{$mod_de_preparare}}</li>
                                @endforeach
                                <ol>
                        </div>
                    </div>
                    <hr>
                    @if(count($reteta->tabValori)>0)
                    <div class="row">
                        <div class="col-md-10">
                            <table class='table table-striped table-bordered'>
                                <thead>
                                    <th colspan="6" class=". text-center">Valori nutriționale / ingredient (100 g/ml)
                                    </th>
                                </thead>
                                <thead>
                                    @foreach($reteta->coloane as $col)
                                    <th scope='col'>{{$col}}</th>
                                    @endforeach
                                </thead>
                                @foreach($reteta->tabValori as $val)
                                <tr>
                                    @foreach($val as $item)
                                    <td>{{$item}}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </table>
                            <hr>
                        </div>
                    </div>
                    @endif
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
    $('#addStar').change('.star', function (e) {
        $(this).submit();
    });

</script>
@endsection
