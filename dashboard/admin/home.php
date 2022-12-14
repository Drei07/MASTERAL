<?php
include_once '../../database/dbconfig2.php';
require_once 'authentication/admin-class.php';
include_once __DIR__ .'/../superadmin/controller/select-settings-configuration-controller.php';

$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
 $admin_home->redirect('../../');
}

$stmt = $admin_home->runQuery("SELECT * FROM admin WHERE admin_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$profile 	= $row['profile'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../src/img/<?php echo $favicon ?>">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../src/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../src/node_modules/aos/dist/aos.css">
    <link rel="stylesheet" href="../../src/css/admin.css?v=<?php echo time(); ?>">
    <title>Home</title>

</head>

<body>

    <!-- Loader -->
    <div class="loader"></div>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="../../src/img/<?php echo $logo ?>" width="150px" alt="">
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="home">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class='bx bxs-user-circle'></i>
                    <span class="text">Sample</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class='bx bxs-user-circle'></i>
                    <span class="text">Sample</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class='bx bxs-user-circle'></i>
                    <span class="text">Sample</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class='bx bxs-wrench'></i>
                    <span class="text">Sample</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="authentication/admin-signout" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Signout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="" class="profile" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Profile">
                <img src="../../src/img/<?php echo $profile ?>">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="../../src/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../src/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../src/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../src/js/tooltip.js"></script>
    <script src="../../src/js/admin.js"></script>
    <script src="../../src/js/loader.js"></script>


    <script>
        // Signout
        $('.logout').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href')

            swal({
                    title: "Signout?",
                    text: "Are you sure do you want to signout?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willSignout) => {
                    if (willSignout) {
                        document.location.href = href;
                    }
                });
        })
    </script>

    <!-- SWEET ALERT -->
    <?php

    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status_title']; ?>",
                text: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: false,
                timer: <?php echo $_SESSION['status_timer']; ?>,
            });
        </script>
    <?php
        unset($_SESSION['status']);
    }
    ?>
</body>

</html>