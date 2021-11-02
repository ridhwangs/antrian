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
        <img src="//www.ptsps.co.id/wp-content/uploads/2019/11/logo-sps.png" width="150px">
        <span style="font-size:60pt;">PT. SURYAPUTRA SARANA</span>
        <p style="font-size:50pt;">Nomor Antrian</p>
        <h1 style="font-size:280pt;">{{ str_pad($data->nomor, 3, '0', STR_PAD_LEFT) }}</h1>
        <span style="font-size:70pt;">{{ $data->keterangan }}</span>
        @for($i = 0; $i < 15; $i++)
        <br>
        @endfor
        **

@stop
@section('custom_script')
<script type="text/javascript">
    window.print();
    window.onfocus=function(){ 
        window.location.replace("{{ route('antrian.create') }}?dealerID={{ $_GET['dealerID'] }}");
    }
</script>
@stop