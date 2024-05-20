<?php
get_header();

?>

<main class="antialiased">
	<div class="bg-white container mx-auto rounded-xl lg:rounded-[24px] p-4 lg:p-8 my-6 grid grid-cols-12 gap-4 lg:gap-8">
		<div class="col-span-12 space-y-4 lg:space-y-0 xl:col-span-8">
			<?php while (have_posts()) {
				the_post();
			?>
				<article class="prose sm:prose-xl prose-red w-full
				prose-h2:uppercase prose-h2:text-red prose-h2:font-bold prose-h2:text-2xl
				prose-h3:uppercase prose-h3:text-stone-800 prose-h3:font-bold prose-h3:tracking-wide prose-h3:text-pretty
				prose-h3:text-lg prose-h3:leading-normal md:prose-h3:text-3xl md:prose-h3:leading-[1.25em]
				prose-h4:uppercase prose-h4:text-red-dark prose-h4:text-sm prose-h4:tracking-widest prose-h4:font-medium
				prose-img:rounded-md
				prose-a:no-underline hover:prose-a:underline
				prose-p:leading-[1.6em]">
					<?php
					$matchTime = new DateTime(get_field('match_time'));
					?>
					<div class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 justify-between mb-4 px-1">
						<?php
						$formatter = new IntlDateFormatter(
							'pt_BR',
							IntlDateFormatter::SHORT,
							IntlDateFormatter::SHORT,
							'UTC',
							IntlDateFormatter::GREGORIAN,
						);
						?>
						<time class="flex items-center w-full md:w-auto">
							<div class="flex items-center w-full space-x-4">
								<div class="flex items-center space-x-2 w-full">
									<span class=" font-semibold text-[2rem] text-blue leading-none">
										<?php echo $matchTime->format('d'); ?>
									</span>
									<div class="flex-col space-y-0">
										<span class="block uppercase leading-none text-stone-800 font-black text-sm">
											<?php
											$formatter->setPattern('cccc');
											echo $formatter->format($matchTime);
											?>
										</span>
										<span class="block uppercase leading-none text-stone-800 text-sm">
											<?php
											$formatter->setPattern('MMMM');
											echo $formatter->format($matchTime);
											?>
										</span>
									</div>
								</div>
								<div class="flex">
									<span class="text-[2rem] leading-none">
										<?php
										$formatter->setPattern('HH:mm');
										echo $formatter->format($matchTime);
										?>
									</span>
								</div>
							</div>
						</time>
						<div class="flex flex-col items-start md:self-center self-start space-y-0">
							<span class="block uppercase leading-none text-stone-800 font-black text-sm">
								<?php
								echo get_the_title(get_field('match_competition')[0]);
								?>
							</span>
							<span class="block uppercase leading-none text-stone-800 text-sm">
								<?php
								the_field('match_stadium');
								?>
							</span>
						</div>
					</div>
					<div class="grid grid-cols-match-score gap-x-2 md:gap-x-8 gap-y-4 border-4 border-black/50 score-gradient p-2 md:p-8 w-full rounded-lg">
						<?php
						$homeTeam = get_field('home_team');
						$awayTeam = get_field('away_team');
						?>
						<img class="h-14 w-auto justify-self-center m-0 sm:m-0" src="<?php echo esc_url($homeTeam['url']) ?>" alt="">
						<span class="text-yellow justify-self-stretch self-center tracking-wider text-3xl md:text-6xl uppercase font-display"><?php echo $homeTeam['title']; ?></span>
						<span class="text-yellow tracking-wider self-center text-right text-3xl md:text-6xl uppercase font-display"><?php echo get_field('home_score') == '' ? '-' : get_field('home_score'); ?></span>
						<img class="h-14 w-auto justify-self-center m-0 sm:m-0" src="<?php echo esc_url($awayTeam['url']) ?>" alt="">
						<span class="text-yellow justify-self-stretch self-center tracking-wider text-3xl md:text-6xl uppercase font-display"><?php echo $awayTeam['title']; ?></span>
						<span class="text-yellow tracking-wider self-center text-right text-3xl md:text-6xl uppercase font-display"><?php echo get_field('away_score') == '' ? '-' : get_field('away_score'); ?></span>
					</div>
					<?php the_content(); ?>
					<hr class="xl:hidden">
				</article>
			<?php } ?>
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