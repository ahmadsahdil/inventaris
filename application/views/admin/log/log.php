<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
               <?php echo $title ?> 
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">   <?php echo $title ?> </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
            <div class="row">           
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                  </h3>
                  <div class="box-tools">

                  </div>
                </div>
                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-hover dataTable">
                    <thead>
                      <tr>
                      <th>No</th>
                        <th>Username</th>
                        <th>Aksi</th>
                        <th>Keyword</th>
                        <th>Browser</th>
                        <th>OS</th>
                        <th>Tanggal</th>
                    </thead>
                    <tbody>
                        <?php  
                        $no = 1;
                        foreach ($data as $lihat):
                        ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $lihat->username ?></td>
                        <td><?php echo $lihat->aksi ?></td>
                        <td><?php echo $lihat->keyword ?></td>
                        <td><?php echo $lihat->browser ?></td>
                        <td><?php echo $lihat->os ?></td>
                        <td><?php echo $lihat->tanggal ?></td>
                        
                          
                       
                                      
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  
                </div><!-- /.box-body -->
                </div>
             </div>
          </div>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
