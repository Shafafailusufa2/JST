<script type="text/javascript">
//Fungsi saat javascript membaca dokumen pertama kali 
    $(document).ready(function() {
        getDashboard();
    });

    function _(id) {
        return document.getElementById(id);
    }

//Fungsi menampilkan dasboard
    function getDashboard() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/dashboard", false);
        ajax.send();
        $(".content").html(ajax.responseText);

    }

//Fungsi menampilkan menu data pelatihan
    function getPelatihan() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/pelatihan", false);
        ajax.send();
        $(".content").html(ajax.responseText);

    }

    //Fungsi menampilkan menu data pelatihan
    function getBobot() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/bobot", false);
        ajax.send();
        $(".content").html(ajax.responseText);

    }

    //Fungsi menampilkan menu data pelatihan
    function getBobotAkhir() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/bobotAkhir", false);
        ajax.send();
        $(".content").html(ajax.responseText);

    }

//Fungsi menampilkan menu hasil prediksi
    function getHasil() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/hasil", false);
        ajax.send();
        $(".content").html(ajax.responseText);

    }


//Fungsi menampilkan menu data pengujian
    function getPengujian() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/pengujian", false);
        ajax.send();
        $(".content").html(ajax.responseText);
    }

//Fungsi menampilkan menu pembelajaran
    function getPembelajaran(){
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/pembelajaran", false);
        ajax.send();
        $(".content").html(ajax.responseText);
    }

//Fungsi menampilkan menu analisis pembelajaran
    function getAnalisis(){
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/analisis", false);
        ajax.send();
        $(".content").html(ajax.responseText);
    }

//Fungsi menampilkan menu analisis bobot
    function getInisialisasi(){
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/analisis_bobot", false);
        ajax.send();
        $(".content").html(ajax.responseText);
    }

//Fungsi menampilkan menu simulasi data pelatihan
    function getSimpe() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/simpe", false);
        ajax.send();
        $(".content").html(ajax.responseText);

    }

//Fungsi menampilkan menu simulasi data pengujian
    function getSimpe_1() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/simpe_1", false);
        ajax.send();
        $(".content").html(ajax.responseText);

    }
//Fungsi menampilkan menu analisis data pelatihan
    function getSimpelAnalis(){
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>peramalan/simpelanalis", false);
        ajax.send();
        $(".content").html(ajax.responseText);
    }

//Fungsi menampilkan menu analisis data pengujian
    function getSimpengAnalis(){
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>peramalan/simpenganalis", false);
        ajax.send();
        $(".content").html(ajax.responseText);
    }

//Fungsi menampilkan menu data user
    function getUser() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>user", false);
        ajax.send();
        $(".content").html(ajax.responseText);

    }

//Fungsi menampilkan maps
    function getMaps() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/view_maps", false);
        ajax.send();
        $(".content").html(ajax.responseText);

    }
//Fungsi menampilkan menu koordinat wilayah
    function koordinat() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/koordinat", false);
        ajax.send();
        $(".content").html(ajax.responseText);

    }


//Fungsi pemanggil modal logout
    function logout_modal(){
        $('#logout_modal').modal('show');
    }
//Fungsi pemanggil modal reset pembelajaran
    function reset_data_1(){
        $('#reset_data').modal('show');
    }

//Fungsi pemanggil modal reset data pelatihan
    function reset_data_2(){
        $('#reset_data_1').modal('show');
    }

//Fungsi Logout 
    function logout() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>login/logout/", false);
        ajax.send();
        window.location = "<?php base_url(); ?>login";
    }

//Fungsi Reset pembelajaran
    function reset_on() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/reset/", false);
        ajax.send();
        window.location = "<?php base_url(); ?>login";
    }

//Fungsi Reset data pelatihan dan pengujian
    function reset_on_1() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php base_url();?>admin/reset_1/", false);
        ajax.send();
        window.location = "<?php base_url(); ?>login";
    }


</script>

