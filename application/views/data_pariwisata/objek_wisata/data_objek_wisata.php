<!-- Default box -->
<div class="box">
    <div class="box-header">
        <table border="0">
            <tr>
                <td class="col-xs-6">
                    <h3 class="box-title" style="margin-left: -10px;">Objek Wisata Provinsi Bali Pertahun</h3>
                </td>
                <td class="col-xs-3">
                    <button type="submit" class="btn bg-light-blue btn-flat" id="tambah" title="refresh" style="float: right; width: 50px; margin-left: 10px;" onclick="reload()">
                        <i class="fa fa-fw  fa-refresh"></i>
                    </button>
                    <button type="submit" class="btn bg-red btn-flat" style="float: right;" id="delete" value='Delete'>
                        <i class="fa fa-fw fa-times-circle"></i>Hapus Data
                    </button>
                    <button type="submit" class="btn bg-green btn-flat" id="tambah" style="float: right;" onclick="tambah()">
                        <i class="fa fa-fw fa-plus-circle"></i>Tambah Data
                    </button>
                </td>
            </tr>
        </table>
    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <div class="callout callout-picture">
            <div class="row">
                <form method="post" id="jpenumpang_pintu-masuk" action="<?php echo base_url("ObjekWisata/cari_data") ?>">
                    <div class="col-md-2">
                        <select class="form-control select2" id="tahun" name="tahun" style="width: 100%;" data-placeholder="Pilih Salah Satu" onchange="form.submit()">
                            <option value="semua">Semua Tahun</option>
                            <?php
                            $year_now = date('Y');
                            // $year_search = $year_now - 1;
                            for ($x = $year_now; $x >= 2000; $x--) {
                            ?>
                                <option value="<?php echo $x ?>" <?= $tahun == $x ? "selected" : null  ?>><?php echo $x ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="tabel_akomodasi">
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px;"><input type="checkbox" id="checkall" value='1'>&nbsp;</th>
                        <th style="width: 10px;">No.</th>
                        <th style="width: 30px;">Kabupaten/Kota</th>
                        <th style="width: 30px;">Objek Wisata</th>
                        <th style="width: 30px;">Tahun</th>
                        <th style="width: 30px;">Jenis Wisatawan</th>
                        <th style="width: 30px;">Jumlah Pengunjung</th>
                        <th style="width: 30px;">Action</th>
                    </tr>
                </thead>
                <tbody id="show_data">

                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th style="width: 10px;">No.</th>
                        <th style="width: 30px;">Kabupaten/Kota</th>
                        <th style="width: 30px;">Objek Wisata</th>
                        <th style="width: 30px;">Tahun</th>
                        <th style="width: 30px;">Jenis Wisatawan</th>
                        <th style="width: 30px;">Jumlah Pengunjung</th>
                        <th style="width: 30px;">Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<script>
    $(document).ready(function() {
        load_data();
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })

        function load_data() {
            $.ajax({
                type: 'ajax',
                url: "<?php echo base_url('ObjekWisata/data_objek_wisata_ajax/' . $tahun); ?>",
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var x = 0;
                    for (i = 0; i < data.length; i++) {
                        x++;
                        html += '<tr>' +
                            '<td align="center">' + '<input type="checkbox" class="checkbox" name="delete" value=' + data[i].id_objek_wisata + '>' + '</td>' +
                            '<td>' + x + '</td>' +
                            '<td>' + data[i].nama_objek_wisata + '</td>' +
                            '<td>' + data[i].kabupaten + '</td>' +
                            '<td>' + data[i].tahun + '</td>' +
                            '<td>' + data[i].jenis_wisatawan + '</td>' +
                            '<td>' + data[i].jumlah + '</td>' +
                            '<td>' +
                            '<input type="text" id="id_objek_wisata-hidden' + data[i].id_objek_wisata + '" name="id_objek_wisata-hidden" value="' + data[i].id_objek_wisata + '" hidden>' +
                            '<input type="text" id="kab-hidden' + data[i].id_objek_wisata + '" name="kab-hidden" value="' + data[i].kabupaten + '" hidden>' +
                            '<input type="text" id="tahun-hidden' + data[i].id_objek_wisata + '" name="tahun-hidden" value="' + data[i].tahun + '" hidden>' +
                            ' <input type="text" id="nama_objek_wisata-hidden' + data[i].id_objek_wisata + '" name="nama_objek_wisata-hidden" value="' + data[i].nama_objek_wisata + '" hidden>' +
                            ' <input type="text" id="alamat-hidden' + data[i].id_objek_wisata + '" name="alamat-hidden" value="' + data[i].alamat + '" hidden>' +
                            ' <input type="text" id="beroperasi_mulai-hidden' + data[i].id_objek_wisata + '" name="beroperasi_mulai-hidden" value="' + data[i].beroperasi_mulai + '" hidden>' +
                            '<input type="text" id="jenis_wisatawan-hidden' + data[i].id_objek_wisata + '" name="jenis_wisatawan-hidden" value="' + data[i].jenis_wisatawan + '" hidden>' +
                            '<input type="text" id="jlh_pengunjung-hidden' + data[i].id_objek_wisata + '" name="jlh_pengunjung-hidden" value="' + data[i].jumlah + '" hidden>' +
                            '<button type="button" id="' + data[i].id_objek_wisata + '" name="update" onclick="detail()" data-role="update" data-id="' + data[i].id_objek_wisata + '" class="update btn bg-grey btn-flat">' +
                            '<i class="fa fa-fw fa-edit"></i>Details' +
                            '</button>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            })
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        // Check all
        $("#checkall").change(function() {

            var checked = $(this).is(':checked');
            if (checked) {
                $(".checkbox").each(function() {
                    $(this).prop("checked", true);
                });
            } else {
                $(".checkbox").each(function() {
                    $(this).prop("checked", false);
                });
            }
        });

        // Changing state of CheckAll checkbox 
        $(".checkbox").click(function() {

            if ($(".checkbox").length == $(".checkbox:checked").length) {
                $("#checkall").prop("checked", true);
            } else {
                $("#checkall").prop("checked", false);
            }

        });

        // Delete button clicked
        $('#delete').click(function() {
            // Confirm alert
            var deleteConfirm = swal({
                    title: "Are you sure to delete ?",
                    text: "You will not be able to recover this imaginary file !!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it !!",
                    cancelButtonText: "No, cancel it !!",
                    closeOnConfirm: true,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    // Get userid from checked checkboxes
                    if (isConfirm) {
                        var users_arr = [];
                        $(".checkbox:checked").each(function() {
                            var userid = $(this).val();

                            users_arr.push(userid);
                        });

                        // Array length
                        var length = users_arr.length;

                        if (length > 0) {

                            // AJAX request
                            $.ajax({
                                url: '<?= base_url() ?>ObjekWisata/deleteData',
                                type: 'post',
                                data: {
                                    user_ids: users_arr
                                },
                                success: function(data) {
                                    console.log(data);
                                    // Remove <tr>
                                    $(".checkbox:checked").each(function() {
                                        var userid = $(this).val();

                                        $('#tr_' + userid).remove();
                                    });
                                    toastr.success('Data berhasil dihapus', 'Berhasil', {
                                        "positionClass": "toast-bottom-right",
                                        timeOut: 5000,
                                        "closeButton": true,
                                        "debug": false,
                                        "newestOnTop": true,
                                        "progressBar": true,
                                        "preventDuplicates": true,
                                        "onclick": null,
                                        "showDuration": "300",
                                        "hideDuration": "1000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "fadeIn",
                                        "hideMethod": "fadeOut",
                                        "tapToDismiss": false

                                    });
                                    $("#kolom-data").load("<?php echo base_url('ObjekWisata/col_data/' . $tahun); ?>");
                                    // $("#kolom-data").slideToggle();
                                },
                                error: function(data) {
                                    alert(data.responseText);
                                }
                            });
                        } else {
                            swal("Cancelled !!", "Hey, your imaginary file is safe !!", "error");
                        }
                    } else {
                        swal("Cancelled !!", "Hey, your imaginary file is safe !!", "error");
                    }
                }
            );
        });

    });
</script>