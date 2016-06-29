<?php if(!class_exists('raintpl')){exit;}?><div class="news-teaser">
    <h2><?php echo $title;?></h2>
    <div class="blocks">
    <?php $counter1=-1; if( isset($news) && is_array($news) && sizeof($news) ) foreach( $news as $key1 => $value1 ){ $counter1++; ?>
        <a class="block" href="<?php echo $value1["url"];?>">
            <span class="date"><?php echo $value1["date"];?></span>
            <h3><?php echo $value1["title"];?></h3>
            <p class="teaser"><?php echo $value1["description"];?></p>
        </a>
    <?php } ?>
    </div>
</div>