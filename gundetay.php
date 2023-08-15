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
            <button class="dropbtn nav-item"><?php echo $dizi["ad"]; ?></button>
                <div class="dropdown-content">
                    <a href=""><i class="fa-solid fa-id-card me-2" style="color: #000000;"></i> Bilgilerim</a>
                    <a href=""><i class="fa-solid fa-arrow-right-from-bracket me-2" style="color: #000000;"></i> Çıkış Yap</a>
                </div>
        </div> 
    </div>
</nav>
<?php endwhile; ?>