<?php
/**
 * The header for our theme
 *
 * @subpackage Building Construction Lite
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'building-construction-lite' ); ?></a>
	<?php if( get_option('construction_firm_theme_loader',true) != 'off'){ ?>
	<div class="preloader">
		<div class="load">
		  <hr/><hr/><hr/><hr/>
		</div>
	</div>
	<?php }?>
	<div id="page" class="site">
		<div id="header">
			<div class="wrap_figure">
				<div class="top_bar py-2">
					<div class="container">
						<div class="row">
							<div class="col-lg-7 col-md-7">
								<p class="mb-0 text-center text-lg-left text-md-left"><?php echo esc_html(get_theme_mod('construction_firm_top_content','')); ?></p>
							</div>
							<div class="col-lg-5 col-md-5">
								<?php if( get_option('construction_firm_social_enable',false) != 'off'){ ?>	
								<?php
										$construction_firm_header_facebook_target = esc_attr(get_option('construction_firm_header_facebook_target','true'));
							            $construction_firm_header_twt_target = esc_attr(get_option('construction_firm_header_twt_target','true'));
							            $construction_firm_header_linkedin_target = esc_attr(get_option('construction_firm_header_linkedin_target','true'));
							            $construction_firm_header_pinterest_target = esc_attr(get_option('construction_firm_header_pinterest_target','true'));
							            
	          							?>  
									<div class="links text-center text-lg-right text-md-right">
										<?php if( get_theme_mod('construction_firm_facebook') != '' || get_theme_mod('construction_firm_twitter') != '' || get_theme_mod('construction_firm_pinterest') != '' || get_theme_mod('construction_firm_linkedin') != ''){ ?>
											<span><?php esc_html_e('Stay Connected - ','construction-firm'); ?></span>
										<?php }?>
										 <?php if( get_theme_mod('construction_firm_facebook') != ''){ ?>
								            <a target="<?php echo $construction_firm_header_facebook_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('construction_firm_facebook','')); ?>">
								              <i class="<?php echo esc_attr(get_theme_mod('construction_firm_facebook_icon','fab fa-facebook')); ?>"></i>
								            </a>
								          <?php }?>
										<?php if( get_theme_mod('construction_firm_twitter') != ''){ ?>
								            <a target="<?php echo $construction_firm_header_twt_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('construction_firm_twitter','')); ?>">
								              <i class="<?php echo esc_attr(get_theme_mod('construction_firm_twitter_icon','fab fa-twitter')); ?>"></i>
								            </a>
								          <?php }?>
								          <?php if( get_theme_mod('construction_firm_linkedin') != ''){ ?>
								            <a target="<?php echo $construction_firm_header_linkedin_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('construction_firm_linkedin','')); ?>">
								              <i class="<?php echo esc_attr(get_theme_mod('construction_firm_linkedin_icon','fab fa-linkedin')); ?>"></i>
								            </a>
								          <?php }?>
								         <?php if( get_theme_mod('construction_firm_pinterest') != ''){ ?>
								            <a target="<?php echo $construction_firm_header_pinterest_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('construction_firm_pinterest','')); ?>">
								              <i class="<?php echo esc_attr(get_theme_mod('construction_firm_pinterest_icon','fab fa-pinterest-p')); ?>"></i>
								            </a>
								          <?php }?>	
									</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
				<div class="top_header">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-12 align-self-center">
								<div class="logo px-3">
							        <?php if ( has_custom_logo() ) : ?>
					            		<?php the_custom_logo(); ?>
						            <?php endif; ?>
					              	<?php $construction_firm_blog_info = get_bloginfo( 'name' ); ?>
						                <?php if ( ! empty( $construction_firm_blog_info ) ) : ?>
						                  	<?php if ( is_front_page() && is_home() ) : ?>
												<?php if( get_option('construction_firm_logo_title',false) != 'off'){ ?>	
						                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
																	<?php }?>
						                  	<?php else : ?>
												<?php if( get_option('construction_firm_logo_title',false) != 'off'){ ?>	
					                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
																		<?php }?>
					                  		<?php endif; ?>
						                <?php endif; ?>

						                <?php
					                  		$building_construction_lite_description = get_bloginfo( 'description', 'display' );
						                  	if ( $building_construction_lite_description || is_customize_preview() ) :
						                ?>
						                <?php if( get_option('construction_firm_logo_text',true) != 'off'){ ?>	
						                  	<p class="site-description">
						                    	<?php echo esc_html($building_construction_lite_description); ?>
						                  	</p>
					                  	<?php } ?>
					              	<?php endif; ?>
							    </div>
							</div>
							<?php if( get_option('construction_firm_contact_show_hide',false) != 'off'){ ?>	
								<div class="col-lg-3 col-md-4 py-3 px-md-0 align-self-center">
									<?php if( get_theme_mod('construction_firm_timing_text') != '' || get_theme_mod('construction_firm_timing') != ''){ ?>
										<div class="info-box mb-lg-0 mb-md-0 mb-3">
											<div class="row">
												<div class="col-lg-2 col-md-3 col-3">
													<i class="<?php echo esc_attr(get_theme_mod('construction_firm_timimg_icon','fas fa-clock')); ?> p-3 text-center"></i>
												</div>
												<div class="col-lg-10 col-md-9 col-9">
													<strong><?php echo esc_html(get_theme_mod('construction_firm_timing_text','')); ?></strong>
													<p class="mb-0"><?php echo esc_html(get_theme_mod('construction_firm_timing','')); ?></p>
												</div>
											</div>
										</div>
									<?php }?>
								</div>
								<div class="col-lg-3 col-md-4 py-3 align-self-center">
									<?php if( get_theme_mod('construction_firm_call_text') != '' || get_theme_mod('construction_firm_call') != ''){ ?>
										<div class="info-box mb-lg-0 mb-md-0 mb-3">
											<div class="row">
												<div class="col-lg-3 col-md-3 col-3">
													<i class="<?php echo esc_attr(get_theme_mod('construction_firm_call_icon','fas fa-phone')); ?> p-3 text-center"></i>
												</div>
												<div class="col-lg-9 col-md-9 col-9">
													<strong><?php echo esc_html(get_theme_mod('construction_firm_call_text','')); ?></strong>
													<p class="mb-0"><?php echo esc_html(get_theme_mod('construction_firm_call','')); ?></p>
												</div>
											</div>
										</div>
									<?php }?>
								</div>
								<div class="col-lg-3 col-md-4 py-3 px-md-0 align-self-center">
									<?php if( get_theme_mod('construction_firm_email_text') != '' || get_theme_mod('construction_firm_email') != ''){ ?>
										<div class="info-box mb-lg-0 mb-md-0 mb-3">
											<div class="row">
												<div class="col-lg-2 col-md-3 col-3">
													<i class="<?php echo esc_attr(get_theme_mod('construction_firm_email_icon','fas fa-envelope')); ?> p-3 text-center"></i>
												</div>
												<div class="col-lg-10 col-md-9 col-9">
													<strong><?php echo esc_html(get_theme_mod('construction_firm_email_text','')); ?></strong>
													<p class="mb-0"><?php echo esc_html(get_theme_mod('construction_firm_email','')); ?></p>
												</div>
											</div>
										</div>
									<?php }?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="menu_header fixed_header">
					<div class="container">
						
							<div class="toggle-menu gb_menu text-center">
								<button onclick="construction_firm_gb_Menu_open()" class="gb_toggle p-2 px-4 mb-2 my-3"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','building-construction-lite'); ?></p></button>
							</div>
						
		   				<?php get_template_part('template-parts/navigation/navigation'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
