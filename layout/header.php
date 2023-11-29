<?php
    require_once('inc/app.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- links -->

  <link rel="stylesheet" href="./assets/lib/fontawesome-v6.4.2/css/all.css">
  <link rel="stylesheet" href="./assets/lib/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/loginAndRegister.css">
  <link rel="stylesheet" href="./assets/css/main.css">
  

  <title>Mhear</title>

</head>

<body>

  <header>
    <nav class="d-flex pt-4 justify-content-between px-4 d-flex flex-column">
      <section class="navigation d-flex gap-3 mb-4 align-items-center">
        <div class="nav-sidebar d-flex align-items-center">
          <i class="fa-solid fa-bars nav-icon bars-icon"></i>
          <!-- modal -->
        </div>
        <div class="logo">
          <a href="home">
          <img src="./assets/img/maher.png" alt="">
          </a>
        </div>
        <div class="searsh w-100 d-flex align-items-center form-floating">
          <i class="fa-solid fa-magnifying-glass nav-icon searsh-icon position-absolute"></i>
          <!-- Searsh -->
          <input d-none type="text" placeholder="ابحــث......">
        </div>
        <?php if(isUserSignedIn()){ ?>
        <ul class="d-flex m-0 list-unstyled p-0 gap-5 d-flex align-items-center">
          <div class="notification form-floating">
            <i class="fa-regular fa-bell nav-icon notification-icon"></i>
            <!-- Notification -->
            <div class="notification-container">

            </div>
          </div>
          <div class="messages form-floating">
            <i class="fa-regular fa-envelope nav-icon message-icon"></i>
            <!-- Message -->
            <div class="message">

            </div>
          </div>
          <div class="profile">
            <a href="signout" style="test-decoration:none">
              <i class="fa-solid fa-user nav-icon"></i>
            </a>
            <!-- Modal profile -->
          </div>
        </ul>
        <?php }else{ ?>
            <ul class="login">
            <a href="login">
                <li>
                <span>تسجيل الدخول</span>
                </li>
            </a>
            
            <a href="siginin">
                <li>
                    <span>إشتراك</span>
                </li>
            </a>

            </div>
          </div>
            </ul>
        <?php } ?>
      </section>
      <hr>
      <section class="links">
        <ul class="d-flex m-0 list-unstyled p-0 gap-3 justify-content-center">
          <li class="active"><a href="home">الرئيسية</a></li>
          <li><a href="viewAllProjects">تصفح المشاريع</a></li>
          <li><a href="projectPoroposal">العروض</a></li>
          <li><a href="project">إضافة مشروع</a></li>
          <li><a href="#">عن مهير</a></li>
          <li><a href="#">تواصل معنا</a></li>
        </ul>
      </section>
    </nav>
  </header>

  <main>