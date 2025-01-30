<!--
Form bobot yang menampilkan parameter dan isian bobot pada menu proses pembelajaran
bobot yang ditampilkan merupakan bobot pada yang sudah diupload pada menu upload bobot
data bobot lempar dari localhost/JST/pembelajaran/bobot_awal
-->

<!-- Form parameter jaringan -->
<div class="panel-body" id="parameter">
<label><b>Parameter Pembelajaran Jaringan</b></label>
	<input type="text" class="form-control" id="lr_iw" placeholder="Learning Rate Bobot Input" value="<? if(!empty($bobot)){ echo  $bobot[0]['param']; } ?>">
      <input type="text" class="form-control" id="lr_ib" placeholder="Learning Rate Bias Input" value="<? if(!empty($bobot)){ echo  $bobot[1]['param']; } ?>">
      <input type="text" class="form-control" id="lr_lw" placeholder="Learning Rate Bobot Lapisan" value="<? if(!empty($bobot)){ echo  $bobot[2]['param']; } ?>">
      <input type="text" class="form-control" id="lr_lb" placeholder="Learning Rate Bias Lapisan" value="<? if(!empty($bobot)){ echo  $bobot[3]['param']; } ?>">
      <input type="text" class="form-control" id="mse" placeholder="Means Square Error" value="<? if(!empty($bobot)){ echo  $bobot[4]['param']; } ?>">
      <input type="text" class="form-control" id="epoch" placeholder="Maximum Epoch" value="30000">
      <textarea id="status"><?if(!empty($data)){$no=0;foreach ($data as $key => $value){$no++; printf("Epoch ke - ".$no." = ".$value."\n");} }?></textarea>
</div>

<!-- Form bobot & bias layar tersembunyi -->
<div class="panel-body" id="panel-1">
<label><b>Bobot Unit Tersembunyi</b></label><br>
<div id="i_1">
	<label>x1</label>
	<input type="text" class="form-control" id="v11" placeholder="v11" value="<? if(!empty($bobot)){ echo  $bobot[0]['x1']; } ?>">
	<input type="text" class="form-control" id="v12" placeholder="v12" value="<? if(!empty($bobot)){ echo  $bobot[1]['x1']; } ?>">
	<input type="text" class="form-control" id="v13" placeholder="v13" value="<? if(!empty($bobot)){ echo  $bobot[2]['x1']; } ?>">
	<input type="text" class="form-control" id="v14" placeholder="v14" value="<? if(!empty($bobot)){ echo  $bobot[3]['x1']; } ?>">
      <input type="text" class="form-control" id="v15" placeholder="v15" value="<? if(!empty($bobot)){ echo  $bobot[4]['x1']; } ?>">
</div>
<div id="i_2">
	<label>x2</label>
	<input type="text" class="form-control" id="v21" placeholder="v21" value="<? if(!empty($bobot)){ echo  $bobot[0]['x2']; } ?>">
	<input type="text" class="form-control" id="v22" placeholder="v22" value="<? if(!empty($bobot)){ echo  $bobot[1]['x2']; } ?>">
	<input type="text" class="form-control" id="v23" placeholder="v23" value="<? if(!empty($bobot)){ echo  $bobot[2]['x2']; } ?>">
	<input type="text" class="form-control" id="v24" placeholder="v24" value="<? if(!empty($bobot)){ echo  $bobot[3]['x2']; } ?>">
      <input type="text" class="form-control" id="v25" placeholder="v25" value="<? if(!empty($bobot)){ echo  $bobot[4]['x2']; } ?>">
</div>
<div id="i_3">
<label>x3</label>
      <input type="text" class="form-control" id="v31" placeholder="v31" value="<? if(!empty($bobot)){ echo  $bobot[0]['x3']; } ?>">
      <input type="text" class="form-control" id="v32" placeholder="v32" value="<? if(!empty($bobot)){ echo  $bobot[1]['x3']; } ?>">
      <input type="text" class="form-control" id="v33" placeholder="v33" value="<? if(!empty($bobot)){ echo  $bobot[2]['x3']; } ?>">
      <input type="text" class="form-control" id="v34" placeholder="v34" value="<? if(!empty($bobot)){ echo  $bobot[3]['x3']; } ?>">
      <input type="text" class="form-control" id="v35" placeholder="v35" value="<? if(!empty($bobot)){ echo  $bobot[4]['x3']; } ?>">
