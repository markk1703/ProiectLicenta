@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Adauga reteta</h1>
                </div>
                <div class="card-body">
                    <div class="col-md-10">
                        <div id="contents">
                            <form action="{{ route('retete.store') }}" id="form1" method="POST">
                                @csrf
                                <div class="row" id="addDenumireButton-Row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="form-control-label">Denumire</label>
                                            <input name="denumire" placeholder="Adauga o denumire" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="ingrediente-Row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="form-control-label">Ingrediente</label>
                                            <textarea class="form-control" style="height:150px" id="ingrediente"
                                                name="ingrediente" placeholder="Adauga ingrediente" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="addPreparareButton-Row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="form-control-label">Mod de preparare</label>
                                            <textarea class="form-control" style="height:150px" id="preparare"
                                                name="preparare" placeholder="Descrie modul de preparare"
                                                required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="addCategoriiButton-Row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="form-control-label">Categorii</label>
                                            <input name="categorii" placeholder="Adauga categorii" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light text-left mt-3">
                    <button type="submit" form="form1" class="btn btn-success">Mai departe</button>
                </div>

            </div>
        </div>
    </div>
    <script>
        $(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});
        </script>
    @endsection
