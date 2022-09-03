
               <?php if($this->session->flashdata('order_berhasil')): ?>
             <script type="text/javascript">
               let timerInterval
Swal.fire({
  title: 'Order Berhasil!',
  html: 'Order telah di input, silahkan konfirmasi SPK!',
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
                    <?= $this->session->flashdata('order_berhasil') ?>
           
        <?php endif ?>
<div class="container">
   <hr>
         <h5>Data Customer & Urgensi</h5>
         <hr>
         <form action="<?= base_url('Order/tambah_order');?>" method="post" enctype="multipart/form-data">
   <div class="row">

  

    <div class="col-md-3">
        <div class="form-group">
          <label for="last">ID ORDER</label>
          <input type="text" class="form-control" value="<?= uniqid();?>" name="id_order" readonly>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="last">TANGGAL ORDER</label>
          <input type="date" class="form-control" name="tgl_order">
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="form-group">
          <label for="last">NO. PO</label>
          <input type="text" class="form-control" name="no_po">
        </div>
      </div>

      <div class="col-md-5">
        <div class="form-group">
          <label for="last">NAMA KONSUMEN</label>
           <select class="form-control" name="nama">
            <option selected disabled>-- PILIH KONSUMEN --</option>
                  <?php foreach($customer as $i){ ?>
                  <option value="<?php echo $i['id']; ?>"><?php echo $i['nama_customer']; ?></option>
                  <?php } ?></select><a style="margin-top:6px;" class="btn btn-primary btn-sm" href="<?= base_url('Master/tambah_konsumen');?>">Tambah Konsumen Baru</a>

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="last">NO. TELEPON</label>
          <input type="text" name="no_telp" class="form-control">
        </div>
        <input type="hidden" name="urgensi" value="0">
         <input type="checkbox" name="urgensi" value="1"> URGENT

      </div>


</div>
</div>


<div class="container">

   <hr>
         <h5>Spesifikasi & File Order</h5>
         <hr>

   <div class="row">
     <div class="col-md-3">
        <div class="form-group">
          <label for="last">Nama Pekerjaan</label>
          <input type="text" name="nama_kerja" class="form-control">
        </div>
      
        

      </div>

        <div class="col-md-3">
        <div class="form-group">
          <label for="last">Kategori</label>
          <select class="form-control" name="kategori" id="kategori"><?php foreach($kategori as $i){ ?>
                  <option value="<?php echo $i['id']; ?>"><?php echo $i['nama_kategori']; ?></option>
                  <?php } ?></select>
        </div>
      </div>

       <div class="col-md-3">
        <div class="form-group">
          <label for="last">Bahan Baku</label>
          <select class="form-control"  id="id" name="id_barang" onchange="return autofill();"><?php foreach($bahanBaku as $i){ ?>
                  <option value="<?php echo $i['id_bahan']; ?>"><?php echo $i['nama_bahan']; ?></option>
                  <?php } ?></select>
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="last">File Orderan</label>
          <input type="file" id="berkas" name="berkas" >
          <label>max. 100mb</label>
        </div>
      </div>
      


   </div>
         <hr>
         <h5>Ukuran</h5>
         <hr>
   <div class="row" id="hilang">
   <div class="col-md-3" >       
        <div class="form-group">
          <label for="last">Panjang</label>
          <input class="form-control" onchange="return autofill();" id="panjang" type="number" name="panjang">
           <small>Kosongkan jika bahan baku A3.</small>
        </div>
      </div>

      <div class="col-md-3" >
        <div class="form-group">
          <label for="last">Lebar</label>
          <input class="form-control" onchange="return autofill();" id="lebar" type="number" name="lebar">
        </div>
      </div>
      
      </div>
      <hr>
         <h5>Total Biaya</h5>
         <hr>
  <br>
  <div class="row">
  <div class="col-md-3">       
        <div class="form-group">
          <label for="last">Jumlah Order</label>
          <input class="form-control" onchange="return autofill();" id="jumlah" type="number" min="1" value="1" name="jumlah">
        </div>
      </div>
      <div class="col-md-3">       
        <div class="form-group">
          <label for="last">Finishing</label>
          <select name="finishing">
            <option value="0">Packing</option>
            <option value="1">Cutting</option>
            <option value="2">Seaming</option>
            <option value="3">Jilid</option>
          </select>
        </div>
      </div>
         <div class="col-md-12">
          <label for="last">Note Order</label>
          <br>
          <textarea class="form-control" name="catatan"></textarea>
      </div>
     <div class="col-md-3">       
        <div class="form-group">
          <label for="last">Biaya Cetak Satuan</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
              <i class="fa-solid fa-rupiah-sign"></i>
            </div>
          </div> 
          <input class="form-control" id="harga_jual" type="number" name="harga_bahan" readonly>
          </div>
        </div>
      </div>
     <div class="col-md-3">       
        <div class="form-group">
          <label for="last">Biaya Cetak</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
              <i class="fa-solid fa-rupiah-sign"></i>
            </div>
          </div> 
          <input class="form-control" id="harga_jual_semua" type="number" name="harga_bahan" readonly>
          </div>
        </div>
      </div>

        <div class="col-md-3">       
        <div class="form-group">
          <label for="last">Biaya Design</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
              <i class="fa-solid fa-rupiah-sign"></i>
            </div>
          </div> 
          <input class="form-control" type="number" name="biaya_design">
        </div>       
        </div>
      </div>
  </div>

<button class="btn btn-lg btn-primary">Submit</button>
</div>
</form>


<script>
    function autofill(){
        var id = document.getElementById('id').value;
        $.ajax({
                       url:"<?php echo base_url();?>/Order/cari",
                       data:'&id='+id,
                       success:function(data){
                           var hasil = JSON.parse(data);  
                      
                     
            $.each(hasil, function(key,val){ 

                var panjang = parseInt(document.getElementById('panjang').value);
                var lebar = parseInt(document.getElementById('lebar').value);
                var jumlah = parseInt(document.getElementById('jumlah').value);
                var hrgJual = parseInt(hasil[0].harga_jual);

              
                var totalUkuran = panjang+lebar;
                var totalHargaSatuan =  totalUkuran*hrgJual;
                var totalSemua = totalHargaSatuan*jumlah;
                console.log(totalUkuran);
                console.log(totalSemua);              

                document.getElementById('harga_jual').value=totalHargaSatuan; 
                document.getElementById('harga_jual_semua').value=totalSemua; 
                                
                     
                });
            }
                   });
                   
    }

    // $(document).ready(function () {
    // $('#kategori').on("change", function () {
    //     if ($(this).val()== 1) {
    //         $("#hilang").css("display", "none");
    //     }
    //     else{
    //         $("#hilang").css("display", "block");
    //     }
    // });
// })
</script>