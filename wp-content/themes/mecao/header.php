<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body class="bg-red-dark font-sans">
	<header id="topbar" class="show-bar sticky top-0 w-full bg-red-dark z-50 transition-all duration-300 ease-in-out flex flex-col">
		<div class="container mx-auto px-4 md:px-8 py-2 md:py-0">
			<div class="flex flex-col-reverse md:flex-row gap-4 md:gap-0 items-center justify-between pt-3 pb-5">
				<?php
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
					<div class="relative flex items-center w-full md:w-auto justify-between space-x-1 blue-gradient text-white py-2 px-4 rounded-lg ring-2 ring-white/10 shadow hover:border-white/70 hover:cursor-pointer hover:shadow-small hover:shadow-white/20 hover:bg-gradient-to-l">
						<a href="<?php the_permalink(); ?>">
							<span class="absolute inset-0"></span>
							<span class="yellow-gradient font-black italic uppercase text-xs lg:text-sm inline-block text-transparent bg-clip-text">Próximo Jogo</span>
						</a>
						<svg class="hidden md:inline" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="9" cy="17" r="1" fill="#FACC15" />
							<circle cx="7" cy="20" r="1" fill="#FACC15" />
							<circle cx="11" cy="14" r="1" fill="#FACC15" />
							<circle cx="13" cy="11" r="1" fill="#FACC15" />
							<circle cx="15" cy="8" r="1" fill="#FACC15" />
							<circle cx="17" cy="5" r="1" fill="#FACC15" />
						</svg>
						<?php
						$matchTime = new DateTime(get_field('match_time'));
						$formatter = new IntlDateFormatter(
							'pt_BR',
							IntlDateFormatter::SHORT,
							IntlDateFormatter::SHORT,
							'UTC',
							IntlDateFormatter::GREGORIAN,
						);
						?>
						<span class="text-xs lg:text-sm font-medium capitalize">
							<?php
							$formatter->setPattern('E dd LLL');
							echo $formatter->format($matchTime);
							?>
						</span>
						<div class="flex items-center space-x-2 pl-4">
							<img class="h-7 w-auto" src="<?php echo get_field('home_team')['url'] ?>" alt="">
							<span>x</span>
							<img class="h-7 w-auto" src="<?php echo get_field('away_team')['url'] ?>" alt="">
						</div>
						<svg class="hidden md:inline ml-12" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="8" cy="20" r="1" fill="#FACC15" />
							<circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 7 5)" fill="#FACC15" />
							<circle cx="10" cy="18" r="1" fill="#FACC15" />
							<circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 9 7)" fill="#FACC15" />
							<circle cx="12" cy="16" r="1" fill="#FACC15" />
							<circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 11 9)" fill="#FACC15" />
							<circle cx="16" cy="12" r="1" fill="#FACC15" />
							<circle cx="14" cy="14" r="1" fill="#FACC15" />
							<circle cx="1" cy="1" r="1" transform="matrix(1 0 0 -1 13 11)" fill="#FACC15" />
						</svg>
					<?php
				}
				wp_reset_postdata();
					?>
					</div>
					<!-- <div class="flex items-center space-x-4">
						<input type="search" id="mySearch" name="q" class="block w-[400px] rounded-lg border-0 py-3 bg-white/10 shadow text-white ring-1 ring-inset ring-white/35 placeholder:text-white/50 focus:ring-2 focus:ring-inset focus:ring-white/60 md:text-sm" placeholder="Pesquisar...">
						<button class="p-3">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M20.9998 21L15.8028 15.803M15.8028 15.803C17.2094 14.3964 17.9996 12.4887 17.9996 10.4995C17.9996 8.51029 17.2094 6.60256 15.8028 5.19599C14.3962 3.78941 12.4885 2.99921 10.4993 2.99921C8.51011 2.99921 6.60238 3.78941 5.19581 5.19599C3.78923 6.60256 2.99902 8.51029 2.99902 10.4995C2.99902 12.4887 3.78923 14.3964 5.19581 15.803C6.60238 17.2096 8.51011 17.9998 10.4993 17.9998C12.4885 17.9998 14.3962 17.2096 15.8028 15.803Z" stroke="white" stroke-opacity="0.35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</button>
					</div> -->

					<div class="w-full md:w-auto flex justify-between md:justify-center items-center md:space-x-4">
						<span class="block lg:inline font-bold text-xs lg:text-sm text-white/85">Parceiro Master</span>
						<a href="mailto:contato@mecao.com.br" class="block md:inline-block text-xs md:text-sm text-white font-medium px-5 py-3 rounded-md bg-transparent hover:bg-white hover:text-red border border-white/40 shadow-small hover:shadow-white/10 transition-all duration-300 ease-in-out">Seja parceiro do Portal Mecão</a>
					</div>
			</div>
		</div>

		<div class="bg-red shadow" x-data="{ open: false }">
			<div class="container mx-auto flex items-center justify-between py-1 px-8">
				<a href="<?php echo site_url(); ?>">
					<div class="flex items-center space-x-4 -ml-3">
						<img class="absolute" src="<?php echo get_theme_file_uri('/images/logo_mecao.svg'); ?>" alt="" />
						<h1 class="pl-16 font-display text-yellow text-4xl">Portal Mecão</h1>
					</div>
				</a>
				<div class="hidden md:flex items-center md:space-x-10 lg:space-x-20">
					<nav>
						<ul class="flex items-center space-x-8 text-white font-bold">
							<a href="<?php echo site_url('/noticias'); ?>">
								<li class="hover:opacity-100 transition-all duration-300 ease-in-out <?php echo (get_post_type() == 'post' ? 'relative after:border-b-2 after:w-full after:block after:absolute after:pb-1 after:h-1 after:border-dotted after:border-yellow' : 'opacity-80'); ?>">Notícias</li>
							</a>
							<a href="<?php echo site_url('/campeonatos'); ?>">
								<!-- <li class="opacity-80">Campeonatos</li> -->
								<li class="hover:opacity-100 transition-all duration-300 ease-in-out <?php echo (get_post_type() == 'competition' ? 'relative after:border-b-2 after:w-full after:block after:absolute after:pb-1 after:h-1 after:border-dotted after:border-yellow' : 'opacity-80'); ?>">Campeonatos</li>
							</a>
							<a href="<?php echo site_url('/jogos'); ?>">
								<li class="hover:opacity-100 transition-all duration-300 ease-in-out <?php echo (get_post_type() == 'match' ? 'relative after:border-b-2 after:w-full after:block after:absolute after:pb-1 after:h-1 after:border-dotted after:border-yellow' : 'opacity-80'); ?>">Jogos</li>
							</a>
							<a href="<?php echo site_url('/estatisticas'); ?>">
								<li class="hover:opacity-100 transition-all duration-300 ease-in-out <?php echo (get_page_uri() == 'estatisticas' ? 'relative after:border-b-2 after:w-full after:block after:absolute after:pb-1 after:h-1 after:border-dotted after:border-yellow' : 'opacity-80'); ?>">Estatísticas</li>
							</a>
						</ul>
					</nav>
					<ul class="flex items-center space-x-8">
						<li>
							<a href="https://instagram.com/portalmecao" target="_blank"><img src="<?php echo get_theme_file_uri('/images/instagram.svg'); ?>" alt=""></a>
						</li>
						<li>
							<a href="https://twitter.com/portalmecao" target="_blank"><img src="<?php echo get_theme_file_uri('/images/twitter.svg'); ?>" alt=""></a>
						</li>
					</ul>
				</div>
				<div class="flex md:hidden" @click="open = true">
					<button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-white">
						<!-- <span class="sr-only">Open main menu</span> -->
						<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
						</svg>
					</button>
				</div>
				<div class="lg:hidden" role="dialog" aria-modal="true" x-show="open">
					<!-- Background backdrop, show/hide based on slide-over state. -->
					<div class="fixed inset-0 z-50"></div>
					<div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-red/90 backdrop-blur-lg px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/70">
						<div class="flex items-center justify-between">
							<a href="<?php echo site_url(); ?>" class="-ml-4 p-1.5">
								<!-- <span class="sr-only">Portal Mecão</span> -->
								<img class="h-20" src="<?php echo get_theme_file_uri('/images/logo_mecao.svg'); ?>" alt="" />
							</a>
							<button type="button" class="-m-2.5 rounded-md p-2.5 bg-white/20 text-white" @click="open = false">
								<!-- <span class="sr-only">Fechar menu</span> -->
								<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
									<path stroke-linecap=" round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
								</svg>
							</button>
						</div>
						<div class="mt-6 flow-root">
							<div class="-my-6 divide-y divide-white/30">
								<div class="space-y-2 py-6">
									<a href="<?php echo site_url('/noticias'); ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-white/20 <?php echo (get_post_type() == 'post' ? 'bg-yellow/20' : ''); ?>">Notícias</a>
									<a href="<?php echo site_url('/campeonatos'); ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-white/20 <?php echo (get_post_type() == 'competition' ? 'bg-yellow/20' : ''); ?>">Campeonatos</a>
									<a href="<?php echo site_url('/jogos'); ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-white/20 <?php echo (get_post_type() == 'match' ? 'bg-yellow/20' : ''); ?>">Jogos</a>
								</div>
								<div class="py-6 flex items-center space-x-6">
									<a href="https://instagram.com/portalmecao" target="_blank" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
										<img src="<?php echo get_theme_file_uri('/images/instagram.svg'); ?>" alt="Instagram Portal Mecão">
									</a>
									<a href="https://twitter.com/portalmecao" target="_blank" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
										<img src="<?php echo get_theme_file_uri('/images/twitter.svg'); ?>" alt="Twitter Portal Mecão">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</header>