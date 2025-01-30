<!-- Cek isi tabel koordinat lokasi -->
<? if(!empty($nama_wilayah)){ ?>
<table id="deskripsi">
	<tr>
		<td id="lokasi"><? echo $nama_wilayah ?></td>
	</tr>
	<tr>
		<td>Target Promosi</td>
		<td>:</td>
		<td><? echo $target ?></td>
	</tr>
	<tr>
		<td>Hasil Prediksi</td>
		<td>:</td>
		<td><? echo $k_jst ?></td>
	</tr>
	<tr>
		<td>Persentase Keberhasilan Promosi</td>
		<td>:</td>
		<td><? echo $persen ?> %</td>
	</tr>
</table>
<br>

<!-- Knob plugin persentase keberhasilan promosi -->
<? $percentage = ($k_jst/$target)*100; ?>
<? if($percentage<60){?>
    <div class="knob-container">
        <input readonly type="text" class="knob" data-thickness="0.2" 
        data-anglearc="250" data-angleoffset="-125" value="<? echo $k_jst ?>" 
        data-width="200" data-height="200" data-fgcolor="red" data-max="<? echo $target ?>">
        <h3 class="text-muted text-center">Jumlah Siswa</h3>
    </div>
<? }else if($percentage>60 && $percentage<=75){?>
<div class="knob-container">
        <input readonly type="text" class="knob" data-thickness="0.2" 
        data-anglearc="250" data-angleoffset="-125" value="<? echo $k_jst ?>" 
        data-width="200" data-height="200" data-fgcolor="orange" data-max="<? echo $target ?>">
        <h3 class="text-muted text-center">Jumlah Siswa</h3>
    </div>
<? }else if($percentage>75 && $percentage<=100){ ?>
<div class="knob-container">
        <input readonly type="text" class="knob" data-thickness="0.2" 
        data-anglearc="250" data-angleoffset="-125" value="<? echo $k_jst ?>" 
        data-width="200" data-height="200" data-fgcolor="green" data-max="<? echo $target ?>">
        <h3 class="text-muted text-center">Jumlah Siswa</h3>
    </div>
<? }else if($percentage>100){ ?>
<div class="knob-container">
        <input readonly type="text" class="knob" data-thickness="0.2" 
        data-anglearc="250" data-angleoffset="-125" value="<? echo $k_jst ?>" 
        data-width="200" data-height="200" data-fgcolor="#00c0ef" data-max="<? echo $k_jst ?>">
        <h3 class="text-muted text-center">Jumlah Siswa</h3>
    </div>
<? } }else{?>
<table id="deskripsi">
	<tr>
		<td id="lokasi">Wilayah Tidak Terdaftar</td>
	</tr>
</table>
<br>
<? } ?>

<!-- CSS detail pemetaan lokasi-->
<style type="text/css">
	#deskripsi{
		font-weight: bold;
		font-size: 14px;
	}
	#lokasi{
		font-size: 24px;
	}
</style>

<!-- Plugin knob detail pemetaan lokasi -->
<script type="text/javascript">
	$(function() {
        $(".knob").knob();
    });
</script>