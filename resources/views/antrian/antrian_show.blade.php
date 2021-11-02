@extends('layouts.app')
@section('title', $data->antrian_id)
@section('custom_style')
<style>
    @media print { body { 
        width: 58mm;
        } } /* fix for Chrome */
</style>
@stop
@section('content')
<button onclick="window.print();">Print</button>
        <p style="font-size:100pt;">Nomor Antrian</p>
        <h1 style="font-size:150pt;">{{ $data->nomor }}</h1>
        <span style="font-size:100pt;">{{ $data->jenis_id }}</span>
 
@stop