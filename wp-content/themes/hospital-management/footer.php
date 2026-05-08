<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hospital Management
 */
?>

<footer id="colophon" class="site-footer border-top" style="background-color: #00923F;">
    <div class="container">
    	<div class="footer-column" style="border-bottom: 0px solid #fff">
	      	<div class="row py-5">
	      	    <div class="col-lg-4 col-md-6 mb-4">
	      	        <h5 class="widget-title mb-3"><?php esc_html_e( 'About Hospital', 'hospital-management' ); ?></h5>
	      	        <p><?php esc_html_e( 'RSUD Sumbawa is committed to providing excellent healthcare services with modern facilities and a compassionate staff. Dedicated to serving the community’s health needs with professionalism and care.', 'hospital-management' ); ?></p>
	      	        <div class="footer-logo mt-3">
	      	            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-logo.png" alt="Hospital Logo" style="max-width:120px;">
	      	        </div>
	      	    </div>
	      	    <div class="col-lg-2 col-md-6 mb-4">
	      	        <h5 class="widget-title mb-3"><?php esc_html_e( 'Quick Links', 'hospital-management' ); ?></h5>
	      	        <ul class="footer-links list-unstyled">
	      	            <li><a href="<?php echo home_url(); ?>"><?php esc_html_e( 'Home', 'hospital-management' ); ?></a></li>
	      	            <li><a href="<?php echo home_url('/about-us'); ?>"><?php esc_html_e( 'About Us', 'hospital-management' ); ?></a></li>
	      	            <li><a href="<?php echo home_url('/services'); ?>"><?php esc_html_e( 'Services', 'hospital-management' ); ?></a></li>
	      	            <li><a href="<?php echo home_url('/contact'); ?>"><?php esc_html_e( 'Contact', 'hospital-management' ); ?></a></li>
	      	        </ul>
	      	    </div>
	      	    <div class="col-lg-3 col-md-6 mb-4">
	      	        <h5 class="widget-title mb-3"><?php esc_html_e( 'Contact Info', 'hospital-management' ); ?></h5>
	      	        <ul class="contact-info list-unstyled">
	      	            <li><i class="fa fa-map-marker"></i> <?php esc_html_e( 'Jl. Sudirman No.6, Sumbawa Besar', 'hospital-management' ); ?></li>
	      	            <li><i class="fa fa-phone"></i> <a href="tel:+6237162219">(+62) 371 62219</a></li>
	      	            <li><i class="fa fa-envelope"></i> <a href="mailto:info@rsudsumbawa.com">info@rsudsumbawa.com</a></li>
	      	        </ul>
	      	        <div class="footer-social mt-3">
	      	            <a href="https://facebook.com" class="me-2"><i class="fab fa-facebook-f"></i></a>
	      	            <a href="https://instagram.com" class="me-2"><i class="fab fa-instagram"></i></a>
	      	            <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
	      	        </div>
	      	    </div>
	      	    <div class="col-lg-3 col-md-6 mb-4">
	      	        <h5 class="widget-title mb-3"><?php esc_html_e( 'Opening Hours', 'hospital-management' ); ?></h5>
	      	        <ul class="opening-hours list-unstyled">
	      	            <li><?php esc_html_e( 'Monday - Friday:', 'hospital-management' ); ?> <span>07:00 - 20:00</span></li>
	      	            <li><?php esc_html_e( 'Saturday:', 'hospital-management' ); ?> <span>08:00 - 14:00</span></li>
	      	            <li><?php esc_html_e( 'Sunday:', 'hospital-management' ); ?> <span><?php esc_html_e( 'Closed', 'hospital-management' ); ?></span></li>
	      	        </ul>
	      	        <!-- <div class="newsletter mt-3">
	      	            <form action="#" method="post">
	      	                <label for="footer-newsletter" class="form-label"><?php esc_html_e( 'Subscribe to our Newsletter:', 'hospital-management' ); ?></label>
	      	                <div class="input-group">
	      	                    <input type="email" id="footer-newsletter" name="footer-newsletter" class="form-control" placeholder="<?php esc_attr_e( 'Email address', 'hospital-management' ); ?>" required>
	      	                    <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i></button>
	      	                </div>
	      	            </form>
	      	        </div> -->
	      	    </div>
	      	</div>
	      	<div class="footer-bottom text-center border-top pt-3 pb-1">
	      	    <p class="mb-0">
	      	        &copy; <?php echo date('Y'); ?> RSUD Sumbawa. <?php esc_html_e( 'All Rights Reserved.', 'hospital-management' ); ?>
	      	    </p>
	      	</div>
		</div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>
<script>
var lastScrollTop = 0;
var navbar = document.querySelector(".main-header"); // Ganti dengan class header Anda
// Ambil semua elemen anchor di dalam .main-navigation .menu li dan simpan ke dalam variabel
// Untuk mengubah warna semua elemen dalam NodeList, gunakan loop seperti forEach:
var menuLinks = document.querySelectorAll('.main-navigation .menu li a');


window.addEventListener("scroll", function() {
  var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  
  if (scrollTop > lastScrollTop) {
    // Scroll ke bawah
    navbar.classList.add("header-hidden");
} else {
	// Scroll ke atas
    if (scrollTop === 0) {
		navbar.classList.remove("header-hidden");
    } else {
      navbar.classList.add("header-hidden");
    }
  }
  lastScrollTop = scrollTop;
});
</script>

</body>
</html>