<div id="panel-form">
    <!-- 
    Menampilkan data array user yang akan di edit ke dalam form
    data dilempar dari localhost/JST/user/detail
     -->
    <? foreach ($detail as $list => $value) {}?>
    <form id="Form_edit" >
        <div class="form-group">
            <label>Nama</label>
            <input type="text" placeholder="Nama" onchange="cekAdmin();" value="<? echo $value['nama']?>" name="namaEdit" id="namaEdit" class="form-control">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input id="usernameEdit" placeholder="Username" onchange="cekAdmin();" value="<? echo $value['username']?>" type="username" name="usernameEdit" class="form-control" >
        </div>

        <div class="form-group">
            <label>Password</label>
            <input id="passwordEditCek" placeholder="Password" onchange="cekAdmin();" value="<? echo $value['password']?>" type="password" name="passwordEditCek" class="form-control">
        </div>

        <div class="form-group">
            <label>Ulangi Password</label>
            <input id="passwordEdit" placeholder="Password" onchange="cekAdmin();" value="<? echo $value['password']?>" type="password" name="passwordEdit" class="form-control">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea  id="alamatEdit" placeholder="Alamat" type="text" name="alamatEdit"  class="form-control"><? echo $value['alamat']?></textarea>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input  id="emailEdit" value="<? echo $value['email'] ?>" placeholder="Email" type="text" name="emailEdit"  class="form-control">
        </div>

        <input style="display: none;" type="text" value="<? echo $value['id_user']?>" name="id_userEdit">
    </form>
</div>

<div id="panel-table" style="width: 40%;">
    <br>
    
    <!-- Cek kondisi ketersediaan foto admin/user -->
    <? if(!empty($value['foto'])){ ?>
    <img type="file" height="200" width="300" src="<? echo base_url();?>uploads/<? echo $value['foto'];?>"><br><br>
    <? }else{ ?>
    <img type="file" height="200" width="300" src="<? echo base_url();?>assets/images/noimage.jpg"><br><br>
    <? } ?>
    <br>
    <br>
    <input id="foto_edit" type="file" name="file_edit" onchange="update_gambar();"><br>
</div>

<script type="text/javascript">

//Validasi input password
$(document).ready(function(){
    $('#Form_edit').validate({
        rules:{
            passwordEditCek:{
                minlength:8,
                maxlength:15
            },
            passwordEdit:{
                equalTo:"#passwordEditCek"
            }
        },
        messages:{
            passwordEdit:{
                equalTo:"Password tidak sama"
            },
            passwordEditCek:{ 
                minlength: "Password harus terdiri dari 8 digit",
                maxlength: "Password maksimal terdiri dari 15 digit"
            }
        }
    });
});

//Vaidasi form update user
function cekAdmin() {
        var nama = _("namaEdit").value;
        var username = _("usernameEdit").value;
        var password = _("passwordEdit").value;
        var passwordCek =_("passwordEditCek").value;

        if (nama == '') {
            $('#namaEdit').addClass("red");
            $('#namaEdit').attr("placeholder", "Nama tidak boleh kosong");
        } else {
            $('#namaEdit').removeClass("red");
            $('#namaEdit').attr("placeholder", "Nama");
        }

        if (username == '') {
            $('#usernameEdit').addClass("red");
            $('#usernameEdit').attr("placeholder", "Username tidak boleh kosong");
        } else {
            $('#usernameEdit').removeClass("red");
            $('#usernameEdit').attr("placeholder", "Username");
        }

        if (password == '') {
            $('#passwordEdit').addClass("red");
            $('#passwordEdit').attr("placeholder", "Password tidak boleh kosong");
        } else {
            $('#passwordEdit').removeClass("red");
            $('#passwordEdit').attr("placeholder", "Password");
        }

        if (passwordCek == '') {
            $('#passwordEditCek').addClass("red");
            $('#passwordEditCek').attr("placeholder", "Password tidak boleh kosong");
        } else {
            $('#passwordEditCek').removeClass("red");
            $('#passwordEditCek').attr("placeholder", "Password");
        }
}
</script>

