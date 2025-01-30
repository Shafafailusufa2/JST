<!-- Form input tambah user -->
<div class="subContent">
    <div id="panel-form">            
            <div class="box-body">

            <form id="form_insert">


                <input id="foto_admin" type="file" name="foto_admin">
                <br>
                <br>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control span12" placeholder="Nama" onchange="cek();" >
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input id="username" type="username" name="username" class="form-control" placeholder="Username" onchange="cek();">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input id="passwordCek" type="password" name="passwordCek" class="form-control" placeholder="Password" onchange="cek();" >
                </div>

                  <div class="form-group">
                    <label>Ulangi Password</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Ulangi Password" onchange="cek();">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea id="alamatUser" type="text" name="alamatUser" class="form-control" placeholder="Alamat"></textarea>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input id="emailUser" type="text" name="emailUser" class="form-control" placeholder="Email"></input>
                </div>

                <a onclick="insertData();" class="btn btn-primary pull-left saved"><i class="fa fa-floppy-o"> Simpan</i></a>
                <a style="display: none;" id="waited" class="btn btn-primary pull-left"> Mohon tunggu ..</i></a>
            </form>
        </div>
    </div>
</div>


<!-- Fungsi validasi form data password -->
<script type="text/javascript">
$(document).ready(function(){
    $('#form_insert').validate({
        rules:{
            passwordCek:{
                minlength:8,
                maxlength:15
            },
            password :{
                equalTo:"#passwordCek"
            }
        },
        messages:{
            password:{
                equalTo:"Password tidak sama"
            },
            passwordCek:{ 
                minlength: "Password harus terdiri dari 8 digit",
                maxlength: "Password maksimal terdiri dari 15 digit"
            }
        }
    });
});

    //Fungsi untuk menjadikan id foto_admin dalam plugin picEdit
    $(function() {
        $('#foto_admin').picEdit({
            formSubmitted: function(ajax) {
                $('#message').html(ajax.response);
            }
        });
    });

    //Fungsi validasi form
    function cek() {

        var nama = _("nama").value;
        var username = _("username").value;
        var password = _("password").value;
        var passwordCek = _("passwordCek").value;
        var alamatAdmin = _("alamatUser").value;

        if (nama == '') {
            $('#nama').addClass("red");
            $('#nama').attr("placeholder", "Nama tidak boleh kosong");
        } else {
            $('#nama').removeClass("red");
            $('#nama').attr("placeholder", "Nama");
        }

        if (username == '') {
            $('#username').addClass("red");
            $('#username').attr("placeholder", "Username tidak boleh kosong");
        } else {
            $('#username').removeClass("red");
            $('#username').attr("placeholder", "Username");
        }

        if (password == '') {
            $('#password').addClass("red");
            $('#password').attr("placeholder", "Password tidak boleh kosong");
        } else {
            $('#password').removeClass("red");
            $('#password').attr("placeholder", "Password");
        }

        if (passwordCek == '') {
            $('#passwordCek').addClass("red");
            $('#passwordCek').attr("placeholder", "Password tidak boleh kosong");
        } else {
            $('#passwordCek').removeClass("red");
            $('#passwordCek').attr("placeholder", "Password");
        }

    }

    
</script>

<!-- CSS menu tambah user -->
<style type="text/css">
    #panel-form{
        border: 5px solid #ccc;
        border-radius:10px;
        margin-bottom: 20px;
    }
    .box-body{
        height: 600px;
        margin-bottom: 200px;
    }
</style>
