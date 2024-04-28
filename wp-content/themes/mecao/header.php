<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body class="bg-red-dark font-sans">
	<header id="topbar" class="show-bar sticky top-0 w-full bg-red-dark z-50 transition-all duration-300 ease-in-out">
		<div class="container mx-auto px-8">
			<div class="flex items-center justify-between pt-3 pb-5">
				<?php
				$nextMatch = new WP_Query([
					'posts_per_page' => 1,
					'post_type' => 'match',
					'meta_query' => [
						[
							'key' => 'match_score',
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
					<div class="relative flex items-center space-x-1 blue-gradient text-white py-2 px-4 rounded-lg ring-2 ring-white/10 shadow">
						<a href="<?php the_permalink(); ?>">
							<span class="absolute inset-0"></span>
							<span class="yellow-gradient font-black italic uppercase text-sm inline-block text-transparent bg-clip-text">Próximo Jogo</span>
						</a>
						<svg class="inline" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
						<span class="text-sm font-medium capitalize">
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
						<svg class="inline ml-12" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
					<div class="flex items-center space-x-4">
						<input type="search" id="mySearch" name="q" class="block w-[400px] rounded-lg border-0 py-3 bg-white/10 shadow text-white ring-1 ring-inset ring-white/35 placeholder:text-white/50 focus:ring-2 focus:ring-inset focus:ring-white/60 sm:text-sm" placeholder="Pesquisar...">
						<button class="p-3">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M20.9998 21L15.8028 15.803M15.8028 15.803C17.2094 14.3964 17.9996 12.4887 17.9996 10.4995C17.9996 8.51029 17.2094 6.60256 15.8028 5.19599C14.3962 3.78941 12.4885 2.99921 10.4993 2.99921C8.51011 2.99921 6.60238 3.78941 5.19581 5.19599C3.78923 6.60256 2.99902 8.51029 2.99902 10.4995C2.99902 12.4887 3.78923 14.3964 5.19581 15.803C6.60238 17.2096 8.51011 17.9998 10.4993 17.9998C12.4885 17.9998 14.3962 17.2096 15.8028 15.803Z" stroke="white" stroke-opacity="0.35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</button>
					</div>
					<div class="flex items-center space-x-4">
						<span class="font-bold text-sm text-white/85">Parceiro Master</span>
						<svg width="2" height="18" viewBox="0 0 2 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="1" cy="10.5" r="1" fill="#F0C105" />
							<circle cx="1" cy="13.5" r="1" fill="#F0C105" />
							<circle cx="1" cy="16.5" r="1" fill="#F0C105" />
							<circle cx="1" cy="7.5" r="1" fill="#F0C105" />
							<circle cx="1" cy="4.5" r="1" fill="#F0C105" />
							<circle cx="1" cy="1.5" r="1" fill="#F0C105" />
						</svg>
						<img src="<?php echo get_theme_file_uri('/images/emobi-white.png'); ?>" alt="">
					</div>
			</div>
		</div>

		<div class="bg-red shadow">
			<div class="container mx-auto flex items-center justify-between py-1 px-8">
				<a href="<?php echo site_url(); ?>">
					<div class="flex items-center space-x-4 -ml-3">
						<img class="absolute" src="<?php echo get_theme_file_uri('/images/logo_mecao.svg'); ?>" alt="" />
						<h1 class="pl-16 font-display text-yellow text-4xl">Portal Mecão</h1>
					</div>
				</a>
				<div class="flex items-center space-x-20">
					<nav>
						<ul class="flex items-center space-x-8 text-white font-bold">
							<a href="<?php echo site_url('/noticias'); ?>">
								<li class="<?php echo (get_post_type() == 'post' ? 'relative after:border-b-2 after:w-full after:block after:absolute after:pb-1 after:h-1 after:border-dotted after:border-yellow' : 'opacity-80'); ?>">Notícias</li>
							</a>
							<a href="<?php echo site_url('/campeonatos'); ?>">
								<!-- <li class="opacity-80">Campeonatos</li> -->
								<li class="<?php echo (get_post_type() == 'competition' ? 'relative after:border-b-2 after:w-full after:block after:absolute after:pb-1 after:h-1 after:border-dotted after:border-yellow' : 'opacity-80'); ?>">Campeonatos</li>
							</a>
							<a href="<?php echo site_url('/jogos'); ?>">
								<li class="<?php echo (get_post_type() == 'match' ? 'relative after:border-b-2 after:w-full after:block after:absolute after:pb-1 after:h-1 after:border-dotted after:border-yellow' : 'opacity-80'); ?>">Jogos</li>
							</a>
							<a href="<?php echo site_url('/jogadores'); ?>">
								<li class="opacity-80">Jogadores</li>
							</a>
							<a href="<?php echo site_url('/envie-sua-noticia'); ?>">
								<li class="opacity-80">Mande sua notícia</li>
							</a>
						</ul>
					</nav>
					<ul class="flex items-center space-x-8">
						<li>
							<img src="<?php echo get_theme_file_uri('/images/instagram.svg'); ?>" alt="">
						</li>
						<li>
							<img src="<?php echo get_theme_file_uri('/images/twitter.svg'); ?>" alt="">
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>