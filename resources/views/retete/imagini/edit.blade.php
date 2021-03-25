@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Editeaza imaginile</h1>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <form method="POST" action="{{ action('UploadFileController@upload') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <table class="table">
                                    <tr>
                                        <td width="40%" align="right"><label>Selecteaza pt upload</label></td>
                                        <td width="30"><input type="file" name="select_file" /></td>
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
                </div>`
            </div>
        </div>
    </div>
</div>
@endsection
