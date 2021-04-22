<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Edit
              <small>User</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>user/manage_user">Manage User</a></li>
              <li class="active">Edit</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Edit User</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('user/update_user'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <?php  
                foreach ($editdata as $data):
                ?>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                      <input type="text" class="form-control" name="nama" value="<?php echo $data->nama ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                      <input type="text" class="form-control" name="username" value="<?php echo $data->username ?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="password">Password Baru</label>
                      <input type="password" class="form-control" name="password" placeholder="Password Baru" required/>
                  </div>
                  <div class="form-group">
                    <label for="password_lama">Password Lama</label>
                      <input type="password" class="form-control" name="password_lama" placeholder="Password Lama" required/>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select type="text" name="status" class="form-control" disabled>
                    <?php 
                    if($data->status=="Admin"){
                      echo '<option value="Admin"  selected >Admin</option>';
                    }elseif($data->status=="Operator"){
                      echo '<option value="Operator"  selected >Operator</option>';
                    }else{
                      echo '<option value="Korlap"  selected >Korlap</option>';
                    }
                    
                    ?>
                      
                     
                    </select>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $data->id_user ?>">
                  <input type="hidden" name="hak" value="personal">
                  <a href="<?php echo base_url(); ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>