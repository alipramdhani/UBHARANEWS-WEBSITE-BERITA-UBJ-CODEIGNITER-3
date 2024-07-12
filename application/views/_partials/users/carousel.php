
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php foreach ($slides as $index => $slide): ?>
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="<?= $index ?>" <?= $index == 0 ? 'class="active" aria-current="true"' : '' ?> aria-label="Slide <?= $index + 1 ?>"></button>
        <?php endforeach; ?>
    </div>
    <div class="carousel-inner">
        <?php foreach ($slides as $index => $slide): ?>
            <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                <div>
                    <img class="rounded-2" width="auto" height="400" src="<?= base_url('assets/dbimages/' . $slide->news_images) ?>" alt="Slide Image">
                    <div class="gradient-overlay rounded-bottom"></div>
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <a class="headline" href="<?php echo base_url('newsView/newsDetail/'.$slide->news_code); ?>"><?= $slide->news_headline ?></a>
                    <p class="text-warning">Publish at <?= date('d F Y', strtotime($slide->news_publish)) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>