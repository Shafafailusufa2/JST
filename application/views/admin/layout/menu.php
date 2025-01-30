<div class="sidebar-nav">
    <ul>
      
    <li><a href="#" data-target=".akun-menu" class="nav-header collapsed" data-toggle="collapse"><i class="glyphicon glyphicon-lock"></i> Akun <i class="fa fa-collapse"></i></a></li>
        <li>
            <ul class="akun-menu nav nav-list collapse">
                <li ><a id="pointer" onclick="getUser();" ><span class="glyphicon glyphicon-user"></span> User</a></li>
            </ul>
    </li>
    <li><a href="#" data-target=".pelatihan-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-database"></i> Data <i class="fa fa-collapse"></i></a></li>
        <li>
            <ul class="pelatihan-menu nav nav-list collapse">
                <li ><a id="pointer" onclick="getPelatihan();" ><span class="fa fa-table"></span> Data Pelatihan</a></li>
                <li ><a id="pointer" onclick="getPengujian();" ><span class="fa fa-list-alt"></span> Data Pengujian</a></li>
                <li ><a id="pointer" onclick="getBobot();" ><span class="glyphicon glyphicon-list"></span> Bobot & Bias</a></li>
            </ul>
           
    </li>
    <li><a href="#" data-target=".backpro-menu" class="nav-header collapsed" data-toggle="collapse"><i class="glyphicon glyphicon-stats"></i> Backpropagation <i class="fa fa-collapse"></i></a></li>
        <li>
            <ul class="backpro-menu nav nav-list collapse">
                <li ><a id="pointer" onclick="getPembelajaran();" ><span class="fa fa-spinner"></span> Proses Pembelajaran</a></li>
                <li ><a id="pointer" onclick="getBobotAkhir();" ><span class="fa fa-table"></span> Bobot & Bias Akhir</a></li>
                <li ><a id="pointer" onclick="getSimpe();" ><span class="fa fa-exchange"></span> Simulasi Data Pelatihan</a></li>
                <li ><a id="pointer" onclick="getSimpe_1();" ><span class="fa fa-bar-chart-o"></span> Simulasi Data Pengujian</a></li>
            </ul>
    </li>
   
    <li><a href="#" data-target=".reset-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-warning modal-icon"></i> Reset Data <i class="fa fa-collapse"></i></a></li>
        <li>
            <ul class="reset-menu nav nav-list collapse">
                <li ><a id="pointer" onclick="reset_data_1()" ><span class="fa fa-refresh"></span> Data Pembelajaran</a></li>
                <li ><a id="pointer" onclick="reset_data_2()" ><span class="fa fa-refresh"></span> Data Master</a></li>
            </ul>
            </ul>
    </li>
    </ul>

</div>

<script type="text/javascript">
    $("li a").on("click",function(){
        $(".selected").removeClass("selected");
        $(this).addClass("selected");
    });
</script>

<style type="text/css">
    .selected{
        background: #ccc;
    }
</style>