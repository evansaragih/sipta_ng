<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php
                                                                                                            echo "Halaman ini di eksekusi dalam waktu " . round($load, 2) . " detik! ";
                                                                                                            echo "Peak memory usage: " . round(memory_get_peak_usage() / 1048576, 2), " MB";
                                                                                                            ?>">
            <i class="fa fa-info"></i>
        </button>
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="https://disparda.baliprov.go.id/">Dinas Pariwisata Provinsi Bali </a>.</strong> All rights
    reserved.

</footer>