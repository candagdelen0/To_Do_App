<?php
    include "connection.php";

    class System {
        public function safety($data) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public function genelsorgu($vt, $sql, $tercih) {
            $sorgu = $vt->prepare($sql);
            $sorgu->execute();
            if ($tercih == 1) {
                return $sonuc = $sorgu->get_result();
            }
        }

        public function haftagetir($vt) {
            $userid = $_GET["id"];
            $sonuc = $this->genelsorgu($vt, "SELECT * FROM haftalik",1);
            while ($dizi = $sonuc->FETCH_ASSOC()):
                $gor = $this->genelsorgu($vt, 'SELECT * FROM tasks WHERE gunid ='.$dizi["id"].' AND userid ='.$userid.'',1);
                $gunbak = $gor->num_rows; 
                if ($gunbak == 0) {
                    $renk = '#00BFFF;';
                    $bord = "info";
                    $icon = '<i class="fa-regular fa-calendar" style="color: #009dff;"></i>';
                } else {
                    $renk = '#1E90FF;';
                    $bord = "primary";
                    $icon = '<i class="fa-solid fa-calendar" style="color: #11255f;"></i>';
                }
                echo '<div class="col-md-3 mt-4">  
                    <a href="gundetay.php?id='.$userid.'&gunid='.$dizi["id"].'" style="text-decoration: none;">          
                        <div class="card border-' . $bord . ' m-1 col-md-12 p-2" > 
                            <div class="card-body text-secondary"> 
                                <p class="card-text">
                                    <span style="font-size: 48px; color:' . $renk . '">'.$icon.'</span>
                                    <span style="font-size: 24px;" class="ms-2"">' . $dizi["ad"] . '</span>';
                                    if ($gunbak != 0): 
                                        echo '<kbd style="float: right;">'. $gunbak .'</kbd>';
                                    endif;
                                echo '</p>
                            </div>
                        </div>
                    </a>
                </div>';
            endwhile;
        }

        public function basari($vt) {
            $userid = $_GET["id"];
            $variable = $this->genelsorgu($vt, "SELECT * FROM basariorani WHERE userid = $userid",1);
            while ($veri = $variable->FETCH_ASSOC()) {
                echo $veri["done"];
            }
        }

        public function failer($vt) {
            $userid = $_GET["id"];
            $variable = $this->genelsorgu($vt, "SELECT * FROM basariorani WHERE userid = $userid",1);
            while ($veri = $variable->FETCH_ASSOC()) {
                echo $veri["notdone"];
            }
        }

        public function detayGetir($vt) {
            $userid = $_GET["id"];
            $gunid = $_GET["gunid"];
            if (@$_POST["submit"]) {
                $task = $_POST["task"];
                if ($task != "") {
                    $this->safety($task);
                    $this->genelsorgu($vt, "INSERT INTO tasks (userid, gunid, taskName) VALUES ($userid, $gunid, '$task')",1);
                    echo '<div class="col-md-8 mx-auto mt-3 alert alert-success">Yeni Görev Eklendi</div>';
                    header('refresh: 2, url=gundetay.php?id='.$userid.'&gunid='.$gunid);
                } else {
                    echo '<div class="col-md-8 mx-auto mt-3 alert alert-danger">Görev Bilgisi Boş Bırakılamaz</div>';
                }
            }
            echo '<div class="row">
                <div class="border-bottom mt-2">';
                    $diz1 = $this->genelsorgu($vt, "SELECT * FROM haftalik WHERE id = $gunid",1);
                    while ($dizi1 = $diz1->FETCH_ASSOC()):
                        echo '<h1 class="text-center text-info">'.$dizi1["ad"].'</h1>';
                    endwhile;
                echo '</div>
                <div class="col-md-10 mx-auto mt-4">
                    <form method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="New Task" name="task" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <input type="submit" value="Add" class="btn btn-outline-primary" name="submit">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 border-bottom mt-2">
                    <table class="table table-lg table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Status</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $diz2 = $this->genelsorgu($vt, "SELECT * FROM tasks WHERE userid = $userid AND gunid = $gunid",1);
                            while ($dizi2 = $diz2->FETCH_ASSOC()):
                                echo '<tr class="text-center">
                                    <td>
                                        <span class="float-start">
                                            <a href="checked.php?id='.$dizi2["id"].'&userid='.$userid.'&gunid='.$gunid.'"><i class="fa-solid text-primary me-3 fa-plus" style="color: #000000;"></i></a> 
                                            <a href="failer.php?id='.$dizi2["id"].'&userid='.$userid.'&gunid='.$gunid.'"><i class="fa-solid text-primary fa-xmark" style="color: #000000;"></i></a>
                                        </span>
                                        '.$dizi2["taskName"].'
                                    </td>
                                    <td>';
                                        if($dizi2["status"]==0) {
                                            echo "";
                                        } elseif ($dizi2["status"]==1) {
                                            echo '<i class="fa-solid fa-check fs-3" style="color: #59a824;"></i>';
                                        } elseif ($dizi2["status"]==2) {
                                            echo '<i class="fa-solid fa-xmark fs-3" style="color: #ff0000;"></i>';
                                        }
                                    echo '</td>
                                    <td>
                                        <a href="editTask.php?id='.$dizi2["id"].'&userid='.$userid.'&gunid='.$gunid.'"><i class="fa-solid fa-pen-to-square me-2 fs-3" style="color: #f5ed00;"></i></a>
                                    </td>
                                    <td>
                                        <a href="deleteTask.php?id='.$dizi2["id"].'&userid='.$userid.'&gunid='.$gunid.'"><i class="fa-regular fa-trash-can fs-3" style="color: #eb051c;"></i></a>
                                    </td>
                                </tr>';         
                            endwhile;
                        echo '</tbody>
                    </table>
                </div>
            </div>';
        }

    }
?>