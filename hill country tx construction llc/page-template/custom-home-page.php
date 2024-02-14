<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
   <!-- Header Section with Logo -->
   <header id="header">
      <a href="test.sajjadrasool.online" rel="home">
         <img src="logo.jpeg" alt="Your Logo Alt Text">
      </a>
   </header>

   <?php if( get_option('construction_firm_slider_arrows') == '1'){ ?>
      <!-- Slider Section -->
      <section id="slider">
         <!-- Your existing slider code here... -->
      </section>
   <?php }?>

   <?php if( get_option('construction_firm_services_enable') == '1'){ ?>
      <!-- Middle Section -->
      <section id="middle-sec">
         <!-- Your existing middle section code here... -->
      </section>
   <?php }?>

   <?php if( get_option('construction_firm_project_enable') == '1'){ ?>
      <!-- Projects Section -->
      <?php if( get_theme_mod('construction_firm_project_section_title') != '' || get_theme_mod('construction_firm_category_setting') != ''){ ?>
         <section id="projects-box" class="py-5">
            <!-- Your existing projects section code here... -->
         </section>
      <?php }?>
   <?php }?>

   <?php if( get_option('building_construction_lite_about_show_hide') == '1'){ ?>
      <!-- About Us Section -->
      <?php if( get_theme_mod('building_construction_lite_about_us_title') != '' || get_theme_mod('building_construction_lite_about_us_settigs') != ''){ ?>
         <section id="about-us" class="py-5">
            <!-- Your existing about us section code here... -->
         </section>
      <?php }?>
   <?php }?>

   <!-- Custom Page Content Section -->
   <section id="custom-page-content" <?php if ( have_posts() && trim( get_the_content() ) !== '' ) echo 'class="pt-3"'; ?>>
      <div class="container">
         <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
         <?php endwhile; ?>
      </div>
   </section>

</main>

<?php get_footer(); ?>
