<h3 class="mb-4">Terkini</h3>
<?php $counter = 0; ?>
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

    <?php $counter++; ?>
    <?php if ($counter >= 5) break; ?> <!-- Stop the loop after 10 news -->
<?php endforeach; ?>