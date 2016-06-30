<?php if(!class_exists('raintpl')){exit;}?><div class="no-intro clearfix">
<div class="wrapped">
    <div class="col-md-8">
        <h1><?php echo $title;?></h1>
        <p class="lead"><?php echo $description;?></p>
        <?php echo $text;?>
    </div>
    <?php if( $comments ){ ?>
    <div class="col-md-8" id="disqus_thread"></div>
    <script>
        var disqus_config = function () {
            this.page.url = "<?php echo $page_url;?>";
            this.page.identifier = "<?php echo $page_identifier;?>";
        };
        (function() {  // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            
            s.src = '//butterlan.disqus.com/embed.js';
            
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
    <?php } ?>
</div>
</div>