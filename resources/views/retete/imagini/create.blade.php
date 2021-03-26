@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class=row>
                        <div class="col">
                            <h1>Adauga imagini</h1>
                            <h5>pentru '{{$request->denumire}}'</h5>
                        </div>
                        <div class="col">
                            
                        </div>
                    </div>
                </div>
                <div class=card-body>
                    <div class="row" id="avatar-row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <form method="POST" action="{{ action('UploadImagesController@store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <table class="table">
                                        <tr>
                                            <td width="40%" align="right"><label>Selecteaza imaginea principala</label></td>
                                            <td width="30"><input type="file" name="select_file" /></td>
                                            <input name="id" value={{$request->id}} hidden>
                                            <input name="tip" value='principal' hidden>
                                            <td width="30%" align="left"><input type="submit" name="upload"
                                                    class="btn btn-primary" value="Upload"></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="images-row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <form method="POST" action="{{ action('UploadImagesController@store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <table class="table">
                                        <tr>
                                            <td width="40%" align="right"><label>Selecteaza imagini secundare</label></td>
                                            <td width="30"><input type="file" name="select_file" /></td>
                                            <input name="id" value={{$request->id}} hidden>
                                            <input name="tip" value='secundar' hidden>
                                            <td width="30%" align="left"><input type="submit" name="upload"
                                                    class="btn btn-primary" value="Upload"></td>
                                        </tr>
                                        <tr>
                                            <td width="40%" align="right"></td>
                                            <td width="30"><span class="text-muted">jpeg, jpg, png, gif</span></td>
                                            <td width="30%" align="left"></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light text-left mt-3">
                    <form method="GET" action="{{action('RetetaController@index')}}">
                        <button type="submit" class="btn btn-success">OK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
