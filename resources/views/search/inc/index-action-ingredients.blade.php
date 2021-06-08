<div class="row pt-3">
    @foreach ($retete as $reteta)
    <div class="col-lg-3 col-md-4 col-xs-6 thumb mb-3">
        <div class="row-md-4">
            <a href="{{route('retete.show',$reteta->id)}}" class="fancybox" rel="ligthbox">
                @if($reteta->imagine_principala)
                <img src="/uploads/retete/{{$reteta->utilizator_id}}/{{$reteta->id}}/{{$reteta->imagine_principala}}"
                    class="zoom img-fluid " style="max-width:250px;height:200px;left:10px;margin-top:0px;">
                @else
                <img src="http://www.coraf.org/wp-content/themes/consultix/images/no-image-found-360x250.png"
                    class="zoom img-fluid " alt="">
                @endif
            </a>
            <div class="row-md-4">{{$reteta->denumire}}</div>
        </div>
        @if($reteta->utilizator_id==Auth::id())
        <div class="row-md-4">
            <form action="{{route('retete.destroy',$reteta->id)}}" method="POST">
                <a class="btn btn-primary" href="{{route('retete.edit',$reteta->id)}}">Editeaza</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Șterge</button>
            </form>
        </div>
        @endif
    </div>
    @endforeach
</div>