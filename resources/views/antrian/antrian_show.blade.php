@extends('layouts.app')
@section('title', $data->antrian_id)
@section('custom_style')
<style>
    @media print (max-width: 767px) {
   /* write css here for mobile responsive for print */
}
</style>
@stop
@section('content')
<button class="btn btn-sm mb-3 btn-secondary btn-block rounded-0" onclick="printDiv('.print-section');">Print</button>
    <section class="print-section text-center">
        <p>Nomor Antrian</p>
        <h1>{{ $data->nomor }}</h1>
        <span>{{ $data->jenis_id }}</span>
    </section>
@stop
@section('custom_script')
<script type="text/javascript">
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
        mywindow.document.write('<html><head><title>PRINT</title>');
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