<?php include "_header.php"; ?>
<style>
    .dropbtn {
        background-color: #0B5ED7;
        color: white;
        padding: 12px;
        font-size: 16px;
        border: #0B5ED7;
        cursor: pointer;
        border-radius: 10px;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {background-color: #f1f1f1}

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: white;
      color: black;
    }

    a {
        text-decoration: none;
    }
</style>


<nav class="navbar navbar-expand-lg bg-info">
    <div class="container">
        <a href="homepage.php?id=" class="navbar-brand"><b>To Do App</b></a>
        <div class="navbar-nav dropdown me-2">
            <button class="dropbtn nav-item">İsim</button>
                <div class="dropdown-content">
                    <a href=""><i class="fa-solid fa-id-card me-2" style="color: #000000;"></i> Bilgilerim</a>
                    <a href=""><i class="fa-solid fa-arrow-right-from-bracket me-2" style="color: #000000;"></i> Çıkış Yap</a>
                </div>
        </div> 
    </div>
</nav>


<div class="container">
    <div class="row justify-content-around"> </div>
    <div class="row fixed-bottom" style="background-color: #B0C4DE;">
        <div class="col-md-6 mt-3 mb-3 text-center border-bottom border-primary" style="font-size: 18px; padding: 5px;"><i class="fa-solid fa-check text-success"></i> Tamamlanan Görev: <span class="bg-success border-success text-white rounded ps-2 pe-2">5</span></div>
        <div class="col-md-6 mt-3 mb-3 text-center border-bottom border-primary" style="font-size: 18px; padding: 5px;"><i class="fa-solid fa-xmark text-danger"></i> Tamamlanmayan Görev: <span class="bg-danger border-danger text-white rounded ps-2 pe-2">3</span></div>
        <div class="col-md-4 text-center mx-auto" >&copy; 2023 Copyright: CAN DAĞDELEN Tüm Hakları Saklıdır.</div>
    </div>
</div>