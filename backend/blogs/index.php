<?php
    $stmt = $pdo->prepare("SELECT * FROM posts ORDER BY id desc");
    $stmt->execute();
    $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

 <?php require_once __DIR__ . '/../includes/head.php'; ?>


<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
   <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>
   <!-- Sidebar -->
   <div id="content-wrapper" class="d-flex flex-column">
       <div id="content">
        <!-- TopBar -->
           <?php require_once __DIR__ . '/../includes/topbar.php'; ?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h5 mb-0 text-gray-800">Blog List</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="/admin/blog/create">Create Blog</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="/admin/dashboard">Back</a></li>
            </ol>
          </div>


           <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($blogs as $key => $blog): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $blog['title'] ?></td>
                            <td><?php echo $blog['category_id'] ?></td>
                            <td>
                                <span class="badge badge-<?php echo $blog['status'] == 1 ? 'success' : 'danger' ?>"><?php echo $blog['status'] == 1 ? 'Active' : 'Inactive' ?></span>
                            </td>
                            <td>
                              <a href="<?php echo BASE_URL ?>admin/blog/edit?id=<?php echo $blog['id'] ?>" class="btn btn-sm btn-info"> <i class="fa fa-edit"></i></a>
                                    <a href="<?php echo BASE_URL; ?>admin/blog/delete?id=<?php echo (int) $blog['id']; ?>"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this data?');">
                                <i class="fa fa-trash-alt"></i>
                                </a>

                            </td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <?php require_once __DIR__ . '/../includes/footer.php'; ?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelLogout">Logout Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        <a href="/admin/logout" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/script.php'; ?>
</body>

</html>