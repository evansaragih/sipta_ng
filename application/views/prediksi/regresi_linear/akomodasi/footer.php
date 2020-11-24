<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="https://disparda.baliprov.go.id/">Dinas Pariwisata Provinsi Bali </a>.</strong> All rights
    reserved.

    <?php
    $akhir = microtime(true);
    $lama = $akhir - $awal;
    echo "Halaman ini di eksekusi dalam waktu " . number_format($lama, 3, '.', '') . " detik!";
    ?>
</footer>