<?php
//db connection
include "../lib/connection.php";
// update sql
if (isset($_POST['n_update'])) {
    $nid = $_POST['n_id'];
    $title = $_POST['n_title'];
    $icon = $_POST['n_icon'];
    $desc = $_POST['n_desc'];
    $c_id = $_POST['c_id'];
    $update_sql = "UPDATE news SET title='$title',icon='$icon',description='$desc',c_id='$c_id' WHERE id=$nid";

    if ($conn->query($update_sql)) {
        header("location:news.php");
    } else {

        die($conn->error);
    }
}


// select sql 
if (isset($_GET['id'])) {

    $edit_id = $_GET['id'];
    $select_sql = "SELECT * FROM news WHERE id=$edit_id";
    $s_sql = $conn->query($select_sql);

    if ($s_sql->num_rows > 0) {

        while ($final = $s_sql->fetch_assoc()) {





?>


            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                <meta name="description" content="" />
                <meta name="author" content="" />
                <title>NEWS541</title>
                <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
                <link href="css/styles.css" rel="stylesheet" />
                <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
            </head>

            <body class="sb-nav-fixed">
                <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                    <!-- Navbar Brand-->
                    <a class="navbar-brand ps-3" href="admin.php">NEWS541</a>
                    <!-- Sidebar Toggle-->
                    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                    <!-- Navbar Search-->
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <!-- Navbar-->
                    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Settings</a></li>
                                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="#!">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="layoutSidenav">
                    <div id="layoutSidenav_nav">
                        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                            <div class="sb-sidenav-menu">
                                <div class="nav">
                                    <div class="sb-sidenav-menu-heading">Core</div>
                                    <a class="nav-link" href="admin.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                        Dashboard
                                    </a>
                                    <div class="sb-sidenav-menu-heading">Pages</div>

                                    <a class="nav-link active" href="category.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                        Category
                                    </a>
                                    <a class="nav-link" href="news.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                        News
                                    </a>
                                    <a class="nav-link" href="charts.html">
                                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                        Charts
                                    </a>

                                    <div class="sb-sidenav-menu-heading">Addons</div>
                                    <a class="nav-link" href="charts.html">
                                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                        Charts
                                    </a>
                                    <a class="nav-link" href="tables.html">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                        Tables
                                    </a>
                                </div>
                            </div>
                            <div class="sb-sidenav-footer">
                                <div class="small">Logged in as:</div>
                                Start Bootstrap
                            </div>
                        </nav>
                    </div>
                    <div id="layoutSidenav_content">
                        <main>
                            <div class="container-fluid px-4">
                                <h1 class="mt-4">Category</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Category</li>
                                </ol>
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h3>Update Category</h3>
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                                            <input value="<?php echo $final['id']; ?>" type="hidden" name="n_id">

                                            <div class="mb-3">
                                                <label for="n_title" class="form-label">News Title</label>
                                                <input  value="<?php echo $final ['title'];?>" type="text" class="form-control " id="n_title" name="n_title" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="n_icon" class="form-label">News Icon</label>
                                                <input  value="<?php echo $final ['icon'];?>" type="text" class="form-control " id="n_icon" name="n_icon" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="n_desc" class="form-label">News Description</label>
                                                <input  value="<?php echo $final ['description'];?>" name="n_desc" class="form-control " id="n_desc" required></input>
                                            </div>
                                            <div class="mb-3">
                                                <label for="c_id" class="form-label">Category ID</label>
                                                <input  value="<?php echo $final ['c_id'];?>" type="number" class="form-control " id="c_id" name="c_id" required>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-dark" name="n_update">Update</button>
                                                <button type="reset" class="btn btn-warning">Reset</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </main>
                        <footer class="py-4 bg-light mt-auto">
                            <div class="container-fluid px-4">
                                <div class="d-flex align-items-center justify-content-between small">
                                    <div class="text-muted">Copyright &copy; NEWS541 2025</div>
                                    <div>
                                        <a href="#">Privacy Policy</a>
                                        &middot;
                                        <a href="#">Terms &amp; Conditions</a>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                <script src="js/scripts.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
                <script src="js/datatables-simple-demo.js"></script>
            </body>

            </html>

<?php
        }
    } else {
        header("location:news.php");
    }
} else {
    header("location:news.php");
}
?>