@extends('layouts.app')
@section('title', $data->antrian_id)
@section('custom_style')
<style>
    @media print { body { 
        font-family: Arial, Helvetica, sans-serif;
        width: 58mm;
        } } /* fix for Chrome */
</style>
@stop
@section('content')
<section onclick="window.print();">
        <p style="font-size:100pt;">Nomor Antrian</p>
        <h1 style="font-size:200pt;">{{ $data->nomor }}</h1>
        <span style="font-size:100pt;">{{ $data->jenis_id }}</span>
</section>
@stop