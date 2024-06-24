<?php
get_header();
?>

<main class="antialiased">
	<div class="bg-white container mx-auto rounded-xl lg:rounded-[24px] p-4 lg:p-8 my-6 grid grid-cols-12 gap-4 lg:gap-8">
		<div class="col-span-12 space-y-4 xl:col-span-8">
			<?php

			$nextMatches = new WP_Query([
				'posts_per_page' => -1,
				'post_type' => 'match',
				'meta_query' => [
					[
						'key' => 'home_score',
						'value' => '',
						'compare' => '!='
					],
				],
				'meta_key' => 'match_time',
				'orderby' => 'meta_value',
				'order' => 'DESC'
			]);
			while ($nextMatches->have_posts()) {
				$nextMatches->the_post();
			?>
				<article>
					<div class="border border-gray-dark/20 rounded-lg shadow-small">
						<?php
						$matchTime = new DateTime(get_field('match_time'));
						$competition = get_field('match_competition')[0];
						$photo = get_field('competition_logo', $competition->ID);
						?>
						<header class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-1">
							<time class="flex items-center space-x-1">
								<span class="font-display font-semibold text-[2.5rem] text-yellow leading-none">
									<?php echo $matchTime->format('d'); ?>
								</span>
								<div class="flex-col space-y-0">
									<?php
									$formatter = new IntlDateFormatter(
										'pt_BR',
										IntlDateFormatter::SHORT,
										IntlDateFormatter::SHORT,
										'UTC',
										IntlDateFormatter::GREGORIAN,
									);
									?>
									<span class="block uppercase leading-none text-white font-black text-sm">
										<?php
										$formatter->setPattern('cccc');
										echo $formatter->format($matchTime);
										?>

									</span>
									<span class="block uppercase leading-none text-white text-sm">
										<?php
										$formatter->setPattern('MMMM');
										echo $formatter->format($matchTime);
										?>
									</span>
								</div>
							</time>
							<h2 class="font-black text-sm sm:text-lg md:text-2xl tracking-tighter yellow-gradient text-transparent italic uppercase bg-clip-text inline-flex items-center space-x-4">
								<span><?php echo $competition->post_title; ?></span>
							</h2>
						</header>
						<a class="group" href="<?php the_permalink(); ?>">
							<div class="px-4 py-6 flex items-center group-hover:bg-yellow/5 transition-colors duration-600 ease-in-out">
								<?php
								$homeTeam = get_field('home_team');
								$awayTeam = get_field('away_team');
								?>
								<div class="min-w-12 hidden md:block"><img class="h-full max-h-[64px] object-cover rounded-md" src="<?php echo $photo['url'] ?>" alt=""></div>
								<div class="w-full">
									<div class="grid grid-cols-[80px_1fr_80px] md:grid-cols-[1fr_80px_160px_80px_1fr]">
										<div class="w-full font-bold text-lg hidden md:inline place-self-center <?php echo $homeTeam['title'] == 'América' ? 'uppercase text-red' : ''; ?> text-right"><?php echo $homeTeam['title']; ?></div>
										<img class="max-h-[72px] object-cover place-self-center" src="<?php echo esc_url($homeTeam['url']) ?>" alt="">
										<div class="text-center place-self-center text-[2.5rem] pt-2 px-8">
											<span class="score-gradient px-4 py-0 text-nowrap font-display font-semibold text-yellow-dark rounded-lg border-2 border-black">
												<?php
												// $formatter->setPattern('HH:mm');
												// echo $formatter->format($matchTime);
												echo get_field('home_score') . ' - ' . get_field('away_score');
												?>
											</span>
											<!-- <p class="text-center tracking-wider text-[0.6875rem] text-gray-dark"><?php echo get_field('match_stadium'); ?></p> -->
										</div>
										<img class="max-h-[72px] justify-self-start object-cover place-self-center" src="<?php echo esc_url($awayTeam['url']) ?>" alt="">
										<div class="w-full text-lg hidden md:inline place-self-center <?php echo $awayTeam['title'] == 'América' ? 'uppercase text-red' : ''; ?> font-bold"><?php echo $awayTeam['title']; ?></div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</article>
			<?php }
			wp_reset_postdata(); ?>
		</div>
		<hr class="col-span-12 xl:hidden mt-8 text-stone-300">
		<section class="col-span-12 xl:col-span-4 mt-8 xl:mt-0">

			<?php get_template_part('template-parts/content', 'nextgame'); ?>
			<?php get_template_part('template-parts/content', 'standings'); ?>

		</section>
	</div>
</main>

<?php
get_footer();
?>