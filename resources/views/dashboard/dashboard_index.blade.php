@extends('layouts.app')
@section('title', 'Dashboard')
@section('custom_style')

@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 bg-dark text-white" style="min-height:100vh;">
            
        <video width="100%" height="100%" playsinline autoplay muted loop>
            <source src="{{URL::asset('/video/compro.mp4')}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        </div>
        <div class="col-md-3 pt-4">
            <div class="card">
                <div class="card-body text-center">
                    <blockquote class="blockquote mb-0">
                        <b style="font-size:100pt;" id="nomor_antrian"></b>
                        <p id="no_pol"><p>
                        <footer class="blockquote-footer" style="font-size:30pt;">Counter: <cite title="Source Title" id="counter"></cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('custom_script')
<script>
    if(typeof(EventSource) !== "undefined") {
        var source = new EventSource("{{ URL::route('dashboard.ajax') }}");
        source.addEventListener('message', event => {
                let data = JSON.parse(event.data);
                const zeroPad = (num, places) => String(num).padStart(places, '0');
                // console.log(data.length);
                if(data.length===0){
                  $("#nomor_antrian").hide();
                }else{
                  $("#nomor_antrian").show();
                  $("#nomor_antrian").html(zeroPad(data.nomor, 3));
                  $("#no_pol").html(data.no_pol);
                  $("#counter").html(data.counter);
                }
                
            }, false);
        source.addEventListener('error', event => {
            if (event.readyState == EventSource.CLOSED) {
                console.log('Event was closed');
                console.log(EventSource);
            }
        }, false);
    } else {
    console.log("Sorry, your browser does not support server-sent events...");
    }
</script>
@stop