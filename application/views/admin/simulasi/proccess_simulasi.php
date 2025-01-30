<script type="text/javascript">
	$('#loading').hide();

    //Fungsi simulasi data pelatihan (propagasi maju)
	 function peramalan() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        $(".mulai").hide();
        $("#loading").show();
        setTimeout(function() {
        $('#loading').fadeOut(1000);
        ajax.addEventListener("load", StatusHandler, false);
        ajax.open("GET",  "<?php echo base_url();?>peramalan/pelatihan", false);
        ajax.send();
    }, 1000);
    }

    //Fungsi simulasi data pengujian (propagasi maju)
    function peramalan_1() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        $(".mulai").hide();
        $("#loading").show();
        setTimeout(function() {
        $('#loading').fadeOut(1000);
        ajax.addEventListener("load", StatusHandler, false);
        ajax.open("GET",  "<?php echo base_url();?>peramalan/pengujian", false);
        ajax.send();
    }, 1000);
    }

    //Respon
    function StatusHandler(event) {
        var respon = event.target.responseText;
        console.log(event.target.responseText);
        if (respon === "success") {
            alert('Simulasi selesai  !..');
            $('.mulai').show();
            getSimpe();
        }if (respon === "success_1") {
            alert('Simulasi selesai  !..');
            $('.mulai').show();
            getSimpe_1();
        }
    }
</script>