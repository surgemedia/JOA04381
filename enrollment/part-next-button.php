<?php  function next_post_button($post_next_slug) { ?>
<nav class="navigation post-navigation" role="navigation">
    <div class="nav-links">
    <div class="nav-next button"><a href="/lesson/<?php echo  $post_next_slug ?>">Next <span class="meta-nav">&rarr;</span></a></div>
</div><!-- .nav-links -->
</nav><!-- .navigation -->
<?php } ?>
