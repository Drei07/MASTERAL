<?php
include_once 'dashboard/superadmin/controller/select-settings-configuration-controller.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <link rel="shortcut icon" href="src/img/<?php echo $favicon ?>">

  <title>Prognostix | Blog</title>

  <link rel="stylesheet" href="src/css/maicons.css">

  <link rel="stylesheet" href="src/css/bootstrap.css">

  <link rel="stylesheet" href="src/vendor/animate/animate.css">

  <link rel="stylesheet" href="src/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>
  
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="300">
      <div class="container">
        <a href="#" class="navbar-brand"><img src="src/img/<?php echo $logo ?>" width="180px" alt=""></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapsed" id="navbarContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="service">Services</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="blog">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-2" href="signin">Sign in</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>

    <div class="container">
      <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item active">Blog</li>
              </ul>
            </nav>
            <h1 class="text-center">Blog</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-sm-10">
          <form action="#" class="form-search-blog">
            <div class="input-group">
              <div class="input-group-prepend">
                <select id="categories" class="custom-select bg-light">
                  <option>All Categories</option>
                  <option value="travel">Travel</option>
                  <option value="lifestyle">LifeStyle</option>
                  <option value="healthy">Healthy</option>
                  <option value="food">Food</option>
                </select>
              </div>
              <input type="text" class="form-control" placeholder="Enter keyword..">
            </div>
          </form>
        </div>
        <div class="col-sm-2 text-sm-right">
          <button class="btn btn-secondary">Filter <span class="mai-filter"></span></button>
        </div>
      </div>

      <div class="row my-5">
        <div class="col-lg-4 py-3">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="src/img/blog/blog-1.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 py-3">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="src/img/blog/blog-2.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 py-3">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="src/img/blog/blog-3.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 py-3">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="src/img/blog/blog-4.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 py-3">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="src/img/blog/blog-5.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 py-3">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="src/img/blog/blog-6.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 py-3">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="src/img/blog/blog-1.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 py-3">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="src/img/blog/blog-2.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 py-3">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="src/img/blog/blog-3.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>

      </div>

      <nav aria-label="Page Navigation">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>

    </div>
  </div>

  <footer class="page-footer bg-image" style="background-image: url(src/img/world_pattern.svg);">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-3 py-3">
          <a href="#" class="navbar-brand"><img src="src/img/<?php echo $logo ?>" width="180px" alt=""></a>
          <p>Prognostix the number 1 tool to predict future outcomes based on historical data and other relevant information bt the use of use statistical and mathematical techniques to analyze past data.</p>

          <div class="social-media-button">
            <a href="#"><span class="mai-logo-facebook-f"></span></a>
            <a href="#"><span class="mai-logo-twitter"></span></a>
            <a href="#"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#"><span class="mai-logo-instagram"></span></a>
            <a href="#"><span class="mai-logo-youtube"></span></a>
          </div>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Help & Support</a></li>
          </ul>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Contact Us</h5>
          <a href="#" class="footer-link">+63 9776 6219 29</a>
          <a href="#" class="footer-link">prognostix@gmail.com</a>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Newsletter</h5>
          <p>Get updates, news or events on your mail.</p>
          <form action="#">
            <input type="text" class="form-control" placeholder="Enter your email..">
            <button type="submit" class="btn btn-primary btn-block mt-2">Subscribe</button>
          </form>
        </div>
      </div>

      <p class="text-center" id="copyright">Copyright &copy; 2022 Prognostix. All right reserved</a></p>
    </div>
  </footer>
<script src="src/js/jquery-3.5.1.min.js"></script>

<script src="src/js/bootstrap.bundle.min.js"></script>

<script src="src/js/google-maps.js"></script>

<script src="src/vendor/wow/wow.min.js"></script>

<script src="src/js/theme.js"></script>

</body>
</html>