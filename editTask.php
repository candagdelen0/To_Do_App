<?php 
    require "functions/function.php"; 
    include "_header.php"; 

    $sistem = new System;
    $taskid = $_GET["id"];
    $userid = $_GET["userid"];
    $gunid = $_GET["gunid"];

    if(@$_POST["submit"]):
        $taskName = $sistem->safety($_POST["taskname"]);
        $sistem->genelsorgu($db, "UPDATE tasks SET taskName = '$taskName' WHERE id= $taskid", 1);
        header("Location: gundetay.php?id=".$userid."&gunid=".$gunid." ");
    elseif (@$_POST["geri"]):
        header("Location: gundetay.php?id=".$userid."&gunid=".$gunid." ");
    else:
        $diz = $sistem->genelsorgu($db, "SELECT * FROM tasks WHERE id=$taskid",1);
        while($dizi = $diz->FETCH_ASSOC()):
            ?><div class="container my-3">
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <div class="bg-primary mt-3 p-3 fs-3 text-center">Görevi Düzenle</div>
                        <div class="p-4" style="background-color: #F0F8FF;">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="task">Görev Tanımı</label>
                                    <textarea name="taskname" class="form-control"><?php echo $dizi["taskName"]; ?></textarea>
                                </div>
                                <div class="mb-5">
                                    <input type="submit" class="btn btn-primary float-end ps-5 pe-5" name="submit" value="Güncelle">
                                    <input type="submit" name="geri" class="btn btn-danger float-start ps-5 pe-5" value="İptal">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><?php
        endwhile; 
    endif; 
?>