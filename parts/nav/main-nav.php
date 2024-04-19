<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 */
?>

<div class="off-canvas-content" data-off-canvas-content>

    <div class="off-canvas-content bg-v-5" data-off-canvas-content>
    <header class="header grid-container" role="banner">
        <div class="">
            <div class="grid-x align-middle header-bar">
                <div class="large-2 medium-6 small-6 cell">
                    <a href="/" >
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/util/sherbet.svg" width="100" alt="Sherbet Donkey"/>
                    </a>
                </div>
                <div class="large-8 medium-6 small-6 cell flex-container align-center align-middle show-for-large">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu',
                            'container' => '',
                            'items_wrap' => '<ul class="dropdown menu show-for-large" data-dropdown-menu>%3$s</ul>',
                            'walker' => new nav_walker(),
                        )
                    )
                    ?>
                </div>
              <div class="large-2 medium-6 small-6 cell flex-container align-middle align-right text-right">
                <div class="show-for-medium">
                  <a href="/" class="button rounded-button margin-bottom-0 nav-button"><span class="rounded-button-text nav-button-text">Contact us</span></a>
                </div>
                <div class="padding-left-1 show-for-medium-only">
                  <div class="small-8 cell align-middle">
                    <a href="/" class="button summer-citrus rounded-button margin-bottom-0 nav-button"> <i class="uil uil-bars"></i> <span class="rounded-button-text nav-button-text">Menu</span></a>
                  </div>
                </div>
                <div class="show-for-small-only">
                  <div class="small-8 cell align-middle">
                    <a href="/" class="button rounded-button margin-bottom-0 nav-button"> <i class="uil uil-bars"></i> <span class="rounded-button-text nav-button-text">MENU</span></a>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </header> <!-- end .header -->

