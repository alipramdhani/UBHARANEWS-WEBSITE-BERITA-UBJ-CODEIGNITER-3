<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UbharaNews.com</title>
    <script src="https://kit.fontawesome.com/f907dac75f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/news.css') ?>">
    <link rel="stylesheet" href="#">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@22,400,0,0" />
    
</head>
<body>
    <!-- header -->
    <header class="fixed-top">
        <?php $this->load->view("_partials/users/navbarPage.php") ?>
    </header>

    <!-- Konten -->
    <section id="section-1">
        <div class="container-fluid row">
            <!-- Slide News -->
            <div id="carousel" class="col-8 p-5">
                <?php $this->load->view("_partials/users/carousel.php") ?>
            </div>
    
            <!-- News 1 -->
            <div id="terkini" class="col-4 border-start px-5 pt-5" style="overflow-y: auto;">
                <?php $this->load->view("_partials/users/news-1.php") ?>
            </div>
        </div>
    </section>

    <section id="section-2">
        <div class="container-fluid row gap-5 my-5 p-5">
            <!-- News 2 -->
            <div id="universitas" class="col p-3">
                <?php $this->load->view("_partials/users/news-2.php") ?>
            </div>
            <!-- News 3 -->
            <div id="fakultas" class="col p-3">
                <?php $this->load->view("_partials/users/news-3.php") ?>
            </div>
            <!-- News 4 -->
            <div id="olahraga" class="col p-3">
                <?php $this->load->view("_partials/users/news-4.php") ?>
            </div>
        </div>
    </section>

    <!-- News 5 -->
    <section id="section-3" >
        <div class="container-fluid gap-3 pb-5">
            <div class="my-5">
                <h2 class="text-center">Prestasi</h2>
            </div>
            <div id="prestasi" class="d-flex justify-content-around mb-5">
                <?php $this->load->view("_partials/users/news-5.php") ?>
            </div>
        </div>
    </section>

    <section id="section-4" class="py-5" >
        <div style="background-color: #fe7d21;" class=" py-5">
            <?php $this->load->view("_partials/users/ulasanView.php") ?>
        </div>
        <div class=" py-5">
            <?php $this->load->view("_partials/users/ulasan.php") ?>
        </div>
    </section>

    <section id="Section-6">
        <div>
            <?php $this->load->view("_partials/users/footer.php") ?>
        </div>
    </section>
    
    <!-- Footer -->
    <footer>
    <div class="py-4 shadow bg-white fixed-bottom">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            const successMessage = '<?php echo $this->session->flashdata('message'); ?>';   
            if (successMessage) {
                Swal.fire({
                    icon: "success",
                    title: successMessage,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    </script>
    <script>
        function countCharacters() {
            const textarea = document.getElementById('ulasan');
            const charCount = document.getElementById('charCount');
            const charAlert = document.getElementById('charAlert');
            const maxChars = 400;

            const currentLength = textarea.value.length;
            charCount.textContent = `${currentLength}/${maxChars} karakter`;

            if (currentLength > maxChars) {
                charAlert.style.display = 'block';
            } else {
                charAlert.style.display = 'none';
            }
        }
    </script>
  
</body>
</html>
