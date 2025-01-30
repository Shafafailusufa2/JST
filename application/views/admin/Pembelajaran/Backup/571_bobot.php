            <div class="panel-body" id="parameter">
		<label><b>Parameter Pembelajaran Jaringan</b></label>
		<input type="text" class="form-control" id="lr_iw" placeholder="Learning Rate Bobot Input" value="0.4000">
            <input type="text" class="form-control" id="lr_ib" placeholder="Learning Rate Bias Input" value="0.2000">
            <input type="text" class="form-control" id="lr_lw" placeholder="Learning Rate Bobot Lapisan" value="0.3500">
            <input type="text" class="form-control" id="lr_lb" placeholder="Learning Rate Bias Lapisan" value="0.2500">
                  <input type="text" class="form-control" id="mse" placeholder="Means Square Error" value="0.001">
                  <input type="text" class="form-control" id="epoch" placeholder="Maximum Epoch" value="20000">
            <textarea id="status"><?if(!empty($min)){$no=0;foreach ($data as $key => $value){$no++; printf("Epoch ke - ".$no." = ".$value."\n");} }?></textarea>
		</div>

		<div class="panel-body" id="panel-1">
		<label><b>Bobot Unit Tersembunyi</b></label><br>
            <div id="i_1">
		<label>x1</label>
			<input type="text" class="form-control" id="v11" placeholder="v11" value="0.2562">
			<input type="text" class="form-control" id="v12" placeholder="v12" value="-0.4762">
			<input type="text" class="form-control" id="v13" placeholder="v13" value="0.1623">
			<input type="text" class="form-control" id="v14" placeholder="v14" value="0.2886">
                  <input type="text" class="form-control" id="v15" placeholder="v15" value="-0.3887">
                  <input type="text" class="form-control" id="v16" placeholder="v16" value="0.4386">
                  <input type="text" class="form-control" id="v17" placeholder="v17" value="-0.1876">
            </div>
            <div id="i_2">
		<label>x2</label>
			<input type="text" class="form-control" id="v21" placeholder="v21" value="0.1962">
			<input type="text" class="form-control" id="v22" placeholder="v22" value="0.2133">
			<input type="text" class="form-control" id="v23" placeholder="v23" value="-0.0311">
			<input type="text" class="form-control" id="v24" placeholder="v24" value="-0.1711">
                  <input type="text" class="form-control" id="v25" placeholder="v25" value="0.3711">
                  <input type="text" class="form-control" id="v26" placeholder="v26" value="0.0714">
                  <input type="text" class="form-control" id="v27" placeholder="v27" value="0.4731">
            </div>
            <div id="i_3">
            <label>x3</label>
                  <input type="text" class="form-control" id="v31" placeholder="v31" value="0.2291">
                  <input type="text" class="form-control" id="v32" placeholder="v32" value="0.3612">
                  <input type="text" class="form-control" id="v33" placeholder="v33" value="-0.1082">
                  <input type="text" class="form-control" id="v34" placeholder="v34" value="0.0891">
                  <input type="text" class="form-control" id="v35" placeholder="v35" value="0.2009">
                  <input type="text" class="form-control" id="v36" placeholder="v36" value="-0.1806">
                  <input type="text" class="form-control" id="v37" placeholder="v37" value="-0.3809">
            </div>
            <div id="i_4">
            <label>x4</label>
                  <input type="text" class="form-control" id="v41" placeholder="v41" value="0.3081">
                  <input type="text" class="form-control" id="v42" placeholder="v42" value="0.2880">
                  <input type="text" class="form-control" id="v43" placeholder="v43" value="0.0312">
                  <input type="text" class="form-control" id="v44" placeholder="v44" value="0.4411">
                  <input type="text" class="form-control" id="v45" placeholder="v45" value="-0.2009">
                  <input type="text" class="form-control" id="v46" placeholder="v46" value="0.3403">
                  <input type="text" class="form-control" id="v47" placeholder="v47" value="0.1009">
            </div>
            <div id="i_5">
            <label>x5</label>
                  <input type="text" class="form-control" id="v51" placeholder="v51" value="-0.2962">
                  <input type="text" class="form-control" id="v52" placeholder="v52" value="0.3223">
                  <input type="text" class="form-control" id="v53" placeholder="v53" value="-0.0011">
                  <input type="text" class="form-control" id="v54" placeholder="v54" value="0.3101">
                  <input type="text" class="form-control" id="v55" placeholder="v55" value="0.2201">
                  <input type="text" class="form-control" id="v56" placeholder="v56" value="0.1556">
                  <input type="text" class="form-control" id="v57" placeholder="v57" value="0.2758">
            </div>
		</div>
		<div class="panel-body" id="panel-2">
            <div id="i_6">
		<label><b>Bias Unit Tersembunyi</b></label><br>
		<label>b1</label>
			<input type="text" class="form-control" id="v01" placeholder="v01" value="-0.2496">
			<input type="text" class="form-control" id="v02" placeholder="v02" value="0.3796">
			<input type="text" class="form-control" id="v03" placeholder="v03" value="0.2256">
			<input type="text" class="form-control" id="v04" placeholder="v04" value="-0.1628">
                  <input type="text" class="form-control" id="v05" placeholder="v05" value="0.3628">
                  <input type="text" class="form-control" id="v06" placeholder="v06" value="0.4548">
                  <input type="text" class="form-control" id="v07" placeholder="v07" value="0.0658">
            </div>
            <div id="i_7">
            <label><b>Bobot Unit Keluaran</b></label><br>
            <label>z1 - z5</label>
                  <input type="text" class="form-control" id="w1" placeholder="w1" value="0.2280">
                  <input type="text" class="form-control" id="w2" placeholder="w2" value="0.4585">
                  <input type="text" class="form-control" id="w3" placeholder="w3" value="0.3799">
                  <input type="text" class="form-control" id="w4" placeholder="w4" value="-0.0550">
                  <input type="text" class="form-control" id="w5" placeholder="w5" value="0.4550">
                  <input type="text" class="form-control" id="w6" placeholder="w6" value="-0.3098">
                  <input type="text" class="form-control" id="w7" placeholder="w7" value="-0.1590">
            </div>
            <div id="i_8">
            <label><b>Bias Unit Keluaran</b></label><br>
            <label>b2</label>
                  <input type="text" class="form-control" id="w0" placeholder="w0" value="0.3505">
            </div>
		</div>
