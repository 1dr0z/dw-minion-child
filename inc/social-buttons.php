<?php

/// Actions to run after theme setup
////////////////////////////////////

add_action('after_setup_theme', 'override_parent_theme');
function override_parent_theme() {
  add_action('after_navigation', 'create_social_buttons');
}


/// Additional Social Buttons
/////////////////////////////

add_action( 'customize_register', 'extend_customizer' );
function extend_customizer( $wp_customize ) {

   $wp_customize->add_setting('dw_minion_theme_options[github]', array(
     'default'        => '',
     'capability'     => 'edit_theme_options',
     'type'           => 'option',
   ));
   $wp_customize->add_control('github', array(
     'label'      => __('Github', 'dw-minion'),
     'section'    => 'dw_minion_social_links',
     'settings'   => 'dw_minion_theme_options[github]',
   ));
   $wp_customize->add_setting('dw_minion_theme_options[bitbucket]', array(
     'default'        => '',
     'capability'     => 'edit_theme_options',
     'type'           => 'option',
   ));
   $wp_customize->add_control('bitbucket', array(
     'label'      => __('Bit Bucket', 'dw-minion'),
     'section'    => 'dw_minion_social_links',
     'settings'   => 'dw_minion_theme_options[bitbucket]',
   ));
   $wp_customize->add_setting('dw_minion_theme_options[fictionpress]', array(
     'default'        => '',
     'capability'     => 'edit_theme_options',
     'type'           => 'option',
   ));
   $wp_customize->add_control('fictionpress', array(
     'label'      => __('Fiction Press', 'dw-minion'),
     'section'    => 'dw_minion_social_links',
     'settings'   => 'dw_minion_theme_options[fictionpress]',
   ));

}


/// Create social buttons on the edge bar
////////////////////////////////////////

function create_social_buttons() {
  $social_links = array(
    'github'      => dw_minion_get_theme_option('github'),
    'bitbucket'   => dw_minion_get_theme_option('bitbucket'),
    'book'        => dw_minion_get_theme_option('fictionpress'),
    'facebook'    => dw_minion_get_theme_option('facebook'),
    'twitter'     => dw_minion_get_theme_option('twitter'),
    'google-plus' => dw_minion_get_theme_option('google_plus'),
    'youtube'     => dw_minion_get_theme_option('youtube'),
    'linkedin'    => dw_minion_get_theme_option('linkedin'),
  );
  ?>

  <div id="actions" class="site-actions clearfix">
      <div class="action show-site-nav">
          <i class="icon-reorder"></i>
      </div>
      <div class="clearfix actions">
          <div class="action search">
              <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="action searchform">
                  <input type="text" placeholder="Search" id="s" name="s" class="search-query">
                  <label for="s"></label>
              </form>
          </div>
          <a class="back-top action" href="#page"><i class="icon-chevron-up"></i></a>

          <div class="action socials">
              <i class="icon-link active-socials"></i>
	      <?php if (count($social_links) > 0) :?>
                  <ul class="unstyled list-socials clearfix" style="width: <?php echo count($social_links)*40; ?>px;">
                  <?php foreach ($social_links as $icon => $link) : ?>
                    <?php if (!$link) continue; ?>
                    <li class="social"><a href="<?php echo $link; ?>"><i class="icon-<?php echo $icon; ?>"></i></a></li>
                  <?php endforeach; ?>
                  </ul>
              <?php endif; ?>
          </div>
      </div>
  </div>
  <?php
}

