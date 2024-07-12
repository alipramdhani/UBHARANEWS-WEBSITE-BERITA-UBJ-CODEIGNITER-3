<h3 class="mb-4">Fakultas</h3>
<?php $counter = 0; ?>
<?php foreach ($fakultas as $faculty): 
        $limitedHeadline = substr($faculty->news_headline, 0, 27); // Limit content to 200 characters
        $limitedContent = substr($faculty->news_content, 0, 80); // Limit content to 200 characters
    ?>
    <div class="terkini-item d-flex mb-4">
        <div>
            <img width="160" class="rounded-2" src="<?= base_url('assets/dbimages/' . $faculty->news_images) ?>" alt="terkini Image">
        </div>
        <div class="content mx-3">
            <a href="<?php echo base_url('newsView/newsDetail/'.$faculty->news_code); ?>" class="headline-section-2 text-wrap"><?= $limitedHeadline . (strlen($faculty->news_headline) > 5 ? ' ...' : ''); ?></a>
            <p style="text-align:justify;" class="content-section-2 text-wrap"><?= $limitedContent . (strlen($faculty->news_content) > 5 ? ' ... ' : ''); ?>
            <br>
            <a class="selengkapnya" href="<?php echo base_url('newsView/newsDetail/'. $faculty->news_code); ?>">Selengkapnya ></a></p>
            <!-- <a class="py-1 px-3 btn btn-primary rounded-2 " href="#">Baca</a> -->
        </div>
    </div>
    <?php $counter++; ?>
    <?php if ($counter >= 10) break; ?> <!-- Stop the loop after 10 news -->
<?php endforeach; ?>