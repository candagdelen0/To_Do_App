<?php include "_header.php"; ?>
<style>
    #reg:hover {
        background-color: white;
    }
</style>
<nav class="navbar navbar-expand-lg bg-info">
    <div class="container">
        <a href="index.php" class="navbar-brand"><b>To Do App</b></a>
        <ul class="navbar-nav me-2">
            <li class="nav-item"><a href="index.php" class="nav-link border border-primary rounded" id="reg">Üye Ol</a></li>
        </ul>
    </div>
</nav>


<div class="container my-3">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="bg-primary mt-3 p-3 fs-3 text-center">Üye Girişi</div>
            <div class="p-4" style="background-color: #F0F8FF;">
                <form method="post" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label for="email">Email Adresi</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Parola</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <input type="submit" class="btn btn-primary mt-3 form-control" value="Giriş Yap" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="fixed-bottom">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        &copy; 2023 Copyright: CAN DAĞDELEN Tüm Hakları Saklıdır.
    </div>
</footer>
