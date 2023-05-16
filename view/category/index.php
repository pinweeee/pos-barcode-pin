<?php
    include_once("../../config/database.php");

    session_start();

    if($_SESSION['username'] == ""){
      header('location:../index.php');
    }

if(isset($_POST['submit'])){
$kat_name = $_POST['kategori'];

if(empty($kat_name)){
  echo"<script> alert('Nama Kategori Tidak Boleh Kosong')</script>";
}
else
{
  $insert = $pdo->prepare("INSERT INTO tb_category (nm_cat) value(:cat)");
  $insert->bindParam(':cat',$kat_name);

  if($insert->execute()){
    echo "<script> alert('Data Berhasil Ditambah') </script>";
  }else{
    echo "<script> alert('Data Tidak Berhasil Ditambah') </script>";
  }
}
}

    
?>

<?php
    include_once("../inc/admin_sidebar.php");
    include_once("../inc/header.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
    <div class="row mb-6">
            <div class="col-md-5.5">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data seluruh kategori</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="d-flex justify-content-between- mb3">
                <div class="" style="font-size: 16px;">
                  Menampilkan <input type="number" class="form-control mx-1 d-inline" style="width: 20%;">
                  Data/Halaman
                </div>
                <div class="form-group row">
                  <label for="search" class="col-sm-4 font-weight-normal col-form-label" 
                  style="font-size: 16px;">Pencarian :</label>
                  <div class="col">
                    <input type="text" name="search" class="form-control mx-1 d-inline">
                  </div>
                </div>
              </div>
              <table id="example1" class="table table-bordered table-hover" style="width: 100%;">
                <thead>
                  <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" 
                  rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending">No 
                </th>
                  <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" 
                  aria-sort="ascending" aria-label="Nama: activate to sort column descending">Nama
                </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" 
                  aria-label="Aksi: activate to sort column ascending">
                  Aksi
                  </th>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $sql = "SELECT * FROM tb_category";
                  $stmt = $pdo->query($sql);
                  while($row = $stmt->fetch()){
                    $id = $row["id"];
                    $cat = $row["nm_cat"];
                    ?>
                  <tr>
                    <td>
                      <?= $no++ ?>
                    </td>
                    <td>
                      <?= $cat ?>
                    </td>
                    <td>
                      <a href="update.php?id=<?= $id; ?>" class="btn btn-info btn-sm">Edit</a>
                      <a href="delete.php?id=<?= $id; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                  </tfoot>
              </table>
              <div class="row">
                <div style="width: 200%;" class="col-sm-10 col-md-5">
                  <div class="dataTables_info" id="example1_info" role="status" 
                  aria-live="polite">Menampilkan 1 dari 1 halaman</div>
                </div>
                <div class="col-sm-12 col-md-6" style="float: right;">
                <div class="d-flex justify-content-end" style="margin-left: 300px;">
                  <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                    <ul class="pagination">
                      <li class="paginate_button page-item previous disabled" id="example1_previous">
                        <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" 
                        class="page-link">Previous</a>
                      </li>
                      <li class="paginate_button page-item active">
                        <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" 
                        class="page-link">1</a>
                      </li>
                      <li class="paginate_button page-item ">
                        <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" 
                        class="page-link">2</a>
                      </li>
                      <li class="paginate_button page-item next" id="example1_next">
                        <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" 
                        class="page-link">Next</a>
                      </li>
                    </ul>
                 </div>
                </div>
              </div>
            </div>
            </div>
            <!-- /.col -->

          </div>
        </div>

        <div class="col-md-4" style="margin-right: 100px;">
          <div class="card" style="margin-right: 10%;">
            <div class="card-header bg-primary">
              <h3 class="card-title">Tambah kategori</h3>
            </div>
            <!-- /.card-header -->
            <!-- form method -->
            <form method="POST" action="">
            <div class="card-body">
              <div class="form-group">
                <label for="katInput">Nama Kategori</label>
                <input type="text" class="form-controll" id="katInput" name="kategori">
                <!-- <input style="width: 100%;" type="text" name="form=control input-bg"> -->
              </div>
            </div>
            <!-- /.card-body -->
            <div>
              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>

              </div>
            </div>
           </form>
            <!-- /.row -->
            <!-- /.container-fluid -->
          </div>
        </div>
        
      </div>

  </section>
</div>



<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->


<?php
    include_once("../inc/footer.php");
?>

