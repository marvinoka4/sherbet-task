<?php

// Register Menu in Admin Dashboard
add_theme_support('menus');

// Menus and their Locations
register_nav_menus(

    array(
        'main-menu' => 'Main Menu',
        'off-canvas-menu' => 'Off-Canvas Menu',
        'footer-menu' => 'Footer Menu',

    )
);


// main nav walker class
class nav_walker extends Walker_Nav_menu {

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $submenu = ($depth > 0) ? 'sub-menu': '';
        $output .= "\n$indent<ul class=\"sub-menu\" role=\"menu\" aria-expanded=\"false\" aria-haspopup=\"true\">\n";
    }

    function start_el( &$output,$item, $depth = 0, $args = array(), $id = 0 )
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = ' aria-haspopup="true" aria-expanded="false" ';
        $class_names   = $value = '';
        $classes       = empty($item->classes) ? [] : (array) $item->classes;
        $classes[]     = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[]     = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[]     = 'menu-item-'.$item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-submenu';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args,  $depth ) );
        $class_names = ' class="'.esc_attr($class_names).'"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args, $depth );
        $id = strlen($id) ? 'id="'.esc_attr($id).'"' : '';

        $output .= $indent.'<li '.$id.$value.$class_names.$li_attributes.' >';

        $attributes = ! empty($item->attr_title) ? 'title="'.esc_attr($item->attr_title).'"' : '';
        $attributes .= ! empty($item->target) ? 'target="'.esc_attr($item->target).'"' : '';
        $attributes .= ! empty($item->xfn) ? 'rel="'.esc_attr($item->xfn).'"' : '';
        $attributes .= ! empty($item->url) ? 'href="'.esc_attr($item->url).'"' : '';

        $attributes .= ($args->walker->has_children) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

        $item_output = $args->before;
        $item_output .= '<a ' . $attributes . ' >';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    //    function end_lvl( &$output, $depth = 0, $args = array() ) {
    //    $indent = str_repeat( "\t", $depth );
    //    $output .= "$indent</ul>\n";
    //    }



} // end nav_walker Class



// add breadcrumb menu
function get_breadcrumb() {

    global $post;

    $trail = '

';
    $page_title = get_the_title($post->ID);

    if($post->post_parent) {
        $parent_id = $post->post_parent;

        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '' . get_the_title($page->ID) . ' » ';
            $parent_id = $page->post_parent;
        }

        $breadcrumbs = array_reverse($breadcrumbs);
        foreach($breadcrumbs as $crumb) $trail .= $crumb;
    }

    $trail .= $page_title;
    $trail .= '

';

    return $trail;

}
