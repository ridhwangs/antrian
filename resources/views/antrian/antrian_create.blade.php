@extends('layouts.app')
@section('title', 'Antrian Create')
@section('custom_style')
<style>
    body{
        background:#e67e22;
    }
</style>
@stop
@section('content')
<div class="container-fluid">
    <div class="row p-4">
        <div class="col-sm-12 mb-4">
            <div class="card rounded-2">
                <div class="card-body text-center">
                    <h1 class="display-4">ANTRIAN {{ str_pad($tmp->nomor, 3, '0', STR_PAD_LEFT) }}</h1>
                    <p class="card-text"><a href="{{ url('antrian') }}" class="btn btn-xs btn-primary rounded-0">{{ $tmp->dealerID }}</a></p>
                </div>
            </div>
        </div>
        @foreach($jenis_antrian AS $key => $rows)     
                    <div class="col-sm-6 mb-4" onclick="document.getElementById('form-{{ $rows->jenis_id }}').submit();" style="cursor:pointer;">
                        <div class="card rounded-0">
                            <div class="card-body text-center">
                                <h1 class="card-title"><b>{{ $rows->kode}}</b></h1>
                                <p class="card-text">{{ $rows->keterangan}}</p>
                                <form action="{{ route('antrian.store') }}" method="POST" id="form-{{ $rows->jenis_id }}" autocomplete="off">
                                    @csrf
                                        <input type="hidden" name="jenis_id" value="{{ $rows->jenis_id }}">
                                        <input type="hidden" name="dealerID" value="{{ $_GET['dealerID'] }}">
                                </form>
                            </div>
                        </div>
                    </div>
        @endforeach
    </div>

</div>

@stop
@section('custom_script')
@stop