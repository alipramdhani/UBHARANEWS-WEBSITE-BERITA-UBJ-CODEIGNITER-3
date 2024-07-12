<?php $counter = 0; ?>
<?php foreach ($prestasis as $prestasi): 
        $limitedHeadline = substr($prestasi->news_headline, 0, 70); // Limit content to 200 characters
        $limitedContent = substr($prestasi->news_content, 0, 100); // Limit content to 200 characters
    ?>

    <div class="btn card bg-white content-prestasi terkini-item border rounded-4 shadow-sm">
        <a href="#">
            <div>
                <img width="400" class="card-img my-1" src="<?= base_url('assets/dbimages/' . $prestasi->news_images) ?>" alt="terkini Image">
            </div>
            <div class="content m-3">
                <a style="text-align: justify;" class="headline-section-3 text-wrap"><?= $limitedHeadline . (strlen($prestasi->news_headline) > 10 ? ' ... ' : ''); ?></a>
                <p style="text-align:justify;" class="content-section-3 text-wrap my-2"><?= $limitedContent . (strlen($prestasi->news_content) > 10 ? ' ... ' : ''); ?></p>
                <a class="selengkapnya" href="<?php echo base_url('newsView/newsDetail/'.$prestasi->news_code); ?>">Baca Selengkapnya ></a>
                <!-- <a class="py-1 px-3 btn btn-primary rounded-2 " href="#">Baca</a> -->
            </div>
        </a>
    </div>
    <?php $counter++; ?>
    <?php if ($counter >= 3) break; ?> <!-- Stop the loop after 10 news -->
<?php endforeach; ?>