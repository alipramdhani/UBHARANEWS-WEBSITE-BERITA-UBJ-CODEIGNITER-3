<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UbharaNews.com</title>
    <script src="https://kit.fontawesome.com/f907dac75f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/newsDetail.css') ?>">
    <link rel="stylesheet" href="#">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@22,400,0,0" />
    
</head>
<body>
    <!-- header -->
    <header class="fixed-top">
        <?php $this->load->view("_partials/users/navbarPage.php") ?>
    </header>

    <Section id="Section-1" class=" mb-5">
        <div class="container-fluid row">
            <div class="col-8 p-5"> 
                <div class="text-center">
                    <p style="font-weight: 700; " class="mb-3 fs-1">
                        <?= $queryAllNews['news_headline']; ?>
                    </p>
                    <p class="fs-5">
                        <?= date('d F Y', strtotime($queryAllNews['news_publish'])); ?>
                    </p>
                </div>
                <div class="d-flex justify-content-center my-5">
                    <img width="700" class="rounded-4" src="<?php echo base_url('/assets/dbimages/' . $queryAllNews['news_images']); ?>" alt="">
                </div>
                <div style="text-align: justify; margin: 0 100px;" class="lh-lg fs-5 py-5">
                    <?=$queryAllNews['news_content']; ?>
                    <div class="my-5">
                        <i class="fs-5">Reporter : <?=$queryAllNews['news_reporter']; ?></i> <br>
                        <i class="fs-5">Editor : <?=$queryAllNews['news_editor']; ?></i>
                    </div>    
                </div>
            </div>
            <div class="col-4 border-start p-5">
                <h3 class="mb-4">Terkini</h3>
                <?php foreach ($terkinis as $terkini): 
                        $limitedHeadline = substr($terkini->news_headline, 0, 30); // Limit content to 200 characters
                        $limitedContent = substr($terkini->news_content, 0, 60); // Limit content to 200 characters
                    ?>
                    <div class="terkini-item d-flex mb-4">
                        <div>
                            <img width="120" class="rounded-2" src="<?= base_url('assets/dbimages/' . $terkini->news_images) ?>" alt="terkini Image">
                        </div>
                        <div class="content-terkini mx-4">
                            <a href="<?php echo base_url('newsView/newsDetail/'.$terkini->news_code); ?>" class="headline-section-1 text-wrap"><?= $limitedHeadline . (strlen($terkini->news_headline) > 5 ? ' ...' : ''); ?></a>
                            <p style="text-align:justify;" class="content-section-1 text-wrap"><?= $limitedContent . (strlen($terkini->news_content) > 5 ? ' ... ' : ''); ?> 
                            <br>
                            <a class="selengkapnya" href="<?php echo base_url('newsView/newsDetail/'.$terkini->news_code); ?>">Selengkapnya ></a></p>
                            <!-- <a class="py-1 px-3 btn btn-primary rounded-2 " href="#">Baca</a> -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </Section>

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
