<div class="gallery-section">
    <div class="inner-width">
      <div class="gallery">
        @foreach ($retete as $reteta)
        <a href="{{route('retete.show',$reteta->id)}}" class="image">
          <img src="/uploads/retete/{{$reteta->utilizator_id}}/{{$reteta->id}}/{{$reteta->imagine_principala}}" alt="">
        </a>
        @endforeach
      </div>
    </div>
  </div>

<script src="{{asset('js/galery-section.js')}}"></script>