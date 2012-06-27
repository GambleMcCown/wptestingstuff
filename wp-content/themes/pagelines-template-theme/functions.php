<?php
// Setup  -- Probably want to keep this stuff... 

/**
 * Hello and welcome to Base! First, lets load the PageLines core so we have access to the functions 
 */
require_once( dirname(__FILE__) . '/setup.php' );
	
// For advanced customization tips & code see advanced file.
	//--> require_once(STYLESHEETPATH . "/advanced.php");
	
// ====================================================
// = YOUR FUNCTIONS - Where you should add your code  =
// ====================================================


// ABOUT HOOKS --------//
	// Hooks are a way to easily add custom functions and content to PageLines. There are hooks placed strategically throughout the theme 
	// so that you insert code and content with ease.


// ABOUT FILTERS ----------//

	// Filters allow data modification on-the-fly. Which means you can change something after it was read and compiled from the database,
	// but before it is shown to your visitor. Or, you can modify something a visitor sent to your database, before it is actually written there.

// FILTERS EXAMPLE ---------//

	// The following filter will add the font  Ubuntu into the font array $thefoundry.
	// This makes the font available to the framework and the user via the admin panel.

/**
 *
 * AMI custom post types
 *
 */

// Custom post type for News
register_post_type("ami_news_item", array(
    "labels"          => array(
        "name"                => "News",
        "singular_name"       => "News",
        "add_new"             => "Add New News Item",
        "add_new_item"        => "Add New News Item",
        "edit_item"           => "Edit News Item",
        "new_item"            => "New News Item",
        "all_items"           => "All News Items",
        "view_item"           => "View News Item",
        "search_items"        => "Search News Items",
        "not_found"           => "No news items found",
        "not_found_in_trash"  => "No news items found in Trash",
        "parent_item_colon"   => "",
        "menu_name"           => "News Items"
    ),
    "public"          => true,
    "rewrite"         => array("slug" => "news"),
    "supports"        => array("title", "editor", "revisions", "thumbnail", "excerpt","custom-fields"),
    "taxonomies"      => array("anewsitemtype"),
    "menu_position"   => 5,
    "has_archive"     => true,
));
register_taxonomy(
    'news_category',
    'ami_news_item',
    array(
        'hierarchical'  => true,
        'label'         => "News Item Types",
        'query_var'     => 'anewsitemtype',
        'rewrite'       => true
    ));

// Custom post type for Press Releases
register_post_type("ami_press_release", array(
    "labels"          => array(
        "name"                => "Press Releases",
        "singular_name"       => "Press Release",
        "add_new"             => "Add New Press Release",
        "add_new_item"        => "Add New Press Release",
        "edit_item"           => "Edit Press Release",
        "new_item"            => "New Press Release",
        "all_items"           => "All Press Releases",
        "view_item"           => "View Press Releases",
        "search_items"        => "Search Press Releases",
        "not_found"           => "No press releases found",
        "not_found_in_trash"  => "No press releases found in Trash",
        "parent_item_colon"   => "",
        "menu_name"           => "Press Releases"
    ),
    "public"          => true,
    "rewrite"         => array("slug" => "press-releases"),
    "supports"        => array("title", "editor", "revisions","thumbnail", "excerpt","custom-fields"),
    "taxonomies"      => array("apressreleasetype"),
    "menu_position"   => 5,
    "has_archive"     => true,
));


// Custom post type for Fact Sheets
register_post_type("ami_fact_sheet", array(
    "labels"          => array(
        "name"                => "Fact Sheets",
        "singular_name"       => "Fact Sheet",
        "add_new"             => "Add New Fact Sheet",
        "add_new_item"        => "Add New Fact Sheet",
        "edit_item"           => "Edit Fact Sheet",
        "new_item"            => "New Fact Sheet",
        "all_items"           => "All Fact Sheets",
        "view_item"           => "View Fact Sheet",
        "search_items"        => "Search Fact Sheets",
        "not_found"           => "No fact sheets found",
        "not_found_in_trash"  => "No fact sheets found in Trash",
        "parent_item_colon"   => "",
        "menu_name"           => "Fact Sheets"
    ),
    "public"          => true,
    "rewrite"         => array("slug" => "fact-sheets"),
    "supports"        => array("title", "editor", "revisions", "thumbnail", "excerpt","custom-fields"),
    "taxonomies"      => array("afactsheettype"),
    "menu_position"   => 5,
    "has_archive"     => true,
));
register_taxonomy(
    'fact_sheet_type',
    'ami_fact_sheet',
    array(
        'hierarchical'  => true,
        'label'         => "Fact Sheet Types",
        'query_var'     => 'afactsheettype',
        'rewrite'       => true
    ));



// Custom post type for Conference
register_post_type("ami_conference", array(
    "labels"          => array(
        "name"                => "Conferences",
        "singular_name"       => "Conference",
        "add_new"             => "Add New Conference",
        "add_new_item"        => "Add New Conference",
        "edit_item"           => "Edit Conference",
        "new_item"            => "New Conference",
        "all_items"           => "All Conferences",
        "view_item"           => "View Conference",
        "search_items"        => "Search Conferences",
        "not_found"           => "No conferences found",
        "not_found_in_trash"  => "No conferences found in Trash",
        "parent_item_colon"   => "",
        "menu_name"           => "Conferences"
    ),
    "public"          => true,
    "rewrite"         => array("slug" => "conferences"),
    "supports"        => array("title", "editor", "revisions", "excerpt","thumbnail","custom-fields"),
    "taxonomies"      => array("aconftype"),
    "menu_position"   => 5,
    "has_archive"     => true,
));


