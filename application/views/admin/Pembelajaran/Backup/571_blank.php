            <div class="panel-body" id="parameter">
		<label><b>Parameter Pembelajaran Jaringan</b></label>
		<input type="text" class="form-control" id="lr_iw" placeholder="Learning Rate Bobot Input">
            <input type="text" class="form-control" id="lr_ib" placeholder="Learning Rate Bias Input">
            <input type="text" class="form-control" id="lr_lw" placeholder="Learning Rate Bobot Lapisan">
            <input type="text" class="form-control" id="lr_lb" placeholder="Learning Rate Bias Lapisan">
			<input type="text" class="form-control" id="mse" placeholder="Means Square Error">
			<input type="text" class="form-control" id="epoch" placeholder="Maximum Epoch">
            <textarea id="status"><?if(!empty($min)){$no=0;foreach ($data as $key => $value){$no++; printf("Epoch ke - ".$no." = ".$value."\n");} }?></textarea>
		</div>

		<div class="panel-body" id="panel-1">
			<label><b>Bobot Unit Tersembunyi</b></label><br>
            <div id="i_1">
			<label>x1</label>
			<input type="text" class="form-control" id="v11" placeholder="v11">
			<input type="text" class="form-control" id="v12" placeholder="v12">
			<input type="text" class="form-control" id="v13" placeholder="v13">
			<input type="text" class="form-control" id="v14" placeholder="v14">
                  <input type="text" class="form-control" id="v15" placeholder="v15">
                  <input type="text" class="form-control" id="v16" placeholder="v16">
                  <input type="text" class="form-control" id="v17" placeholder="v17">
            </div>
            <div id="i_2">
			<label>x2</label>
			<input type="text" class="form-control" id="v21" placeholder="v21">
			<input type="text" class="form-control" id="v22" placeholder="v22">
			<input type="text" class="form-control" id="v23" placeholder="v23">
			<input type="text" class="form-control" id="v24" placeholder="v24">
                  <input type="text" class="form-control" id="v25" placeholder="v25">
                  <input type="text" class="form-control" id="v26" placeholder="v26">
                  <input type="text" class="form-control" id="v27" placeholder="v27">
            </div>
            <div id="i_3">
            <label>x3</label>
                  <input type="text" class="form-control" id="v31" placeholder="v31">
                  <input type="text" class="form-control" id="v32" placeholder="v32">
                  <input type="text" class="form-control" id="v33" placeholder="v33">
                  <input type="text" class="form-control" id="v34" placeholder="v34">
                  <input type="text" class="form-control" id="v35" placeholder="v35">
                  <input type="text" class="form-control" id="v36" placeholder="v36">
                  <input type="text" class="form-control" id="v37" placeholder="v37">
            </div>
            <div id="i_4">
            <label>x4</label>
                  <input type="text" class="form-control" id="v41" placeholder="v41">
                  <input type="text" class="form-control" id="v42" placeholder="v42">
                  <input type="text" class="form-control" id="v43" placeholder="v43">
                  <input type="text" class="form-control" id="v44" placeholder="v44">
                  <input type="text" class="form-control" id="v45" placeholder="v45">
                  <input type="text" class="form-control" id="v46" placeholder="v46">
                  <input type="text" class="form-control" id="v47" placeholder="v47">
            </div>
            <div id="i_5">
            <label>x5</label>
                  <input type="text" class="form-control" id="v51" placeholder="v51">
                  <input type="text" class="form-control" id="v52" placeholder="v52">
                  <input type="text" class="form-control" id="v53" placeholder="v53">
                  <input type="text" class="form-control" id="v54" placeholder="v54">
                  <input type="text" class="form-control" id="v55" placeholder="v55">
                  <input type="text" class="form-control" id="v56" placeholder="v56">
                  <input type="text" class="form-control" id="v57" placeholder="v57">
            </div>
		</div>
		<div class="panel-body" id="panel-2">
            <div id="i_6">
			<label><b>Bias Unit Tersembunyi</b></label><br>
			<label>b1</label>
			<input type="text" class="form-control" id="v01" placeholder="v01">
			<input type="text" class="form-control" id="v02" placeholder="v02">
			<input type="text" class="form-control" id="v03" placeholder="v03">
			<input type="text" class="form-control" id="v04" placeholder="v04">
                  <input type="text" class="form-control" id="v05" placeholder="v05">
                  <input type="text" class="form-control" id="v06" placeholder="v06">
                  <input type="text" class="form-control" id="v07" placeholder="v07">
            </div>
            <div id="i_7">
            <label><b>Bobot Unit Keluaran</b></label><br>
            <label>z1 - z5</label>
                  <input type="text" class="form-control" id="w1" placeholder="w1">
                  <input type="text" class="form-control" id="w2" placeholder="w2">
                  <input type="text" class="form-control" id="w3" placeholder="w3">
                  <input type="text" class="form-control" id="w4" placeholder="w4">
                  <input type="text" class="form-control" id="w5" placeholder="w5">
                  <input type="text" class="form-control" id="w6" placeholder="w6">
                  <input type="text" class="form-control" id="w7" placeholder="w7">
            </div>
            <div id="i_8">
            <label><b>Bias Unit Keluaran</b></label><br>
            <label>b2</label>
                  <input type="text" class="form-control" id="w0" placeholder="w0">
            </div>
		</div>
