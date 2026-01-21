<?php
    $stmt = $pdo->prepare("SELECT * FROM categories ORDER BY name asc");
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Default values
    $title          = $slug          = $short_description          = $long_description          = '';
    $category_id    = null;
    $featured_image = null;
    // Session user_id (if exists)
    $created_by = $_SESSION['user_id'] ?? 1;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title             = trim($_POST['title']);
    $slug              = trim(str_replace(' ', '-', strtolower($_POST['slug'])));
    $category_id       = trim($_POST['category_id']);
    $short_description = trim($_POST['short_description']);
    $long_description  = trim($_POST['long_description']);

    // ===== File Upload =====
    if (! empty($_FILES['featured_image']['name'])) {

        $fileName   = time() . "-" . $_FILES['featured_image']['name'];
        $targetPath = __DIR__ . "/../../uploads/" . $fileName;
        move_uploaded_file($_FILES['featured_image']['tmp_name'], $targetPath);
        $db_path        = "/uploads/" . $fileName;
        $featured_image = $db_path;
    }

    // ===== INSERT QUERY =====
    $stmt = $pdo->prepare("
        INSERT INTO posts
        (title, slug, category_id, featured_image, short_description, long_description, created_by)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $title,
        $slug,
        $category_id,
        $featured_image,
        $short_description,
        $long_description,
        $created_by,
    ]);

    $_SESSION['success'] = "Blog created successfully!";
    header("Location: " . BASE_URL . "admin/blogs");
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
                        <h1 class="h5 mb-0 text-gray-800">Blog Create</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/blog">Blog List</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="/admin/dashboard">Back</a></li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                           <!-- Form Basic -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <form method="POST" autocomplete="off" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="title">Blog Title</label>
                                            <input type="text" class="form-control" name="title" id="title" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="slug">Blog Slug</label>
                                            <input type="text" class="form-control" name="slug" id="slug" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="category_id">Select Category</label>
                                            <select name="category_id" id="category_id" class="form-control" required>
                                                <option value="">Select Category</option>
                                                <?php foreach ($categories as $category): ?>
                                                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                                                <?php endforeach?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="featured_image">Featured Image</label>
                                            <input type="file" class="form-control" name="featured_image" id="featured_image">
                                        </div>

                                        <div class="form-group">
                                            <label for="short_description">Short Description</label>
                                            <textarea name="short_description" id="short_description" class="form-control" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="long_description">Long Description</label>
                                            <textarea name="long_description" id="long_description" class="form-control textEditor" rows="6"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Create Blog</button>

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
