<!-- Modal Logout -->
<div class="modal small fade" id="logout_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Konfirmasi Keluar</h3>
            </div> 
            <div class="modal-body-logout">
                <br>
                <br>
                <p class="error-text" style="margin-left: 3%;"><i class="fa fa-warning modal-icon"></i>Apakah anda yakin ingin keluar ?</p><br>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" onclick="logout();">Keluar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal User-->
<div class="modal fade" id="user-edit" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit User</h4>
            </div>
            <!-- localhost/JST/user/detail -->
            <div class="modal-body-user">
            </div>
            <div class="modal-footer">
                 <a onclick="update_user();" class="btn btn-primary pull-left saved" onmousedown="cekAdmin();"><i class="fa fa-floppy-o"> Simpan</i></a>
                 <a id="waited" style="display: none;" class="btn btn-primary pull-left"> Mohon tunggu ..</i></a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal small fade" id="reset_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Konfirmasi Reset Data</h3>
            </div> 
            <div class="modal-body-logout">
                <br>
                <br>
                <p class="error-text" style="margin-left: 3%;"><i class="fa fa-warning modal-icon"></i>Apakah anda yakin ingin mereset data ?</p><br>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" onclick="reset_on();">Reset</button>
            </div>
        </div>
    </div>
</div>

<div class="modal small fade" id="reset_data_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Konfirmasi Reset Data</h3>
            </div> 
            <div class="modal-body-logout">
                <br>
                <br>
                <p class="error-text" style="margin-left: 3%;"><i class="fa fa-warning modal-icon"></i>Apakah anda yakin ingin mereset data ?</p><br>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" onclick="reset_on_1();">Reset</button>
            </div>
        </div>
    </div>
</div>