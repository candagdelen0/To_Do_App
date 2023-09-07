<?php
    include "_header.php";
    require "functions/function.php";
    $sistem = new System;
    $id = $_GET["id"];
    $diz = $sistem->genelsorgu($db, "SELECT * FROM user WHERE id= $id",1);
    while ($dizi = $diz->FETCH_ASSOC()):
?>
<link rel="stylesheet" href="dropdown.css">
<nav class="navbar navbar-expand-lg bg-info">
<div class="container">
    <a href="homepage.php?id=<?php echo $id; ?>" class="navbar-brand"><i class="fa-solid fa-arrow-left me-2" style="color: white;"></i> <b>To Do App</b></a>
    <div class="navbar-nav dropdown">
        <button class="dropbtn nav-item"><?php echo $_COOKIE['user']; ?></button>
        <div class="dropdown-content">
            <a href="profile.php?id=<?php echo $id; ?>"><i class="fa-solid fa-id-card me-2" style="color: #000000;"></i> Bilgilerim</a>
            <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket me-2" style="color: #000000;"></i> Çıkış Yap</a>
        </div>
    </div> 
</div>
</nav>
<?php endwhile; ?>

