@extends('layouts.app')
@section('title', $data->antrian_id)
@section('custom_style')
<style>
    @media print { body { 
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
       
        } } /* fix for Chrome */
</style>
@stop
@section('content')
<section onclick="window.print();">
        <p style="font-size:100pt;">Nomor Antrian</p>
        <h1 style="font-size:200pt;">{{ str_pad($data->nomor, 3, '0', STR_PAD_LEFT) }}</h1>
        <span style="font-size:70pt;">{{ $data->keterangan }}</span>
        @for($i = 0; $i < 30; $i++)
        <br>
        @endfor
        *****
</section>
<script type="text/javascript">
setTimeout(function () { window.print(); }, 500);
        window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
</script>
@stop