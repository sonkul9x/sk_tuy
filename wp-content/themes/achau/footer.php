<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A Chau
 */
$achau_options = get_option("achau_options");
?>	
			<div class="clear clearfix"></div>
			<footer id="site-footer">
				<div class="footer">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-lg-3 col-footer">
								<div class="ft-about">
									<div class="logo-footer">
										<div class="logo-inside">
											<?php achau_display_logo_footer(); // Call display top logo function; ?>
										</div>
									</div>
									<p>
									<?php
										if ((ICL_LANGUAGE_CODE=="vi")) : 
											echo '<span class="text">'.$achau_options["ft_caption_text_vi"].'</span>';
										else :
											echo '<span class="text">'.$achau_options["ft_caption_text"].'</span>';
										endif;
									?>
									</p>
									
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-lg-4 col-footer">
								<div class="ft-menu">
									<?php if(is_active_sidebar('footer-2')) : ?>
									<?php
										dynamic_sidebar('footer-2');
									?>
									<?php endif; ?>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-lg-5 col-footer">
								<div class="row">
									<div class="col-xs-12 col-lg-7 col-footer">
										<h3 class="ft-title"><?php _e('Contact Infomation','achau'); ?></h3>
										
										<div class="ft-contact-info">
											<ul>
												<li class="address">
													<?php
													if ((ICL_LANGUAGE_CODE=="vi")) : 
														echo '<span class="text">'.$achau_options["ft_address_vi"].'</span>';
													else :
														echo '<span class="text">'.$achau_options["ft_address"].'</span>';
													endif;
													?>
													
												</li>
												<li class="email">
													<span class="text"><?php echo $achau_options['ft_email']; ?></span>
												</li>
												<li class="phone">
													<span class="text"><?php echo $achau_options['ft_phone_1']; ?></span>
													<span class="text"><?php echo $achau_options['ft_phone_2']; ?></span>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-xs-12 col-lg-5 col-footer">
										<div class="ft-brands">
											<h3 class="ft-title"><?php _e('Our presence','achau'); ?></h3>
											<?php if(is_active_sidebar('footer-4')) : ?>
											<?php
												dynamic_sidebar('footer-4');
											?>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="bottom-footer">
					<div class="container">
						<div class="copyright">
							<?php echo $achau_options['copyright_text']; ?>
						</div>
					</div>
				</div>
			</footer><!-- #site-footer -->
			
		</div><!-- #wrapper -->
		
		<div class="to-top"><a href="#"><i class="icon-icon-top"></i><b><?php _e('Back to Top','achau'); ?></b></a></div>
		<script>
			wow = new WOW(
			  {
				animateClass: 'animated',
				offset:       100,
				callback:     function(box) {
				  console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
				}
			  }
			);
			wow.init();
		</script>
		<?php get_template_part('inc/woocommerce/popup', 'wishlist'); ?>
		<?php wp_footer(); ?>
		<!--Start of Zendesk Chat Script-->
		<script type="text/javascript">
		window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
		d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
		_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
		$.src="https://v2.zopim.com/?2zpOSWnS1eFcXSdgmqKseDVzUphpo08A";z.t=+new Date;$.
		type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
		</script>
		<!--End of Zendesk Chat Script-->
	</body>
	<?php ob_end_flush(); ?>
</html>
