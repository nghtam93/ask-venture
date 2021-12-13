<?php
/**
 * Template Name: Page About
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
$pageID = get_option('page_on_front');
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <section class="page__header text-center">
    <h1 class="page__header__title"><img src="assets/img/about-title-ic.png" alt=""><?php the_title(); ?></h1>
  </section>

  <?php
  $about_image = get_field('image');
  $about_logo = get_field('logo');
  ?>

  <section class="about-about">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-lg-60 wow fadeInLeft">
          <div class="el__thumb">
            <div class="dnfix__thumb">
              <?php echo wp_get_attachment_image( $about_image, 'large' ); ?>
            </div>
          </div>
        </div>
        <div class="col-md-5">
        <div class="el__meta wow fadeInRight">
          <div class="about-about__logo mb-4">
            <?php echo wp_get_attachment_image( $about_logo, 'medium' ); ?>
          </div>
          <div class="el__box"><?php the_field('content') ?></div>
        </div>
        </div>
      </div>
      <div class="about-about__icon">
        <img src="<?php echo get_theme_file_uri('/assets/img/home-banner-arrow.png') ?>" alt="">
      </div>
    </div>
  </section>

  <?php
  $homeabout_image = get_field('about_image',$pageID);
  ?>
  <section id="home-about" class="home-about">
    <div class="container">
      <div class="el__box">
        <div class="row">
          <div class="col-12 col-lg-54 order-lg-2">
            <div class="el__thumb">
              <div class="dnfix__thumb -contain">
                <?php echo wp_get_attachment_image( $homeabout_image, 'large' ); ?>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-46 wow fadeInLeft">
            <div class="el__meta">
              <div class="sc__header">
                <p class="sc__header__title"><?php the_field('about_title',$pageID) ?></p>
              </div>
              <div class="el__excerpt"><?php the_field('about_content',$pageID) ?></div>
            </div>
          </div>
        </div>

        <div class="el__text">
          <img src="<?php echo get_theme_file_uri('/assets/img/ri_team-fill.svg') ?>" alt="">
          <?php the_field('about_text',$pageID) ?>
        </div>

      </div>
    </div>

  </section>


  <?php
  $gallery = get_field('gallery');
  if( $gallery ): $i=0; ?>
      <section class="about-gallery wow fadeInUp">
        <div class="container">
          <div class="el__items">
            <?php foreach( $gallery as $image_id ): $i++; ?>

              <?php if($i<=6): ?>
              <div class="el__item -s<?php echo $i ?> ef--zoomin">
                <a href="<?php echo wp_get_attachment_image_url( $image_id, 'full' ); ?>" class="el__item__thumb dnfix__thumb" data-fancybox="gallery">
                  <?php echo wp_get_attachment_image( $image_id, 'large' ); ?>
                </a>
              </div>
              <?php else: ?>
                <a href="<?php echo wp_get_attachment_image_url( $image_id, 'full' ); ?>" data-fancybox="gallery" class="d-none"></a>
              <?php endif; ?>

            <?php endforeach; ?>
          </div>
        </div>
      </section>
  <?php endif; ?>

  <section id="home-mission" class="home-mission">
    <div class="container">

      <header class="sc__header wow fadeInRight">
        <h2 class="sc__header__title"><?php the_field('mission_title',$pageID) ?></h2>
      </header>
      <?php
      if( have_rows('mission_items',$pageID) ): $i=0; ?>
          <div class="row">
              <?php while( have_rows('mission_items',$pageID) ) : the_row(); $i++;
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
          <h2 class="sc__header__title"><?php the_field('value_title',$pageID) ?></h2>
        </header>
        <div class="el__items wow fadeInUp">
          <div class="row gx-lg-5">
            <?php
            if( have_rows('value_items',$pageID) ): $i=0; ?>
                <div class="col-md-6">
                    <?php while( have_rows('value_items',$pageID) ) : the_row(); $i++;
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
            if( have_rows('value_items2',$pageID) ): $i=0; ?>
                <div class="col-md-6">
                    <?php while( have_rows('value_items2',$pageID) ) : the_row(); $i++;
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
        <div class="sc__header__title"><?php the_field('solution_title',$pageID) ?></div>
      </header>
      <div class="el__title"><?php the_field('solution_sub',$pageID) ?></div>
      <?php
      if( have_rows('solution_items',$pageID) ):?>
          <div class="row justify-content-center">
              <?php while( have_rows('solution_items',$pageID) ) : the_row();
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

  <section class="about-socials wow fadeInUp">
    <div class="container">
      <div class="el__box">
        <h2 class="el__title"><img src="images/pages/about-socials-ic.png" alt=""><?php _e('Các kênh thông tin của chúng tôi','dntheme'); ?></h2>
        <ul class="el__list">
          <?php
          $web = get_field('web', 'option');
          if($web): ?>
            <li>
              <div class="el__label">Website</div>
              <div class="el__value"><a href="<?php echo $web ?>" target="_blank"><?php echo $web; ?></a></div>
            </li>
          <?php endif; ?>

          <?php
          $fb = get_field('fb', 'option');
          if($fb): ?>
          <li>
            <div class="el__label">Fan Page Facebook</div>
            <div class="el__value"><a href="<?php echo $fb ?>" target="_blank"><?php echo $fb ?> </a></div>
          </li>
          <?php endif; ?>

          <?php
          $ytb = get_field('ytb', 'option');
          if($ytb): ?>
          <li>
            <div class="el__label">Youtube</div>
            <div class="el__value"><a href="<?php echo $ytb ?>" target="_blank"><?php echo $ytb ?> </a></div>
          </li>
          <?php endif; ?>

          <?php
          $telegram_group = get_field('telegram_group', 'option');
          if($telegram_group): ?>

          <li>
            <div class="el__label">Telegram Group</div>
            <div class="el__value"><a href="<?php echo $telegram_group ?>" target="_blank"><?php echo $telegram_group ?></a></div>
          </li>
          <?php endif; ?>

          <?php
          $telegram_channel = get_field('telegram_channel', 'option');
          if($telegram_channel): ?>
          <li>
            <div class="el__label">Telegram Channel</div>
            <div class="el__value"><a href="<?php echo $telegram_channel ?>" target="_blank"><?php echo $telegram_channel ?></a></div>
          </li>
          <?php endif; ?>

          <?php
          $zalo = get_field('zalo', 'option');
          if($zalo): ?>
          <li>
            <div class="el__label">Zalo</div>
            <div class="el__value"><a href="<?php echo $zalo ?>" target="_blank"><?php echo $zalo ?></a></div>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </section>

<?php endwhile; ?>



<?php get_footer();