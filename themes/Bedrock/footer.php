		<footer>
			<div class="container">
				<div class="column">
					<div class="title">Contact Details</div>
					<?php if (get_field('company_address', 'contacts')) { ?>
						<p><?= get_field('company_address', 'contacts'); ?></p>
					<?php } ?>
					<?php if (get_field('telephone_number', 'contacts')) { ?>
						<p class="fa-icon phone"><?= get_field('telephone_number', 'contacts'); ?></p>
					<?php } ?>
				</div>
				<div class="column">
					<div class="title">Navigation</div>
					<?php wp_nav_menu(array( 'theme_location' => 'footer')); ?>
				</div>
				<div class="column">
					<div class="title">Policies</div>
					<?php wp_nav_menu(array( 'theme_location' => 'policies')); ?>
					<?php if (get_field('company_name', 'contacts')) { ?>
						<p class="copyright">&copy <?= date("Y"); ?> <?= get_field('company_name', 'contacts'); ?></p>
					<?php } ?>
				</div>
			</div>
		</footer>
		 	 	
    <?php wp_footer(); ?>
        
	</body>
</html>