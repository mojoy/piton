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
	<div class="section section-single">
		<div class="holder">
			<h1><?php the_title(); ?></h1>
			<div class="sub-title">
				<?php the_excerpt(); ?>
			</div>
			<?php the_content(); ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>