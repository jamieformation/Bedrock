<?php get_header(); ?>

<?php if(have_posts()){ ?>
	<?php while(have_posts()){ the_post(); ?>
		<section id="page">
			<div class="container">
				<article>
					<?php the_content(); ?>
				</article>
			</div>
		</section>
	<?php } ?>
<?php } ?>

<?php get_footer(); ?>
