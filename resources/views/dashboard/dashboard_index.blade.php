@extends('layouts.app')
@section('title', 'Dashboard')
@section('custom_style')

@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9 bg-dark text-white" style="min-height:100vh;">
            Iklan Video
        </div>
        <div class="col-md-3 pt-4">
            <div class="card">
                <div class="card-header">
                    Nomor Antrian 
                </div>
                <div class="card-body text-center">
                    <blockquote class="blockquote mb-0">
                        <b style="font-size:80pt;" id="nomor_antrian">{ NOMOR }</b>
                        <p>{ NOPOL }<p>
                        <footer class="blockquote-footer">Counter: <cite title="Source Title">{ COUNTER }</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('custom_script')
<script>
    autoRefresh();
    function autoRefresh() {
        $.ajaxSetup
        (
            { headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } }
        );
        var auto_refresh = setInterval( function () {
            $.getJSON( "{{ URL::route('dashboard.ajax') }}", 
                function( data ) { 
                    $.each( data, function( key, val ) 
                        { 
                            $('#nomor_antrian').html(val).fadeIn("fast"); 
                        }
                    ); 
                }); 
            }, 1000);
    }
   
</script>
@stop