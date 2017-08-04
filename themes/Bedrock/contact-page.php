<?php /* Template Name: Contact Page */ ?>

<?php get_header(); ?>

	<?php if(have_posts()){ ?>
		<?php while(have_posts()){ the_post(); ?>		

		<section id="contact-us">
			<h1>Contact Us</h1>
			<div class="container">
				<div class="left">
					<h2>Where to find us</h2>
					<?php if (get_field('company_name', 'contacts')) { ?>
						<p><?= get_field('company_name', 'contacts'); ?>
					<?php } ?>
					<?php if(get_field('company_address', 'contacts')) { ?>
						<br><span class="address"><?php the_field('company_address', 'contacts'); ?></span></p>
					<?php } ?>
					<?php if(get_field('telephone_number', 'contacts')) { ?>
						<p><span class=" fa-icon phone"><?php the_field('telephone_number', 'contacts'); ?></span>
					<?php } ?>
					<?php if (get_field('fax_number', 'contacts')) { ?>
						<br>Fax: <?= get_field('fax_number', 'contacts'); ?></p>
					<?php } ?>
					
					<div class="map-embed">
						<!--iframe src="https://snazzymaps.com/embed/2644" width="100%" height="300px" style="border:none;"></iframe-->
					</div>
				</div>
				<div class="right">
					<h2>Get in touch...</h2>
					<?= do_shortcode('[contact-form-7 id="118" title="Contact Form"]'); ?>
				</div>
			</div>
		</section>

		<?php } ?>
	<?php } ?>

<?php get_footer(); ?>