@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h1>Alege imaginile</h1>
                        </div>
                        <div class="col">
                            <img src="/uploads/retete/{{$reteta->utilizator_id}}/{{$reteta->id}}/{{$reteta->imagine_principala}}"
                                style="width:170px;max-height:100%;left:10px;margin-top:0px;">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <form method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        @foreach($imagini as $imagine)
                                        <div class="col mt-3">
                                            <div class="row mx-3">
                                                <img src="/uploads/retete/{{$reteta->utilizator_id}}/{{$reteta->id}}/{{$imagine}}"
                                                    style="width:170px;max-height:100%;left:10px;margin-top:0px;">
                                            </div>
                                            <div class="row mx-5">
                                                {{$imagine}}
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="avatar-row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <form method="POST" action="{{ action('UploadImagesController@store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <table class="table">
                                        <tr>
                                            <td width="40%" align="right"><label>Adauga imaginea principala</label></td>
                                            <td width="30"><input type="file" name="select_file" /></td>
                                            <input name="id" value={{$reteta->id}} hidden>
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
                                            <td width="40%" align="right"><label>Adauga imagini secundare</label></td>
                                            <td width="30"><input type="file" name="select_file" /></td>
                                            <input name="id" value={{$reteta->id}} hidden>
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
                    <div class="row" id="delete-row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <form method="POST" action="#" enctype="multipart/form-data">
                                    @csrf
                                    <table class="table">
                                        <tr>
                                            <td width="40%" align="right"><label>Stergere imagini</label></td>
                                            <td>
                                                <select id='imagineOption'>
                                                    @if($reteta->imagine_principala)
                                                    <option>{{$reteta->imagine_principala}}</option>
                                                    @endif
                                                    @foreach ($imagini as $imagine)
                                                    <option value={{$imagine}}>{{$imagine}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <input name="id" value={{$reteta->id}} hidden>
                                            <input name="tip" value='secundar' hidden>
                                            <td width="30%" align="left"><input type="submit" name="upload"
                                                    class="btn btn-danger" value="Sterge"></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light text-left mt-3">
                    <a href="{{ action('RetetaController@index')}}" class="btn btn-success">OK</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#imagineOption').change(function () {
            $imagine_de_sters = $('#imagineOption').val();
        });
    });

</script>
@endsection