// Custom post type for Videos
add_action('init', 'ami_videos_init');
function ami_videos_init()
{
    $video_labels = array(
        'name' => _x('Videos', 'post type general name'),
        'singular_name' => _x('Video', 'post type singular name'),
        'all_items' => __('All Videos'),
        'add_new' => _x('Add new video', 'videos'),
        'add_new_item' => __('Add new video'),
        'edit_item' => __('Edit video'),
        'new_item' => __('New video'),
        'view_item' => __('View video'),
        'search_items' => __('Search in videos'),
        'not_found' =>  __('No videos found'),
        'not_found_in_trash' => __('No videos found in trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $video_labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
        'has_archive' => 'videos'
    );
    register_post_type('videos',$args);
}




// Add new Custom Post Type icons
add_action( 'admin_head', 'article_icons' );
function article_icons() {
    ?>
<style type="text/css" media="screen">
    #menu-posts-ami_fact_sheet .wp-menu-image {
        background: url(<?php bloginfo('url') ?>/wp-content/themes/images/articlessmall.png) no-repeat 6px !important;
    }
    .icon32-posts-ami_fact_sheet {
        background: url(<?php bloginfo('url') ?>/wp-content/themes/images/articles.png) no-repeat !important;
    }

    #menu-posts-ami_press_release .wp-menu-image {
        background: url(<?php bloginfo('url') ?>/wp-content/themes/images/articlessmall.png) no-repeat 6px !important;
    }
    .icon32-posts-ami_press_release {
        background: url(<?php bloginfo('url') ?>/wp-content/themes/images/articles.png) no-repeat !important;
    }

    #menu-posts-ami_news_item .wp-menu-image {
        background: url(<?php bloginfo('url') ?>/wp-content/themes/images/newssmall.png) no-repeat 6px !important;
    }
    .icon32-posts-ami_news_item {
        background: url(<?php bloginfo('url') ?>/wp-content/themes/images/news.png) no-repeat !important;
    }

    #menu-posts-ami_conference .wp-menu-image {
        background: url(<?php bloginfo('url') ?>/wp-content/themes/images/conferencessmall.png) no-repeat 6px !important;
    }
    .icon32-posts-ami_ami_conference {
        background: url(<?php bloginfo('url') ?>/wp-content/themes/images/conferences.png) no-repeat !important;
    }

    #menu-posts-videos .wp-menu-image {
        background: url(<?php bloginfo('url') ?>/wp-content/themes/images/videosmall.png) no-repeat 6px !important;
    }
    .icon32-posts-videos {
        background: url(<?php bloginfo('url') ?>/wp-content/themes/images/video.png) no-repeat !important;
    }

</style>
<?php }







/**
 *
 * Rewrite rules
 *
 */

// news/2011
add_rewrite_rule(
    '^news/(\d\d\d\d)/?$',
    'index.php?post_type=ami_news_item&year=$matches[1]',
    'top'
);

// news/2011/page/2/
add_rewrite_rule(
    '^news/(\d\d\d\d)/page/(\d)/?$',
    'index.php?post_type=ami_news_item&year=$matches[1]&paged=$matches[2]',
    'top'
);

// news/2011/09
add_rewrite_rule(
    '^news/(\d\d\d\d)/(\d\d)/?$',
    'index.php?post_type=ami_news_item&year=$matches[1]&monthnum=$matches[2]',
    'top'
);

// news/2011/09/page/2/
add_rewrite_rule(
    '^news/(\d\d\d\d)/(\d\d)/page/(\d)/?$',
    'index.php?post_type=ami_news_item&year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]',
    'top'
);

//---------------

// press-releases/2011
add_rewrite_rule(
    '^press-releases/(\d\d\d\d)/?$',
    'index.php?post_type=ami_press_release&year=$matches[1]',
    'top'
);

// press-releases/2011/09/page/2/
add_rewrite_rule(
    '^press-releases/(\d\d\d\d)/page/(\d)/?$',
    'index.php?post_type=ami_press_release&year=$matches[1]&paged=$matches[2]',
    'top'
);

// press-releases/2011/09
add_rewrite_rule(
    '^press-releases/(\d\d\d\d)/(\d\d)/?$',
    'index.php?post_type=ami_press_release&year=$matches[1]&monthnum=$matches[2]',
    'top'
);

// press-releases/2011/09/page/2/
add_rewrite_rule(
    '^press-releases/(\d\d\d\d)/(\d\d)/page/(\d)/?$',
    'index.php?post_type=ami_press_release&year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]',
    'top'
);

/*
 *
 * Custom Post Type Archives
 *
 */

function wp_get_post_type_archives($post_type, $pathroot, $args = array()) {
    $echo = isset($args['echo']) ? $args['echo'] : true;
    $type = isset($args['type']) ? $args['type'] : 'monthly';

    $args['post_type'] = $post_type;
    $args['echo'] = false;

    $html = wp_get_archives($args); // let WP do the hard stuff

    $pattern = 'href=\'' . get_bloginfo('url') . '/';
    $replacement = 'href=\'' . get_bloginfo('url') . '/' . $pathroot . '/';
    $html = str_replace($pattern, $replacement, $html);

    if($echo)
        echo $html;
    else
        return $html;
}

function wp_get_post_type_archives_filter($where, $options) {
    if(!isset($options['post_type'])) return $where; // OK - this is regular wp_get_archives call - don't do anything

    global $wpdb; // get the DB engine

    $post_type = $wpdb->escape($options['post_type']); // escape the passed value to be SQL safe
    if($post_type == 'all') $post_type = ''; // if we want to have archives for all post types
    else $post_type = "post_type = '$post_type' AND"; // otherwise just for specific one

    $where = str_replace('post_type = \'post\' AND', $post_type, $where);

    return $where;
}
add_filter('getarchives_where', 'wp_get_post_type_archives_filter', 10, 2);

