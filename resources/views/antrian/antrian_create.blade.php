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
                    <p class="card-text"><a href="{{ url('antrian') }}" class="btn btn-xs btn-secondary rounded-0 rounded-0">{{ $tmp->dealerID }}</a></p>
                </div>
            </div>
        </div>

        <div class="col-sm-7">
            <div class="mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-sm p-0 pt-3">
                            <input type="text" class="form-control input rounded-0" onkeyup="getNoPol()" inputmode='none' placeholder="No Kendaraan / No Polisi" id="tmp_no_pol" aria-describedby="tmp_no_pol">
                        </div>
                    </div>
                </div>
                <div class="card rounded-0" id="keyboard-nopol">
                    <div class="card-body">
                        <div class="container my-3" id='first' data-toggle="keybrd" data-target-input="#tmp_no_pol">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row btn-group-lg mb-3" role='group'>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">Q</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">W</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">E</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">R</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">T</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">Y</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">U</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">I</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">O</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">P</button>
                                    </div>

                                    <div class="row btn-group-lg mb-3" role='group'>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">A</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">S</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">D</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">F</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">G</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">H</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">J</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">K</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">L</button>
                                    </div>

                                    <div class="row btn-group-lg mb-3" role='group'>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">Z</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">X</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">C</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">V</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">B</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">N</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">J</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">M</button>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="row btn-group-lg mb-3" role='group'>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">1</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">2</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3">3</button>
                                    </div>
                                    <div class="row btn-group-lg mb-3">
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">4</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">5</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3">6</button>
                                    </div>
                                    <div class="row btn-group-lg mb-3">
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">7</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">8</button>
                                        <button type="button" class="btn btn-secondary rounded-0 py-3">9</button>
                                    </div>
                                    <div class="row btn-group-lg mb-3">
                                        <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:180px !important;">0</button>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
               <div class="container">
                    <div class="row">
                        <div class="col-sm p-0 pt-3">
                            <input class="form-control form-control-lg my-input rounded-0"  onkeyup="getKilometer()"  placeholder="Kilometer Kendaraan" inputmode='none' id="tmp_kilometer" type="text">
                        </div>
                    </div>
                </div>
                <div class="card rounded-0" id="keyboard-kilometer">
                    <div class="card-body">
                        <div class="container my-3" id='second' data-toggle="keybrd" data-target-input="#tmp_kilometer">
                            <div class="row btn-group-lg mb-3" role='group'>
                                <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">1</button>
                                <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">2</button>
                                <button type="button" class="btn btn-secondary rounded-0 py-3">3</button>
                            </div>
                            <div class="row btn-group-lg mb-3">
                                <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">4</button>
                                <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">5</button>
                                <button type="button" class="btn btn-secondary rounded-0 py-3">6</button>
                            </div>
                            <div class="row btn-group-lg mb-3">
                                <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">7</button>
                                <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:50px !important;">8</button>
                                <button type="button" class="btn btn-secondary rounded-0 py-3">9</button>
                            </div>
                            <div class="row btn-group-lg mb-3">
                                <button type="button" class="btn btn-secondary rounded-0 py-3 mr-3" style="width:180px !important;">0</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-sm">
            @foreach($jenis_antrian AS $key => $rows)     
                <div class="mb-4" onclick="document.getElementById('form-{{ $rows->jenis_id }}').submit();" style="cursor:pointer;">
                    <div class="card rounded-0">
                        <div class="card-body text-center">
                            <h1 class="card-title"><b>{{ $rows->kode}}</b></h1>
                            <p class="card-text">{{ $rows->keterangan}}</p>
                            <form action="{{ route('antrian.store') }}" method="POST" id="form-{{ $rows->jenis_id }}" autocomplete="off">
                                @csrf
                                    <input type="hidden" name="jenis_id" value="{{ $rows->jenis_id }}">
                                    <input type="hidden" name="no_pol" class="no_pol">
                                    <input type="hidden" name="kilometer" class="kilometer">
                                    <input type="hidden" name="dealerID" value="{{ $_GET['dealerID'] }}">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

<hr>

</div>

@stop
@section('custom_script')
<script>
    function getNoPol() {
        var no_pol = $("#tmp_no_pol").val();
        $(".no_pol").val(no_pol);
    }
    function getKilometer() {
        var kilometer = $("#tmp_kilometer").val();
        $(".kilometer").val(kilometer);
    }
    $('[data-toggle="keybrd"]').each(function(){
        var btn = $(this).find('.btn'), input = $($(this).data('target-input'));
        btn.on('click',function(e){
            e.preventDefault();
            var val = $(this).text();
            if(val=='<-'){
                input.val(input.val().slice(0,-1));
            }else{
                input.val(input.val()+val);
                getNoPol();
                getKilometer();
            }
        });
    });
</script>
@stop