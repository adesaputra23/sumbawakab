<?php
if (!defined('ABSPATH'))
    exit;

$mnssp_icon_picker = isset($search_bar_data['icon_picker']) ? $search_bar_data['icon_picker'] : 'fas fa-search';
$mnssp_post_types = isset($search_bar_data['post_types']) ? $search_bar_data['post_types'] : 'post';
$mnssp_placeholder_text = isset($search_bar_data['mnssp_settings']['placeholder_text']) ? $search_bar_data['mnssp_settings']['placeholder_text'] : 'Search...';
$mnssp_icon_color = isset($search_bar_data['mnssp_settings']['icon_color']) ? $search_bar_data['mnssp_settings']['icon_color'] : '#ffffff';
$mnssp_placeholder_color = isset($search_bar_data['mnssp_settings']['placeholder_color']) ? $search_bar_data['mnssp_settings']['placeholder_color'] : '';

$mnssp_border_color = isset($search_bar_data['mnssp_settings']['border_color']) ? $search_bar_data['mnssp_settings']['border_color'] : '#e7f5ff';
$mnssp_search_bar_width = isset($search_bar_data['search_bar_width']) ? $search_bar_data['search_bar_width'] : 'auto';
$mnssp_custom_width = isset($search_bar_data['custom_width']) ? $search_bar_data['custom_width'] : '400px';
$mnssp_limit_per_page = isset($search_bar_data['limit_per_page']) ? $search_bar_data['limit_per_page'] : 10;


$mnssp_hover_width = '200px';
if ($mnssp_search_bar_width === 'full') {
    $mnssp_hover_width = '100%';
} elseif ($mnssp_search_bar_width === 'custom') {
    $mnssp_hover_width = esc_attr($mnssp_custom_width);
}

$mnssp_custom_css = "#hover-icon .search-box:hover > .search-input { width: {$mnssp_hover_width} !important; }";
$mnssp_search_scope = isset($search_bar_data['search_scope']) ? $search_bar_data['search_scope'] : 'title';
$mnssp_priority = isset($search_bar_data['priority']) ? $search_bar_data['priority'] : 'relevance';
$mnssp_exclude_ids = isset($search_bar_data['exclude_ids']) ? $search_bar_data['exclude_ids'] : '';
$mnssp_exclude_categories = isset($search_bar_data['exclude_categories']) ? $search_bar_data['exclude_categories'] : '';

add_action('wp_enqueue_scripts', function () use ($mnssp_custom_css) {
    wp_add_inline_style('mnssp-hover-icon', $mnssp_custom_css);
});
?>


<form id="hover-icon" role="search" method="get" class="search-form serach-page d-flex mnssp-search-bar"
    action="<?php echo esc_url(home_url('/')); ?>">
    <div class="search-box">
        <input type="search" class="search-field search-input" placeholder="<?php echo esc_html($mnssp_placeholder_text); ?>"
            value="<?php echo esc_attr(the_search_query()); ?>" name="s"
            style="color: <?php echo esc_attr($mnssp_placeholder_color); ?>;border-bottom-color: <?php echo esc_attr($mnssp_border_color); ?>;"
            required>
        <input type="hidden" name="post_type" value="<?php echo esc_attr($mnssp_post_types); ?>">

        <input type="hidden" name="search_scope" value="<?php echo esc_attr($mnssp_search_scope); ?>">
        <input type="hidden" name="priority" value="<?php echo esc_attr($mnssp_priority); ?>">
        <input type="hidden" name="exclude_ids" value="<?php echo esc_attr($mnssp_exclude_ids); ?>">
        <input type="hidden" name="exclude_categories" value="<?php echo esc_attr($mnssp_exclude_categories); ?>">
        <input type="hidden" name="source" value="<?php echo esc_attr('magnify-suggestive-search'); ?>">
        <input type="hidden" name="limit_per_page" value="<?php echo esc_attr($mnssp_limit_per_page); ?>">


        <?php wp_nonce_field('mnssp_search_nonce'); ?>
        <button type="submit" name="button" class="search-btn mnssp-search-icon" style="color: <?php echo esc_attr($mnssp_icon_color); ?>;">
            <i class="<?php echo esc_attr($mnssp_icon_picker); ?>" aria-hidden="true"></i>
        </button>
    </div>
</form>