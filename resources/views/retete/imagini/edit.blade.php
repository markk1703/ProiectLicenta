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
                            </div>
                        </div>
                    </div>
                    <div class="row" id="avatar-row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <form method="POST" action="{{ route('images.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <table class="table">
                                        <tr>
                                            <td width="40%" align="right"><label>Adauga/schimba imaginea principala</label></td>
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
                    @if($reteta->imagine_principala)
                    <div class="row" id="delete-princ-row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <form method="post" action="{{route('images.delete',$reteta->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <table class="table">
                                        <tr>
                                            <td width="40%" align="right"><label>Stergere imagine principala</label></td>
                                            <td>
                                                    <input value={{$reteta->imagine_principala}} disabled>
                                            </td>
                                            <input name="id" value={{$reteta->id}} hidden>
                                            <input name="imagine_princ_de_sters" id="imagine_princ_de_sters" value="" hidden>
                                            <input name="tip" value='principal' hidden>
                                            <td width="30%" align="left"><input type="submit" name="upload"
                                                    class="btn btn-danger" value="Sterge"></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row" id="images-row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <form method="POST" action="{{ route('images.store') }}"
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
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if($reteta->imagini)
                    <div class="row" id="delete-images-row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <form method="post" action="{{route('images.delete',$reteta->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <table class="table">
                                        <tr>
                                            <td width="40%" align="right"><label>Stergere imagini</label></td>
                                            <td>
                                                <select id='imagineDeStersOption'>
                                                    <option>Alege imaginea</option>
                                                    @foreach ($imagini as $imagine)
                                                    <option value={{$imagine}}>{{$imagine}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <input name="id" value={{$reteta->id}} hidden>
                                            <input name="imagine_de_sters" id="imagine_de_sters" value="" hidden>
                                            <input name="tip" value='secundar' hidden>
                                            <td width="30%" align="left"><input type="submit" name="upload"
                                                    class="btn btn-danger" value="Sterge"></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="card-footer bg-light text-left mt-3">
                    <a href="{{ action('RetetaController@index')}}" class="btn btn-success">OK</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function (imagine_de_sters) {
        $('#imagineDeStersOption').change(function () {
            var e=document.getElementById('imagineDeStersOption');
            var img=document.getElementById('imagine_de_sters');
            img.value =  e.options[e.selectedIndex].value;
        });
    });

</script>
@endsection
