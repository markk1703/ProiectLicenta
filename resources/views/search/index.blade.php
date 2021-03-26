@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <form  action="/search" method="get">
                        <input type="text"  name="cautare" placeholder="Search.."/>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
