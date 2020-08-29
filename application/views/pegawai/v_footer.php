<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; <?= date('Y') ?> <a href="#">Mozax</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('vendor/AdminLTE-3.0.5') ?>/dist/js/demo.js"></script>



<!-- Ajax Ambil Data -->
<script type="text/javascript">
    $(document).ready(function() {
            // memanggil fungsi untuk menampilkan data
            tampildata();
            $('#mydata').dataTable();

            function tampildata() {
                $.ajax({
                    type: 'ajax',
                    url: '<?= base_url() ?>Pegawai/data_pegawai',
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        var no;
                        for (i = 0; i < data.length; i++) {
                            no = i + 1;
                            html += '<tr>' +
                                '<td>' + no +
                                '<td>' + data[i].NAMA + '<br>' + data[i].NIP + '</td>' +
                                '<td>' + data[i].KDJAB + '</td>' +
                                '<td>' + data[i].TMTGOL + '</td>' +
                                '<td>' + data[i].GOL + '</td>' +
                                '<td><button class="btn btn-block btn-info btn-sm">Detail</button></td>'

                            '</td></div>'

                            '</tr>';
                        }
                        $('#show-data').html(html);
                    }
                });
            }

            // function data_dua(){
            //     $.getJSON('<?= base_url() ?>Pegawai/data_pegawai', function(data){
            //             $.each(data, function(i,isi){
            //                 $('#show-data').append('<td>')
            //             })
            //     });

            // }
        }


    );
</script>

</body>

</html>