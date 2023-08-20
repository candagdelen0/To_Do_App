<?php 
  session_start();
  include "_header.php"; 
  if (!$_SESSION['Kullanici']) {
    header("Location:index.php");
  }
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
        <div class="navbar-nav dropdown">
            <button class="dropbtn nav-item"><?php echo $_SESSION['Kullanici']; ?></button>
            <div class="dropdown-content">
                <a href="profile.php?id=<?php echo $id; ?>"><i class="fa-solid fa-id-card me-2" style="color: #000000;"></i> Bilgilerim</a>
                <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket me-2" style="color: #000000;"></i> Çıkış Yap</a>
            </div>
        </div> 
    </div>
</nav>
<?php endwhile; ?>

<div class="container">
    <div class="row justify-content-around"> <?php $sistem->haftagetir($db); ?> </div>
    <div class="row fixed-bottom" style="background-color: #B0C4DE;">
        <div class="col-md-10 mt-2 mb-2 text-center border-bottom border-primary" style="font-size: 18px; padding: 5px;">
          <!-- Yeni özellik butonları eklenebilir -->
        </div>
        <div class="col-md-2 mt-2 mb-2 text-center border-bottom border-primary" style="font-size: 18px;">
          <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getuser"><i class="fa-solid fa-gear"></i></button>
        </div>
        <div class="col-md-4 text-center mx-auto" >&copy; 2023 Copyright: CAN DAĞDELEN Tüm Hakları Saklıdır.</div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report A Problem</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">User Email: </label>
            <input type="email" class="form-control" id="user-email">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
