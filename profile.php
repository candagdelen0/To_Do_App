<?php 
    session_start();
    require "functions/function.php";
    include "_header.php";
    if (!$_SESSION['Kullanici']) {
        header("Location:index.php");
    }

    $userid = $_GET["id"];
    $sistem = new System;
    @$buton = $_POST["submit"];
    if ($buton):
        $username = $sistem->safety($_POST["username"]);
        $email = $sistem->safety($_POST["email"]);
        $query = $sistem->genelsorgu($db, "SELECT * FROM user WHERE email = '$email'",1);
        while ($q = $query->FETCH_ASSOC()):
            if($query->num_rows != 0 && $q["id"] != $userid):
                echo '<div class="col-md-4 mx-auto alert alert-danger mt-3">Girilen e-mail adresi kayıtlı</div>';
            else:
                $sistem->genelsorgu($db, "UPDATE user SET ad = '$username', email = '$email' WHERE id=$userid",1);
                $_SESSION['Kullanici'] = $username;
                echo '<div class="col-md-4 mx-auto alert alert-success mt-3">Bilgiler Başarıyla Güncellendi</div>';
                header('refresh: 2, url=homepage.php?id='.$userid);
            endif;
        endwhile; 
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