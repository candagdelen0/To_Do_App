<?php
    ob_start();
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
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto mt-3">
            <div class="row">
                <h3 class="text-center mb-2">Görevler Durum Raporu</h3>
            </div>
            <?php 
                $say = $sistem->genelsorgu($db, "SELECT * FROM tasks WHERE userid= $id",1);
                $sayGorev = $say->num_rows;
                if($sayGorev != 0):
            ?>
            <div class="row">
                <div class="col-8"><?php 
                    $renk = "dark";
                    echo '<ol>'; 
                    while ($query = $say->FETCH_ASSOC()):
                        if ($query["status"] == 1):
                            $renk = "info";
                        elseif ($query["status"] == 2):
                            $renk = "danger";
                        else:
                            $renk = "dark";
                        endif;
                        echo '<li class="text-'.$renk.'">'.$query["taskName"].'</li>';
                    endwhile;
                    echo '</ol>';
                ?></div>
                <div class="col-4">
                    <div class="row">
                        <?php 
                            $ver = $sistem->genelsorgu($db, "SELECT * FROM basariorani WHERE userid = $id",1);
                            $veri = $ver->FETCH_ASSOC();
                            $tasknum = $veri["tasknum"];
                            $done = $veri["done"];
                            $notdone = $veri["notdone"];
                            $basari = ($done * 100)/$tasknum;
                            $basarisiz = ($notdone * 100)/$tasknum;
                        ?>
                        <div class="col-4 mt-4 mx-auto border border-info bg-light text-primary text-center p-2 pb-3">
                            <p style="font-weight: bold;" class="mt-3"><i class="fa-solid fa-clipboard-check"></i> Done</p>
                            <span class="text-white border border-danger bg-danger p-1"> % <?php echo number_format($basari,2,'.',','); ?></span>
                        </div>
                        <div class="col-4 mt-4 mx-auto border border-info bg-light text-primary p-2 pb-3 text-center">
                            <p style="font-weight: bold;" class="mt-3"><i class="fa-regular fa-file-excel"></i> Not Done</p>
                            <span class="text-white border border-danger bg-danger p-1"> % <?php echo number_format($basarisiz,2,'.',','); ?> </span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="row mt-2">
                                <div class="col-8"></div>
                                <div class="col-4">
                                    <form method="post">
                                        <input type="submit" value="Verileri Sil" class="btn btn-warning" name="submit">
                                    </form>
                                </div>
                                <?php if (@$_POST["submit"]) {
                                    $sistem->genelsorgu($db, "DELETE FROM tasks WHERE userid = $id",1);
                                    $sistem->genelsorgu($db, "DELETE FROM basariorani WHERE userid = $id",1);
                                    header("Location: homepage.php?id=".$id);
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                    <div class="col-6 mx-auto">
                    <div class="col-4 mt-4 mx-auto border border-info bg-light text-primary text-center p-2 pb-3">
                            <p style="font-weight: bold;" class="mt-3"><i class="fa-solid fa-clipboard-check"></i> Done</p>
                            <span class="text-white border border-danger bg-danger p-1"> % 0</span>
                        </div>
                        <div class="col-4 mt-4 mx-auto border border-info bg-light text-primary p-2 pb-3 text-center">
                            <p style="font-weight: bold;" class="mt-3"><i class="fa-regular fa-file-excel"></i> Not Done</p>
                            <span class="text-white border border-danger bg-danger p-1"> % 0 </span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>