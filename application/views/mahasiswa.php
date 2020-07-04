<div class="content-wrapper">
<section class="content-header">
      <h1>
        Data Mahasiswa
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Mahasiswa</li>
      </ol>
    </section>

    <section class="contet">
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tamabah Data Mahasiswa</button>
        <table class="table">
            <tr>
                <th>NO</th>
                <th>NAMA MAHASISWA</th>
                <th>NIM</th>
                <th>TANGGAL LAHIR</th>
                <th>JURUSAN</th>
                <th colspan="2">AKSI</th>
            </tr>

          <?php 
          $no = 1;
          foreach($mahasiswa as $mhs):?>
       
           <tr>
              <td><?php echo $no++?> </td>
              <td><?php echo $mhs->nama?></td>
              <td><?php echo $mhs->nim?></td>
              <td><?php echo $mhs->tgl_lahir?></td>
              <td><?php echo $mhs->jurusan?></td>
              <td><?php echo anchor('mahasiswa/detail/'.$mhs->id,'<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>')?></td>
              <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('mahasiswa/hapus/'.$mhs->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
              <td><?php echo anchor('mahasiswa/edit/'.$mhs->id, '<button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>')?></td>
          </tr> 

          <?php endforeach; ?> 
        </table>

    </section>
    
        <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA MAHASISWA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <!-- <form method="POST" action="//<?php echo base_url().'mahasiswa/tambah_aksi'; ?>"> -->

         <?php echo form_open_multipart('mahasiswa/tambah_aksi');?>

         <div class="form-group">
           <label>Nama Mahasiswa</label>
           <input type="text" name="nama" class="form-control">
         </div>
         <div class="form-group">
           <label>NIM</label>
           <input type="text" name="nim" class="form-control">
         </div>
         <div class="form-group">
           <label>Tanggal Lahir</label>
           <input type="date" name="tgl_lahir" class="form-control">
         </div>
         <div class="form-group">
           <label>Jurusan</label>
           <!-- <input type="text" name="jurusan" class="form-control"> -->
           <select name="jurusan" class="form-control">
             <option>Web Developer</option>
             <option>Web Designer</option>
             <option>full stack Developer</option>
           </select>
         </div>

         <div class="form-group">
           <label>Alamat</label>
           <input type="text" name="alamat" class="form-control">
         </div>

         <div class="form-group">
           <label>Email</label>
           <input type="text" name="email" class="form-control">
         </div>

         <div class="form-group">
           <label>No. Telepon</label>
           <input type="text" name="no_telpon" class="form-control">
         </div>

         <div class="form-group">
           <label>Upload Foto</label>
           <input type="file" name="foto" class="form-control">
         </div>

         
        <button type="reset" class="btn btn-danger" data-dismiss="modal">Rest</button>
        <button type="submit" value="submit" class="btn btn-primary">Simpan</button>

        <?php echo form_close();?>
      </div>
    </div>
   </div>
 </div>
</div>


