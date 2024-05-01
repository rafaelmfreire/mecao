<?php
get_header();
?>

<main>
	<div class="bg-white container mx-auto rounded-xl sm:rounded-[24px] p-4 sm:p-8 my-6 grid grid-cols-12 gap-4 sm:gap-8">
		<div class="col-span-12 space-y-4 sm:space-y-0 sm:col-span-8">
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
								<header class="p-4 sm:p-6 absolute bottom-0">
									<h2 class="group-hover:underline text-pretty text-base leading-6 sm:text-[2.5rem] sm:leading-[2.875rem] font-medium sm:font-bold text-white [text-shadow:_2px_2px_2px_rgb(0_0_0_/_50%)]"><?php the_title(); ?></h2>
								</header>
							</div>
						</article>
					</a>

					<div class="hidden sm:flex items-center justify-center mt-14 space-x-8 mb-10">
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
							<h2 class="font-black sm:text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Últimas Notícias</h2>
						</div>
						<div class="grid grid-cols-12">
							<?php if (get_the_post_thumbnail()) { ?>
								<div class="col-span-12 sm:col-span-5">
									<?php
									the_post_thumbnail('homeNewsPhoto', ['class' => 'h-full max-h-[150px] sm:max-h-full sm:min-h-[265px] object-cover']);
									?>
								</div>
								<div class="p-4 sm:p-8 col-span-12 sm:col-span-7">
								<?php } else { ?>
									<div class="p-4 sm:p-8 col-span-12">
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
										<h3 class="font-bold text-pretty text-sm sm:text-xl sm:leading-6 mb-2 line-clamp-3">
											<?php echo get_the_title(); ?>
										</h3>
									</a>
									<p class="hidden sm:block line-clamp-3">
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

		<section class="col-span-12 sm:col-span-4">

			<?php get_template_part('template-parts/content', 'lastgame'); ?>
			<?php get_template_part('template-parts/content', 'nextgame'); ?>

			<div class="flex justify-center"><a href="<?php echo site_url('/jogos'); ?>" class="bg-white inline-block text-sm text-stone-600 font-medium px-5 py-3 rounded-md border border-gray-dark/20 hover:bg-stone-50 hover:border-gray-dark/40 transition-all duration-300 ease-in-out shadow-small">Calendário de Jogos</a></div>

			<?php get_template_part('template-parts/content', 'standings'); ?>
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