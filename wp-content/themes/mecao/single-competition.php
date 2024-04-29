<?php
get_header();

?>

<main>
	<div class="bg-white container mx-auto rounded-[24px] py-8 my-6 px-8 grid grid-cols-12 gap-8">
		<?php while (have_posts()) {
			the_post();
		?>
			<article class="w-full prose prose-xl prose-red prose-a:no-underline prose-a:text-stone-900 col-span-8 space-y-8">
				<?php
				$photo = get_field('competition_logo', $competition->ID);
				?>
				<h1 class="text-3xl font-black mb-8 flex items-center space-x-4">
					<div class="min-w-12"><img class="h-full max-h-[64px] my-0 object-cover rounded-md" src="<?php echo $photo['url'] ?>" alt=""></div>
					<span class="uppercase italic"><?php the_title(); ?></span>
				</h1>
				<?php

				if (get_the_ID() == 42) {
					$lastMatch = new WP_Query([
						'posts_per_page' => 1,
						'post_type' => 'match',
						'meta_query' => [
							[
								'key' => 'match_competition',
								'value' => '"42"',
								'compare' => 'LIKE'
							],
						],
						'meta_key' => 'match_time',
						'orderby' => 'meta_value',
						'order' => 'DESC'
					]);
					$competition = get_field('match_competition')[0];
					$photo = get_field('competition_logo', $competition->ID);
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
								<h3 class="font-black text-2xl yellow-gradient text-transparent italic uppercase bg-clip-text inline-flex items-center m-0">
									<div class="m-0 prose-p:m-0"><?php echo get_the_content(); ?></div>
								</h3>
							</header>
							<a class="group" href="<?php the_permalink(); ?>">
								<div class="px-4 py-6 flex items-center group-hover:bg-yellow/5 transition-colors duration-600 ease-in-out">
									<?php
									$homeTeam = get_field('home_team');
									$awayTeam = get_field('away_team');
									$score = get_field('home_score') . ' - ' . get_field('away_score');
									?>
									<div class="w-full">
										<div class="flex items-center justify-center space-x-8">
											<span class="w-full font-bold text-lg <?php echo $homeTeam['title'] == 'América' ? 'uppercase text-red' : ''; ?> text-right"><?php echo $homeTeam['title']; ?></span>
											<img class="max-h-[72px] my-0 justify-self-end object-cover" src="<?php echo esc_url($homeTeam['url']) ?>" alt="">
											<span class="text-center justify-self-center text-[2.5rem] pt-4">
												<span class="score-gradient text-nowrap px-4 py-0 font-display font-semibold text-yellow-dark rounded-lg border-2 border-black">
													<?php
													echo $score;
													?>
												</span>
												<p class="text-center tracking-wider text-[0.6875rem] text-gray-dark m-0"><?php echo get_field('match_stadium'); ?></p>
											</span>
											<img class="max-h-[72px] my-0 justify-self-start object-cover" src="<?php echo esc_url($awayTeam['url']) ?>" alt="">
											<span class="w-full text-lg <?php echo $awayTeam['title'] == 'América' ? 'uppercase text-red' : ''; ?> font-bold"><?php echo $awayTeam['title']; ?></span>
										</div>
									</div>
								</div>
							</a>
						</div>
				<?php
					}
				}
				wp_reset_postdata(); ?>
				<?php if (get_the_ID() == 44) {
					$lastMatch = new WP_Query([
						'posts_per_page' => -1,
						'post_type' => 'match',
						'meta_query' => [
							[
								'key' => 'match_competition',
								'value' => '"44"',
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
						$competition = get_field('match_competition')[0];
						$photo = get_field('competition_logo', $competition->ID);
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
								<h3 class="font-black text-2xl yellow-gradient text-transparent italic uppercase bg-clip-text inline-flex items-center m-0">
									<div class="m-0 prose-p:m-0"><?php echo get_the_content(); ?></div>
								</h3>
							</header>
							<a class="group" href="<?php the_permalink(); ?>">
								<div class="px-4 py-6 flex items-center group-hover:bg-yellow/5 transition-colors duration-600 ease-in-out">
									<?php
									$homeTeam = get_field('home_team');
									$awayTeam = get_field('away_team');
									$score = get_field('home_score') . ' - ' . get_field('away_score');
									?>
									<div class="w-full">
										<div class="flex items-center justify-center space-x-8">
											<span class="w-full font-bold text-lg <?php echo $homeTeam['title'] == 'América' ? 'uppercase text-red' : ''; ?> text-right"><?php echo $homeTeam['title']; ?></span>
											<img class="max-h-[72px] my-0 justify-self-end object-cover" src="<?php echo esc_url($homeTeam['url']) ?>" alt="">
											<span class="text-center justify-self-center text-[2.5rem] pt-4">
												<span class="score-gradient text-nowrap px-4 py-0 font-display font-semibold text-yellow-dark rounded-lg border-2 border-black">
													<?php
													echo $score;
													?>
												</span>
												<p class="text-center text-nowrap tracking-wider text-[0.6875rem] text-gray-dark m-0"><?php echo get_field('match_stadium'); ?></p>
											</span>
											<img class="max-h-[72px] my-0 justify-self-start object-cover" src="<?php echo esc_url($awayTeam['url']) ?>" alt="">
											<span class="w-full text-lg <?php echo $awayTeam['title'] == 'América' ? 'uppercase text-red' : ''; ?> font-bold"><?php echo $awayTeam['title']; ?></span>
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
			<section class="col-span-4">
				<div class="border border-gray-dark/10 rounded-lg shadow-small mb-8">
					<header class="flex items-center justify-between bg-gradient-to-r gray-gradient rounded-t-md px-4 py-1">
						<time class="flex items-center space-x-1">
							<span class="font-display font-semibold text-[2.5rem] text-yellow leading-none">10</span>
							<div class="flex-col space-y-0">
								<span class="block uppercase leading-none text-white font-black text-sm">Quarta</span>
								<span class="block uppercase leading-none text-white text-sm">Abril</span>
							</div>
						</time>
						<h2 class="text-gray font-black text-2xl tracking-tighter italic uppercase">Último Jogo</h2>
					</header>
					<div class="px-4 py-6">
						<div class="grid grid-cols-home-matches justify-items-stretch">
							<div class="justify-self-start self-end">
								<img src="<?php echo get_theme_file_uri('/images/santa-cruz.png'); ?>" alt="">
							</div>
							<div>
								<h3 class="text-center leading-none text-xs text-gray-light font-medium uppercase mb-6">Campeonato Potiguar</h3>
								<p class="text-center leading-none text-xs text-gray-light mb-3">Resultado</p>
								<p class="text-center leading-none text-[2.5rem] mb-6"><span class="score-gradient px-4 py-0 font-display font-semibold text-yellow-dark rounded-lg border-2 border-black">0 - 1</span></p>
								<p class="text-center leading-none text-lg font-black mb-4 text-gray-dark">Santa Cruz <span class="text-stone-400 font-medium">x</span> <span class="text-red-dark">América 🏆</span></p>
								<p class="text-center leading-none text-[0.6875rem] text-gray-dark">Estádio Barrettão</p>
							</div>
							<div class="justify-self-end self-end">
								<img src="<?php echo get_theme_file_uri('/images/america.png'); ?>" alt="">
							</div>
						</div>
					</div>
				</div>

				<div class="border border-gray-dark/10 rounded-lg shadow-small mb-4">
					<header class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-1">
						<time class="flex items-center space-x-1">
							<span class="font-display font-semibold text-[2.5rem] text-yellow leading-none">28</span>
							<div class="flex-col space-y-0">
								<span class="block uppercase leading-none text-white font-black text-sm">Domingo</span>
								<span class="block uppercase leading-none text-white text-sm">Abril</span>
							</div>
						</time>
						<h2 class="font-black text-2xl tracking-tighter yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Próximo Jogo</h2>
					</header>
					<div class="px-4 py-6">
						<div class="grid grid-cols-home-matches justify-items-stretch">
							<div class="justify-self-start self-end">
								<img src="<?php echo get_theme_file_uri('/images/maracana.png'); ?>" alt="">
							</div>
							<div class="justify-self-center">
								<div class="inline-flex items-center space-x-4 mb-6 uppercase text-[0.625rem] text-gray-dark/60 font-medium"><span>Apresentado por</span> <img class="" src="<?php echo get_theme_file_uri('/images/bar.svg'); ?>" alt=""><img src="<?php echo get_theme_file_uri('/images/emobi.png'); ?>" alt=""></div>
								<h3 class="text-center leading-none text-xs text-gray-light font-medium uppercase mb-6">Brasileirão Série D</h3>
								<p class="text-center leading-none text-xs text-gray-light mb-3">Horário</p>
								<p class="text-center leading-none text-[2.5rem] mb-6"><span class="score-gradient px-4 py-1 font-display font-semibold text-yellow-dark rounded-lg border-2 border-black">16:00</span></p>
								<p class="text-center leading-none text-lg font-black mb-4 text-gray-dark">Maracanã <span class="text-stone-400 font-medium">x</span> <span class="text-red-dark">América</span></p>
								<p class="text-center leading-none text-[0.6875rem] text-gray-dark">Estádio Prefeito Almir Dutra</p>
							</div>
							<div class="justify-self-end self-end">
								<img src="<?php echo get_theme_file_uri('/images/america.png'); ?>" alt="">
							</div>
						</div>
					</div>
				</div>

				<div class="flex justify-center"><a href="#" class="inline-block text-sm text-stone-600 font-medium px-5 py-3 rounded-md border border-[#292524] border-opacity-10 shadow-small">Calendário de Jogos</a></div>

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