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

        <div class="col-sm-4">
            <div class="mb-3">
                <input type="text" class="form-control input" onkeyup="getNoPol()" inputmode='none' id="tmp_no_pol" aria-describedby="tmp_no_pol" autofocus>
                <div id="tmp_no_pol" class="form-text">Masukan No Polisi</div>
                
            </div>
            <div class="mb-3">
               <div class="container">
                    <div class="row">
                        <div class="col-sm p-0 pt-3">
                            <input class="form-control form-control-lg my-input rounded-0"  onkeyup="getKilometer()" inputmode='none' id="tmp_kilometer" type="text" readonly>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="container my-3" id='second' data-toggle="keybrd" data-target-input=".my-input">
                            <div class="row btn-group-lg mb-3" role='group'>
                                <button type="button" class="col-sm btn btn-secondary rounded-0 py-3 mr-3">1</button>
                                <button type="button" class="col-sm btn btn-secondary rounded-0 py-3 mr-3">2</button>
                                <button type="button" class="col-sm btn btn-secondary rounded-0 py-3">3</button>
                            </div>
                            <div class="row btn-group-lg mb-3">
                                <button type="button" class="col-sm btn btn-secondary rounded-0 py-3 mr-3">4</button>
                                <button type="button" class="col-sm btn btn-secondary rounded-0 py-3 mr-3">5</button>
                                <button type="button" class="col-sm btn btn-secondary rounded-0 py-3">6</button>
                            </div>
                            <div class="row btn-group-lg mb-3">
                                <button type="button" class="col-sm btn btn-secondary rounded-0 py-3 mr-3">7</button>
                                <button type="button" class="col-sm btn btn-secondary rounded-0 py-3 mr-3">8</button>
                                <button type="button" class="col-sm btn btn-secondary rounded-0 py-3">9</button>
                            </div>
                            <div class="row btn-group-lg mb-3">
                                <button type="button" class="col-sm btn btn-secondary rounded-0 py-3 mr-3">0</button>
                                <button type="button" class="col-sm-4 btn btn-danger rounded-0 py-3">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
              

            </div>
        </div>

        <div class="col-sm-8">
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
		if(val=='Delete'){
			input.val(input.val().slice(0,-1));
		}else{
			input.val(input.val()+val);
		}
	});
});
</script>
@stop