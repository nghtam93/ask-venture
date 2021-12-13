<?php
/**
 * The template for displaying archive pages
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */

get_header();
$term = get_queried_object();
$term_id = $term->term_id;
$term_parent_id = $term->parent;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$template = get_field('template',$term);


?>

<section class="page__header text-center">
    <?php the_archive_title() ?>
    <?php dntheme_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
</section>


  <?php

    $categories_list_id = $term_id;
    if($term_parent_id){
      $categories_list_id =  $term_parent_id;
    }

    $categories=get_categories(
        array(
          'parent' => $categories_list_id,
          'hide_empty'      => false
      )
    );
    if($categories):
      ?>
      <div class="container">
        <ul class="archive__cat">
          <li>
            <a href="<?php echo get_category_link($categories_list_id) ?>" class="<?php echo ($term->parent == 0)?'active': ''; ?>"><?php _e('Tất cả bài viết','dntheme'); ?></a>
          </li>
          <?php
          foreach ($categories as $category) {
            $class_active = ($category->name == $term->name) ? 'active' : '';
            ?>
            <li>
              <a href="<?php echo get_category_link($category) ?>" class="<?php echo $class_active ?>"><?php echo $category->name; ?></a>
            </li>
            <?php
          } ?>
        </ul>
      </div>
      <?php
    endif;
  ?>

<?php if($term->parent == 0): ?>

  <?php if($paged == 1 && $template == 'template2'): ?>
  <section class="home-news archive-featured">
    <div class="container">
      <header class="sc__header text-center -small">
        <h2 class="sc__header__title wow fadeInUp"><img src="<?php echo get_theme_file_uri('assets/img/ic-fire.png') ?>" alt=""><?php _e('Bài viết nổi bật','dntheme'); ?></h2>
      </header>
      <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'meta_key' => '_jsFeaturedPost',
        "meta_value" => 'yes'
      );
      $the_query = new WP_Query( $args ); ?>
      <?php if ( $the_query->have_posts() ) : $i=0; ?>
        <div class="el__box wow fadeInUp">
          <div class="row">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++; ?>

              <?php if($i==1): ?>
                <div class="col-lg-6">
                  <div class="el__item -large ef--shine">
                    <a href="<?php the_permalink(); ?>" class="el__item__wrap">
                      <div class="el__item__thumb">
                        <div class="dnfix__thumb">
                          <?php the_post_thumbnail('medium',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                        </div>
                      </div>
                      <div class="el__item__meta">
                        <h3 class="el__item__title text__truncate -n2"><?php the_title(); ?></h3>
                        <div class="d-flex align-items-center">
                          <div class="el__item__tax me-3"><?php _e('Bài viết mới','dntheme'); ?></div>
                          <div class="el__item__date"><span class="icon-clock"></span> <?php echo get_the_time("d/m/Y"); ?></div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
              <?php else: ?>
                <div class="el__item -small ef--shine">
                    <a href="<?php the_permalink(); ?>" class="el__item__wrap">
                      <div class="el__item__thumb">
                        <div class="dnfix__thumb">
                          <?php the_post_thumbnail('small',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
                        </div>
                      </div>
                      <div class="el__item__meta">
                        <h3 class="el__item__title text__truncate -n2"><?php the_title(); ?></h3>
                        <div class="d-flex align-items-center">
                          <div class="el__item__tax me-3"><?php _e('Bài viết mới','dntheme'); ?></div>
                          <div class="el__item__date"><span class="icon-clock"></span> <?php echo get_the_time("d/m/Y"); ?></div>
                        </div>
                      </div>
                    </a>
                </div>
              <?php endif; ?>
            <?php endwhile;?>
            </div> <!-- .col-md-6 -->
          </div>
        </div>
        <?php
        wp_reset_postdata();
      else :
        get_template_part( 'template-parts/content', 'none' );
      endif; ?>

    </div>
  </section>
  <?php endif; ?>

<?php endif; ?>

<div class="archive__content">
  <div class="container">
    <header class="sc__header text-center -small">
      <h2 class="sc__header__title wow fadeInUp"><img src="<?php echo get_theme_file_uri('assets/img/ic-fire.png','dntheme'); ?>" alt=""><?php _e('Bài viết','dntheme'); ?></h2>
    </header>
    <?php
    if ( have_posts() ) : //$i=0;
        echo '<div class="row">';
        while ( have_posts() ) : the_post(); //$i++;
          // if($i>=2){
          ?>
            <div class="col-lg-4 col-sm-6 d-md-flex">
                <?php get_template_part( 'template-parts/content','archive'); ?>
            </div>
        <?php
          // }
        endwhile;
        echo '</div>';
        dntheme_paging_nav();
    else :
          get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>

  </div>
</div>



<?php get_footer();
