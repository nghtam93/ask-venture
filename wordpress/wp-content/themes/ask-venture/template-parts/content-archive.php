<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$categories = get_the_category();

?>
<div class="new__item -s1 ef--zoomin">
<a href="<?php the_permalink(); ?>" class="new__item__wrap">
  <div class="new__item__thumb">
    <div class="dnfix__thumb">
      <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
    </div>
    <div class="new__item__tax -s1"><?php echo $categories[0]->name; ?></div>
  </div>
  <div class="new__item__meta">
    <h3 class="new__item__title text__truncate -n2"><?php the_title() ?></h3>
    <div class="new__item__by"><?php echo get_the_author(); ?> - <span class="new__item__date"><?php echo get_the_time("d/m/Y"); ?></span></div>
  </div>
</a>
</div>
