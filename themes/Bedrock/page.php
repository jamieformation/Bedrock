<?php get_header(); ?>

<?php if(have_posts()){ ?>
	<?php while(have_posts()){ the_post(); ?>
		<section id="page">
			<div class="container">
				<article>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</article>
			</div>
		</section>
	<?php } ?>
<?php } ?>

<?php get_footer(); ?>