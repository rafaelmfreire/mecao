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
				<div class="border border-gray-dark/10 rounded-lg shadow-small mb-8">
					<header class="flex items-center justify-between bg-gradient-to-r gray-gradient rounded-t-md px-4 py-1">
						<h2 class="text-gray font-black text-2xl tracking-tighter italic uppercase">Último Jogo</h2>
					</header>
					<div class="px-4 py-6">
					</div>
				</div>

				<div class="border border-gray-dark/10 rounded-lg shadow-small mb-4">
					<header class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-1">
						<h2 class="font-black text-2xl  yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Próximo Jogo</h2>
					</header>
					<div class="px-4 py-6">
					</div>
				</div>

				<div class="border border-gray-dark/10 rounded-lg shadow-small mt-10 overflow-hidden">
					<div class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
						<h2 class="font-black text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Série D</h2>
					</div>
					<div class="px-4 py-4 w-full">
						<table class="min-w-full text-stone-900">
							<tr>
								<th class="p-4 text-center font-normal text-stone-400">#</th>
								<th class="p-4 text-left font-bold text-stone-400 w-full">Equipe</th>
								<th class="p-4 text-center font-normal text-stone-400">J</th>
								<th class="p-4 text-center font-normal text-stone-400">GP</th>
								<th class="p-4 text-center font-black text-stone-400">P</th>
							</tr>
							<tr class="border-b-2 border-dotted border-gray-light/10">
								<td class="px-4 py-3 font-bold">1</td>
								<td class="px-4 py-3 font-bold text-red">América</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 font-black text-center">0</td>
							</tr>
							<tr class="border-b-2 border-dotted border-gray-light/10">
								<td class="px-4 py-3 font-bold">1</td>
								<td class="px-4 py-3 font-bold">Atlético-CE</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 font-black text-center">0</td>
							</tr>
							<tr class="border-b-2 border-dotted border-gray-light/10">
								<td class="px-4 py-3 font-bold">1</td>
								<td class="px-4 py-3 font-bold">Iguatu</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 font-bold text-center">0</td>
							</tr>
							<tr class="border-b-2 border-dotted border-gray-light/10">
								<td class="px-4 py-3 font-bold">1</td>
								<td class="px-4 py-3 font-bold">Maracanã</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 font-bold text-center">0</td>
							</tr>
							<tr class="border-b-2 border-dotted border-gray-light/10">
								<td class="px-4 py-3 font-bold">1</td>
								<td class="px-4 py-3 font-bold">Potiguar</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 font-bold text-center">0</td>
							</tr>
							<tr class="border-b-2 border-dotted border-gray-light/10">
								<td class="px-4 py-3 font-bold">1</td>
								<td class="px-4 py-3 font-bold">Santa Cruz-RN</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 font-bold text-center">0</td>
							</tr>
							<tr class="border-b-2 border-dotted border-gray-light/10">
								<td class="px-4 py-3 font-bold">1</td>
								<td class="px-4 py-3 font-bold">Sousa</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 font-bold text-center">0</td>
							</tr>
							<tr>
								<td class="px-4 py-3 font-bold">1</td>
								<td class="px-4 py-3 font-bold">Treze</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 text-center">0</td>
								<td class="px-4 py-3 font-bold text-center">0</td>
							</tr>
						</table>
					</div>
				</div>

				<img class="border border-[#292524]/10 rounded-lg shadow-small mt-8 overflow-hidden" src="<?php echo get_theme_file_uri('/images/banner.png'); ?>" alt="">

				<div class="border border-gray-dark/10 rounded-lg shadow-small mt-10 overflow-hidden">
					<div class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
						<h2 class="font-black text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Mais Vistas</h2>
					</div>
					<div class="px-6 w-full divide-y-2 divide-gray-light/10">
						<article class="flex items-start space-x-2 py-6">
							<div>
								<div class="flex items-center text-blue mb-2">
									<time class="text-sm font-medium">15/04/2024</time>
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<circle cx="9" cy="17" r="1" fill="#FACC15" />
										<circle cx="11" cy="14" r="1" fill="#FACC15" />
										<circle cx="13" cy="11" r="1" fill="#FACC15" />
										<circle cx="15" cy="8" r="1" fill="#FACC15" />
									</svg>
									<span class="uppercase text-xs font-bold tracking-widest">Notícias</span>
								</div>
								<h3 class="font-bold text-stone-900 leading-5">Salazar entra para a galeria de heróis improváveis do América-RN</h3>
							</div>
							<img src="<?php echo get_theme_file_uri('/images/small-news1.png'); ?>" alt="">
						</article>
						<article class="flex items-start space-x-2 py-6">
							<div>
								<div class="flex items-center text-blue mb-2">
									<time class="text-sm font-medium">15/04/2024</time>
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<circle cx="9" cy="17" r="1" fill="#FACC15" />
										<circle cx="11" cy="14" r="1" fill="#FACC15" />
										<circle cx="13" cy="11" r="1" fill="#FACC15" />
										<circle cx="15" cy="8" r="1" fill="#FACC15" />
									</svg>
									<span class="uppercase text-xs font-bold tracking-widest">Notícias</span>
								</div>
								<h3 class="font-bold text-stone-900 leading-5">Ex-Cruzeiro e Palmeiras, Souza é maestro em campanha de título invicto do América-RN</h3>
							</div>
							<img src="<?php echo get_theme_file_uri('/images/small-news2.png'); ?>" alt="">
						</article>
					</div>
				</div>
			</section>
		<?php } ?>
	</div>
</main>

<?php
get_footer();
?>