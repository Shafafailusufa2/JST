<!-- Pemanggil Javascript untuk menu user -->
<?php include('proccess_user.php'); ?>

<!-- Header dan title dari user  -->
<div class="header">
    <h1 class="page-title"><? echo $tittle ?></h1>
    <ul class="breadcrumb">
        <li><a class="active" href="#">Admin</a> </li>
        <li class="active"><? echo $tittle ?></li>
    </ul>
</div>

<!-- Tab pilihan menu user, melihat tabel dan menyimpan data yan baru -->
<ul class="nav nav-tabs">
    <li class="active"><a id="pointer" class="home" href="#home" data-toggle="tab" onclick="getUser()">Data User</a></li>
    <li><a id="pointer" class="tambah" href="#tambah_data_user" data-toggle="tab" onclick="getInsert()"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</a></li>
</ul>
<br>

<div id="myTabContent" class="tab-content">

    <!-- Tab yang ditampilkan pada menu user -->
    <div class="tab-pane active in" id="home">
        <br>

        <!-- localhost/JST/user/user_table -->
        <div class="user_table"></div>
    </div>

    <!-- Tan yang digunakan untuk menampilkan for datma user -->
    <div class="tab-pane fade" id="tambah_data_user">

        <!-- localhost/JST/user/insert -->
        <div class="insert_user"></div>
    </div>
</div>

<!-- CSS menu user -->
<style type="text/css">
    .form-group{
        width: 100%;
    }
    .active{
      font-size: 14px;
    }
</style>
