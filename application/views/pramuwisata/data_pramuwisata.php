<!-- Default box -->
<div class="box">
    <div class="box-header">
        <table border="0">
            <tr>
                <td class="col-xs-7">
                    <h3 class="box-title" style="margin-left: -10px;">Jumlah Pramuwisata Umum Aktif Menurut Kategori Tahun</h3>
                </td>
                <td class="col-xs-3">
                    <button type="submit" class="btn bg-light-blue btn-flat" id="tambah" style="float: right; width: 50px; margin-left: 10px;" onclick="reload()">
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
    <div id="tabel_akomodasi">
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px;"><input type="checkbox" id="checkall" value='1'>&nbsp;</th>
                        <th style="width: 10px;">No.</th>
                        <th style="width: 50px;">Spesific Language</th>
                        <th style="width: 30px;">Tahun</th>
                        <th style="width: 30px;">Jumlah</th>
                        <th style="width: 30px;">Keterangan</th>
                        <th style="width: 10px;">Dibuat Oleh</th>
                        <th style="width: 30px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0 ?>
                    <?php foreach ($data_pramuwisata as $dp) {
                        $row_id = $dp['id_pramuwisata']; ?>
                        <tr id='tr_<?= $row_id ?>'><?php $no++ ?>
                            <td align='center'><input type="checkbox" class='checkbox' name='delete' value='<?= $row_id ?>'></td>
                            <td><?php echo $no; ?></td>
                            <td data-target="language"><?php echo $dp['language']; ?></td>
                            <td data-target="tahun"><?php echo $dp['tahun']; ?></td>
                            <td data-target="jlh"><?php echo $dp['jumlah']; ?></td>
                            <td data-target="keterangan"><?php echo $dp['keterangan']; ?></td>
                            <td data-target="keterangan"><?php echo $dp['created_by']; ?> pada <a style="font-size: 9pt;"><?php echo $dp['created_at']; ?></a> </br>:: diupdate pada <a style="font-size: 9pt;"><?php echo $dp['updated_at']; ?></a>  </td>
                            <td>
                                <center>
                                    <form action="#" method="POST">
                                        <input type="text" id="id_pramuwisata-hidden<?= $row_id ?>" name="id_pramuwisata-hidden" value="<?php echo $dp['id_pramuwisata']; ?>" hidden>
                                        <input type="text" id="id_language-hidden<?= $row_id ?>" name="id_language-hidden" value="<?php echo $dp['id_pramuwisata_lang']; ?>" hidden>
                                        <input type="text" id="language-hidden<?= $row_id ?>" name="language-hidden" value="<?php echo $dp['language']; ?>" hidden>
                                        <input type="text" id="tahun-hidden<?= $row_id ?>" name="tahun-hidden" value="<?php echo $dp['tahun']; ?>" hidden>
                                        <input type="text" id="jlh_pramuwisata-hidden<?= $row_id ?>" name="jlh_pramuwisata-hidden" value="<?php echo $dp['jumlah']; ?>" hidden>
                                        <input type="text" id="ket-hidden<?= $row_id ?>" name="ket-hidden" value="<?php echo $dp['keterangan']; ?>" hidden>
                                        
                                        <button type="button" id="<?= $row_id ?>" name="update" onclick="detail()" data-role="update" data-id="<?php echo $dp['id_pramuwisata']; ?>" class="update btn bg-grey btn-flat">
                                            <i class="fa fa-fw fa-edit"></i>Details
                                        </button>
                                    </form>
                                </center>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th style="width: 10px;">No.</th>
                        <th style="width: 50px;">Spesific Language</th>
                        <th style="width: 30px;">Tahun</th>
                        <th style="width: 30px;">Jumlah</th>
                        <th style="width: 30px;">Keterangan</th>
                        <th style="width: 10px;">Dibuat Oleh</th>
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
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
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
                            url: '<?= base_url() ?>Bar/deleteData',
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
                                $("#kolom-data").load("<?php echo site_url(); ?>Bar/col_data");
                                // $("#kolom-data").slideToggle();
                            },
                            error: function(data) {
                                alert(data.responseText);
                            }
                        });
                    } else {
                        swal("Cancelled !!", "Hey, your imaginary file is safe !!", "error");
                    }
                }
            );
        });

    });
</script>