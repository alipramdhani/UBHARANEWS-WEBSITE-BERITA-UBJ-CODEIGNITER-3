<h3 class="mb-4">Olahraga</h3>
<?php $counter = 0; ?>
<?php foreach ($olahragas as $sports): 
        $limitedHeadline = substr($sports->news_headline, 0, 27); // Limit content to 200 characters
        $limitedContent = substr($sports->news_content, 0, 80); // Limit content to 200 characters
    ?>
    <div class="terkini-item d-flex mb-4">
        <div>
            <img width="160" class="rounded-2" src="<?= base_url('assets/dbimages/' . $sports->news_images) ?>" alt="terkini Image">
        </div>
        <div class="content mx-3">
            <a href="<?php echo base_url('newsView/newsDetail/'.$sports->news_code); ?>" class="headline-section-2 text-wrap"><?= $limitedHeadline . (strlen($sports->news_headline) > 5 ? ' ...' : ''); ?></a>
            <p  style="text-align:justify;" class="content-section-2 text-wrap"><?= $limitedContent . (strlen($sports->news_content) > 5 ? ' ... ' : ''); ?>
            <br>
            <a class="selengkapnya" href="<?php echo base_url('newsView/newsDetail/'.$sports->news_code); ?>">Selengkapnya ></a></p>
        </p>
            <!-- <a class="py-1 px-3 btn btn-primary rounded-2 " href="#">Baca</a> -->
        </div>
    </div>
    <?php $counter++; ?>
    <?php if ($counter >= 10) break; ?> <!-- Stop the loop after 10 news -->
<?php endforeach; ?>