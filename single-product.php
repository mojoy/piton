<?php
/**
 * The Template for displaying all single posts
 *
 * @package SADESIGN
 * @subpackage Newton
 * @since Newton 1.0
 */
get_header();
?>
	<main>
		<div class="section section-single section-product <?php
		$browns = get_field('brown');
		if( $browns ){
			foreach( $browns as $brown ){
				echo "section-product-";
				echo $brown;
			}
		} ?>">
			<div class="holder">
				<div class="product-img">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('full', array( 'itemprop' => 'image' ));
					}
					else {
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' )
							. '/images/thumbnail-nophoto.jpg" />';
					}
					?>
				</div>
				<div class="product-text">
					<div class="product-text-content">
						<div class="ttl">
							<span class="amount"><?php echo get_field('amount');?></span>
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="product-content">
							<?php the_content(); ?>
						</div>
					</div>
					<div class="col-img">
						<?php echo get_field('gallery');?>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>