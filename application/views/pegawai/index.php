<!-- Content Wrapper. Contains page content -->
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header ">
            <h3 class="card-title">Data Master Pegawai</h3>


        </div>
        <div class="card-body">
            <table id="mydata" class="table  table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>TMT Mulai</th>
                        <th>Gol</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="show-data">

                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

<!-- /.content-wrapper -->
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
                                '<td><b>' + data[i].NAMA + '</b><br>' + data[i].NIP + '</td>' +
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