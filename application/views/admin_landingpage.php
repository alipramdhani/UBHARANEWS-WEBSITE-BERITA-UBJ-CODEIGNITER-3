<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | UbharaNews</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/views_Landingpage.css') ?>">
    <link rel="stylesheet" href="#">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@22,400,0,0" />
</head>
<body>
    <header>
        <?php $this->load->view("_partials/admin/navbarPage.php") ?>
    </header>
    <section id="home" class=" m-5 row">
      <div class="login d-flex justify-content-center col">
        <form style="width: 500px;" method="POST" action="<?php echo base_url('authadmin/loadLogin') ?>" class="d-grid border p-5 rounded-3">
            <div>
                <h2 style="font-weight: 700;">Masuk</h2>
            </div>
            <div class="my-4">
                <?php if($this->session->flashdata('message')): ?>
                    <?php echo $this->session->flashdata('message'); ?>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="exampleInputUsername1" class="form-label">Username</label>
                <input type="username" name="username" class="form-control rounded-2 p-1"  id="exampleInputUsername1" aria-describedby="usernameHelp">
            </div>
            <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control p-1 rounded-start-2" id="exampleInputPassword1" name="password">
                    <button class="icon btn border" type="button" onclick="togglePasswordVisibility()">
                        <span class="material-symbols-rounded" id="passwordToggle">visibility</span>
                    </button>
                </div>
            </div>
            <button style="background-color: #0F428A; font-weight:500;" type="submit" class="mt-4 mb-2 py-2 btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="images col d-flex justify-content-center">
        <img width="auto" height="450px" src="<?php echo base_url('assets/images/news.png'); ?>">
      </div>
    </section>
    <footer>
    <div class="py-4 bg-white fixed-bottom">
        <div class="container-fluid">
            <div class="d-flex justify-content-between mx-2 small gap-3">
                <div class="text-muted">
                    copyright &copy; <?php echo "Ubharanews@".Date('Y')?>
                </div>
                <div>
                    <a href="#">Privacy Policy</a> &middot;
                    <a href="#"> Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-qnE8Ig56t6j/V8y+oVxjvq5JdjnqDXNoA5GLtb1yI754C+5Lz+1l5P5Agfqt6zK/" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById('exampleInputPassword1');
            var icon = document.getElementById('passwordToggle');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.innerHTML = 'visibility_off';
            } else {
                passwordField.type = 'password';
                icon.innerHTML = 'visibility';
            }
        }
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert.auto-close").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 3000); // Durasi dalam milidetik (3000ms = 3 detik)
    </script>
</body>
</html>
