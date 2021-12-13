<?php
/**
 * Template Name: Page Contact
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

<section class="page__header text-center">
    <h1 class="page__header__title"><img src="<?php echo get_theme_file_uri('assets/img/contact-title-ic.png') ?>" alt=""><?php the_title() ?></h1>
</section>

<div class="page__contact">
  <div class="container">
    <div class="entry-content">
      <?php the_content() ?>
    </div>

    <div class="page__contact__email text-center">
        <p><strong><?php _e('Email','dntheme'); ?></strong></p>
        <p><a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a></p>
    </div>
    <div class="page__contact__form">
      <div class="row">
        <div class="col-md-6 col-lg-7">
          <div class="page__contact__thumb dnfix__thumb">
            <?php the_post_thumbnail('large',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
          </div>
        </div>
        <div class="col-md-6 col-lg-5">
            <?php echo do_shortcode(get_field('form')) ?>
        </div>
      </div>
    </div>

  </div>
</div>

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