@extends('layouts.app')
@section('hd')
<title>Calculează valorile nutriționale</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Calculator valori nutritionale</h3></div>

                <div class="card-body">
                   <div class='row'>
                       <div class='col'>
                       <div class='input-group'>
                            <form action="{{ route('nutritie.scan') }}" method="POST">
                            @csrf
                           <input id='cantitate' name='cantitate' placeholder="Cantitate" type='number' min=0 required>
                           <label>g(sau ml)</label>
                           <input id='barcode' name='barcode' placeholder="Cod de bare" required>
                           <button class='btn btn-success' type='submit'>Caută</button>
                           </form>
                       </div>
                       </div>
                    </div>
                    <hr>
                    <div>sau</div>
                    <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#livestream_scanner">
                                            <div>Scanați codul de bare</div>
                                            <i class="fa fa-barcode"></i>
                                        </button>
                            </div><!-- /.col-lg-6 -->
                        </div><!-- /.row -->
                        <div class="modal" id="livestream_scanner">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Scanner cod de bare</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="position: static">
                                        <div id="interactive" class="viewport"></div>
                                        <div class="error"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    
                    @if(isset($denumire)&&$denumire!=null)
                    <div class='row m-2'><h5>Produs: {{$denumire}}</h5></div>
                    @endif
                    @if(isset($img)&&$img!=null)
                    <img class='row m-2' height="200px" src="{{$img}}">
                    @endif
					@if(isset($nutriscore_grade)&&$nutriscore_grade!=null)
                    <div class='row m-2'><h5>Scor nutritional: {{$nutriscore_grade}}</h5></div>
					<img class='row m-2' height="80px" src="{{$nutriscore_image}}">
                    @endif
					@if(isset($nutrient_levels)&&$nutrient_levels!=null)
                    <div class='row'>
                        <div class='col'>
                            <table class='table table-striped table-bordered'>
                                <thead><th colspan="3" class=". text-center">Nivele nutritionale</th>
                                </thead>
                    @foreach($nutrient_levels as $key=>$val)
                    <tr>
                    <td>{{$key}}</td>
                    <td>{{$nutrient_levels[$key]}}</td>
                    </tr>
                    @endforeach
                            </table>
                        </div>
                    </div>
                    @endif
                    @if(isset($valoriNutritionale)&&$valoriNutritionale!=null)
                    <div class='row'>
                        <div class='col'>
                            <table class='table table-striped table-bordered'>
                                <thead><th colspan="3" class=". text-center">Valori nutriționale</th>
                                </thead>
                                <thead>
                                    <th scope='col'>Denumire</th>
                                    <th scope='col'>Valoare ({{$cantitate}} g/ml)</th>
                                    <th scope='col'>Valoare (100 g/ml)</th>
                                </thead>
                    @foreach($valoriNutritionale as $key=>$val)
                    <tr>
                    <td>{{$key}}</td>
                    <td>{{$valoriNutritionale[$key]}}</td>
                    <td>{{$valoriNutritionale_100[$key.'_100g']}}</td>
                    </tr>
                    @endforeach
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
   
<style>
	#interactive.viewport {position: relative; width: 100%; height: auto; overflow: hidden; text-align: center;}
	#interactive.viewport > canvas, #interactive.viewport > video {max-width: 100%;width: 100%;}
	canvas.drawing, canvas.drawingBuffer {position: absolute; left: 0; top: 0;}
</style>
<script>
    
        $(function() {
	// Create the QuaggaJS config object for the live stream
	var liveStreamConfig = {
			inputStream: {
				type : "LiveStream",
				constraints: {
					width: {min: 640},
					height: {min: 480},
					aspectRatio: {min: 1, max: 100},
					facingMode: "environment" // or "user" for the front camera
				}
			},
			locator: {
				patchSize: "medium",
				halfSample: true
			},
			numOfWorkers: (navigator.hardwareConcurrency ? navigator.hardwareConcurrency : 4),
			decoder: {
				"readers":[
					{"format":"ean_reader","config":{}}
				]
			},
			locate: true
		};
	// The fallback to the file API requires a different inputStream option. 
	// The rest is the same 
	var fileConfig = $.extend(
			{}, 
			liveStreamConfig,
			{
				inputStream: {
					size: 800
				}
			}
		);
	// Start the live stream scanner when the modal opens
	$('#livestream_scanner').on('shown.bs.modal', function (e) {
		Quagga.init(
			liveStreamConfig, 
			function(err) {
				if (err) {
					$('#livestream_scanner .modal-body .error').html('<div class="alert alert-danger"><strong><i class="fa fa-exclamation-triangle"></i> '+err.name+'</strong>: '+err.message+'</div>');
					Quagga.stop();
					return;
				}
				Quagga.start();
			}
		);
    });
	
	// Make sure, QuaggaJS draws frames an lines around possible 
	// barcodes on the live stream
	Quagga.onProcessed(function(result) {
		var drawingCtx = Quagga.canvas.ctx.overlay,
			drawingCanvas = Quagga.canvas.dom.overlay;
 
		if (result) {
			if (result.boxes) {
				drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
				result.boxes.filter(function (box) {
					return box !== result.box;
				}).forEach(function (box) {
					Quagga.ImageDebug.drawPath(box, {x: 0, y: 1}, drawingCtx, {color: "green", lineWidth: 2});
				});
			}
 
			if (result.box) {
				Quagga.ImageDebug.drawPath(result.box, {x: 0, y: 1}, drawingCtx, {color: "#00F", lineWidth: 2});
			}
 
			if (result.codeResult && result.codeResult.code) {
				Quagga.ImageDebug.drawPath(result.line, {x: 'x', y: 'y'}, drawingCtx, {color: 'red', lineWidth: 3});
			}
		}
	});
	
	// Once a barcode had been read successfully, stop quagga and 
	// close the modal after a second to let the user notice where 
	// the barcode had actually been found.
	Quagga.onDetected(function(result) {    		
		if (result.codeResult.code){
			$('#barcode').val(result.codeResult.code);
			Quagga.stop();	
			setTimeout(function(){ $('#livestream_scanner').modal('hide'); }, 1000);			
		}
	});
    
	// Stop quagga in any case, when the modal is closed
    $('#livestream_scanner').on('hide.bs.modal', function(){
    	if (Quagga){
    		Quagga.stop();	
    	}
    });
	
	// Call Quagga.decodeSingle() for every file selected in the 
	// file input
	$("#livestream_scanner input:file").on("change", function(e) {
		if (e.target.files && e.target.files.length) {
			Quagga.decodeSingle($.extend({}, fileConfig, {src: URL.createObjectURL(e.target.files[0])}), function(result) {alert(result.codeResult.code);});
		}
	});
});

</script>
@endsection
