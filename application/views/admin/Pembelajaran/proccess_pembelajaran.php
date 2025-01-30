<script type="text/javascript">
   $(document).ready(function() {
         $("#loading").hide();
         bobot_blank();
    });
 
    //Fungsi menmapilkan tabel input data yang sudah di normalisasi
    function table_input() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        ajax.open("GET",  "<?php echo base_url();?>pembelajaran", false);
        ajax.send();
        $(".table-input").html(ajax.responseText);
    }

    //Fungsi menmapilkan bobot kosong
    function bobot_blank() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        ajax.open("GET",  "<?php echo base_url();?>pembelajaran/bobot_blank", false);
        ajax.send();
        $("#bobot").html(ajax.responseText);
    }

    //Fungsi menmapilkan bobot awal
    function fill() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        ajax.open("GET",  "<?php echo base_url();?>pembelajaran/bobot_awal", false);
        ajax.send();
        $("#bobot").html(ajax.responseText);
    }

    //Fungsi memproses inisialisasi bobot nguyen widraw
    function inisial() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var formdata = new FormData();
        //Bobot Unit Tersembunyi
        var v11 = _("v11").value;
        var v12 = _("v12").value;
        var v13 = _("v13").value;
        var v14 = _("v14").value;
        var v15 = _("v15").value;

        var v21 = _("v21").value;
        var v22 = _("v22").value;
        var v23 = _("v23").value;
        var v24 = _("v24").value;
        var v25 = _("v25").value;

        var v31 = _("v31").value;
        var v32 = _("v32").value;
        var v33 = _("v33").value;
        var v34 = _("v34").value;
        var v35 = _("v35").value;

        var v41 = _("v41").value;
        var v42 = _("v42").value;
        var v43 = _("v43").value;
        var v44 = _("v44").value;
        var v45 = _("v45").value;

        var v51 = _("v51").value;
        var v52 = _("v52").value;
        var v53 = _("v53").value;
        var v54 = _("v54").value;
        var v55 = _("v55").value;

        //Bias Unit Tersembunyi
        var v01 = _("v01").value;
        var v02 = _("v02").value;
        var v03 = _("v03").value;
        var v04 = _("v04").value;
        var v05 = _("v05").value;

        //Bobot Unit Tersembunyi
        formdata.append("v11",v11);
        formdata.append("v12",v12);
        formdata.append("v13",v13);
        formdata.append("v14",v14);
        formdata.append("v15",v15);

        formdata.append("v21",v21);
        formdata.append("v22",v22);
        formdata.append("v23",v23);
        formdata.append("v24",v24);
        formdata.append("v25",v25);

        formdata.append("v31",v31);
        formdata.append("v32",v32);
        formdata.append("v33",v33);
        formdata.append("v34",v34);
        formdata.append("v35",v35);

        formdata.append("v41",v41);
        formdata.append("v42",v42);
        formdata.append("v43",v43);
        formdata.append("v44",v44);
        formdata.append("v45",v45);

        formdata.append("v51",v51);
        formdata.append("v52",v52);
        formdata.append("v53",v53);
        formdata.append("v54",v54);
        formdata.append("v55",v55);

        //Bias Unit Tersembunyi
        formdata.append("v01",v01);
        formdata.append("v02",v02);
        formdata.append("v03",v03);
        formdata.append("v04",v04);
        formdata.append("v05",v05);

        if(v11!='' && v12!='' && v13!='' && v14!='' && v15!='' &&
            v21!='' && v22!='' && v23!='' && v24!='' && v25!='' &&
            v31!='' && v32!='' && v33!='' && v34!='' && v35!='' &&
            v41!='' && v42!='' && v43!='' && v44!='' && v45!='' &&
            v51!='' && v52!='' && v53!='' && v54!='' && v55!='' &&
            v01!='' && v02!='' && v03!='' && v04!='' && v05!=''){
        ajax.open("POST", "<?php echo base_url() . 'pembelajaran/inisial/'; ?>", false);
        ajax.send(formdata);
        $("#bobot").html(ajax.responseText);
        }else{
            alert('Bobot tidak lengkap !!..');
        }
    }

    //Fungsi memproses inisialisasi bobot nguyen widraw
    function analisis_inisial() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("POST", "<?php echo base_url() . 'pembelajaran/analisis_inisial/'; ?>", false);
        ajax.send();
        $("#inisial").html(ajax.responseText);
    }

    //Fungsi pembelajaran (lempar data ke controller)
    function mulai() {

        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        var formdata = new FormData();
        //Parameter pembelajaran
        var lr_iw = _("lr_iw").value;
        var lr_ib = _("lr_ib").value;
        var lr_lw = _("lr_lw").value;
        var lr_lb = _("lr_lb").value;
        var mse = _("mse").value;
        var epoch = _("epoch").value;

        //Bobot Unit Tersembunyi
        var v11 = _("v11").value;
        var v12 = _("v12").value;
        var v13 = _("v13").value;
        var v14 = _("v14").value;
        var v15 = _("v15").value;

        var v21 = _("v21").value;
        var v22 = _("v22").value;
        var v23 = _("v23").value;
        var v24 = _("v24").value;
        var v25 = _("v25").value;

        var v31 = _("v31").value;
        var v32 = _("v32").value;
        var v33 = _("v33").value;
        var v34 = _("v34").value;
        var v35 = _("v35").value;

        var v41 = _("v41").value;
        var v42 = _("v42").value;
        var v43 = _("v43").value;
        var v44 = _("v44").value;
        var v45 = _("v45").value;

        var v51 = _("v51").value;
        var v52 = _("v52").value;
        var v53 = _("v53").value;
        var v54 = _("v54").value;
        var v55 = _("v55").value;

        //Bias Unit Tersembunyi
        var v01 = _("v01").value;
        var v02 = _("v02").value;
        var v03 = _("v03").value;
        var v04 = _("v04").value;
        var v05 = _("v05").value;

        //Bobot Unit Keluaran
        var w1 = _("w1").value;
        var w2 = _("w2").value;
        var w3 = _("w3").value;
        var w4 = _("w4").value;
        var w5 = _("w5").value;

        //Bias Unit Keluar
        var w0 = _("w0").value;

        //Parameter pembelajaran
        formdata.append("lr_iw",lr_iw);
        formdata.append("lr_ib",lr_ib);
        formdata.append("lr_lw",lr_lw);
        formdata.append("lr_lb",lr_lb);
        formdata.append("mse",mse);
        formdata.append("epoch",epoch);

        //Bobot Unit Tersembunyi
        formdata.append("v11",v11);
        formdata.append("v12",v12);
        formdata.append("v13",v13);
        formdata.append("v14",v14);
        formdata.append("v15",v15);

        formdata.append("v21",v21);
        formdata.append("v22",v22);
        formdata.append("v23",v23);
        formdata.append("v24",v24);
        formdata.append("v25",v25);

        formdata.append("v31",v31);
        formdata.append("v32",v32);
        formdata.append("v33",v33);
        formdata.append("v34",v34);
        formdata.append("v35",v35);

        formdata.append("v41",v41);
        formdata.append("v42",v42);
        formdata.append("v43",v43);
        formdata.append("v44",v44);
        formdata.append("v45",v45);

        formdata.append("v51",v51);
        formdata.append("v52",v52);
        formdata.append("v53",v53);
        formdata.append("v54",v54);
        formdata.append("v55",v55);

        //Bias Unit Tersembunyi
        formdata.append("v01",v01);
        formdata.append("v02",v02);
        formdata.append("v03",v03);
        formdata.append("v04",v04);
        formdata.append("v05",v05);

        //Bobot Unit Keluaran
        formdata.append("w1",w1);
        formdata.append("w2",w2);
        formdata.append("w3",w3);
        formdata.append("w4",w4);
        formdata.append("w5",w5);

        //Bias Unit Keluaran
        formdata.append("w0",w0);

        if(v11!='' && v12!='' && v13!='' && v14!='' && v15!='' &&
            v21!='' && v22!='' && v23!='' && v24!='' && v25!='' &&
            v31!='' && v32!='' && v33!='' && v34!='' && v35!='' &&
            v41!='' && v42!='' && v43!='' && v44!='' && v45!='' &&
            v51!='' && v52!='' && v53!='' && v54!='' && v55!='' &&
            v01!='' && v02!='' && v03!='' && v04!='' && v05!='' &&
            w0!='' && w1!='' && w2!='' && w3!='' && w4!='' && w5!='' &&
            lr_iw!='' && lr_ib!='' && lr_lw!='' && lr_lb!='' && epoch!='' && mse!=''){
        $(".mulai").hide();
        $("#loading").show();
        setTimeout(function() {
        $('#loading').fadeOut(1000);
        ajax.addEventListener("load", StatusHandler, false);
        ajax.open("POST", "<?php echo base_url() . 'pembelajaran/learning/'; ?>", false);
        ajax.send(formdata);
         }, 1000);
        }else{
            alert('Bobot tidak lengkap !!..');
        }
    }

    //Fungsi untuk menampilkan status dari pembelajaran jaringan
    function StatusHandler(event) {
        var respon = event.target.responseText;
        console.log(event.target.responseText);
        if (respon === "goal") {
            alert('PERFORMANCE GOAL MEET  !..');
            $('.mulai').show();
            getPembelajaran();
        }else if (respon === "fail") {
            alert('PERFORMANCE NOT MEET !..');
            $('.mulai').show();
            getPembelajaran();
        }else if (respon === "stop") {
            alert('KEMAMPUAN GENERASI JARINGAN TERHENTI !..');
            $('.mulai').show();
            getPembelajaran();
        }
    }


</script>