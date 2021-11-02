@extends('layouts.app')
@section('title', 'Pilih Cabang')
@section('custom_style')
<style>
    body{
        background:#95a5a6;
    }
</style>
@stop
@section('content')
    <div class="row p-4">
        @foreach($data_cabang AS $key => $rows)
        <div class="col-sm-6 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <h1 class="card-title"><b>{{ $rows->kode_cabang}}</b></h1>
                    <p class="card-text">{{ $rows->nama_cabang}}</p>
                    <a href="{{ route('create') }}" class="btn btn-primary btn-block rounded-0">Pilih Cabang</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@stop
@section('custom_script')
@stop