<ul class="each_modules_fields col-lg-12 col-xs-12">
    <?php if (get_field('video',$GLOBALS['current_course_obj'])): ?>
    <!-- <li><span class="dashicons dashicons-format-video"></span>
        <p ><?php the_field('video',$GLOBALS['current_course_obj']); ?></p>
    </li> -->
    <?php endif ?>
    <?php if(get_field('text_book', $GLOBALS['current_course_obj'])): ?>
    <li class="col-lg-4 col-md-6 col-sm-7 col-xs-10 pull-left">
        <?php $book_id =  get_field('text_book', $GLOBALS['current_course_obj']);?>
        <a href="<?php echo get_permalink($book_id[0]); ?>">
        <span class="dashicons dashicons-book-alt"></span>
        <span>Buy the recommended book</span></a>
    </li>
    <?php endif ?>
    <?php if (get_field('text', $GLOBALS['current_course_obj'])): ?>
    <li class="col-lg-4 col-md-9 col-sm-8 col-xs-8 pull-left">
        <span class="dashicons dashicons-awards"></span>
        <p><?php the_field('text', $GLOBALS['current_course_obj']); ?></p>
    </li >
    <?php endif ?>
    <?php if (get_field('forum', $GLOBALS['current_course_obj'])): ?>
    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-5">
        <a href="<?php echo get_field('forum', $GLOBALS['current_course_obj']); ?>">
        <span class="dashicons dashicons-admin-comments"></span>
        <span>Discuss this</span>
        </a>
    </li>
    <?php endif ?>
</ul>