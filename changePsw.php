<?php 
    require "functions/function.php";
    include "_header.php";
    
    $sistem = new System;
    $userid = $_GET["id"];

    if(@$_POST["submit"]):
       //post işlemi
    endif;
    $diz = $sistem->genelsorgu($db, "SELECT * FROM user WHERE id=$userid",1);
    while ($dizi = $diz->FETCH_ASSOC()):
?>
<div class="container my-3">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="bg-primary mt-3 p-3 fs-3 text-center">Parola Değiştirme</div>
            <div class="p-4" style="background-color: #F0F8FF;">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3 border-bottom border-info text-center text-primary fs-4">
                        <?php echo $dizi["ad"]; ?>
                    </div>
                    <div class="mb-3">
                        <label for="yenipsw">Yeni Parola: </label>
                        <input type="password" name="yenipsw" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="reyenipsw">Yeni Parola Tekrar: </label>
                        <input type="password" name="reyenipsw" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary mt-3 form-control" value="Güncelle" name="submit">
                    </div>
                </form>
                <div class="pb-3">
                    <a href="homepage.php?id=<?php echo $userid; ?>" class="float-end text-danger" style="text-decoration: none;">İptal</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
