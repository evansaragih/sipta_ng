<div class="box-body total">
    <!-- ini tabel -->
    <p class="box-title" style="text-align: center; font-size: 13pt;">Data Jumlah Penumpang Menurut Pintu Masuk Penumpang <?php echo $tahun ?></p>
    <table id="pintu" class="table table-bordered table-striped" style="text-align: right">
        <thead>
            <tr style="background-color:#6e0006; color:white;">
                <th style="text-align: center; vertical-align: middle; width: 10px;">No.</th>
                <th style="text-align: center; vertical-align: middle; width: 10px;">Pintu Masuk</th>
                <th style="text-align: center; vertical-align: middle; width: 10px;">Total Penumpang</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            $total = 0; ?>
            <?php foreach ($data_penumpang as $dp) { ?>
                <tr>
                    <td style="text-align: center;"><?= $i; ?></td>
                    <td style="text-align: left;"><?= $dp['pintu_masuk'] ?></td>
                    <td><?php echo number_format($dp['jumlah']) ?></td>
                    <?php $total += $dp['jumlah']; ?>
                </tr>
                <?php $i++; ?>
            <?php } ?>
            <td></td>
            <td>Total Penumpang</td>
            <td><?php echo number_format($total) ?></td>
        </tbody>
    </table>
</div>