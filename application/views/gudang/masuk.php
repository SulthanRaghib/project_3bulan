<script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>


<div class="container">
  <h3>BARANG MASUK</h3>
  <div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Tanggal Order</th>
                <th>Tanggal Datang</th>
                
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Harga Barang</th>
                <th>Total Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($orderMasuk as $b){
            ?>
            <tr>
              <td><?php
$favcolor = $b->urgensi;

switch ($favcolor) {
  case "1":
    echo "<button class='btn btn-sm btn-danger'>SEGERA DIKERJAKAN</button>";
    break;
  default:
    echo "Tidak";
}
?></td>
                <td><?= $b->nama?></td>
                  
                <td><?=$b->tgl_order?></td>
                <td><?=$b->jumlah?></td>
                <td><?php
$favcolor = $b->status_bayar;

switch ($favcolor) {
  case "0":
    echo "<button class='btn btn-sm btn-danger'>Belum Lunas</button>";
    break;
    case "1":
    echo "<button class='btn btn-sm btn-success'>Sudah Lunas</button>";
    break;

  default:
    echo "Tidak";
}
?></td>
                <td><a class="btn btn-sm btn-primary" href="<?= base_url('Spk/ambil_kerja/'). $b->id_order;?>">Ambil Pekerjaan</td>
            </tr>
        <?php }?>
        </tbody>
       </table>
       </div>
</div>