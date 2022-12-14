<script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>

<?php if ($this->session->flashdata('kerja_selesai_finishing')) : ?>
   <script type="text/javascript">
      let timerInterval
      Swal.fire({
         title: 'Kerja Anda Selesai',
         html: 'Terimakasih Atas Kerja Kerasnya!',
         icon: 'success',
         timer: 1500,

         didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
         },
         willClose: () => {
            clearInterval(timerInterval)
         }
         
      })
   </script>
   <?= $this->session->flashdata('kerja_selesai_finishing') ?>
<?php endif ?>

<div class="container">
    <h3>List Pengiriman | Surat Jalan</h3>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nama Pekerjaan</th>
                <th>Nama Customer</th>
                <th>Kategori</th>
                <th>Tanggal Order</th>
                <th>Qty</th>
                <th>Status Bayar</th>
                <th>Status Pekerjaan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($orderMasuk as $b){
            ?>
            <tr>
                <td><?= $b->nama_kerja?></td>
                <td><?= $b->nama_customer?></td>
                  <td><?= $b->nama_kategori?></td>
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
                <td><?php
$favcolor = $b->status;

switch ($favcolor) {
  case "0":
    echo "<button class='btn btn-sm btn-danger'>Belum Dikerjakan</button>";
    break;
    case "1":
    echo "<button class='btn btn-sm btn-warning'>Sedang Dikerjakan</button>";
    break;
    case "2":
    echo "<button class='btn btn-sm btn-info'>Proses Finishing</button>";
    break;
    case "3":
    echo "<button class='btn btn-sm btn-success'>Selesai</button>";
    break;

  default:
    echo "Tidak";
}
?></td><td>
                             <a href="<?= base_url('Beranda/input_surat_jalan/'). $b->id_order;?>" style="margin-bottom: 2%;"  class="btn btn-sm btn-primary">Input Surat Jalan</a>

                                <a href="<?= base_url('Beranda/input_surat_jalan/'). $b->id_order;?>" style=""  class="btn btn-sm btn-success">Cetak Invoice</a>

  
</td>
            </tr>
        <?php }?>
        </tbody>
       </table>
</div>
 