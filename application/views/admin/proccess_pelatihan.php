<script type="text/javascript">
    $(document).ready(function() {
        $("#loading").hide();
        $("#loading1").hide();
    });
    
    //Fungsi upload data pelatihan
    function upload(){
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var table = 'tb_pelatihan';
        var formdata = new FormData();
        var file = $('#file')[0].files[0];
        formdata.append("file", file);
        $("#loading").show();
        $(".save").hide();
        setTimeout(function() {
                $('#loading').fadeOut(1000);
        ajax.addEventListener("load", StatusHandler, false);
        ajax.open("POST", "<?php echo base_url() . 'admin/importdata/'; ?>"+table, false);
        ajax.send(formdata);
        }, 1000);
    }

    //Respon
    function StatusHandler(event) {
        var respon = event.target.responseText;
        console.log(event.target.responseText);
        if (respon === "success") {
            alert('Berhasil mengupload data !..');
            $('.save').show();
            getPelatihan();
        }else if (respon === "error") {
            alert('Gagal mengupload data !..');
            $('.save').show();
        }else if (respon === "invalid") {
            alert('Data tidak memenuhi syarat !..');
            $('.save').show();
        }else if (respon === "normalize") {
            alert('Data berhasil di transformasi !..');
            $('.normal').show();
            getPelatihan();
        }else if (respon === "trun") {
            alert('Data berhasil di reset !..');
            getPelatihan();
        }
    }

    //Fungsi proses normalisasidata pelatihan
   function transformasi(){
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var table = 'tb_pelatihan';
        $("#loading1").show();
        $(".normal").hide();
        setTimeout(function() {
                $('#loading').fadeOut(1000);
        ajax.addEventListener("load", StatusHandler, false);
        ajax.open("POST", "<?php echo base_url() . 'admin/transformasi/'; ?>"+table, false);
        ajax.send();
        }, 1000);
    }

    //Fungsi dproses reset data pengujian
   function reset(){
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var table = 'tb_pelatihan';
        $("#loading1").show();
        $(".trun").hide();
        setTimeout(function() {
                $('#loading1').fadeOut(1000);
        ajax.addEventListener("load", StatusHandler, false);
        ajax.open("POST", "<?php echo base_url() . 'admin/reset_data/'; ?>"+table, false);
        ajax.send();
        }, 1000);
    }


</script>