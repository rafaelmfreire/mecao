<?php
get_header();
?>

<main>
	<div class="bg-white container mx-auto rounded-[24px] py-8 my-6 px-8 grid grid-cols-12 gap-8">
		<div class="col-span-8">
			<!-- FEATURED -->
			<?php

			$stickyPost = get_option('sticky_posts')[0];

			if (isset($stickyPost)) {
				$featuredNews = new WP_Query([
					'p' => $stickyPost
				]);

				while ($featuredNews->have_posts()) {
					$featuredNews->the_post();
			?>
					<a class="group" href="<?php the_permalink(); ?>">
						<article>
							<div class="rounded-md relative  overflow-hidden shadow">
								<div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 via-30% to-50%"></div>
								<?php the_post_thumbnail('featuredPhoto', ['class' => 'w-full object-cover']); ?>
								<header class="p-6 absolute bottom-0">
									<h2 class="group-hover:underline text-pretty text-[2.5rem] leading-[2.875rem] font-bold text-white [text-shadow:_2px_2px_2px_rgb(0_0_0_/_50%)]"><?php the_title(); ?></h2>
								</header>
							</div>
						</article>
					</a>

					<div class="flex items-center justify-center mt-14 space-x-8 mb-10">
						<span class="text-sm font-bold text-gray-dark/85">Parceiro Master</span>
						<div class="flex justify-center"><a href="mailto:contato@mecao.com.br" class="inline-block text-sm text-red font-medium px-5 py-3 rounded-md bg-transparent hover:bg-red hover:text-white border border-red/40 shadow-small hover:shadow-red/20 transition-all duration-300 ease-in-out">Seja parceiro do Portal Mecão</a></div>
					</div>

			<?php
				}
				wp_reset_postdata();
			}
			?>
			<!-- END FEATURED -->

			<div class="space-y-4">
				<?php
				$lastNews = new WP_Query([
					'posts_per_page' => 4,
					'category_name' => 'noticias',
					'post__not_in' => get_option('sticky_posts')
				]);

				while ($lastNews->have_posts()) {
					$lastNews->the_post(); ?>
					<article class="relative group bg-white border border-gray-dark/20 rounded-lg shadow-small overflow-hidden">
						<div class=" hidden group-first-of-type:flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
							<h2 class="font-black text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Últimas Notícias</h2>
						</div>
						<div class="grid grid-cols-12">
							<?php if (get_the_post_thumbnail()) { ?>
								<div class="col-span-5">
									<?php
									the_post_thumbnail('homeNewsPhoto', ['class' => 'h-full min-h-[265px] object-cover']);
									?>
								</div>
								<div class="p-8 col-span-7">
								<?php } else { ?>
									<div class="p-8 col-span-12">
									<?php } ?>
									<div class="flex items-center text-blue mb-5">
										<time class="text-sm font-medium relative pl-5 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:w-3 before:h-3 before:rounded-full before:bg-red">
											<?php echo get_the_date('d/m/y H:i'); ?>
										</time>
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="9" cy="17" r="1" fill="#FACC15" />
											<circle cx="11" cy="14" r="1" fill="#FACC15" />
											<circle cx="13" cy="11" r="1" fill="#FACC15" />
											<circle cx="15" cy="8" r="1" fill="#FACC15" />
										</svg>
										<span class="uppercase text-xs font-bold tracking-widest"><?php echo get_the_category_list(', '); ?></span>
									</div>
									<a href="<?php the_permalink(); ?>">
										<span class="absolute inset-0"></span>
										<h3 class="font-bold text-pretty text-xl leading-6 mb-2 line-clamp-3">
											<?php echo get_the_title(); ?>
										</h3>
									</a>
									<p class="line-clamp-3">
										<?php echo get_the_excerpt(); ?>
									</p>
									</div>
								</div>
					</article>
				<?php
				}
				wp_reset_postdata();
				?>

				<div class="mt-8 flex justify-center">
					<a href="<?php echo site_url('/noticias'); ?>" class="bg-white inline-block text-sm text-stone-600 font-medium px-5 py-3 rounded-md border border-gray-dark/20 hover:bg-stone-50 hover:border-gray-dark/40 transition-all duration-300 ease-in-out shadow-small">
						Ver mais notícias
					</a>
				</div>
			</div>
		</div>

		<section class="col-span-4">
			<?php
			$lastMatch = new WP_Query([
				'posts_per_page' => 1,
				'post_type' => 'match',
				'meta_query' => [
					[
						'key' => 'home_score',
						'value' => '',
						'compare' => '!='
					]
				],
				'meta_key' => 'match_time',
				'orderby' => 'meta_value',
				'order' => 'DESC'
			]);

			if ($lastMatch->have_posts()) {
				$lastMatch->the_post();
			?>
				<!-- LAST GAME -->
				<div class="bg-white border border-gray-dark/20 rounded-lg shadow-small mb-8">
					<?php
					$matchTime = new DateTime(get_field('match_time'));
					?>
					<header class="flex items-center justify-between bg-gradient-to-r gray-gradient rounded-t-md px-4 py-1">
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
						<h2 class="text-gray font-black text-2xl tracking-tighter italic uppercase">Último Jogo</h2>
					</header>
					<a class="group" href="<?php the_permalink(); ?>">
						<div class="px-4 py-6 group-hover:bg-yellow/5 transition-all duration-1000 ease-in-out">
							<div class="grid grid-cols-home-matches justify-items-stretch">
								<?php
								$homeTeam = get_field('home_team');
								$awayTeam = get_field('away_team');
								?>
								<div class="justify-self-start self-end">
									<img class="h-full max-h-[72px] object-cover" src="<?php echo esc_url($homeTeam['url']) ?>" alt="">
								</div>
								<div class="justify-self-center">
									<h3 class="text-center leading-none text-xs text-gray-light font-medium uppercase mb-6">
										<?php echo get_the_title(get_field('match_competition')[0]) ?>
									</h3>
									<p class="text-center leading-none text-xs text-gray-light mb-3">Resultado</p>
									<p class="text-center leading-none text-[2.5rem] mb-6">
										<span class="score-gradient px-4 py-0 font-display font-semibold text-yellow-dark rounded-lg border-2 border-black">
											<?php echo get_field('home_score') . ' - ' . get_field('away_score'); ?>
										</span>
									</p>
									<p class="text-center leading-none text-base font-black mb-4 text-gray-dark">
										<span class=" <?php echo $homeTeam['title'] == 'América' ? 'text-base uppercase text-red' : ''; ?>">
											<?php echo $homeTeam['title'] ?>
										</span>
										<span> x </span>
										<span class=" <?php echo $awayTeam['title'] == 'América' ? 'text-sm uppercase text-red' : ''; ?>">
											<?php echo $awayTeam['title']; ?>
										</span>
									<p class="text-center leading-none text-[0.6875rem] text-gray-dark"><?php echo get_field('match_stadium'); ?></p>
								</div>
								<div class="justify-self-end self-end">
									<img class="h-full max-h-[72px] object-cover" src="<?php echo esc_url($awayTeam['url']) ?>" alt="">
								</div>
							</div>
						</div>
					</a>
				</div>
				<!-- END LAST GAME -->
			<?php }
			wp_reset_postdata();

			$nextMatch = new WP_Query([
				'posts_per_page' => 1,
				'post_type' => 'match',
				'meta_query' => [
					[
						'key' => 'home_score',
						'value' => '',
						'compare' => '=='
					],
				],
				'meta_key' => 'match_time',
				'orderby' => 'meta_value',
				'order' => 'ASC'
			]);

			if ($nextMatch->have_posts()) {
				$nextMatch->the_post();
			?>
				<!-- NEXT GAME -->
				<div class="bg-white border border-gray-dark/20 rounded-lg shadow-small mb-8">
					<?php
					$matchTime = new DateTime(get_field('match_time'));
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
						<h2 class="font-black text-2xl tracking-tighter yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Próximo Jogo</h2>
					</header>
					<a href="mailto:contato@mecao.com.br" class="group">
						<div class="flex justify-center items-center space-x-4 p-4 group-hover:bg-red/5 transition-all duration-500 ease-in-out">
							<span class=" uppercase text-[0.625rem] text-gray-dark/60 font-medium">Apresentado por</span>
							<img class="" src="<?php echo get_theme_file_uri('/images/bar.svg'); ?>" alt="">
							<div class="flex justify-center">
								<span class=" text-xs text-red font-medium px-3 py-2 rounded-md bg-transparent group-hover:bg-red group-hover:text-white border border-red/40 shadow-small group-hover:shadow-red/20 transition-all duration-300 ease-in-out">
									Seja parceiro do Portal Mecão
								</span>
							</div>
						</div>
					</a>
					<a class="group" href="<?php the_permalink(); ?>">
						<div class="px-4 py-6 group-hover:bg-yellow/5 transition-all duration-1000 ease-in-out">
							<div class="grid grid-cols-home-matches justify-items-stretch">
								<?php
								$homeTeam = get_field('home_team');
								$awayTeam = get_field('away_team');
								?>
								<div class="justify-self-start self-end">
									<img class="h-full max-h-[72px] object-cover" src="<?php echo esc_url($homeTeam['url']) ?>" alt="">
								</div>
								<div class="justify-self-center">
									<h3 class="text-center leading-none text-xs text-gray-light font-medium uppercase mb-6">
										<?php
										echo get_the_title(get_field('match_competition')[0]);
										?>
									</h3>
									<p class="text-center leading-none text-xs text-gray-light mb-3">Horário</p>
									<p class="text-center leading-none text-[2.5rem] mb-6">
										<span class="score-gradient px-4 py-0 font-display font-semibold text-yellow-dark rounded-lg border-2 border-black">
											<?php
											$formatter->setPattern('HH:mm');
											echo $formatter->format($matchTime);
											?>
										</span>
									</p>
									<p class="text-center leading-none text-base font-black mb-4 text-gray-dark">
										<span class=" <?php echo $homeTeam['title'] == 'América' ? 'text-base uppercase text-red' : ''; ?>">
											<?php echo $homeTeam['title'] ?>
										</span>
										<span> x </span>
										<span class=" <?php echo $awayTeam['title'] == 'América' ? 'text-sm uppercase text-red' : ''; ?>">
											<?php echo $awayTeam['title']; ?>
										</span>
									</p>
									<p class="text-center leading-none text-[0.6875rem] text-gray-dark"><?php echo get_field('match_stadium'); ?></p>
								</div>
								<div class="justify-self-end self-end">
									<img class="h-full max-h-[72px] object-cover" src="<?php echo esc_url($awayTeam['url']) ?>" alt="">
								</div>
							</div>
						</div>
					</a>
				</div>
				<!-- END NEXT GAMES -->
			<?php }
			wp_reset_postdata();
			?>

			<div class="flex justify-center"><a href="<?php echo site_url('/jogos'); ?>" class="bg-white inline-block text-sm text-stone-600 font-medium px-5 py-3 rounded-md border border-gray-dark/20 hover:bg-stone-50 hover:border-gray-dark/40 transition-all duration-300 ease-in-out shadow-small">Calendário de Jogos</a></div>

			<div class="bg-white border border-gray-dark/20 rounded-lg shadow-small mt-10 overflow-hidden">
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
			<!-- END COMPETITION TABLE -->

			<!-- AD BANNER -->
			<!-- <img class="border border-gray-dark/20 rounded-lg shadow-small mt-8 overflow-hidden" src="<?php //echo get_theme_file_uri('/images/banner.png'); 
																											?>" alt=""> -->
			<!-- END AD BANNER -->

			<!-- MOST VIEWED -->
			<!-- <div class="bg-white border border-gray-dark/20 rounded-lg shadow-small mt-10 overflow-hidden">
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
						<img src="<?php //echo get_theme_file_uri('/images/small-news1.png'); 
									?>" alt="">
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
						<img src="<?php //echo get_theme_file_uri('/images/small-news2.png'); 
									?>" alt="">
					</article>
				</div>
			</div> -->
		</section>

	</div>
</main>

<?php
get_footer();
?>