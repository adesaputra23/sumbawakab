<?php
/**
 * Displays main header
 *
 * @package Hospital Management
 */
?>

<?php
$hospital_management_sticky_header = get_theme_mod('hospital_management_sticky_header');
    $hospital_management_data_sticky = "true";
?>
<!-- <style>
    /* Sembunyikan header saat scroll ke bawah */
.main-header {
  position: fixed;
  top: 0;
  width: 100%;
  transition: top 0.3s; /* Efek transisi halus */
  z-index: 1000;
}

.header-hidden {
  top: -100px; /* Sesuaikan dengan tinggi header Anda */
}
</style> -->
<div class="main-header text-center text-md-start">
    <div class="container">
        <div class="row nav-box">
            <div class="col-lg-3 col-md-3 col-sm-5 col-12 logo-box">
                <div class="navbar-brand ">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-12 col-md-7 col-sm-5 col-4 align-self-center header-box">
                <?php get_template_part('template-parts/navigation/nav'); ?>
            </div>
            <!-- <div class="col-lg-1 col-md-1 col-sm-1 col-4 align-self-center">
                <?php if(get_theme_mod('hospital_management_search_setting',false) != ''){ ?>
                    <span class="head-search">
                        <div class="header-search-wrapper">
                            <span class="search-main">
                                <i class="fa fa-search"></i>
                            </span>
                            <div class="search-form-main clearfix">
                                <form method="get" class="search-form">
                                  <label>
                                    <input type="search" class="search-field form-control" placeholder="Search …" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
                                  </label>
                                  <input type="submit" class="search-submit btn btn-primary mt-3" value="Search">
                                </form>
                            </div>
                        </div>
                    </span>
                <?php }?>
            </div> -->
            <div class="col-lg-1 col-md-1 col-sm-1 col-4 align-self-center text-lg-end">
                <?php if(get_theme_mod('hospital_management_header_sidebar_icon','')){ ?>
                    <?php if(is_active_sidebar( 'sidebar' )) : ?>
                        <span class="header_in">
                            <button type="button" class="toggle" id="toggle">
                               <span></span>
                            </button>
                        </span>
                        <div class="slidebar text-start" id='slidebar'>
                            <div class="sidebar">
                                <?php dynamic_sidebar( 'sidebar' ); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
