<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UbharaNews.com</title>
    <script src="https://kit.fontawesome.com/f907dac75f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/navCategory.css') ?>">
    <link rel="stylesheet" href="#">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@22,400,0,0" />
    
</head>
<body>
    <!-- header -->
    <header class="fixed-top">
        <?php $this->load->view("_partials/users/navbarPage.php") ?>
    </header>

    <section id="section-2">
    <div class="container-fluid row gap-5 p-5 border">
            <!-- News 2 -->
            <div id="fakultas" class="col p-3">
                <h3 class="mx-3 mb-5">Fakultas</h3>
                <?php $counter = 0; ?>
                <?php foreach ($fakultas as $faculty): 
                    $limitedContent = substr($faculty->news_content, 0, 250); // Limit content to 200 characters
                ?>
                    <div class="terkini-item d-flex mb-4">
                        <div class="mx-3">
                            <img width="400" class="rounded-4" src="<?= base_url('assets/dbimages/' . $faculty->news_images) ?>" alt="terkini Image">
                        </div>
                        <div class="content-faculty mx-5">
                            <p style="color: #fe7d21;" class="content-section-2 fs-5 lh-lg">
                            <?= date('d F Y', strtotime($faculty->news_publish)); ?>
                            </p>
                            <a href="<?php echo base_url('newsView/newsDetail/'.$faculty->news_code); ?>" class="fs-2 headline-section-2 text-wrap">
                                <?= $faculty->news_headline ?>
                            </a>
                            <p style="text-align:justify;" class="content-section-2 text-wrap fs-5 lh-lg">
                                <?= $limitedContent . (strlen($faculty->news_content) > 5 ? ' ... ' : ''); ?>
                            </p>
                            
                            <a class="selengkapnya text-end fs-5 my-3 py-2 px-3 rounded-3" href="<?php echo base_url('newsView/newsDetail/'.$faculty->news_code); ?>">
                                Selengkapnya > 
                            </a> 
                           
                            <!-- <a class="py-1 px-3 btn btn-primary rounded-2 " href="#">Baca</a> -->
                        </div>
                    </div>
                    <?php $counter++; ?>
                    <?php if ($counter >= 10) break; ?> <!-- Stop the loop after 10 news -->
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="Section-6">
        <div>
            <?php $this->load->view("_partials/users/footer.php") ?>
        </div>
    </section>
    
    <!-- Footer -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
