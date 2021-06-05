<!-- html code-->
<h1 class="mb-4">Actualizează-ți datele</h1>
<div class="accordionMenu">
    <!-- 1st menu  -->
    <input type="radio" name="trg1" id="acc1" checked="checked">
    <label for="acc1" class="acc-label">Schimbă imaginea de profil</label>
    <div class="content">
        <div class="inner">
            <div class="col-md-8 mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <form enctype="multipart/form-data"
                                                action="{{ action('ProfileController@updateAvatar') }}" method="POST">
                                                @csrf
                                                <input type="file" name="imagine">
                                                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                                <input type="submit" class="pull-right btn btn-sm btn-success mt-3">
                                            </form>
                                        </div>
                                    </div>
                                </div>
            </div>
        </div>
    </div>
    <!-- 2nd menu -->
    <input type="radio" name="trg1" id="acc2">
    <label for="acc2" class="acc-label">Nume și prenume</label>
    <div class="content">
        <div class="inner">
            <form action="{{ action('ProfileController@updateProfile') }}" method="POST">
                @csrf
                <div class="row mb-5">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nume</label>
                                    <input name="nume" class="form-control" value="{{Auth::user()->nume}}"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Prenume</label>
                                    <input name="prenume" class="form-control"
                                        value="{{Auth::user()->prenume}}" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Salvează</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- 3rd menu -->
    <input type="radio" name="trg1" id="acc3">
    <label for="acc3" class="acc-label">Adresa de email</label>
    <div class="content">
        <div class="inner">
            <form action="{{ action('ProfileController@updateEmail') }}" method="POST">
                @csrf
                <div class="row mb-5">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <input name="email" class="form-control" value="{{Auth::user()->email}}"
                                        required>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-success">Salvează</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- 4th menu -->
    <input type="radio" name="trg1" id="acc4">
    <label for="acc4" class="acc-label">Nume utilizator</label>
    <div class="content">
        <div class="inner">
            <form action="{{ action('ProfileController@updateUsername') }}" method="POST">
                @csrf
                <div class="row mb-5">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nume utilizator</label>
                                    <input name="username" class="form-control"
                                        value="{{Auth::user()->username}}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Salvează</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- 5th menu -->
    <input type="radio" name="trg1" id="acc6">
    <label for="acc6" class="acc-label">Schimbă parola</label>
    <div class="content">
        <div class="inner">
                <form action="{{ action('ProfileController@updatePassword') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Parola actuală</label>
                                {{-- Daca exista o parola, este obligatorie introducerea ei --}}
                                @if(Auth::user()->password)
                                <input name="parola" class="form-control" type="password" required>
                                @else
                                <input name="parola" class="form-control" type="password">
                                @endif
                                <label class="form-control-label">Parola nouă</label>
                                <input name="parolaNoua" class="form-control" type="password" required>
                                <label class="form-control-label">Confirmă parola</label>
                                <input name="parolaNoua_confirm" class="form-control" type="password"
                                    required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Salvează</button>
                </form>
        </div>
    </div>
</div>