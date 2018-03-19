<div class="formation wrap">
	<h1>Formation Media Settings</h1>
	<form method="post" action="<?=esc_html(admin_url('admin-post.php'))?>">
		<div id="universal-message-container">
            <h2>Allowed Apps</h2>
			<div class="options">
				<?php if($core->apps){
					foreach($core->apps as $app){ ?>
						<p>
							<label><?=$app?></label>
							<br />
							<input type="text" name="acme-message" value="" />
						</p>
					<?php }
				} ?>
			</div>
        </div>
		<?php wp_nonce_field( 'acme-settings-save', 'acme-custom-message' );
    	submit_button(); ?>
    </form>
</div>