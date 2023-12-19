<?php


function register_my_menus(){
	register_nav_menus(
		array(
			'main-nav'=>'Главное меню'
		));
}

add_action('init','register_my_menus');

/**
 * Custom walker class.
 */
class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu {

	function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "\n<ul class=\"dropdown-menu\">\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$item_html = '';
		parent::start_el($item_html, $item, $depth, $args);

		if ( $item->is_dropdown && $depth === 0 ) {
			$item_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $item_html );
			$item_html = str_replace( '</a>', ' <b class="caret"></b></a>', $item_html );
		}

		$output .= $item_html;
	}

	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
		if ( $element->current )
			$element->classes[] = 'active';

		$element->is_dropdown = !empty( $children_elements[$element->ID] );

		if ( $element->is_dropdown ) {
			if ( $depth === 0 ) {
				$element->classes[] = 'dropdown';
			} elseif ( $depth === 1 ) {
				// Extra level of dropdown menu,
				// as seen in http://twitter.github.com/bootstrap/components.html#dropdowns
				$element->classes[] = 'dropdown-submenu';
			}
		}

		parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
}


 if ( function_exists( 'add_theme_support' ) )
	add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ) {
    // Разрешить обрезание. W = 220, H = 180
	//	add_image_size( 'img44', 60, 60, true );
	//	add_image_size( 'img130', 130, 230, true );
	//	add_image_size( 'img130', 84, 9999, false );
	//	add_image_size( 'img180', 180, 400, false );
	//	add_image_size( 'img376', 376, 379, false );
}

//require_once('inc/ne-news-category-li.php');

function theme_scripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'ne-up', get_template_directory_uri() . '/js/ne-up.js', array('jquery') );
    wp_enqueue_script( 'jcarousel', get_template_directory_uri() . '/js/jquery.jcarousel.min.js', array('jquery') );
    wp_enqueue_script( 'jcarousel', get_template_directory_uri() . '/js/jquery.jcarousel.min.js', array('jquery') );
    wp_enqueue_script( 'ju.scale', get_template_directory_uri() . '/js/ju.scale.js', array('jquery') );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );

//add_filter('mce_buttons_3', 'enable_more_buttons');
function enable_more_buttons($buttons) {

$buttons[] = 'fontselect';
$buttons[] = 'fontsizeselect';
$buttons[] = 'styleselect';
$buttons[] = 'backcolor';
$buttons[] = 'newdocument';
$buttons[] = 'cut';
$buttons[] = 'copy';
$buttons[] = 'charmap';
$buttons[] = 'hr';
$buttons[] = 'visualaid';
$buttons[] = 'inserttable';

return $buttons;
}

add_filter( 'tiny_mce_before_init', 'all_tinymce' );
function all_tinymce( $args ) {
$args['wordpress_adv_hidden'] = false;
return $args;
}
function titleSlice($title) {
  $titleArr = explode(' ', $title);
  if (count($titleArr) <= 2) {
    $title = implode('<br/>', $titleArr);
  } else {
    $c = count($titleArr) - 1;
    $titleArr[$c - 1] = '<br/>' . $titleArr[$c - 1];
    $title = implode(' ', $titleArr);
  }
  echo $title;
}
add_action('after_setup_theme','remove_core_updates');
function remove_core_updates()
{
 if(! current_user_can('update_core')){return;}
 add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
 add_filter('pre_option_update_core','__return_null');
 add_filter('pre_site_transient_update_core','__return_null');
}
add_action( 'network_admin_menu', 'fb_hide_network_notice' );
function fb_hide_network_notice() {
    remove_action( 'network_admin_notices', 'site_admin_notice' );
}
add_action( 'admin_menu','fb_hide_site_notice' );
function fb_hide_site_notice() {
    remove_action( 'admin_notices', 'site_admin_notice' );
}
add_action('wp_footer', 'googleAnalytics');
/*
function googleAnalytics() {
  ?>
  <script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
  </script>
  <script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>
  <script type="text/javascript">
  try {
  var pageTracker = _gat._getTracker("UA-8693753-1");
  pageTracker._trackPageview();
  } catch(err) {}</script>
  <?php

}*/
function my_theme_add_editor_styles() {
    add_editor_style( 'css/editor.css' );
}
add_action( 'after_setup_theme', 'my_theme_add_editor_styles' );








add_action('init', 'create_post_type');

