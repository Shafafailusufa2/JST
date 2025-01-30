<!-- Menampilkan user yang terdaftar ke dalam tabel -->
<table id="user_view" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th id="th1">ID User</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th id="th2" style="width: 8%; resize: none;">Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th class="footer">User ID</th>
            <th class="footer">Nama</th>
            <th class="footer">Username</th>
            <th class="footer">Email</th>
        </tr>
    </tfoot>
</table>
<br>
<br>

<script>
    
    $(document).ready(function() {
       //Fungsi untuk kolom pencarian pada footer table
       $('#user_view tfoot th').each(function() {
            var title = $(this).text();
            var inp = '<input type="text" class="form-control" placeholder="' + title + '" />';
            $(this).html(inp);
        });

        //Fungsi untuk memanggil datatables di controller localhost/JST/tabel/datatables_user
        //dan ditampilkan ke dalam tabel dengan id user_view
        var table = $('#user_view').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('tabel/datatables_user'); ?>",
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

