
<h2 class="mb-3 text-center">Ulasan</h2>
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-inner ">
        <?php $reviews = array_chunk($ulasans, 3); ?>
        <?php foreach ($reviews as $index => $review): ?>
            <div class=" carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <div class="d-flex justify-content-center gap-5 " style="height: 350px;" >
                    <?php foreach ($review as $ulasan): ?>
                        <div class=" py-4 px-5 shadow rounded-4 my-5 bg-white text-break" style="width: 400px; text-align:center;">
                            <h5><?= $ulasan->name; ?></h5>
                            <p><?= date('d M Y', strtotime($ulasan->created_at)); ?></p>
                            <div class=" text-break">
                                <p>"<?= $ulasan->ulasan; ?>"</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        
    </div>
    
    <a class="carousel-control-prev " style="width: 130px;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next " style="width: 130px;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>