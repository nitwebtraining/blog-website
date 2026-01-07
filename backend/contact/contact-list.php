<?php
    $stmt = $pdo->prepare("SELECT * FROM contacts");
    $stmt->execute();
    $contact_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <h1 class="h5 mb-0 text-gray-800">Contact List</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($contact_list as $key => $contact): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $contact['name'] ?></td>
                            <td><?php echo $contact['email'] ?></td>
                            <td><?php echo $contact['subject'] ?></td>
                            <td><?php echo $contact['message'] ?></td>
                            <td><?php echo date('d-M-Y', strtotime($contact['created_at'])); ?></td>
                            <td>
                              <a href="" class="btn btn-sm btn-danger"> <i class="fa fa-trash-alt"></i> </a>
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