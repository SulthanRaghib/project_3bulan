<script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>


<div class="container">
    <h3>Data Stok</h3>
    <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th class="col-2">Nama Bahan</th>
                    <th class="col-2">Kategori</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allPembayaran as $b) : ?>
                    <tr>
                        <td><?= $b->nama_bahan ?></td>
                        <td><?= $b->nama_kategori ?></td>
                        <td><?= $b->stok ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>