<script type="text/javascript">
$(document).ready(function() {
        getTableUser();
    });

    //Fungsi menmapilkan tabel utama admin
    function getTableUser() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET", "<?php echo base_url();?>user/user_table", false);
        ajax.send();
        $(".user_table").html(ajax.responseText);
    }

    //Fungsi menmapilkan tabel utama admin
    function getInsert() {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        ajax.open("GET",  "<?php echo base_url();?>user/insert", false);
        ajax.send();
        $(".insert_user").html(ajax.responseText);

    }

    //Fungsi delete user
    function deleteUser(id_user) {
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        var a = confirm("Apakah anda yakin ingin hapus data SU-" + id_user);

        if (a === true) {
        $(".delete"+id_user).hide();
        $("#delete"+id_user).show();
        setTimeout(function() {
        $('#delete'+id_user).fadeOut(1000);
                ajax.addEventListener("load", StatusHandler, false);
                console.log( "<?php echo base_url();?>user/delete/" + id_user);
                ajax.open("GET",  "<?php echo base_url();?>user/delete/" + id_user, false);
                ajax.send();

            }, 1000);
        } else {
            console.log("Cancel");
        }
    }

    //Handling Action
    function StatusHandler(event) {
        var respon = event.target.responseText;
        console.log(event.target.responseText);
        if (respon === "deletesuccess") {
            alert('Hapus berhasil !..');
            getTableUser();
        } else if (respon === "deletefail") {
           alert('Hapus gagal !..');
        }if (respon === "ok") {
        alert('Update user berhasil !..');
            editOpen(dataNow);
            getTableUser();
            $('.saved').show();
        }else if (respon === "invalid") {
            alert('Username sudah digunakan !..');
            $('.saved').show();
        }else if (respon === "error") {
            alert('Update user gagal !..');
            $('.saved').show();
        }else if (respon === "saved") {
            alert('Simpan user berhasil !..');
            $('.saved').show();
            getInsert();
        }else if (respon === "error_1") {
            alert('Simpan user gagal !..');
            $('.saved').show();
            getInsert();
        }
    }

    //Fungsi edit modal
    function editOpen(id_user) {
        $('#user-edit').modal('show');
        dataNow = id_user;
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        ajax.open("GET",  "<?php echo base_url();?>user/detail/" + id_user, false);
        ajax.send();
        $(".modal-body-user").html(ajax.responseText);

    }

    //Fungsi update user
    function update_user() {

        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        var formdata = new FormData();
        var id_user = $('input[name="id_userEdit"]').val();
        var nama = $('input[name="namaEdit"]').val();
        var username = $('input[name="usernameEdit"]').val();
        var password = $('input[name="passwordEdit"]').val();
        var passwordCek = $('input[name="passwordEditCek"]').val();
        var alamat = $('textarea[name="alamatEdit"]').val();
        var email = $('input[name="emailEdit"]').val();
        var foto_edit = $('#foto_edit')[0].files[0];

        formdata.append("id_userEdit", id_user);
        formdata.append("namaEdit", nama);
        formdata.append("usernameEdit", username);
        formdata.append("passwordEdit", password);
        formdata.append("passwordEditCek", passwordCek);
        formdata.append("alamatEdit", alamat);
        formdata.append("emailEdit", email);
        formdata.append("foto_edit", foto_edit);

        $(".saved").hide();
        $("#waited").show();
        setTimeout(function() {
        $('#waited').fadeOut(1000);
        ajax.addEventListener("load", StatusHandler, false);
        ajax.open("POST", "<?php echo base_url() . 'user/update/'; ?>", false);
        ajax.send(formdata);
         }, 1000);
    }

    //Fungsi insert user
    function insertData() {

        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        var formdata = new FormData();
        var nama = $('input[name="nama"]').val();
        var username = $('input[name="username"]').val();
        var password = $('input[name="password"]').val();
        var passwordCek = $('input[name="passwordCek"]').val();
        var alamat = $('textarea[name="alamatUser"]').val();
        var email = $('input[name="emailUser"]').val();
        var foto_edit = $('#foto_admin')[0].files[0];

        formdata.append("nama", nama);
        formdata.append("username", username);
        formdata.append("password", password);
        formdata.append("passwordCek", passwordCek);
        formdata.append("alamatUser", alamat);
        formdata.append("emailUser", email);
        formdata.append("foto_admin", foto_edit);

        $(".saved").hide();
        $("#waited").show();
        setTimeout(function() {
        $('#waited').fadeOut(1000);
        ajax.addEventListener("load", StatusHandler, false);
        ajax.open("POST", "<?php echo base_url() . 'user/insertData/'; ?>", false);
        ajax.send(formdata);
         }, 1000);
    }

    //Fungsi update gambar
    function update_gambar() {

        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }

        var formdata = new FormData();
        var id_user = $('input[name="id_userEdit"]').val();
        var foto_edit = $('#foto_edit')[0].files[0];
        formdata.append("id_userEdit", id_user);
        formdata.append("foto_edit", foto_edit);

        $(".saved").hide();
        $("#waited").show();
        setTimeout(function() {
        $('#waited').fadeOut(1000);
        ajax.addEventListener("load", StatusHandler, false);
        ajax.open("POST", "<?php echo base_url() . 'user/update_gambar/'; ?>", false);
        ajax.send(formdata);
         }, 1000);
    }

</script>