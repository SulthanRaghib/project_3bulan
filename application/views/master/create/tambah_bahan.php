<div class="container">
   <hr>
   <div class="col-12 d-flex flex-row align-items-center justify-content-between pl-0">
      <h5 class="mb-0">Tambah Data Bahan</h5>
      <button type="button" class="btn btn-sm btn-warning float-right" data-toggle="modal" data-target="#batal">
         <i class="fa-solid fa-xmark pr-2"></i>Batal
      </button>
   </div>
   <hr>
   <form action="<?= base_url('Master/bahan_save'); ?>" method="post">
      <div class="row">

         <div class="col-md-3">
            <div class="form-group">
               <label for="last">NAMA BAHAN</label>
               <input type="text" class="form-control" name="nama_bahan">
            </div>
         </div>

         <div class="col-md-3">
            <div class="form-group">
               <label for="last">KATEGORI BAHAN</label>
               <select class="form-control" name="id_kategori">
                  <option selected disabled>-- PILIH KATEGORI --</option>
                  <?php foreach ($kategori as $k) { ?>
                     <option value="<?php echo $k['id']; ?>"><?php echo $k['nama_kategori']; ?></option>
                  <?php } ?>
               </select>
            </div>
         </div>

         <div class="col-md-3">
            <div class="form-group">
               <label for="last">HARGA BELI</label>
               <input type="number" class="form-control" name="harga_beli">
            </div>
         </div>

         <div class="col-md-3">
            <div class="form-group">
               <label for="last">HARGA JUAL</label>
               <input type="number" class="form-control" name="harga_jual">
            </div>
         </div>
      </div>
      <button class="btn btn-primary">Tambah Bahan</button>
   </form>
</div>

<div class="modal fade" id="batal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Ingin Membatalkan ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <p>Jika anda menekan tombol "Ya" maka data yang sudah anda masukkan akan Hilang !</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            <a href="<?= base_url('Master/data_bahan') ?>" type="button" class="btn btn-primary">Ya</a>
         </div>
      </div>
   </div>
</div>