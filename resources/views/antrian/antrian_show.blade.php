@extends('layouts.app')
@section('title', $data->antrian_id)
@section('custom_style')
<style>
    body {
        margin: 0;
        font-family: "Nunito", sans-serif;
        font-size: 0.9rem;
        font-weight: 400;
        line-height: 1.6;
        color: #212529;
        text-align: left;
        background-color: #f8fafc !important;
    }
    @page { size: 58mm 100mm } /* output size */
    body.receipt .sheet { width: 58mm; height: 100mm } /* sheet size */
    @media print { body.receipt { width: 58mm } } /* fix for Chrome */
</style>
@stop
@section('content')
    <div class="row p-4 d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="col-sm-4 mb-3">
            <div class="card rounded-0">
                <div class="card-header"><a class="btn btn-danger rounded-0 float-right" href="{{ route('antrian.create') }}?dealerID={{ $_GET['dealerID'] }}">Close</a></div>
                <div class="card-body">
                    <section class="print-section text-center">
                        <p class="mb-0 text-center">PT. SURYAPUTRA SARANA</p>
                        <p class="mb-0 text-center" style="font-size:8pt;">{{ $data->dealerID }}</p>
                        <h1 class="mb-0 text-center" style="font-size:64pt;">{{ str_pad($data->nomor, 3, '0', STR_PAD_LEFT) }}</h1>
                        <p class="mb-0 text-center">{{ $data->keterangan }}</p>
                        <br><br><br><br>
                        <p><sup>**terima kasih atas kunjungan anda**</sup></p>
                        <br>
                    </section>
                </div>
                <div class="card-footer">
                    <button id="btn-print" onclick="printDiv('.print-section');" class="btn btn-primary btn-block rounded-0">Print</button>
                </div>
            </div>
        </div>  
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<button class="print">Print this page</button>
@stop
@section('custom_script')
<script type="text/javascript">
$(document).ready(function($) {
  var ua = navigator.userAgent.toLowerCase();
  var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");

  $('button.print').click(function(e) {
    e.preventDefault();
    if (isAndroid) {
      // https://developers.google.com/cloud-print/docs/gadget
      var gadget = new cloudprint.Gadget();
      gadget.setPrintDocument("url", $('title').html(), window.location.href, "utf-8");
      gadget.openPrintDialog();
    } else {
      window.print();
    }
    return false;
  });
});
$( document ).ready(function() {
    $("#btn-print").click();
});
    function printDiv(elem) {
        renderMe($('<div/>').append($(elem).clone()).html());
    }
    var popupBlockerChecker = {
        check: function(popup_window){
            var scope = this;
            if (popup_window) {
                if(/chrome/.test(navigator.userAgent.toLowerCase())){
                    setTimeout(function () {
                        scope.is_popup_blocked(scope, popup_window);
                    },200);
                }else{
                    popup_window.onload = function () {
                        scope.is_popup_blocked(scope, popup_window);
                    };
                }
            } else {
                scope.displayError();
            }
        },
        is_popup_blocked: function(scope, popup_window){
            if ((popup_window.innerHeight > 0)==false){ 
                scope.displayError();
            }
        },
        displayError: function(){
            alert("Popup Blocker is enabled! Please add this site to your exception list.");
        }
    }
    function renderMe(data) {
        var mywindow = window.open('', 'print-section', 'height=' + screen.height + ',width=' + screen.width);
        popupBlockerChecker.check(mywindow);
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        setTimeout(function () {
            mywindow.print();
            mywindow.close();
        }, 1000)
        return true;
    }
</script>
@stop