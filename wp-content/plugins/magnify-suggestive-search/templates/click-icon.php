<?php
if (!defined('ABSPATH'))
    exit;

$mnssp_icon_picker = isset($search_bar_data['icon_picker']) ? $search_bar_data['icon_picker'] : 'fas fa-search';
$mnssp_post_types = isset($search_bar_data['post_types']) ? $search_bar_data['post_types'] : 'post';
$mnssp_placeholder_text = isset($search_bar_data['mnssp_settings']['placeholder_text']) ? $search_bar_data['mnssp_settings']['placeholder_text'] : 'Search...';
$mnssp_icon_color = isset($search_bar_data['mnssp_settings']['icon_color']) ? $search_bar_data['mnssp_settings']['icon_color'] : '#ffffff';

$mnssp_icon_bg_color = isset($search_bar_data['mnssp_settings']['icon_bg_color']) ? $search_bar_data['mnssp_settings']['icon_bg_color'] : '#000000';
$mnssp_placeholder_color = isset($search_bar_data['mnssp_settings']['placeholder_color']) ? $search_bar_data['mnssp_settings']['placeholder_color'] : '';

$mnssp_search_bar_width = isset($search_bar_data['search_bar_width']) ? $search_bar_data['search_bar_width'] : 'auto';
$mnssp_custom_width = isset($search_bar_data['custom_width']) ? $search_bar_data['custom_width'] : '400px';
$mnssp_limit_per_page = isset($search_bar_data['limit_per_page']) ? $search_bar_data['limit_per_page'] : 10;

$mnssp_active_width = '250px';
if ($mnssp_search_bar_width === 'full') {
    $mnssp_active_width = '100%';
} elseif ($mnssp_search_bar_width === 'custom') {
    $mnssp_active_width = esc_attr($mnssp_custom_width);
}

$mnssp_custom_css = "#click-icon.mnssp-wrap.active { width: {$mnssp_active_width} !important; }";

$mnssp_search_bar_height = isset($search_bar_data['mnssp_settings']['search_bar_height']) ? $search_bar_data['mnssp_settings']['search_bar_height'] : 'medium';
$mnssp_custom_height = isset($search_bar_data['mnssp_settings']['custom_height']) ? $search_bar_data['mnssp_settings']['custom_height'] : '40px';

$mnssp_height_style = '';
if ($mnssp_search_bar_height === 'small') {
    $mnssp_height_style = 'height: 30px;';
} elseif ($mnssp_search_bar_height === 'medium') {
    $mnssp_height_style = 'height: 50px;';
} elseif ($mnssp_search_bar_height === 'large') {
    $mnssp_height_style = 'height: 60px;';
} elseif ($mnssp_search_bar_height === 'custom') {
    $mnssp_height_style = 'height: ' . esc_attr($mnssp_custom_height) . ';';
} else {
    $mnssp_height_style = 'height: 50px;';
}

$mnssp_search_scope = isset($search_bar_data['search_scope']) ? $search_bar_data['search_scope'] : 'title';
$mnssp_priority = isset($search_bar_data['priority']) ? $search_bar_data['priority'] : 'relevance';
$mnssp_exclude_ids = isset($search_bar_data['exclude_ids']) ? $search_bar_data['exclude_ids'] : '';
$mnssp_exclude_categories = isset($search_bar_data['exclude_categories']) ? $search_bar_data['exclude_categories'] : '';

add_action('wp_enqueue_scripts', function () use ($mnssp_custom_css) {
    wp_add_inline_style('mnssp-click-icon', $mnssp_custom_css);
});
?>
<div class="mnssp-wrap  mnssp-search-bar" id="click-icon"
    style="background: <?php echo esc_attr($mnssp_icon_bg_color); ?>; <?php echo esc_attr($mnssp_height_style); ?>">


    <form id="click-icon" role="search" method="get" class="search-form click-icon"
        action="<?php echo esc_url(home_url('/')); ?>">
        <input type="search" class="search-input" placeholder="<?php echo esc_html($mnssp_placeholder_text); ?>"
            value="<?php echo get_search_query(); ?>" name="s"
            style="color: <?php echo esc_attr($mnssp_placeholder_color); ?>;">
        <input type="hidden" name="post_type" value="<?php echo esc_attr($mnssp_post_types); ?>">

        <input type="hidden" name="search_scope" value="<?php echo esc_attr($mnssp_search_scope); ?>">
        <input type="hidden" name="priority" value="<?php echo esc_attr($mnssp_priority); ?>">
        <input type="hidden" name="exclude_ids" value="<?php echo esc_attr($mnssp_exclude_ids); ?>">
        <input type="hidden" name="exclude_categories" value="<?php echo esc_attr($mnssp_exclude_categories); ?>">
        <input type="hidden" name="source" value="<?php echo esc_attr('magnify-suggestive-search'); ?>">
        <input type="hidden" name="limit_per_page" value="<?php echo esc_attr($mnssp_limit_per_page); ?>">


        <?php wp_nonce_field('mnssp_search_nonce'); ?>
    </form>
    <i class="<?php echo esc_attr($mnssp_icon_picker); ?> mnssp-icon mnssp-search-icon" aria-hidden="true"
        style="color: <?php echo esc_attr($mnssp_icon_color); ?>;"></i>
</div>
