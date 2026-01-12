<?php
    // get existing data
    $id = $_GET['id'] ?? null;

    $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
    $stmt->execute([$id]);
    $category = $stmt->fetch(PDO::FETCH_ASSOC);
    if (! $category) {
        die("Category not found");
    }

    // update entry
    $name = $slug = $status = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name   = trim($_POST['name']);
        $slug   = trim($_POST['slug']);
        $status = trim($_POST['status']);
        $slug   = strtolower(str_replace(' ', '-', $slug));

        $stmt = $pdo->prepare(
            "UPDATE categories SET name=?, slug=?, status=? WHERE id=?"
        );
        $stmt->execute([$name, $slug, $status, $id]);

        header("Location: " . BASE_URL . "admin/categories");
        exit();
    }
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
                        <h1 class="h5 mb-0 text-gray-800">Category Create</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/categories">Category List</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/dashboard">Back</a></li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Form Basic -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <form method="POST" autocomplete="off">
                                        <div class="form-group">
                                            <label for="name">Category Name</label>
                                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name" value="<?php echo $category['name'] ?>" placeholder="Enter Category">
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Category Slug</label>
                                            <input type="text" class="form-control" value="<?php echo $category['slug'] ?>" name="slug" id="slug" aria-describedby="slug" placeholder="Enter Slug">
                                        </div>

                                        <div class="form-group">
                                            <label for="slug">Status</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="1" <?php echo $category['status'] == 1 ? 'selected' : '' ?> >Active</option>
                                                <option value="0" <?php echo $category['status'] == 0 ? 'selected' : '' ?> >Inactive</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a type="submit" class="btn btn-secondary" href="/admin/categories">Cancel</a>
                                    </form>
                                </div>
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
