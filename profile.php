<?php 
    session_start();
    require "functions/function.php";
    include "_header.php";

    $userid = $_GET["id"];
    $sistem = new System;
    @$buton = $_POST["submit"];
    if ($buton):

    endif; 
    $diz = $sistem->genelsorgu($db, "SELECT * FROM user WHERE id=$userid",1);
    while ($dizi = $diz->FETCH_ASSOC()):
?>

<div class="container my-3">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="bg-primary mt-3 p-3 fs-3 text-center">Profil Bilgilerim</div>
            <div class="p-4" style="background-color: #F0F8FF;">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username">Kullanıcı Adı</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $_SESSION['Kullanici']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email Adresi</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $dizi["email"]; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary mt-3 form-control" value="Güncelle" name="submit">
                    </div>
                </form>
                <div class="pb-3">
                    <a href="changePsw.php?id=<?php echo $userid; ?>" class="float-start text-info" style="text-decoration: none;">Parolayı Değiştir</a>
                    <a href="homepage.php?id=<?php echo $userid; ?>" class="float-end text-danger" style="text-decoration: none;">İptal</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  endwhile; ?>