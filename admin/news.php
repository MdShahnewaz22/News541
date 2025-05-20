<?php
//db connection
include "../lib/connection.php";
// inser sql
$result = NULL;
if (isset($_POST['n_submit'])) {
    $title   = $_POST['n_title'];
    $icon    = $_POST['n_icon'];
    $desc    = $_POST['n_desc'];
    $c_id    = $_POST['c_id'];
    $pass  = md5($_POST['n_pass']);
    $cpass   =md5($_POST['c_pass']);
    if ($pass == $cpass) {
        // $result = "<h3 class='text-success'>Password Matched</h3>";
        $insert_sql = "INSERT INTO news( title, icon, description, pass, c_id) VALUES ('$title','$icon','$desc','$pass',$c_id )";
        if ($conn->query($insert_sql)) {
            $result = "<h3 class='text-success'>Data Inserted Successfully</h3>";
        } else {
            die($conn->error);
        }
    } else {
        $result = "<h3 class='text-danger'>Password Not Matched</h3>";
    }
}
//select sql
$select_sql = "SELECT * FROM news";
$s_sql = $conn->query($select_sql);
// echo $s_sql ->num_rows;

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

                        <a class="nav-link Z" href="category.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Category
                        </a>
                        <a class="nav-link active" href="news.php">
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
                    <h1 class="mt-4">News</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">News</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3>Insert News </h3>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="mb-3">
                                    <label for="n_title" class="form-label">News Title</label>
                                    <input type="text" class="form-control " id="n_title" name="n_title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="n_icon" class="form-label">News Icon</label>
                                    <input type="text" class="form-control " id="n_icon" name="n_icon" required>
                                </div>

                                <div class="mb-3">
                                    <label for="n_desc" class="form-label">News Description</label>
                                    <textarea name="n_desc" class="form-control " id="n_desc" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="c_id" class="form-label">Category ID</label>
                                    <input type="number" class="form-control " id="c_id" name="c_id" required>
                                </div>

                                <div class="mb-3">
                                    <label for="n_pass" class="form-label">Password</label>
                                    <input type="password" class="form-control " id="n_pass" name="n_pass" required>
                                </div>
                                <div class="mb-3">
                                    <label for="c_pass" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control " id="c_pass" name="c_pass" required>
                                </div>



                                <div class="mb-3">
                                    <button type="submit" class="btn btn-dark" name="n_submit">Submit</button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                </div>
                            </form>
                            <div class="result">
                                <?php echo $result; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3>News Info</h3>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>News Title</th>
                                        <th>News Icon</th>
                                        <th>News Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($s_sql->num_rows > 0) { ?>
                                        <?php while ($final = $s_sql->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $final['title']; ?></td>
                                                <td><?php echo $final['icon']; ?></td>
                                                <td><?php echo $final['description']; ?></td>
                                                <td>
                                                    <a href="n_update.php?id=<?php echo $final['id']; ?>">Edit</a>
                                                    <a href="n_delete.php?id=<?php echo $final['id']; ?>">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    <?php } else { ?>
                                        <tr>
                                            <!-- <td style="text-align: center">No data to show</td> -->
                                            <td>No data to show</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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