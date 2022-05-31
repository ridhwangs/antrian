@extends('layouts.app')
@section('title', 'Dashboard')
@section('custom_style')
<style>
    body{
        background:#95a5a6;
    }
</style>
@stop
@section('content')
<div class="d-flex align-items-center">
    @if(empty($_GET['dealerID']))
    <div class="container-fluid">
    <div class="row p-4 d-flex flex-column min-vh-100 justify-content-center align-items-center">
        @foreach($data_cabang AS $key => $rows)
        <div class="col-sm-6 mb-3">
            <div class="card rounded-0">
                <div class="card-body text-center">
                    <h1 class="card-title"><b>{{ $rows->kode_cabang}}</b></h1>
                    <p class="card-text">{{ $rows->nama_cabang}}</p>
                    <a href="{{ route('dashboard.create') }}?dealerID={{ $rows->dealerID }}" class="btn btn-primary btn-block rounded-0">Pilih Cabang</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
    @else
    <div class="container-fluid">
        @if(!empty($_GET['counter']))
        <div class="row">
            <div class="col-md-12 pt-4">
                <div class="card">
                    <div class="card-header">
                        Nomor antrian Saat ini <a href="{{ route('dashboard.create') }}">set counter</a>
                    </div>
                    <div class="card-body text-center">
                        <blockquote class="blockquote mb-0">
                            <b  id="nomor_antrian"></b>
                            <p id="no_pol"><p>
                            <footer class="blockquote-footer">Counter: <cite title="Source Title" id="counter"></cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-12 pt-4" style="min-height:100vh;">
                <div class="card">
                    <div class="card-header">
                        <button onclick="location.reload();" class="btn btn-sm btn-warning">Refresh</button> Nomor Antrian Tersedia ({{ $_GET['counter'] }})
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm table-hover p-0 mb-0 text-center">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th rowspan="2" width="100px">Nomor</th>
                                        <th rowspan="2">No Polisi</th>
                                        <th rowspan="2">KM.</th>
                                        <th colspan="3" width="200px">Waktu</th>
                                        <th rowspan="2" width="1px">#</th>
                                    </tr>
                                    <tr>
                                        <th width="1px">Tgl</th>
                                        <th width="1px">Bulan</th>
                                        <th width="1px">Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_antrian AS $key => $rows)
                                    <tr>
                                        <td>{{ str_pad($rows->nomor, 3, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $rows->no_pol }}</td>
                                        <td>{{ $rows->kilometer }}</td>
                                        <td>{{ date('d', strtotime($rows->created_at)) }}</td>
                                        <td>{{ date('F', strtotime($rows->created_at)) }}</td>
                                        <td>{{ date('H:i', strtotime($rows->created_at)) }}</td>
                                        <td><a href="{{ route('dashboard.call', $rows->antrian_id) }}?dealerID={{ $_GET['dealerID'] }}&counter={{ $_GET['counter'] }}" class="btn btn-sm btn-success rounded-0">Call</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        @else
        <div class="pt-4">
            <div class="card">
                <div class="card-body">
                    <form method="GET">
                        <div class="mb-3">
                            <input type="hidden" name="dealerID" value="{{ $_GET['dealerID'] }}">
                            <input type="number" name="counter" class="form-control" id="counter" aria-describedby="counter" autofocus>
                            <div id="counter" class="form-text">Masukan Counter dengan Angka</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
    @endif
</div>
@stop
@section('custom_script')
<script>
    if(typeof(EventSource) !== "undefined") {
        var source = new EventSource("{{ URL::route('dashboard.ajax') }}");
        source.addEventListener('message', event => {
                let data = JSON.parse(event.data);
                const zeroPad = (num, places) => String(num).padStart(places, '0');
                // console.log(data.length);
                if(data.length===0){
                  $("#nomor_antrian").hide();
                }else{
                  $("#nomor_antrian").show();
                  $("#nomor_antrian").html(zeroPad(data.nomor, 3));
                  $("#no_pol").html(data.no_pol);
                  $("#counter").html(data.counter);
                }
                
            }, false);
        source.addEventListener('error', event => {
            if (event.readyState == EventSource.CLOSED) {
                console.log('Event was closed');
                console.log(EventSource);
            }
        }, false);
    } else {
    console.log("Sorry, your browser does not support server-sent events...");
    }
</script>
@stop