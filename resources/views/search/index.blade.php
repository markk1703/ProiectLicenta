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
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <form action="" id="search" class="form-outline mb-5">
                            <input id="searchInput" type="text"  placeholder="Caută.." />
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <div id="search_show_action">
                        
                    </div>
                </div>
            </div>
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
</script>
@endsection
