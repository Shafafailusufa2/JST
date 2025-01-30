<script type="text/javascript">
        $(document).ready(function() {
        $("#loading").hide();
        $("#loading1").hide();
    });

    //Fungsi upload data koordinat wilayah promosi
    function upload(){
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var table = 'markers';
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

    //Fungsi reset data koordinat wilayah promosi
    function reset(){
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        $("#loading").show();
        $(".reset").hide();
        setTimeout(function() {
                $('#loading').fadeOut(1000);
        ajax.addEventListener("load", StatusHandler, false);
        ajax.open("POST", "<?php echo base_url() . 'admin/reset_koordinat/'; ?>", false);
        ajax.send();
        }, 1000);
    }

    //Respon
    function StatusHandler(event) {
        var respon = event.target.responseText;
        console.log(event.target.responseText);
        if (respon === "success") {
            alert('Berhasil mengupload data !..');
            $('.save').show();
            koordinat();
        }else if (respon === "error") {
            alert('Gagal mengupload data !..');
            $('.save').show();
        }else if (respon === "invalid") {
            alert('Data tidak memenuhi syarat !..');
            $('.save').show();
        }else if (respon === "reset") {
            alert('Data berhasil di reset !..');
            $('.reset').show();
            koordinat();
        }
    }
</script>