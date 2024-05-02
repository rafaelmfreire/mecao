<?php
get_header();

?>

<main class="antialiased">
	<div class="bg-white container mx-auto rounded-xl lg:rounded-[24px] p-4 lg:p-8 my-6 grid grid-cols-12 gap-4 lg:gap-8">
		<div class="col-span-12 space-y-4 xl:col-span-8">
			<?php while (have_posts()) {
				the_post();
			?>
				<article class="w-full prose prose-xl prose-red prose-a:no-underline prose-a:text-stone-900 col-span-8 space-y-8">
					<?php
					$photo = get_field('competition_logo', get_the_ID());
					?>
					<h1 class="text-3xl font-black mb-8 flex items-center space-x-4">
						<div class="min-w-12"><img class="h-full max-h-[64px] my-0 object-cover rounded-md" src="<?php echo $photo['url'] ?>" alt=""></div>
						<span class="uppercase italic"><?php the_title(); ?></span>
					</h1>
					<?php

					if (get_the_title() == 'Campeonato Potiguar') {
						$lastMatch = new WP_Query([
							'posts_per_page' => 1,
							'post_type' => 'match',
							'meta_query' => [
								[
									'key' => 'match_competition',
									'value' => '"' . get_the_ID() . '"',
									'compare' => 'LIKE'
								],
							],
							'meta_key' => 'match_time',
							'orderby' => 'meta_value',
							'order' => 'DESC'
						]);
						// $competition = get_field('match_competition')[0];
						// $photo = get_field('competition_logo', $competition->ID);
					?>
						<?php
						while ($lastMatch->have_posts()) {
							$lastMatch->the_post();

							$matchTime = new DateTime(get_field('match_time'));
						?>

							<div class="border border-gray-dark/20 rounded-lg shadow-small">
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
									<!-- <h3 class="font-black text-2xl yellow-gradient text-transparent italic uppercase bg-clip-text inline-flex items-center m-0">
										<div class="m-0 prose-p:m-0"><?php //echo get_the_content(); 
																		?></div>
									</h3> -->
								</header>
								<a class="group" href="<?php the_permalink(); ?>">
									<div class="px-4 py-6 flex items-center group-hover:bg-yellow/5 transition-colors duration-600 ease-in-out">
										<?php
										$homeTeam = get_field('home_team');
										$awayTeam = get_field('away_team');
										$score = get_field('home_score') . ' - ' . get_field('away_score');
										?>
										<div class="w-full">
											<div class="flex items-center justify-center">
												<span class="w-full font-bold hidden lg:text-lg <?php echo $homeTeam['title'] == 'América' ? 'uppercase text-red' : ''; ?> text-right"><?php echo $homeTeam['title']; ?></span>
												<img class="max-h-[72px] my-0 justify-self-start object-cover" src="<?php echo esc_url($homeTeam['url']) ?>" alt="">
												<span class="text-center justify-self-center text-[2.5rem] pt-4 px-8">
													<span class="score-gradient text-nowrap px-4 py-0 font-display font-semibold text-yellow-dark rounded-lg border-2 border-black">
														<?php
														echo $score;
														?>
													</span>
													<p class="text-center tracking-wider text-[0.6875rem] text-gray-dark m-0"><?php echo get_field('match_stadium'); ?></p>
												</span>
												<img class="max-h-[72px] my-0 justify-self-start object-cover" src="<?php echo esc_url($awayTeam['url']) ?>" alt="">
												<span class="w-full hidden lg:text-lg <?php echo $awayTeam['title'] == 'América' ? 'uppercase text-red' : ''; ?> font-bold"><?php echo $awayTeam['title']; ?></span>
											</div>
										</div>
									</div>
								</a>
							</div>
					<?php
						}
					}
					wp_reset_postdata(); ?>
					<?php if (get_the_title() == 'Copa do Brasil') {
						$lastMatch = new WP_Query([
							'posts_per_page' => -1,
							'post_type' => 'match',
							'meta_query' => [
								[
									'key' => 'match_competition',
									'value' => '"' . get_the_ID() . '"',
									'compare' => 'LIKE'
								],
							],
							'meta_key' => 'match_time',
							'orderby' => 'meta_value',
							'order' => 'ASC'
						]);

						while ($lastMatch->have_posts()) {
							$lastMatch->the_post();
							$matchTime = new DateTime(get_field('match_time'));
							// $competition = get_field('match_competition')[0];
							// $photo = get_field('competition_logo', $competition->ID);
					?>

							<div class="border border-gray-dark/20 rounded-lg shadow-small">
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
									<!-- <h3 class="font-black text-2xl yellow-gradient text-transparent italic uppercase bg-clip-text inline-flex items-center m-0">
										<div class="m-0 prose-p:m-0"><?php //echo get_the_content(); 
																		?></div>
									</h3> -->
								</header>
								<a class="group" href="<?php the_permalink(); ?>">
									<div class="px-4 py-6 flex items-center group-hover:bg-yellow/5 transition-colors duration-600 ease-in-out">
										<?php
										$homeTeam = get_field('home_team');
										$awayTeam = get_field('away_team');
										if (get_field('home_score') == '') {
											$formatter->setPattern('HH:mm');
											$score = $formatter->format($matchTime);
										} else {
											$score = get_field('home_score') . ' - ' . get_field('away_score');
										}
										?>
										<div class="w-full">
											<div class="flex items-center justify-center">
												<span class="w-full font-bold hidden md:inline text-lg mr-4 <?php echo $homeTeam['title'] == 'América' ? 'uppercase text-red' : ''; ?> text-right"><?php echo $homeTeam['title']; ?></span>
												<img class="max-h-[72px] my-0 object-cover" src="<?php echo esc_url($homeTeam['url']) ?>" alt="">
												<span class="text-center text-[2.5rem] pt-4 px-8">
													<span class="score-gradient text-nowrap px-4 py-0 font-display font-semibold text-yellow-dark rounded-lg border-2 border-black">
														<?php
														echo $score;
														?>
													</span>
													<p class="text-center text-nowrap tracking-wider text-[0.6875rem] text-gray-dark m-0"><?php echo get_field('match_stadium'); ?></p>
												</span>
												<img class="max-h-[72px] my-0 object-cover" src="<?php echo esc_url($awayTeam['url']) ?>" alt="">
												<span class="w-full hidden md:inline text-lg ml-4 <?php echo $awayTeam['title'] == 'América' ? 'uppercase text-red' : ''; ?> font-bold"><?php echo $awayTeam['title']; ?></span>
											</div>
										</div>
									</div>
								</a>
							</div>
					<?php
						}
					}
					wp_reset_postdata(); ?>
					<?php the_content(); ?>
				</article>
			<?php } ?>
		</div>
		<section class="col-span-12 xl:col-span-4 mt-8 lg:mt-0">

			<div class="md:grid xl:block grid-cols-2 gap-4">
				<?php get_template_part('template-parts/content', 'lastgame'); ?>
				<?php get_template_part('template-parts/content', 'nextgame'); ?>
			</div>

			<div class="flex justify-center"><a href="<?php echo site_url('/jogos'); ?>" class="bg-white inline-block text-sm text-stone-600 font-medium px-5 py-3 rounded-md border border-gray-dark/20 hover:bg-stone-50 hover:border-gray-dark/40 transition-all duration-300 ease-in-out shadow-small">Calendário de Jogos</a></div>

		</section>
	</div>
</main>

<?php
get_footer();
?>