function create_post_type() {
	############################
	## register taxonomies product
	############################
	register_post_type('product',
		array(
			'labels' => array(
				'name' => _x('Товар', 'post type general name'),
				'singular_name' => _x('Торары', 'post type singular name'),
				'add_new' => _x('Добавить товар', 'Добавить'),
				'add_new_item' => __('Добавить товар'),
				'edit_item' => __('Редактировать товар'),
				'new_item' => __('Новый товар'),
				'view_item' => __('Просмотреть товар'),
				'search_items' => __('Искать товар'),
				'not_found' =>  __('Ничего не найдено'),
				'not_found_in_trash' => __('в Корзине не найдено'),
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'_builtin'            => false, // Это настраиваемый тип сообщения, не встроенный
			'_edit_link'          => 'post.php?post=%d',
			'query_var' => true,
			'show_in_quick_edit' => false,
			'show_admin_column' => false,
			//'permalink_epmask' => 'EP_NONE',
			'capability_type' => 'post',
			'hierarchical' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-tag',
			//'taxonomies' => array('category','post_tag'),
			'supports' => array(
				'title', // блок заголовка;
				'editor', // - блок для ввода контента;
				//'author', // - блог выбора автора;
				'thumbnail', // блок выбора миниатюры записи;
				//'excerpt', // - блок ввода цитаты;
				//'trackbacks', // - блок уведомлений;
				//'custom-fields', // - блок установки произвольных полей;
				'comments', // - блок комментариев;
				'revisions', // - блок ревизий (не отображается пока нет ревизий);
				//'page-attributes', // - блок атрибутов постоянных страниц (шаблон и древовидная связь записей, древовидность должна быть включена).
				//'post-formats', // - блок форматов записи, если они включены в теме.
			),
		)
	);
	register_taxonomy(
		'products', 'product', array(
			'hierarchical' => true,
			'label' => 'Категории товаров',
			'show_admin_column' => true,
			'query_var' => true,
			'show_in_nav_menus' => true,
			'rewrite' => true
		)
	);



	############################
	## register taxonomies product
	############################
	register_post_type('distributor',
		array(
			'labels' => array(
				'name' => _x('Дистрибьютор', 'post type general name'),
				'singular_name' => _x('Дистрибьюторы', 'post type singular name'),
				'add_new' => _x('Добавить Дистрибьютора', 'Добавить'),
				'add_new_item' => __('Добавить Дистрибьютора'),
				'edit_item' => __('Редактировать Дистрибьютор'),
				'new_item' => __('Новый Дистрибьютор'),
				'view_item' => __('Просмотреть Дистрибьютор'),
				'search_items' => __('Искать Дистрибьютор'),
				'not_found' =>  __('Ничего не найдено'),
				'not_found_in_trash' => __('в Корзине не найдено'),
			),
			'public' => true,
			'publicly_queryable' => false, // указывает будет пост страницей или нет
			'show_ui' => true,
			'_builtin'            => false, // Это настраиваемый тип сообщения, не встроенный
			'_edit_link'          => 'post.php?post=%d',
			'query_var' => true,
			'show_in_quick_edit' => false,
			'show_admin_column' => false,
			//'permalink_epmask' => 'EP_NONE',
			'capability_type' => 'post',
			'hierarchical' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-tag',
			//'taxonomies' => array('category','post_tag'),
			'supports' => array(
				'title', // блок заголовка;
				'editor', // - блок для ввода контента;
				//'author', // - блог выбора автора;
				'thumbnail', // блок выбора миниатюры записи;
				//'excerpt', // - блок ввода цитаты;
				//'trackbacks', // - блок уведомлений;
				//'custom-fields', // - блок установки произвольных полей;
				'comments', // - блок комментариев;
				'revisions', // - блок ревизий (не отображается пока нет ревизий);
				//'page-attributes', // - блок атрибутов постоянных страниц (шаблон и древовидная связь записей, древовидность должна быть включена).
				//'post-formats', // - блок форматов записи, если они включены в теме.
			),
		)
	);/*
	register_taxonomy(
		'distributors', 'distributor', array(
			'hierarchical' => true,
			'label' => 'Категории городов',
			'show_admin_column' => true,
			'query_var' => true,
			'show_in_nav_menus' => true,
			'rewrite' => true
		)
	);*/
}


// сжатие контента

if( extension_loaded('zlib') && ini_get('output_handler') != 'ob_gzhandler' ){
	add_action('wp', function(){ @ ob_end_clean(); @ ini_set('zlib.output_compression', 'on'); } );
}