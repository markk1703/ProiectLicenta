@extends('layouts.app')
@section('hd')
<title>Caută rețete</title>
@endsection
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="bg"></div>
    <div class="container-fluid text-center">
        <h1 class="display-4">Caută rețete</h1>
    </div>
</div>
<div class="container">
    
        
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <form action="" id="search" class="form-outline mb-3">
                            <input id="searchInput" type="text"  placeholder="Caută după denumire" />
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <div class="input-group border">
                        <h5>Caută după ingrediente:</h5>
                        <form action="" id="searchByIngredient" class="form-outline mb-2">
                            <fieldset id="checkArray" class="row">
                                <div class="col">
                                    <label class="container">Lapte
                                        <input type="checkbox" name="ingr" value="lapte">
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">Ouă
                                        <input type="checkbox" name="ingr" value="oua">
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">Carne
                                        <input type="checkbox" name="ingr" value="carne">
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">Cartofi
                                        <input type="checkbox" name="ingr" value="cartofi">
                                        <span class="checkmark"></span>
                                      </label>
                                </div>
                                <div class="col">
                                    <label class="container">Brânză
                                        <input type="checkbox" name="ingr" value="branza">
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">Ceapă
                                        <input type="checkbox" name="ingr" value="ceapa">
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">Usturoi
                                        <input type="checkbox" name="ingr" value="usturoi">
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">Făină
                                        <input type="checkbox" name="ingr" value="faina">
                                        <span class="checkmark"></span>
                                      </label>
                                </div>
                                <div class="col">
                                    <label class="container">Zahăr
                                        <input type="checkbox" name="ingr" value="zahar">
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">Morcovi
                                        <input type="checkbox" name="ingr" value="morcovi">
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">Unt
                                        <input type="checkbox" name="ingr" value="unt">
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="container">Avocado
                                        <input type="checkbox" name="ingr" value="avocado">
                                        <span class="checkmark"></span>
                                      </label>
                                </div>
                            </fieldset>
                            <hr>
                            <button type="submit" class="btn btn-primary ml-3"><i class="fa fa-search mx-3" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <div id="search_show_action"></div>
                </div>
            </div>
</div>
<script>
$(document).on('submit', '#search', function (event) {
    event.preventDefault();
    let data = $('#searchInput').val();
    axios.get("{{route('search.search')}}", {
        params: {
            term: data
        }
    }).then(data => {
        $('#search_show_action').html(data.data);
    }).catch(error => {
        console.log(error);
    })
})
$(document).on('submit', '#searchByIngredient', function (event) {
    event.preventDefault();
    var data = $("#checkArray input:checkbox:checked").map(function(){
      return $(this).val();
    }).get();
    axios.get("{{route('search.searchByIngredient')}}", {
        params: {
            ingrediente: data
        }
    }).then(data => {
        $('#search_show_action').html(data.data);
    }).catch(error => {
        console.log(error);
    })
})
</script>
@endsection
