@extends('layouts.app')
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="bg"></div>
    <div class="container-fluid text-center">
        @if(isset($user))
        <h4 class="display-4">Rețetele utilizatorului {{$user->nume}} {{$user->prenume}}</h4>
        @elseif(isset($tag))
        <h4 class="display-4">Rețetele care conțin tag-ul <span h3 style="background:#6cb2eb; border-radius:10px; color:black;" class="px-3">{{$tag}}</span>:</h4>
        @else
        <h4 class="display-4">Toate rețetele</h4>
        @endif
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="container">
                                    @if(isset($user) && $retete->count()==0)
                                    <h4>Utilizatorul {{$user->nume}} {{$user->prenume}} nu a postat încă nicio rețetă.</h4>
                                    @else
                                    @foreach ($retete as $reteta)
                                    <div class="row my-2 border">
                                        @if($reteta->imagine_principala)
                                        <div class="col-md-2"><img src="/uploads/retete/{{$reteta->utilizator_id}}/{{$reteta->id}}/{{$reteta->imagine_principala}}"
                                            style="max-width:100%;max-height:100%;left:10px;margin-top:0px;"></div>
                                        @else
                                        <div class="col-md-2"><img src="http://www.coraf.org/wp-content/themes/consultix/images/no-image-found-360x250.png"
                                            style="max-width:100%;max-height:100%;left:10px;margin-top:0px;"></div>
                                        @endif
                                        <h4><a href="{{route('retete.show',$reteta->id)}}" class="col">{{$reteta->denumire}}</a></h4>
                                        <div class="col">
                                            @foreach($reteta->tags()->get() as $tag)
                                                    <h5><a href="{{route('retete.index',['tag'=>$tag->name])}}" class="badge badge-info">{{$tag->name}}</a></h5>                                         
                                            @endforeach
                                        </div>
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
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer bg-light text-left mt-3">
                    {{$retete->withQueryString()->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
