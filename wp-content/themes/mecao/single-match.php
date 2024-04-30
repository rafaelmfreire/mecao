<?php
get_header();

?>

<main class="antialiased">
	<div class="bg-white container mx-auto rounded-[24px] py-8 my-6 px-8 grid grid-cols-12 gap-8 w-full">
		<?php while (have_posts()) {
			the_post();
		?>
			<article class="pt-0 col-span-8 prose prose-xl prose-red w-full
				prose-h2:uppercase prose-h2:text-red prose-h2:font-bold prose-h2:text-2xl
				prose-h3:uppercase prose-h3:text-red-dark prose-h3:text-sm prose-h3:tracking-widest prose-h3:font-medium prose-h3:pt-[2em] prose-h3:mb-[1.25em]
				prose-h4:uppercase prose-h4:text-stone-800 prose-h4:text-3xl prose-h4:font-bold prose-h4:tracking-wide prose-h4:leading-[1.25em] prose-h4:text-pretty
				prose-img:rounded-md
				prose-p:leading-[1.6em]">
				<?php
				$matchTime = new DateTime(get_field('match_time'));
				?>
				<div class="flex items-center justify-between mb-4 px-1">
					<?php
					$formatter = new IntlDateFormatter(
						'pt_BR',
						IntlDateFormatter::SHORT,
						IntlDateFormatter::SHORT,
						'UTC',
						IntlDateFormatter::GREGORIAN,
					);
					?>
					<time class="flex items-center">
						<div class="flex items-center space-x-4">
							<div class="flex items-center space-x-1">
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
					<div class="flex-col space-y-0">
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
				<div class="grid grid-cols-match-score gap-x-8 gap-y-4 border-4 border-black/50 score-gradient p-8 w-full rounded-lg">
					<?php
					$homeTeam = get_field('home_team');
					$awayTeam = get_field('away_team');
					?>
					<img class="h-14 w-auto justify-self-center m-0" src="<?php echo esc_url($homeTeam['url']) ?>" alt="">
					<span class="text-yellow justify-self-stretch tracking-wider text-6xl uppercase font-display"><?php echo $homeTeam['title']; ?></span>
					<span class="text-yellow tracking-wider text-right text-6xl uppercase font-display"><?php echo get_field('home_score') == '' ? '-' : get_field('home_score'); ?></span>
					<img class="h-14 w-auto justify-self-center m-0" src="<?php echo esc_url($awayTeam['url']) ?>" alt="">
					<span class="text-yellow justify-self-stretch tracking-wider text-6xl uppercase font-display"><?php echo $awayTeam['title']; ?></span>
					<span class="text-yellow tracking-wider text-right text-6xl uppercase font-display"><?php echo get_field('away_score') == '' ? '-' : get_field('away_score'); ?></span>
				</div>
				<?php the_content(); ?>
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