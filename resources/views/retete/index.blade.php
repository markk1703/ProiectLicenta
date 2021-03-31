@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Retete</h1>
                </div>
                <div class="card-body">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="container">
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
                                        <div class="col">{{$reteta->categorii}}</div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-container">

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
