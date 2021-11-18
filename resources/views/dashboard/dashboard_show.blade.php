@extends('layouts.app')
@section('title', 'Dashboard')
@section('custom_style')

@stop
@section('content')
<div class="d-flex align-items-center">
    <div class="container-fluid ">
        <div class="row ">
            <div class="col-md-12 pt-4" style="min-height:100vh;">
                <div class="card d-flex align-items-center">
                    <div class="card-body text-center p-5">
                        <h3>Nomor antrian {{ str_pad($data_antrian->nomor, 3, '0', STR_PAD_LEFT) }}</h3>
                        <p>Ke counter : {{ $data_antrian->counter; }}</p>
                    </div>
                   
                </div>
                <div class="card-footer">
                    <a href="{{ route('dashboard.create') }}" class="btn btn-success btn-block btn-sm rounded-0">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('custom_script')
@stop