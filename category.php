<?php  get_header();  ?>
<!-- work category.php -->
<div class="main-wrapper page">
<?php
	$cat = get_the_category();
	if ($cat[0]->term_id == 8) { ?><div class='ne-list tobiz category'><? }
	elseif ($cat[0]->term_id == 6) { ?><div class='ne-list home-ideas category'> <? }
	elseif ($cat[0]->term_id == 9) { ?><div class='ne-list other-her category'><? }
	elseif ($cat[0]->term_id == 1) { ?><div class='ne-list lolnewsbg category'><? }
	elseif ($cat[0]->term_id == 7) { ?><div class='ne-list painting category'><? }
	elseif ($cat[0]->term_id == 4) { ?><div class='ne-list spec category'><? }
	else { ?><div class='ne-list category'><? }
?>
    <div class='ne-item-header'>
       <h1><?= $cat[0]->cat_name ?></h1>
       <span></span>
    </div>
	<div class="ne-ma">
	<ul class='ne-news2-category'>
	    <?php while ( have_posts() ) : the_post(); ?>
	        <li class='ne-news2-element'>
	            <a href="<?php echo get_permalink(); ?>">
	                <div class="text-container">

	                    <?php
	                        $img = get_the_post_thumbnail($post->ID, 'medium');
	                    ?>
	                    <div class="image">
	                        <?php echo $img; ?>
	                    </div>
	                    <?php
	                    $excerpt = $post->post_excerpt;
	                    if (empty($excerpt)) {
	                        $excerptArr = $post->post_content;
	                        $excerptArr = explode(' ', $excerptArr);
	                        $excerptArr = array_slice($excerptArr, 0, 30);
	                        $excerpt = implode(' ', $excerptArr) . '...';
	//                        $excerpt = apply_filters('the_content', $excerpt);
	                        $excerpt = wp_strip_all_tags($excerpt);
	                    }
	                    ?>

	                   <div class="title d1">
	                        <?php the_title(); ?>
	                    </div>
	                 	<!--div class="date"><?php get_the_date('Y-m-d', $post->ID); ?></div-->
	                  <div class="excerpt">
	                        <?php echo $excerpt; ?>
	                    </div>
	                </div>
	            </a>
	        </li>
	<?php endwhile; ?>
	</ul>
	</div>
	</div>
</div>

<?php get_footer();  ?>