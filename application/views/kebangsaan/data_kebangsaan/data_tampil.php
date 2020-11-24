<!-- Default box -->
<div class="box">
    <div class="box-header">
        <table border="0">
            <tr>
                <td class="col-xs-6">
                    <h3 class="box-title" style="margin-left: -10px;">Data Kebangsaan Menurut Nama Kebangsaan</h3>
                </td>
                <td class="col-xs-2">
                    <button type="submit" class="btn bg-light-blue btn-flat" id="tambah" title="refresh" style="float: right; width: 50px; margin-left: 10px;" onclick="reload()">
                        <i class="fa fa-fw  fa-refresh"></i>
                    </button>
                    <button type="submit" class="" style="float: right;" id="delete" value='Delete' hidden>
                        <i class="fa fa-fw fa-times-circle"></i>Hapus Data
                    </button>
                    <button type="submit" class="btn bg-green btn-flat" id="tambah" style="float: right;" data-toggle="modal" data-target="#modal-default">
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
                        <th style="width: 30px;">Kebangsaan</th>
                        <th style="width: 30px;">Kategori Kebangsaan</th>
                        <th style="width: 30px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0 ?>
                    <?php foreach ($data_akomodasi as $dp) {
                        $row_id = $dp['id_kebangsaan']; ?>
                        <tr id='tr_<?= $row_id ?>'><?php $no++ ?>
                            <td align='center'><input type="checkbox" class='checkbox' name='delete' value='<?= $row_id ?>'></td>
                            <td><?php echo $no; ?></td>
                            <td data-target="kebangsaan"><?php echo $dp['kebangsaan']; ?></td>
                            <td data-target="grup"><?php echo $dp['grup']; ?></td>
                            <td>
                                <center>
                                    <form action="#" method="POST">
                                        <input type="text" id="id_kebangsaan-hidden<?= $row_id ?>" name="id_kebangsaan-hidden" value="<?php echo $dp['id_kebangsaan']; ?>" hidden>
                                        <input type="text" id="id_grup-hidden<?= $row_id ?>" name="id_grup-hidden" value="<?php echo $dp['id_grup']; ?>" hidden>
                                        <input type="text" id="grup-hidden<?= $row_id ?>" name="grup-hidden" value="<?php echo $dp['grup']; ?>" hidden>
                                        <input type="text" id="kebangsaan-hidden<?= $row_id ?>" name="kebangsaan-hidden" value="<?php echo $dp['kebangsaan']; ?>" hidden>
                                        <button type="button" id="<?= $row_id ?>" name="update" onclick="detail()" data-role="update" class="update btn bg-grey btn-flat">
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
                        <th style="width: 30px;">Kebangsaan</th>
                        <th style="width: 30px;">Kategori Kebangsaan</th>
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
                                url: '<?= base_url() ?>Kebangsaan/deleteData',
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
                                    $("#kolom-data").load("<?php echo site_url(); ?>Kebangsaan/col_data");
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