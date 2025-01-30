<!-- header dan title menu persentase wilayah -->
<div class="header">
    <h1 class="page-title"><? echo $tittle ?></h1>
    <ul class="breadcrumb">
        <li><a class="active" href="#">Admin</a> </li>
        <li class="active"><? echo $tittle ?></li>
    </ul>
</div>

<!-- 
Cek kondisi apakah tabel data pengujian tidak kosong dan apakah pelatihan sudah dilakukan 
data dilempar dari localhost/JST/admin/hasil
-->
<? if(!empty($name)) {?>

<!-- localhost/JST/pembelajaran/diagram_batang -->
<div id="mygraph"></div>


<script type="text/javascript">
//HJchart diagram batang menu persentase wilayah
	$(function () {
        var chart;
        $(document).ready(function() {
            //Mengambil properti diagram batang dari controller
            //localhost/JST/admin/diagram_batang
            $.getJSON("<?php base_url() ?>admin/diagram_batang/", function(json) {
            
                chart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'mygraph',
                        type: 'column'
                        
                    },
                    title: {
                        text: 'Persentase Wilayah Promosi'
                        
                    },
                    subtitle: {
                        text: ''
                    
                    },
                    xAxis: {
                        //Menambil nama dan persentase wilayah untuk ditampilkan di diagram batang
                        //data dilempar dari localhost/JST/admin/hasil
                        categories: <? echo json_encode($name) ?>
                    },
                     credits: {
					      enabled: false
					  },
                    yAxis: {
                        title: {
                            text: 'Persentase'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    tooltip: {
                        formatter: function() {
                                return '<b>'+ this.series.name +'</b><br/>'+
                                this.x +': '+ this.y;
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -10,
                        y: 120,
                        borderWidth: 0
                    },
                    series: json
                });
            });
        
        });
        
    });

</script>

<? }else{?>

<!-- Tampilan error jika kondisi tidak terpenuhi -->
<div class="dialog">
    <img src="<? base_url() ?>assets/images/simulasi.png" width="500" high="500">
</div>

<? } ?>

<!-- CSS persentasei wailayah -->
<style type="text/css">
	 #mygraph{
            margin-top: 10px;
            margin-bottom: 20px;
            zoom:150%;
            width: 100%;
    }
    .active{
      font-size: 14px;
    }
</style>