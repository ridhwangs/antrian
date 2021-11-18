@extends('layouts.app')
@section('title', 'Dashboard')
@section('custom_style')

@stop
@section('content')
<div class="d-flex align-items-center">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12 pt-4" style="min-height:100vh;">
                <div class="card">
                    <div class="card-header">
                        Nomor Antrian Tersedia
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>No Polisi</th>
                                        <th width="1px">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_antrian AS $key => $rows)
                                    <tr>
                                        <td>{{ str_pad($rows->nomor, 3, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $rows->no_pol }}</td>
                                        <td><a href="{{ route('dashboard.call', $rows->antrian_id) }}" class="btn btn-sm btn-success rounded-0">Call</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('custom_script')
@stop