
<!-- Pemanggil Javascript menu upload koordinat lokasi -->
<?php include('proccess_koordinat.php'); ?>

<!-- Header dan title dari menu upload koordinat lokasi -->
<div class="header">
    <h1 class="page-title"><? echo $tittle ?></h1>
    <ul class="breadcrumb">
        <li><a class="active" href="#">Admin</a> </li>
        <li class="active"><? echo $tittle ?></li>
    </ul>
</div>

<ul class="nav nav-tabs">
    <li class="active"><a id="pointer" href="#home" data-toggle="tab"><b>Form Upload Data Koordinat Lokasi</b></a></li>
</ul>
<br>
<!-- Form upload data koordinat lokasi -->
<form method="post">
    <table>
        <tr>
            <td style="font-size: 14px; font-weight: bold;">Pilih file</td>
            <td>:</td>
            <td>
            <div class="col-sm-8">
            <input type="file" class="form-control" id="file" placeholder="Pilih File">
            </div>
            </td>
            <td><div id="loading"><img src="<? base_url() ?>assets/images/ajax-loader.gif"> Mohon Tunggu ..</div>
            <? if(empty($markers)){ ?> 
            <a id="pointer" onclick="upload()" class="btn btn-primary save"><i class="fa fa-floppy-o"></i> Upload Data</a></td>
            <? }else{ ?>
            <a id="pointer" onclick="reset()" class="btn btn-primary reset"><i class="fa fa-refresh"></i> Reset Data</a></td>
            <? } ?>
        </tr>
    </table>
</form>
<hr>

<!-- Isi tabel koordinat wilayah promosi -->
<table id="koordinat" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th id="th1">ID Lokasi</th>
            <th>Nama Lokasi</th>
            <th>Latitude</th>
            <th id="th2">Longtitude</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th class="footer">ID Lokasi</th>
            <th class="footer">Nama Lokasi</th>
        </tr>
    </tfoot>
</table>
<br>
<br>

<script>
    $(document).ready(function() {
        //Fungsi untuk kolom pencarian pada footer table
        $('#koordinat tfoot th').each(function() {
            var title = $(this).text();
            var inp = '<input type="text" class="form-control" placeholder="' + title + '" />';
            $(this).html(inp);
        });

        //Fungsi untuk memanggil datatables di controller localhost/JST/tabel/datatables_koordinat
        //dan ditampilkan ke dalam tabel dengan id 
        var table = $('#koordinat').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('tabel/datatables_koordinat'); ?>",
                "type": "POST"
            }
        });

        //Fungsi ketika kolom pencarian terisi oleh data
        table.columns().every(function() {
            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                            .search(this.value)
                            .draw();
                }
            });
        });
    });
</script>

<!-- CSS menu upload koordinat lokasi -->
<style type="text/css">
	td{
		padding: 10px 20px;
	}
	.col-sm-8{
		width: 100%;
	}
    #norm{
        padding: 10px 20px;
        margin-left: 35%;
        font-weight: bold;
        font-style: italic;
    }
    #label1{
        margin-left: 25%;
        font-weight: bold;
        font-style: italic;
    }
    .active{
      font-size: 14px;
    }
</style>