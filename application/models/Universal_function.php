<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Universal_function extends CI_Model {

    //Query untuk mengambil data user saat pada menu form login
   function login($username, $password) {
        $sql = "select * from user where username='$username' and password='$password'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    //Query untuk melakukan penjumlahan dari data pelatihan dan pengujian
    function sum(){
        $siswa = $this->db->query("select sum(data1)data1,sum(data2)data2,sum(data3)data3,sum(data4)data4,sum(data5)data5,sum(data6)data6 from tb_pelatihan");
        return $siswa->result_array();
    }

    //Query untuk menghapus user
    function delete($table,$colom,$id){
        $delete = $this->db->query("delete from $table where $colom='$id'");
        return $delete;
    }

    //Query untuk mendapatka data dalam bentuk array dari sebuah tabel
    function getDataArray($table){
        $query = $this->db->query("select * from $table");
        if($query){
            return $query->result_array();
        }
    }

    //Query untuk mendapatkan salah satu isi data tertentu dari sebuah tabel yang kembalikan dalam
    //bentuk satu variabel saja (misal hanya mengambil satu field saja)
    function getOne($table,$colom,$colom_1,$id){
        $query = $this->db->query("select $colom from $table where $colom_1='$id'")->result_array();
        return $query[0][$colom];
    }

    //Queru untuk mndapatkan satu row data dari tabel dalam bentuk array
    function getDataArray_1($table,$colom,$id){
        $query = $this->db->query("select * from $table where $colom='$id'");
        return $query->result_array();
    }

    //Query untuk mencari nilai maksimal dari data pelatihan atau pengujian
    function max($table,$colom){
        $query = $this->db->query("select max($colom)max from $table")->result_array();
        return $query[0]['max'];
    }

    //Query untuk mencari nilai minimal dari data pelatihan atau pengujian
    function min($table,$colom){
        $query = $this->db->query("select min($colom)min from $table")->result_array();
        return $query[0]['min'];
    }

    //Qeuery untuk menyimpan data hasil pelatihan jaringan ke tabel result
    function result($mse,$iterasi,$k_jst,$lr_iw,$lr_ib,$lr_lw,$lr_lb,$mse_target){
        $query = $this->db->query("insert into result values('','$mse','$iterasi','$k_jst','$lr_iw','$lr_ib','$lr_lw','$lr_lb','$mse_target')");
        return $query;
    }

    //Query untuk menghapus isi dari tabel tertentu
    function truncate($table){
        $query = $this->db->query("truncate $table");
        return $query;
    }

    //Query untuk mengupdate row berdasarkan kolom yang sama dengan data lemparan
    function update($table,$colom,$fill,$colom1,$id){
        $query = $this->db->query("update $table set $colom='$fill' where $colom1=$id");
        return $query;
    }

    //Query untuk mengupdate row berdasarkan kolom yang tidak sama dengan data lemparan
    function update_0($table,$colom,$fill,$colom1){
        $query = $this->db->query("update $table set $colom='$fill' where $colom1!=$fill");
        return $query;
    }

    //Query untuk menyimpan data pelatihan atau pengujian kedalam database (digunakan saat fungsi upload data berjalan)
    function n_insert($table,$lokasi,$n_data1,$n_data2,$n_data3,$n_data4,$n_data5,$n_data6){
        $query = $this->db->query("insert into $table values('','$lokasi','$n_data1','$n_data2','$n_data3','$n_data4','$n_data5','$n_data6')");
        return $query;
    }

    //Query untuk mengupdate user
    function update_user($id_user,$nama,$username,$password,$alamat,$email){
        $query = $this->db->query("update user set nama='$nama',username='$username',password='$password',alamat='$alamat',email='$email' where id_user='$id_user'");
        return $query;
    }

    //Query untuk mengupdate persentase dari tabel markers setelah simulasi data pengujian dilakukan
    function markers($id,$persen){
        $query = $this->db->query("update markers set persen='$persen' where id='$id'");
        return $query;
    }

    //Query untuk menambah user tanpa sebuah gambar
    function insert($nama,$username,$password,$alamat,$email){
        $query = $this->db->query("insert into user values('','$nama','$username','$password','now()','$alamat','$email','')");
        return $query;
    }

    //Query untuk menambah user dengan sebuah gambar
    function insert_g($nama,$username,$password,$alamat,$email,$file_name){
        $query = $this->db->query("insert into user values('','$nama','$username','$password','now()','$alamat','$email','$file_name')");
        return $query;
    }

    //Query untuk mengupdate gambar pada user
    function update_gambar($file_name,$id_user){
        $query = $this->db->query("update user set foto='$file_name' where id_user='$id_user'");
        return $query;
    }

    //Query untuk mengupdate hasil keluaran jaringan
    function k_jst($table,$k_jst,$colom,$id){
        $query = $this->db->query("update $table set k_jst='$k_jst' where $colom='$id'");
        return $query;
    }

    //Query untuk mengupdate hasil keluaran jaringan
    function update_k_jst($table,$colom,$id_colom,$id,$nilai){
        $query = $this->db->query("update $table set $colom='$nilai' where $id_colom='$id'");
        return $query;
    }

    //Query untuk mengupdate hasil keluaran jaringan
    function update_k_jst_p($table,$colom,$id_colom,$id,$nilai,$percen){
        $query = $this->db->query("update $table set $colom='$nilai',persen='$percen' where $id_colom='$id'");
        return $query;
    }

    //Query untuk menghitung jumlah row dalam satu tabel
    function count($table,$colom,$inisial){
        $query = $this->db->query("select count($colom)$inisial from $table")->result_array();
        return $query[0][$inisial];
    }

    //Query untuk menyimpan bobot awal dan akhir setelah pelatihan pada layar tersembunyi
    function insert_hidden($x_1,$x_1e,$x_2,$x_2e,$x_3,$x_3e,$x_4,$x_4e,$x_5,$x_5e){
        $query = $this->db->query("insert into bobot_hidden values('','$x_1','$x_1e','$x_2','$x_2e','$x_3','$x_3e','$x_4','$x_4e','$x_5','$x_5e')");
        return $query;
    }
    
    //Query untuk menyimpan hasil inisialisasi bobot nguyen widraw
    function insert_inisial($x_1,$x_1e,$x_2,$x_2e,$x_3,$x_3e,$x_4,$x_4e,$x_5,$x_5e,$b_1,$b_1e){
        $query = $this->db->query("insert into inisialisasi values('','$x_1','$x_1e','$x_2','$x_2e','$x_3','$x_3e','$x_4','$x_4e','$x_5','$x_5e','$b_1','$b_1e')");
        return $query;
    }

    //Query untuk menyimpan bobot awal dan akhir setelah pelatihan pada layar keluaran
     function insert_output($w_1,$w_1e,$w_2,$w_2e,$w_3,$w_3e,$w_4,$w_4e,$w_5,$w_5e){
        $query = $this->db->query("insert into bobot_output values('','$w_1','$w_1e','$w_2','$w_2e','$w_3','$w_3e','$w_4','$w_4e','$w_5','$w_5e')");
        return $query;
    }

    //Query untuk menyimpan bias awal dan akhir setelah pelatihan pada layar tersembunyi
    function insert_b1($b_1,$b_1e){
        $query = $this->db->query("insert into bobot_b1 values('','$b_1','$b_1e')");
        return $query;
    }

     //Query untuk menyimpan bias awal dan akhir setelah pelatihan pada layar keluaran
    function insert_b2($b_2,$b_2e){
        $query = $this->db->query("insert into bobot_b2 values('','$b_2','$b_2e')");
        return $query;
    }

    //Query untuk reset data pembelajaran
    function reset(){
        $query = $this->db->query('truncate bobot_hidden');
        if($query){
        $query0 = $this->db->query('truncate bobot_output');
            if($query0){
                $query1 = $this->db->query('truncate bobot_b1');
                if($query1){
                    $query2 = $this->db->query('truncate bobot_b2');
                    if($query2){
                        $query3 = $this->db->query('truncate result');
                        if($query3){
                            $query4 = $this->db->query('truncate inisialisasi');
                            if($query4){
                                return $query4;
                            }
                        }
                    }
                }
            }
        }
    }

    //Query untuk reset data master
    function reset_1(){
        $query = $this->db->query('truncate tb_pelatihan');
        if($query){
        $query0 = $this->db->query('truncate tb_p_normalize');
            if($query0){
                $query1 = $this->db->query('truncate tb_pengujian');
                if($query1){
                    $query2 = $this->db->query('truncate tb_p_normalize_1');
                    if($query2){
                        $query3 = $this->db->query('truncate markers');
                        if($query3){
                            $query4 = $this->db->query('truncate bobot');
                            if($query4){
                                return $query4;
                            }
                        }
                    }
                }
            }
        }
    }

}