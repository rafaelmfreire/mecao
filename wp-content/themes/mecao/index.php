<?php
get_header();
?>
<main class="antialiased">
	<div class="bg-white container mx-auto rounded-xl lg:rounded-[24px] p-4 lg:p-8 my-6 grid grid-cols-12 gap-4 lg:gap-8">
		<div class="col-span-12 space-y-4 xl:col-span-8">
			<?php while (have_posts()) {
				the_post(); ?>
				<article class="group bg-white border border-gray-dark/20 rounded-lg shadow-small overflow-hidden transition-all delay-100 ease-in-out">
					<div class=" hidden group-first-of-type:flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
						<h2 class="font-black text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Últimas Notícias</h2>
					</div>
					<div class="relative grid grid-cols-12">
						<?php if (get_the_post_thumbnail()) { ?>
							<div class="col-span-12 md:col-span-5">
								<?php
								the_post_thumbnail('homeNewsPhoto', ['class' => 'h-full max-h-[150px] lg:max-h-full lg:min-h-[265px] object-cover']);
								?>
							</div>
							<div class="p-4 lg:p-8 col-span-12 md:col-span-7">
							<?php } else { ?>
								<div class="p-4 lg:p-8 col-span-12">
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
									<h3 class="font-bold text-pretty text-sm lg:text-xl lg:leading-6 mb-2 line-clamp-3">
										<?php echo get_the_title(); ?>
									</h3>
								</a>
								<p class="hidden lg:block line-clamp-3">
									<?php echo get_the_excerpt(); ?>
								</p>
								</div>
							</div>
				</article>

			<?php
			}
			?>
			<div class="pt-6 flex items-center justify-center space-x-2">
				<?php
				echo paginate_links();
				?>
			</div>

			<!-- <div class="mt-8 flex justify-center"><a href="#" class="inline-block text-sm text-stone-600 font-medium px-5 py-3 rounded-md border border-[#292524] border-opacity-10 shadow-small">Ver mais notícias</a></div> -->

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