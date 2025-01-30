<!-- Header dan title dari menu dashboard -->
<div class="header">
    <h1 class="page-title"><? echo $tittle ?></h1>
    <ul class="breadcrumb">
        <li><a class="active" href="#">Admin</a> </li>
        <li class="active"><? echo $tittle ?></li>
    </ul>
</div>

<div class="col-md-3 col-sm-6">
    <div class="knob-container">
        <input readonly type="text" class="knob" data-thickness="0.2" 
        data-anglearc="250" data-angleoffset="-125" value="<? if(!empty($pelatihan)){echo $pelatihan;}else{echo 0;} ?>" 
        data-width="200" data-height="200" data-fgcolor="#00c0ef" data-max="100">
        <h3 class="text-muted text-center">Jumlah Data Pelatihan</h3>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="knob-container">
        <input readonly type="text" class="knob" data-thickness="0.2" 
        data-anglearc="250" data-angleoffset="-125" value="<?  if(!empty($pengujian)){echo $pengujian;}else{echo 0;}  ?>" data-width="200" 
        data-height="200" data-fgcolor="#00c0ef" data-max="100">
        <h3 class="text-muted text-center">Jumlah Data Pengujian</h3>
    </div>
</div>
 <div class="col-md-3 col-sm-6">
    <div class="knob-container">
        <input readonly type="text" class="knob" data-thickness="0.2" 
        data-anglearc="250" data-angleoffset="-125" value="<? if(!empty($result)){echo $result[0]['epoch'];}else{echo 0;} ?>" data-width="200" 
        data-height="200" data-fgcolor="#ecc508" data-max="30000">
        <h3 class="text-muted text-center">Jumlah Epoch Pembelajaran</h3>
    </div>
</div>

<div class="col-md-3 col-sm-6">
    <div class="knob-container">
        <input readonly type="text" class="knob" data-thickness="0.2" 
        data-anglearc="250" data-angleoffset="-125" value="<? if(!empty($min)){echo number_format($min,3);}else{echo 0;} ?>" data-width="200" 
        data-height="200" data-fgcolor="#0ce85a" data-max="0.001">
        <h3 class="text-muted text-center">MSE</h3>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="knob-container">
        <input readonly type="text" class="knob" data-thickness="0.2" 
        data-anglearc="250" data-angleoffset="-125" value="<?  if(!empty($siswa)){echo $siswa[0]['data1'];}else{echo 0;}  ?>" data-width="200" 
        data-height="200" data-fgcolor="#de765d" data-max="1000">
        <h3 class="text-muted text-center">Jumlah siswa Th.2011</h3>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="knob-container">
        <input readonly type="text" class="knob" data-thickness="0.2" 
        data-anglearc="250" data-angleoffset="-125" value="<?  if(!empty($siswa)){echo $siswa[0]['data2'];}else{echo 0;}  ?>" data-width="200" 
        data-height="200" data-fgcolor="#de765d" data-max="1000">
        <h3 class="text-muted text-center">Jumlah siswa Th.2012</h3>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="knob-container">
        <input readonly type="text" class="knob" data-thickness="0.2" 
        data-anglearc="250" data-angleoffset="-125" value="<?  if(!empty($siswa)){echo $siswa[0]['data3'];}else{echo 0;}  ?>" data-width="200" 
        data-height="200" data-fgcolor="#de765d" data-max="1000">
        <h3 class="text-muted text-center">Jumlah siswa Th.2013</h3>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="knob-container">
        <input readonly type="text" class="knob" data-thickness="0.2" 
        data-anglearc="250" data-angleoffset="-125" value="<?  if(!empty($siswa)){echo $siswa[0]['data4'];}else{echo 0;}  ?>" data-width="200" 
        data-height="200" data-fgcolor="#de765d" data-max="1000">
        <h3 class="text-muted text-center">Jumlah siswa Th.2014</h3>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="knob-container">
        <input readonly type="text" class="knob" data-thickness="0.2" 
        data-anglearc="250" data-angleoffset="-125" value="<?  if(!empty($siswa)){echo $siswa[0]['data5'];}else{echo 0;}  ?>" data-width="200" 
        data-height="200" data-fgcolor="#de765d" data-max="1000">
        <h3 class="text-muted text-center">Jumlah siswa Th.2015</h3>
    </div>
</div>
<div class="col-md-3 col-sm-6">
    <div class="knob-container">
        <input readonly type="text" class="knob" data-thickness="0.2" 
        data-anglearc="250" data-angleoffset="-125" value="<?  if(!empty($siswa)){echo $siswa[0]['data6'];}else{echo 0;}  ?>" data-width="200" 
        data-height="200" data-fgcolor="#de765d" data-max="1000">
        <h3 class="text-muted text-center">Jumlah siswa Th.2016</h3>
    </div>
</div>


<script type="text/javascript">
    //Memanggil plugin knob pada input yang memiliki id knob
    $(function() {
        $(".knob").knob();
    });
</script>

<!-- CSS menu dashboard -->
<style type="text/css">
    .active{
      font-size: 14px;
    }
</style>
