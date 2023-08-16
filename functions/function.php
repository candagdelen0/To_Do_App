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
          
            echo '<div class="row">
                <div class="border-bottom mt-2">';
                   
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
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th colspan="1">#</th>
                                <th colspan="3">Task</th>
                                <th colspan="1">Status</th>
                                <th colspan="1">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                            
                        echo '</tbody>
                    </table>
                </div>
            </div>';
        }






    }
?>