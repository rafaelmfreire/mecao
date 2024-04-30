<?php
get_header();
?>

<main class="antialiased">
	<div class="bg-white container mx-auto rounded-[24px] py-8 my-6 px-8 grid grid-cols-12 gap-8">
		<?php while (have_posts()) {
			the_post();
		?>
			<article class="mx-auto col-span-8 w-full">
				<!-- <div class="text-center uppercase font-bold text-blue-dark mb-6 text-sm"> -->
				<?php
				// the_category(); 
				?>
				<!-- </div> -->
				<h1 class="text-pretty text-stone-900 text-5xl leading-[1.15em] font-black mb-8"><?php the_title(); ?></h1>
				<div class="mb-8">
					<span class="text-stone-700"><?php echo get_the_date('d/m/Y H:i'); ?></span>
					<span class="text-stone-500">/ Atualizado há <?php echo human_time_diff(get_the_modified_time('U'), (new DateTime())->sub(DateInterval::createFromDateString('3 hours'))->format('U')); ?></span>
				</div>
				<?php the_post_thumbnail('full', ['class' => 'w-full object-cover rounded-md mb-8']); ?>
				<div class="py-8 px-8 prose prose-xl prose-red text-pretty selection:bg-red-dark selection:text-white">
					<?php the_content(); ?>
				</div>
			</article>
			<section class="col-span-4">

				<?php get_template_part('template-parts/content', 'lastgame'); ?>
				<?php get_template_part('template-parts/content', 'nextgame'); ?>

				<div class="flex justify-center"><a href="#" class="inline-block text-sm text-stone-600 font-medium px-5 py-3 rounded-md border border-[#292524] border-opacity-10 shadow-small">Calendário de Jogos</a></div>

				<?php get_template_part('template-parts/content', 'standings'); ?>

			</section>
		<?php } ?>
	</div>
</main>

<?php
get_footer();
?>