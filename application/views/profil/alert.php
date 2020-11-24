<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="<?php echo base_url('assets/dist/js/toastr/toastr.min.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/css/toastr/toastr.min.css') ?>">
<?php if ($this->session->flashdata('success_profil')) { ?>
    <script type="text/javascript">
        toastr.success('Data telah disimpan', 'Profil Diperbaharui', {
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
    </script>
<?php } ?>
<?php if ($this->session->flashdata('success_password')) { ?>
    <script type="text/javascript">
        toastr.success('Password Baru telah disimpan', 'Password Diperbaharui', {
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
    </script>
<?php } ?>
<?php if ($this->session->flashdata('success_photo')) { ?>
    <script type="text/javascript">
        toastr.success('Foto telah disimpan', 'Foto Diperbaharui', {
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
    </script>
<?php } ?>
<?php if ($this->session->flashdata('duplicate')) { ?>
    <script type="text/javascript">
        toastr.warning('Data telah ada di Database', 'Tidak Disimpan', {
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

        })
    </script>
<?php } ?>
<?php if ($this->session->flashdata('failed')) { ?>
    <script type="text/javascript">
        toastr.error('Gagal mengganti password', 'Password Salah', {
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

        })
    </script>
<?php } ?>