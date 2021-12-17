<?php
/**
 * Template Name: Page Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<?php
$header_bg = get_field('header_bg');
$header_logo = get_field('header_logo');
$header_logo2 = get_field('header_logo2');
?>
<section class="home-banner" style="background-image: url(<?php echo wp_get_attachment_image_url( $header_bg, 'full' ); ?>);">
  <div class="home-banner__logo">
    <?php echo wp_get_attachment_image( $header_logo, 'small' ); ?>
  </div>
  <div class="home-banner__wrap">
    <div class="container">
      <div class="el__meta text-center wow fadeInUp">
        <div>
          <div class="el__thumb">
            <?php echo wp_get_attachment_image( $header_logo2, 'small' ); ?>
          </div>
          <div class="el__excerpt"><?php the_field('header_excerpt') ?></div>
        </div>
      </div>
    </div>
  </div>
  <div class="home-banner__icon">
    <img src="<?php echo get_theme_file_uri('/assets/img/home-banner-arrow.png') ?>" alt="">
  </div>
</section>

<?php
$about_image = get_field('about_image');
?>
<section id="home-about" class="home-about">
  <div class="container">
    <div class="el__box">
      <div class="row">
        <div class="col-12 col-lg-54 order-lg-2">
          <div class="el__thumb">
            <div class="dnfix__thumb -contain">
              <?php echo wp_get_attachment_image( $about_image, 'large' ); ?>
            </div>
          </div>
        </div>

        <div class="col-12 col-lg-46 wow fadeInLeft">
          <div class="el__meta">
            <div class="sc__header">
              <p class="sc__header__title"><?php the_field('about_title') ?></p>
            </div>
            <div class="el__excerpt"><?php the_field('about_content') ?></div>
          </div>
        </div>
      </div>

      <div class="el__text">
        <img src="<?php echo get_theme_file_uri('/assets/img/ri_team-fill.svg') ?>" alt="">
        <?php the_field('about_text') ?>
      </div>

    </div>
  </div>

</section>

<section id="home-mission" class="home-mission">
  <div class="container">

    <header class="sc__header wow fadeInRight">
      <h2 class="sc__header__title"><?php the_field('mission_title') ?></h2>
    </header>
    <?php
    if( have_rows('mission_items') ): $i=0; ?>
        <div class="row">
            <?php while( have_rows('mission_items') ) : the_row(); $i++;
              $sub_title = get_sub_field('title');
              $sub_content = get_sub_field('content');
              ?>
              <div class="col-lg-9 wow <?php echo ($i==1) ? 'fadeInLeft' : 'offset-lg-3 fadeInRight'; ?>">
              <div class="el__item <?php echo ($i%2 == 1) ? '-left' : '-right'; ?>">
                <h3 class="el__item__title"><?php echo $sub_title ?></h3>
                <div class="el__item__excerpt"><?php echo $sub_content ?></div>
              </div>
            </div>
            <?php endwhile; ?>
        </div>
    <?php else :
      get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>

  </div>
</section>

<section id="home-value" class="home-value">
    <div class="container">
      <header class="sc__header wow fadeInUp">
        <h2 class="sc__header__title"><?php the_field('value_title') ?></h2>
      </header>
      <div class="el__items wow fadeInUp">
        <div class="row gx-lg-5">
          <?php
          if( have_rows('value_items') ): $i=0; ?>
              <div class="col-md-6">
                  <?php while( have_rows('value_items') ) : the_row(); $i++;
                    $sub_title = get_sub_field('number');
                    $sub_content = get_sub_field('content');
                    ?>
                    <div class="el__item">
                      <div class="el__item__number"><?php echo $sub_title ?></div>
                      <div class="el__item__title"><?php echo $sub_content ?></div>
                    </div>
                  <?php endwhile; ?>
              </div>
          <?php else :
            get_template_part( 'template-parts/content', 'none' );
          endif;
          ?>

          <?php
          if( have_rows('value_items2') ): $i=0; ?>
              <div class="col-md-6">
                  <?php while( have_rows('value_items2') ) : the_row(); $i++;
                    $sub_title = get_sub_field('number');
                    $sub_content = get_sub_field('content');
                    ?>
                    <div class="el__item">
                      <div class="el__item__number"><?php echo $sub_title ?></div>
                      <div class="el__item__title"><?php echo $sub_content ?></div>
                    </div>
                  <?php endwhile; ?>
              </div>
          <?php else :
            get_template_part( 'template-parts/content', 'none' );
          endif;
          ?>
        </div>
      </div>

    </div>
    <div class="home-value__ic"></div>
</section>

<section class="home-solution">
  <div class="container">
    <header class="sc__header wow fadeInUp">
      <div class="sc__header__title"><?php the_field('solution_title') ?></div>
    </header>
    <div class="el__title"><?php the_field('solution_sub') ?></div>
    <?php
    if( have_rows('solution_items') ):?>
        <div class="row justify-content-center">
            <?php while( have_rows('solution_items') ) : the_row();
              $sub_icon = get_sub_field('icon');
              $sub_title = get_sub_field('title');
              $sub_content = get_sub_field('content');
              ?>
              <div class="el__col col-md-6 col-lg-4 d-md-flex wow fadeInUp">
                <div class="el__item">
                  <div class="el__item__thumb">
                    <div class="dnfix__thumb -contain">
                      <?php echo wp_get_attachment_image( $sub_icon, 'small' ); ?>
                    </div>
                  </div>
                  <div class="el__item__meta">
                    <h3 class="el__item__title"><?php echo $sub_title ?></h3>
                    <div class="el__item__excerpt"><?php echo $sub_content ?></div>
                  </div>
                </div>
              </div>

            <?php endwhile; ?>
        </div>
    <?php else :
      get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>
  </div>
</section>

<?php $new_link = get_field('new_link');?>
<section class="home-news">
  <div class="container">
    <header class="sc__header text-center -small">
      <h2 class="sc__header__title wow fadeInUp"><img src="<?php echo get_theme_file_uri('assets/img/ic-fire.png') ?>" alt=""><?php the_field('new_title') ?></h2>
    </header>
    <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 5,
      'cat' => $term->term_id,
    );
    $the_query = new WP_Query( $args ); ?>
    <?php if ( $the_query->have_posts() ) : $i=0; ?>
      <div class="el__box wow fadeInUp">
        <div class="row">
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;
            $categories = get_the_category();
            ?>

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
                        <div class="el__item__tax me-3"><?php echo $categories[0]->name; ?></div>
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
                        <div class="el__item__tax me-3"><?php echo $categories[0]->name; ?></div>
                        <div class="el__item__date"><span class="icon-clock"></span> <?php echo get_the_time("d/m/Y"); ?></div>
                      </div>
                    </div>
                  </a>
              </div>
            <?php endif; ?>
          <?php endwhile;?>
          </div> <!-- .col-md-6 -->
        </div>

        <div class="text-center">
          <a href="<?php echo get_category_link( $new_link ) ?>" class="el__readmore"><?php _e('Xem thêm','dntheme'); ?></a>
        </div>
      </div>
      <?php
      wp_reset_postdata();
    else :
      get_template_part( 'template-parts/content', 'none' );
    endif; ?>

  </div>
</section>


<?php endwhile; ?>
<?php get_footer();