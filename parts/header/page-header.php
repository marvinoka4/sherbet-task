
<div class="grid-container full bg-primary">
    <div class="grid-container relative" style="z-index:200;">
        <div class="grid-x align-middle align-left">
            <div class="small-12 medium-12 large-12 cell color-white padding-top-2">
                <h2 class="copper-text"><?php the_title(); ?></h2>
            </div>
            <div class="small-12 medium-12 large-12 cell color-white padding-bottom-2">
                <p>
                    <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<nav id="breadcrumbs">','</nav>' );
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
