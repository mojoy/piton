<!DOCTYPE html>
<?php
$blog_details = get_blog_details();
$lang = $blog_details -> path;
$lang = str_replace(array('/'), '', $lang);
?>
<html lang="<?php echo $lang ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<link rel="stylesheet" type="text/css" property="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css+">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<base href="<?php bloginfo('url'); ?>/" />
	<?php wp_head(); ?>
</head>
<body <?php body_class($class); ?>>
	<header class="header">
		<div class="header-inner">
			<div class="holder">
				<div class="navbar-header">
					<span class="btn-lang"><?php echo $lang ?></span>
					<span class="nav-mob"><i></i><i></i><i></i></span>
					<div class="logo-holder"><a href="<?php bloginfo('url'); ?>" class="logo" title="<?php bloginfo('name'); ?>" ><?php bloginfo('name'); ?></a></div>
				</div>
				<div class="navigation" role="navigation">
					<?php
						wp_nav_menu(array(
						'theme_location'  => 'main-nav',
						'menu_class'      => 'nav navbar-nav',
						'echo'            => true,
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => new WPDocs_Walker_Nav_Menu(),
						));
					?>
				</div>
				<ul class="lang">
					<li><a href="/en">EN</a></li>
					<li><a href="/pl">PL</a></li>
					<li><a href="/lt">LT</a></li>
					<li><a href="/ro">RO</a></li>
					<li><a href="/bg">BG</a></li>
				</ul>
			</div>
		</div>
	</header>