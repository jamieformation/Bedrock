<?php get_header(); ?>

<?php if(have_posts()){ ?>
	<?php while(have_posts()){ the_post(); ?>
		<section id="single-post">
			<div class="container narrow">
				<article>
					<h1><?php the_title(); ?></h1>
					<span class="posted">Posted on <?= get_the_date(); ?></span>
					<?php the_content(); ?>
					<div class="buttons-container">
						<a class="btn btn-back" href="<?= get_permalink(get_option('page_for_posts')); ?>"><span></span>Back to news</a>
						<div class="addtoany"><?= do_shortcode('[addtoany]'); ?></div>
					</div>
				</article>
			</div>
		</section>
	<?php } ?>
<?php } ?>

<?php get_footer(); ?>