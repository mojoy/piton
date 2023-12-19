<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package SADESIGN
 * @subpackage Newton
 * @since Newton 1.0
 */
get_header();
?>

<div class="ne-list feedback"> 
  <div class="ne-ma contact-page">
    <div class="ne-item-header">
      <h1>Не знайдено</h1>
      <span></span>
    </div>
    <ul class="ne-list-info">
      <li style="width: 100%;">
        <div class="contact-form-text">На жаль, сторінка не знайдена</div>
      </li>
    </ul>
  </div>
  <script type='text/javascript' src='<?=get_template_directory_uri()?>/js/ne-news.js'></script>
    <ul class='ne-news-category'>
      <li class='ne-news-category-li ne-news-category-active' data-color='hsla(197, 100%, 47%, 0.7)'>
        <?php oneNewsCat(6, 'news1'); ?>
      </li>
      <li class='ne-news-category-li' data-color='hsla(52, 100%, 50%, 0.7)'>
        <?php oneNewsCat(7, 'news2'); ?>
      </li>
      <li class='ne-news-category-li' data-color='hsla(0, 100%, 50%, 0.7)'>
        <?php oneNewsCat(8, 'news1'); ?>
      </li>
      <li class='ne-news-category-li' data-color='hsla(103, 100%, 28%, 0.7)'>
        <?php oneNewsCat(9, 'news2'); ?>
      </li>
    </ul>
    <div class="ne-clear"></div>
</div>

<?php
get_footer();