</div>
<div id="i_4">
<label>x4</label>
      <input type="text" class="form-control" id="v41" placeholder="v41" value="<? if(!empty($bobot)){ echo  $bobot[0]['x4']; } ?>">
      <input type="text" class="form-control" id="v42" placeholder="v42" value="<? if(!empty($bobot)){ echo  $bobot[1]['x4']; } ?>">
      <input type="text" class="form-control" id="v43" placeholder="v43" value="<? if(!empty($bobot)){ echo  $bobot[2]['x4']; } ?>">
      <input type="text" class="form-control" id="v44" placeholder="v44" value="<? if(!empty($bobot)){ echo  $bobot[3]['x4']; } ?>">
      <input type="text" class="form-control" id="v45" placeholder="v45" value="<? if(!empty($bobot)){ echo  $bobot[4]['x4']; } ?>">
</div>
<div id="i_5">
<label>x5</label>
      <input type="text" class="form-control" id="v51" placeholder="v51" value="<? if(!empty($bobot)){ echo  $bobot[0]['x5']; } ?>">
      <input type="text" class="form-control" id="v52" placeholder="v52" value="<? if(!empty($bobot)){ echo  $bobot[1]['x5']; } ?>">
      <input type="text" class="form-control" id="v53" placeholder="v53" value="<? if(!empty($bobot)){ echo  $bobot[2]['x5']; } ?>">
      <input type="text" class="form-control" id="v54" placeholder="v54" value="<? if(!empty($bobot)){ echo  $bobot[3]['x5']; } ?>">
      <input type="text" class="form-control" id="v55" placeholder="v55" value="<? if(!empty($bobot)){ echo  $bobot[4]['x5']; } ?>">
</div>
</div>
<div class="panel-body" id="panel-2">
<div id="i_6">
<label><b>Bias Unit Tersembunyi</b></label><br>
	<label>b1</label>
	<input type="text" class="form-control" id="v01" placeholder="v01" value="<? if(!empty($bobot)){ echo  $bobot[0]['b1']; } ?>">
	<input type="text" class="form-control" id="v02" placeholder="v02" value="<? if(!empty($bobot)){ echo  $bobot[1]['b1']; } ?>">
	<input type="text" class="form-control" id="v03" placeholder="v03" value="<? if(!empty($bobot)){ echo  $bobot[2]['b1']; } ?>">
	<input type="text" class="form-control" id="v04" placeholder="v04" value="<? if(!empty($bobot)){ echo  $bobot[3]['b1']; } ?>">
      <input type="text" class="form-control" id="v05" placeholder="v05" value="<? if(!empty($bobot)){ echo  $bobot[4]['b1']; } ?>">
</div>

<!-- Bobot dan bias layar keluaran -->
<div id="i_7">
<label><b>Bobot Unit Keluaran</b></label><br>
<label>z1 - z5</label>
      <input type="text" class="form-control" id="w1" placeholder="w1" value="<? if(!empty($bobot)){ echo  $bobot[0]['z']; } ?>">
      <input type="text" class="form-control" id="w2" placeholder="w2" value="<? if(!empty($bobot)){ echo  $bobot[1]['z']; } ?>">
      <input type="text" class="form-control" id="w3" placeholder="w3" value="<? if(!empty($bobot)){ echo  $bobot[2]['z']; } ?>">
      <input type="text" class="form-control" id="w4" placeholder="w4" value="<? if(!empty($bobot)){ echo  $bobot[3]['z']; } ?>">
      <input type="text" class="form-control" id="w5" placeholder="w4" value="<? if(!empty($bobot)){ echo  $bobot[4]['z']; } ?>">
</div>
<div id="i_8">
<label><b>Bias Unit Keluaran</b></label><br>
<label>b2</label>
      <input type="text" class="form-control" id="w0" placeholder="w0" value="<? if(!empty($bobot)){ echo  $bobot[0]['b2']; } ?>">
</div>
</div>