<?php 
  include "_header.php"; 
  require "functions/function.php";
  if (!$_COOKIE['user']) {
    header("Location:index.php");
  }
  
  $sistem = new System;
  $id = $_GET["id"];
  $diz = $sistem->genelsorgu($db, "SELECT * FROM user WHERE id= $id",1);
  while ($dizi = $diz->FETCH_ASSOC()):
?>
<style>
    #left-arrow:hover{
      background-color: #6495ED;
    }
</style>
<link rel="stylesheet" href="dropdown.css">
<nav class="navbar navbar-expand-lg bg-info">
  <div class="container">
    <a href="homepage.php?id=<?php echo $id; ?>" class="navbar-brand"><i class="fa-solid fa-arrow-left me-2" style="color: white;"></i> <b>To Do App</b></a>
    <div class="navbar-nav dropdown me-2">
        <button class="dropbtn nav-item"><?php echo $_COOKIE['user']; ?></button>
          <div class="dropdown-content">
              <a href="profile.php?id=<?php echo $id; ?>"><i class="fa-solid fa-id-card me-2" style="color: #000000;"></i> Bilgilerim</a>
              <a href="report.php?id=<?php echo $id; ?>"><i class="fa-regular fa-circle-question" style="color: #000000;"></i> Durum Raporu</a>
              <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket me-2" style="color: #000000;"></i> Çıkış Yap</a>
          </div>
    </div> 
  </div>
</nav>
<?php endwhile; ?>

<div class="container-fluid my-auto">
  <div class="row">
    <div class="col-md-8 mx-auto bg-light border mt-3 mb-3">
        <?php $sistem->detayGetir($db); ?>
    </div>
  </div>
</div>

