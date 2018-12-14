<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fakultas
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin Panel</a></li>
        <li class="active">Fakultas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="row">
    <div class="col-md-6">
    <?php
       
        echo $this->session->flashdata("notif");
        
   ?>
   </div>
   </div>
    <div class="row">
    
        <div class="col-md-6">
    <div class="box">
 
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Fakultas</h3>
            </div>
            <form action="fakultas/tambahfakultas" method="post">
            <div class="input-group margin">
           
                <!-- /btn-group -->
                
                <input type="text" name="nama_fakultas" class="form-control" placeholder="Masukkan nama fakultas..." required>
                <div class="input-group-btn">
                  <input type="submit" name="tombol_submit" class="btn btn-success" value="tambah">
              </div>
              </div>
              </form>
              
            <!-- /.box-header -->
            <div class="box-body">
            <table class="table table-bordered">
            <tr>
                  <th style="width: 10px">No.</th>
                  <th>Fakultas</th>
                  <th style="width: 160px">Aksi</th>
                </tr>
                <?php
                   $query = $this->model_fakultas->selectdb();
                   $no = 1;
                  foreach ($query as $key):?>
                <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $key->name;?></td>
                  <td>
                  <a href="<?php echo base_url()?>Fakultas/editfakultas/<?php echo $key->id; ?>" class="btn btn-warning btn-sm fa fa-edit"></button></a>
                  <a href="<?php echo base_url()?>Fakultas/hapusfakultas/<?php echo $key->id; ?>" class="btn btn-danger btn-sm fa fa-trash"></button></a>
                                    
                  </td>
                  
                </tr>
                <?php endforeach;?>
              </table>
              
            </div>

        

            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
            <!-- /.box-body -->
            
          </div></div></div>
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->

  