<?php $images = get_field('holiday_gallery');
    if( $images ): 
?> 
<!-- <div class="container">
    <div id="main_area"> -->
        <!-- Slider -->
        <div class="row">
            
            <div class="col-sm-12">
                <div class="col-xs-12" id="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12" id="carousel-bounding-box">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
<?php
        
                                foreach($images as $key=>$image):
                                    if($key==0) {
                                        $active = "active";
                                        $i++;
                                    }
                                    else {
                                        $active = "";
                                    }
?>
                                    <div class="item <?php echo $active; ?>" data-slide-number="<?php echo $key; ?>">
                                        <img src="<?php echo $image['sizes']['large']; ?>" height="<?php echo $image['sizes']['large-height']; ?>" width="<?php echo $image['sizes']['large-width']; ?>">
                                    </div>
<?php
                                    // do something
                                endforeach;
?>

                                </div>
                                <!-- Carousel nav -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12" id="slider-thumbs">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
<?php
                    foreach($images as $key=>$image):
?>
                        <li class="col-xs-6 col-sm-3">
                            <a class="thumbnail" id="carousel-selector-<?php echo $key; ?>"><img src="<?php echo $image['sizes']['thumbnail']; ?>" height="<?php echo $image['sizes']['thumbnail-height']; ?>" width="<?php echo $image['sizes']['thumbnail-width']; ?>"></a>
                        </li>
<?php
                    endforeach;
?>
                </ul>
            </div>
            <!--/Slider-->
        </div>

    <!-- </div>
</div> -->
<?php
    endif;
?>
<style type="text/css">
    .hide-bullets {
    list-style:none;
    margin-left: -40px;
    margin-top:20px;
}

.thumbnail {
    padding: 0;
}

.carousel-inner>.item>img, .carousel-inner>.item>a>img {
    width: 100%;
}
</style>
<script type="text/javascript">
      jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
</script>