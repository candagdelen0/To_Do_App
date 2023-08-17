<?php 
  session_start();
  include "_header.php"; 
?>
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

<?php 
    require "functions/function.php";
    $sistem = new System;
    $id = $_GET["id"];
    $diz = $sistem->genelsorgu($db, "SELECT * FROM user WHERE id= $id",1);
    while ($dizi = $diz->FETCH_ASSOC()):
?>
<nav class="navbar navbar-expand-lg bg-info">
    <div class="container">
        <a href="<?php $_SERVER['PHP_SELF']; ?>" class="navbar-brand"><b>To Do App</b></a>
        <div class="navbar-nav dropdown me-2">
            <button class="dropbtn nav-item"><?php echo $_SESSION['Kullanici']; ?></button>
                <div class="dropdown-content">
                    <a href=""><i class="fa-solid fa-id-card me-2" style="color: #000000;"></i> Bilgilerim</a>
                    <a href=""><i class="fa-solid fa-arrow-right-from-bracket me-2" style="color: #000000;"></i> Çıkış Yap</a>
                </div>
        </div> 
    </div>
</nav>
<?php endwhile; ?>


<div class="container my-auto">
  <div class="row">
    <div class="col-md-8 mx-auto bg-light border mt-3">
        <?php $sistem->detayGetir($db); ?>
    </div>
  </div>
</div>

<footer>
    <div class="row fixed-bottom" style="background-color: #B0C4DE;">
        <div class="col-md-6 mt-2 mb-3 ps-5 border-bottom border-primary" style="font-size: 30px;"><a href="homepage.php?id=<?php echo $id; ?>" class="border border-primary ps-2 pe-2" id="left-arrow"><i class="fa-solid fa-arrow-left" style="color: #0743ab;"></i></a></div>
        <div class="col-md-6 mt-2 mb-3 text-end pe-5 pt-1 border-bottom border-primary" style="font-size: 18px;"><i class="fa-solid fa-thumbtack" style="color: #0743ab;"></i> Görev Sayısı: <?php $sistem->gorevSay($db); ?></div>
        <div class="col-md-4 text-center mx-auto" >&copy; 2023 Copyright: CAN DAĞDELEN Tüm Hakları Saklıdır.</div>
    </div>
</footer>