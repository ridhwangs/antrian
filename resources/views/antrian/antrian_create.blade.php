@extends('layouts.app')
@section('title', 'Antrian Create')
@section('custom_style')
<style>
    body{
        background:#1abc9c;
    }
</style>
@stop
@section('content')
<form action="{{ route('antrian.store') }}" method="POST" autocomplete="off">
@csrf
    <div class="row p-4">
        <div class="col-sm-12 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <h1 class="display-4">ANTRIAN {{ str_pad($tmp->nomor, 3, '0', STR_PAD_LEFT) }}</h1>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        @foreach($jenis_antrian AS $key => $rows)
        <input type="hidden" name="jenis_id" value="{{ $rows->jenis_id }}">
        <div class="col-sm-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <h1 class="card-title"><b>{{ $rows->kode}}</b></h1>
                    <p class="card-text">{{ $rows->keterangan}}</p>
                    <button type="submit" class="btn btn-warning btn-block rounded-0">Cetak</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</form>


@stop
@section('custom_script')
@stop