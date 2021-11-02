@extends('layouts.app')
@section('title', $data->antrian_id)
@section('custom_style')
<style>
    @media print { body { width: 58mm; height: 50mm } } /* fix for Chrome */
</style>
@stop
@section('content')
<button class="btn btn-sm mb-3 btn-secondary btn-block rounded-0" onclick="window.print();">Print</button>
    <section class="print-section text-center">
        <p>Nomor Antrian</p>
        <h1>{{ $data->nomor }}</h1>
        <span>{{ $data->jenis_id }}</span>
    </section>
@stop