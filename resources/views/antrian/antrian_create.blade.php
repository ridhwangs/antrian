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

        <div class="col-sm-4">
            <div class="mb-3">
                <input type="text" class="form-control input" onkeyup="getNoPol()"  id="tmp_no_pol" aria-describedby="tmp_no_pol" autofocus>
                <div id="tmp_no_pol" class="form-text">Masukan No Polisi</div>
            </div>
            <div class="mb-3">
                <input type="number" class="form-control input" onkeyup="getKilometer()" id="tmp_kilometer" aria-describedby="tmp_kilometer">
                <div id="tmp_kilometer" class="form-text">Kilometer terakhir kendaraan</div>
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
    <div class="simple-keyboard"></div>
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

    let Keyboard = window.SimpleKeyboard.default;

    let keyboard = new Keyboard({
    onChange: input => onChange(input),
    onKeyPress: button => onKeyPress(button),
    layout: {
        default: ["A B C D E F G H I J K L M N O P Q R T S U V W X Y Z {bksp}","1 2 3", "4 5 6", "7 8 9", "0"],
        shift: ["! / #", "$ % ^", "& * (", "{shift} ) +", "{bksp}"]
    },
    theme: "hg-theme-default hg-layout-numeric numeric-theme"
    });

    /**
    * Update simple-keyboard when input is changed directly
    */
    document.querySelector(".input").addEventListener("input", event => {
    keyboard.setInput(event.target.value);
    });

    console.log(keyboard);

    function onChange(input) {
    document.querySelector(".input").value = input;
    console.log("Input changed", input);
    }

    function onKeyPress(button) {
    console.log("Button pressed", button);

    /**
    * If you want to handle the shift and caps lock buttons
    */
    if (button === "{shift}" || button === "{lock}") handleShift();
    }

    function handleShift() {
    let currentLayout = keyboard.options.layoutName;
    let shiftToggle = currentLayout === "default" ? "shift" : "default";

    keyboard.setOptions({
        layoutName: shiftToggle
    });
    }
</script>
@stop