<?php
    require "functions/function.php";
    include "_header.php";
    $sistem = new System;
    
    $userid = $sistem->safety($_GET["userid"]);
    $gunid = $sistem->safety($_GET["gunid"]);

    @$islem = $sistem->safety($_GET["islem"]);
    switch ($islem) {
        case 'checked': 
            $taskid = $sistem->safety($_GET["id"]);
            $sistem->genelsorgu($db, "UPDATE tasks SET status=1 WHERE id = $taskid",1);
            $oran = $sistem->genelsorgu($db, "SELECT * FROM basariorani WHERE userid = $userid",1);
            $orangor = $oran->FETCH_ASSOC();
            if ($oran->num_rows != 0) {
                $done = $orangor["done"] + 1;
                $beklemede = $orangor["beklemede"] - 1;
                $sistem->genelsorgu($db, "UPDATE basariorani SET beklemede = $beklemede, done = $done WHERE userid = $userid",1);
            } else {
                $tasknum = $sistem->genelsorgu($db, "SELECT * FROM tasks WHERE id = $taskid",1)->num_rows;
                $beklemede = $tasknum - 1;
                $sistem->genelsorgu($db, "INSERT INTO basariorani (userid, tasknum, beklemede, done, notdone) VALUES ($userid, $tasknum, $beklemede, 1, 0)",1);
            }
            header("Location: gundetay.php?id=".$userid."&gunid=".$gunid." ");
            break;

        case 'failed':
            $taskid = $sistem->safety($_GET["id"]);
            $sistem->genelsorgu($db, "UPDATE tasks SET status=2 WHERE id = $taskid",1);
            $oran = $sistem->genelsorgu($db, "SELECT * FROM basariorani WHERE userid = $userid",1);
            $orangor = $oran->FETCH_ASSOC();
            if ($oran->num_rows != 0) {
                $notdone = $orangor["notdone"] + 1;
                $beklemede = $orangor["beklemede"] - 1;
                $sistem->genelsorgu($db, "UPDATE basariorani SET beklemede = $beklemede, notdone = $notdone WHERE userid = $userid",1);
            } else {
                $tasknum = $sistem->genelsorgu($db, "SELECT * FROM tasks WHERE id = $taskid",1)->num_rows;
                $beklemede = $tasknum - 1;
                $sistem->genelsorgu($db, "INSERT INTO basariorani (userid, tasknum, beklemede, done, notdone) VALUES ($userid, $tasknum, $beklemede, 0, 1)",1);
            }
            header("Location: gundetay.php?id=".$userid."&gunid=".$gunid." ");
            break;
    
        case 'edit':
            $taskid = $sistem->safety($_GET["id"]);
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
            break;
    }
?>