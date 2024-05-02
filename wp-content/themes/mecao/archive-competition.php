<?php
get_header();
?>

<main class="antialiased">
	<div class="bg-white container mx-auto rounded-xl lg:rounded-[24px] p-4 lg:p-8 my-6 grid grid-cols-12 gap-4 lg:gap-8">
		<div class="col-span-12 space-y-4 xl:col-span-8">
			<?php

			$currentCompetitions = new WP_Query([
				'posts_per_page' => -1,
				'post_type' => 'competition',
				'meta_query' => [
					[
						'key' => 'year',
						'value' => date('Y'),
						'compare' => '=='
					],
				],
				'orderby' => 'title',
				'order' => 'ASC'
			]);
			while ($currentCompetitions->have_posts()) {
				$currentCompetitions->the_post();
			?>
				<article>
					<div class="border border-gray-dark/20 rounded-lg shadow-small">
						<?php
						$photo = get_field('competition_logo');
						?>
						<a class="group" href="<?php the_permalink(); ?>">
							<div class="p-6 flex items-center space-x-4 group-hover:bg-yellow/5 transition-colors duration-600 ease-in-out">
								<img class="max-w-[96px] border border-stone-200 shadow-small justify-self-end object-cover rounded" src="<?php echo esc_url($photo['url']) ?>" alt="">
								<h2 class="font-black text-2xl tracking-tighter text-stone-800 italic uppercase">
									<span><?php echo get_the_title() ?></span>
								</h2>
							</div>
						</a>
					</div>
				</article>
			<?php }
			wp_reset_postdata(); ?>
		</div>
		<section class="col-span-12 xl:col-span-4 mt-8 lg:mt-0">

			<div class="md:grid xl:block grid-cols-2 gap-4">
				<?php get_template_part('template-parts/content', 'lastgame'); ?>
				<?php get_template_part('template-parts/content', 'nextgame'); ?>
			</div>

			<div class="flex justify-center"><a href="<?php echo site_url('/jogos'); ?>" class="bg-white inline-block text-sm text-stone-600 font-medium px-5 py-3 rounded-md border border-gray-dark/20 hover:bg-stone-50 hover:border-gray-dark/40 transition-all duration-300 ease-in-out shadow-small">Calendário de Jogos</a></div>

			<?php get_template_part('template-parts/content', 'standings'); ?>
		</section>
	</div>
</main>

<?php
get_footer();
?>