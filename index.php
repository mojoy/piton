<?php
/**
 * Template Name: Главная
 *
 * @package WordPress
 * @subpackage piton
 */
get_header();  ?>
<main>
	<div class="section section-main">
		<div class="holder">
			<?php the_content(); ?>
		</div>
	</div>
	<div class="section" id="product">
		<div class="heading">
			<h2 class="holder">FIND  YOUR  PRODUCT  TODAY</h2>
		</div>
		<div class="holder">
			<?php
				$q = new WP_Query(
					array(
						'post_type' => 'product',
						'posts_per_page' => 6,
						'order' => 'ABC',
						'orderby'   => 'date'
					)
				);
			?>
			<div class="product">
				<?php while ($q->have_posts()) : $q->the_post(); ?>
					<div class="product-item
					<?php
						$browns = get_field('brown');
						if( $browns ){
							foreach( $browns as $brown ){
								echo $brown;
							}
						} ?>
					">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<span class="product-img">
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('full', array( 'itemprop' => 'image' ));
								}
								else {
									echo '<img src="' . get_bloginfo( 'stylesheet_directory' )
										. '/images/thumbnail-nophoto.jpg" />';
								}
								?>
							</span>
							<span class="product-text">
								<strong class="product-title"><?php the_title(); ?></strong>
								<span class="short-description"><?php echo get_field('short_description');?></span>
								<span class="amount"><?php echo get_field('amount');?></span>
							</span>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	<div class="section section-distributor" id="distributors">
		<div class="heading">
			<h2 class="holder">DISTRIBUTOR</h2>
		</div>
		<div class="holder">
			<div class="distributors">
				<?php
				$q = new WP_Query(
					array(
						'post_type' => 'distributor',
						'order' => 'ABC',
						'orderby'   => 'date'
					)
				);
				?>
				<ul class="distributor-tabs-link">
					<?php while ($q->have_posts()) : $q->the_post(); ?>
						<li><a href="#<?php the_title(); ?>" title="<?php the_title(); ?>" class="<?php the_title(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
				<div class="distributor-tabs">
					<?php while ($q->have_posts()) : $q->the_post(); ?>
						<div class="distributor-tab" id="<?php the_title(); ?>">
							<?php the_content(); ?>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="section section-last-post" id="useful-information">
		<div class="heading">
			<h2 class="holder">USEFUL  INFORMATION</h2>
		</div>
		<div class="holder">
			<?php
				$arg = new WP_Query(
					array(
						'posts_per_page' => 3,
						'post_type' => 'post',
						'order' => 'ABC',
						'orderby'   => 'date'
					)
				);
			?>
			<div class="last-post">
				<?php while ($arg->have_posts()) : $arg->the_post(); ?>
					<div class="post">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<span class="post-top">
								<strong class="ttl"><?php the_title(); ?></strong>
								<?php the_excerpt(); ?>
							</span>
							<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('medium', array( 'itemprop' => 'image' ));
								}
								else {
									echo '<img src="' . get_bloginfo( 'stylesheet_directory' )
										. '/images/thumbnail-nophoto.jpg" />';
								}
							?>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	<div class="section section-contact-form" id="contacts">
		<div class="heading">
			<h2 class="holder">HOW  TO  GET  IN  TOUCH  WITH  US</h2>
		</div>
		<div class="holder">
			<?php echo do_shortcode('[contact-form-7 id="4333" title="contact form"]'); ?>
		</div>
	</div>
</main>
<?php get_footer();  ?>