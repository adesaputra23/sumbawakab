<?php
if (!defined('ABSPATH'))
    exit;
$mnssp_icon_picker = isset($search_bar_data['icon_picker']) ? $search_bar_data['icon_picker'] : 'fas fa-search';
$mnssp_post_types = isset($search_bar_data['post_types']) ? $search_bar_data['post_types'] : 'post';
$mnssp_submit_button_label = isset($search_bar_data['mnssp_settings']['submit_button_label']) ? $search_bar_data['mnssp_settings']['submit_button_label'] : 'Search';
$mnssp_placeholder_text = isset($search_bar_data['mnssp_settings']['placeholder_text']) ? $search_bar_data['mnssp_settings']['placeholder_text'] : 'Search...';
$mnssp_show_submit_button = isset($search_bar_data['mnssp_settings']['show_submit_button']) ? $search_bar_data['mnssp_settings']['show_submit_button'] : false;
$mnssp_border_color = isset($search_bar_data['mnssp_settings']['border_color']) ? $search_bar_data['mnssp_settings']['border_color'] : '#e7f5ff';
$mnssp_placeholder_color = isset($search_bar_data['mnssp_settings']['placeholder_color']) ? $search_bar_data['mnssp_settings']['placeholder_color'] : '';
$mnssp_icon_color = isset($search_bar_data['mnssp_settings']['icon_color']) ? $search_bar_data['mnssp_settings']['icon_color'] : '#ffffff';
$mnssp_icon_bg_color = isset($search_bar_data['mnssp_settings']['icon_bg_color']) ? $search_bar_data['mnssp_settings']['icon_bg_color'] : '#000000';
$mnssp_submit_button_bg_color = isset($search_bar_data['mnssp_settings']['submit_button_bg_color']) ? $search_bar_data['mnssp_settings']['submit_button_bg_color'] : '#000000';
$mnssp_submit_button_text_color = isset($search_bar_data['mnssp_settings']['submit_button_text_color']) ? $search_bar_data['mnssp_settings']['submit_button_text_color'] : '#ffffff';
$mnssp_submit_button_bg_hover_color = isset($search_bar_data['mnssp_settings']['submit_button_bg_hover_color']) ? $search_bar_data['mnssp_settings']['submit_button_bg_hover_color'] : '#000000';
$mnssp_submit_button_text_hover_color = isset($search_bar_data['mnssp_settings']['submit_button_text_hover_color']) ? $search_bar_data['mnssp_settings']['submit_button_text_hover_color'] : '#ffffff';
$mnssp_search_bar_width = isset($search_bar_data['search_bar_width']) ? $search_bar_data['search_bar_width'] : 'auto';
$mnssp_custom_width = isset($search_bar_data['custom_width']) ? $search_bar_data['custom_width'] : '400px';
$mnssp_limit_per_page = isset($search_bar_data['limit_per_page']) ? $search_bar_data['limit_per_page'] : 10;

$mnssp_width_style = '';
if ($mnssp_search_bar_width === 'full') {
    $mnssp_width_style = 'width: 100%; max-width: 100%;';
} elseif ($mnssp_search_bar_width === 'custom') {
    $mnssp_width_style = 'width: ' . esc_attr($mnssp_custom_width) . '; max-width: ' . esc_attr($mnssp_custom_width) . ';';
} else {
    $mnssp_width_style = '';
}

$mnssp_search_bar_height = isset($search_bar_data['mnssp_settings']['search_bar_height']) ? $search_bar_data['mnssp_settings']['search_bar_height'] : 'medium';
$mnssp_custom_height = isset($search_bar_data['mnssp_settings']['custom_height']) ? $search_bar_data['mnssp_settings']['custom_height'] : '40px';

$mnssp_height_style = '';
if ($mnssp_search_bar_height === 'small') {
    $mnssp_height_style = 'height: 30px;';
} elseif ($mnssp_search_bar_height === 'medium') {
    $mnssp_height_style = 'height: 40px;';
} elseif ($mnssp_search_bar_height === 'large') {
    $mnssp_height_style = 'height: 50px;';
} elseif ($mnssp_search_bar_height === 'custom') {
    $mnssp_height_style = 'height: ' . esc_attr($mnssp_custom_height) . ';';
} else {
    $mnssp_height_style = 'height: 40px;';
}

$mnssp_search_scope = isset($search_bar_data['search_scope']) ? $search_bar_data['search_scope'] : 'title';
$mnssp_priority = isset($search_bar_data['priority']) ? $search_bar_data['priority'] : 'relevance';
$mnssp_exclude_ids = isset($search_bar_data['exclude_ids']) ? $search_bar_data['exclude_ids'] : '';
$mnssp_exclude_categories = isset($search_bar_data['exclude_categories']) ? $search_bar_data['exclude_categories'] : '';

?>

<form role="search" method="get" id="default-serach" class="search-form default mnssp-search-bar"
    action="<?php echo esc_url(home_url('/')); ?>"
    style="border-color: <?php echo esc_attr($mnssp_border_color); ?>; <?php echo esc_attr($mnssp_width_style); ?> <?php echo esc_attr($mnssp_height_style); ?>">
    <input type="search" class="search-input" placeholder="<?php echo esc_html($mnssp_placeholder_text); ?>"
        value="<?php echo get_search_query(); ?>" name="s" style="color: <?php echo esc_attr($mnssp_placeholder_color); ?>;">
    <input type="hidden" name="post_type" value="<?php echo esc_attr($mnssp_post_types); ?>">
    <input type="hidden" name="search_scope" value="<?php echo esc_attr($mnssp_search_scope); ?>">
    <input type="hidden" name="priority" value="<?php echo esc_attr($mnssp_priority); ?>">
    <input type="hidden" name="exclude_ids" value="<?php echo esc_attr($mnssp_exclude_ids); ?>">
    <input type="hidden" name="exclude_categories" value="<?php echo esc_attr($mnssp_exclude_categories); ?>">
    <input type="hidden" name="source" value="<?php echo esc_attr('magnify-suggestive-search'); ?>">
    <input type="hidden" name="limit_per_page" value="<?php echo esc_attr($mnssp_limit_per_page); ?>">


    <?php wp_nonce_field('mnssp_search_nonce'); ?>
    <?php if ($mnssp_show_submit_button) { ?>
        <button type="submit" class="search-button mnssp-btn"
            style="color: <?php echo esc_attr($mnssp_submit_button_text_color); ?>; background: <?php echo esc_attr($mnssp_submit_button_bg_color); ?>;"><?php echo esc_html($mnssp_submit_button_label); ?></button>
    <?php } else { ?>
        <button type="submit" class="search-button mnssp-search-icon"
            style="color: <?php echo esc_attr($mnssp_icon_color); ?>; background: <?php echo esc_attr($mnssp_icon_bg_color); ?>;"><i
                class="<?php echo esc_attr($mnssp_icon_picker); ?>"></i></button>
    <?php } ?>
</form>
