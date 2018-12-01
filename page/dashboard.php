<?php
error_reporting(0);
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">


          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-md-12 connectedSortable">
              <div class="callout callout-success">
                <h4>Selamat Datang "<?php echo strtoupper($_SESSION['username']);?>"</h4>
                <p>SISTEM INFORMASI MANAJEMEN</p>
              </div>

            </section><!-- right col -->
          </div><!-- /.row (main row) -->

          <div class="row">

          <div class="col-md-12">
          <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Acces Yang dapat anda gunakan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Quick Access</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $tampil=mysqli_query($con,"SELECT a.*, b.* FROM tbl_qa a INNER JOIN 
                    tbl_qa_detail b ON a.id=b.qa_id where b.user_id='$_SESSION[id]'");
                  $no = 1;
                  while ($r=mysqli_fetch_array($tampil)){

                    ?>
                    <tr>
                      <td><?php echo "$no"?></td>
                      <td><?php echo "$r[quick_access]"?></td>
                      <td><?php echo "$r[description]"?></td>
                    <?php
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>

        </section><!-- /.content -->
      </div>