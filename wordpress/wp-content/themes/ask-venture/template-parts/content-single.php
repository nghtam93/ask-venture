<?php
/**
 * Template part for displaying posts
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$categories = get_the_category(get_the_ID());
$cat_name = $categories[0]->name;
$cat_link = get_category_link($categories[0]);
?>
<div class="single__wrap">
    <section class="page__header text-center">
      <div class="container">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <div class="single__by text-center">
          <span class="single__date"><?php echo get_the_time("d/m/Y"); ?></span> - <?php echo get_the_author(); ?>
        </div>
      </div>
    </section>
    <div class="container">
      <div class="entry-content">
        <?php the_content() ?>
      </div>

      <div class="single__share">
        <p>Chia sẻ tin tức này</p>
        <a href="https://www.facebook.com/sharer.php?u=<?php the_permalink() ?>" class="-fb"><span class="icon-facebook"></span></a>
        <a href="https://telegram.me/share/url?url=<?php the_permalink() ?>&text=<?php the_title() ?>" class="-tele"><span class="icon-telegram"></span></a>
        <a href="https://twitter.com/intent/tweet?&url=<?php the_permalink() ?>" class="-tw"><span class="icon-twitter"></span></a>

      </div>

    </div>
  </div>

<div class="container">
<?php
    related_category_fix(
        array(
            'posts_per_page'    => 6,
            'related_title'     => __( 'Bài viết liên quan', 'dntheme' ),
            'template_type'     => 'slider', // slider , widget
            'template'          => 'content-archive',
            'set_taxonomy'      => null,
            'class_item'        => 'item__wrap',
        )
    );
?>
</div>