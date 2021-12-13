<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$logo_img = get_field('logo_footer', 'option');
?>

    <section class="newsletter">
      <div class="container">
        <div class="el__box wow fadeInUp">
          <h3 class="el__box__title"><img src="<?php echo get_theme_file_uri('assets/img/newsletter-ic.png') ?>" alt=""><?php _e('Nhận tin mới nhất','dntheme'); ?></h3>
          <div class="el__box__excerpt"><?php _e('Xin chân thành cảm ơn quý khách đã ghé thăm website của ASK ventures. Để lại email để nhận tin tức mới nhất của chúng tôi!','dntheme'); ?></div>
          <form method="post" action="<?php echo site_url('?na=s') ?>">
            <input type="hidden" name="nlang" value="">
            <input type="text" name="ne" class="form-control input-text" placeholder="<?php _e('Nhập địa chỉ email','dntheme'); ?>">
            <input type="submit" class="input-submit" value="<?php _e('Đăng ký','dntheme'); ?>">
          </form>
        </div>
      </div>
    </section>

    <footer class="footer text-center">
      <div class="container position-relative">
        <div class="footer__logo">
          <a href="<?php echo site_url(); ?>" class="footer__logo">
            <?php echo wp_get_attachment_image( $logo_img, 'full' ); ?>
          </a>
        </div>
        <div class="footer__text"><?php the_field('footer_content', 'option') ?></div>

        <div class="footer__socical">
          <p class="footer__socical__title"><?php _e('Theo dõi chúng tôi tại','dntheme'); ?></p>
          <ul class="">
            <li><a href="<?php the_field('fb', 'option') ?>" target="_blank"><span class="icon-facebook"></span></a></li>
            <li><a href="<?php the_field('ytb', 'option') ?>" target="_blank"><span class="icon-youtube"></span></a></li>
            <li><a href="<?php the_field('telegram_channel', 'option') ?>" target="_blank"><span class="icon-telegram"></span></a></li>
            <li><a href="<?php the_field('twitter', 'option') ?>" target="_blank"><span class="icon-twitter"></span></a></li>
            <li><a href="<?php the_field('zalo', 'option') ?>" target="_blank"><span class="icon-zalo"></span></a></li>
          </ul>
        </div>

      </div>

      <div class="copyright">
        <div class="container">
          <p><?php the_field('copyright', 'option'); ?></p>
        </div>
      </div>
    </footer>
  </div>


  <nav id="menu__mobile" class="nav__mobile">
      <div class="nav__mobile__content">
        <?php
            wp_nav_menu(
            array(
               'theme_location'  => 'primary',
               'container'       => 'ul',
               'container_class' => '',
               'menu_id'         => '',
               'menu_class'      => 'nav__mobile--ul',
            ));
          ?>
      </div>
  </nav>
</div> <!-- end .wrapper -->
<?php wp_footer(); ?>
</body>
</html>
