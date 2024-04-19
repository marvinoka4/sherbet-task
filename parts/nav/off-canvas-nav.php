<?php
/**
 * The template part for displaying offcanvas content
 *
 */
?>

<div class="off-canvas-wrapper">

    <nav class="off-canvas position-right text-white text-center padding-top-2" id="off-canvas" data-off-canvas>
        <div class="cell large-4 medium-6  small-6 padding-bottom-2">
            <a href="/" >
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/util/sherbet.svg" width="150" alt="Marvin Okafor"/>
            </a>
        </div>

        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'off-canvas-menu',
                'container' => '',
                'items_wrap' => '<ul class="vertical menu">%3$s</ul>',
                'walker' => new nav_walker(),
            )
        )
        ?>

        <div class="vertical menu show-for-large">
            <a class="nav-cta secondary button margin-bottom-0 margin-horizontal-1">Free Consultation</a>
        </div>
    </nav>
