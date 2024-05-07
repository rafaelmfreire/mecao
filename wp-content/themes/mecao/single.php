<?php
get_header();
?>

<main class="antialiased">
	<div class="bg-white container mx-auto rounded-xl lg:rounded-[24px] p-4 lg:p-8 my-6 grid grid-cols-12 gap-4 lg:gap-8">
		<div class="col-span-12 space-y-4 lg:space-y-0 xl:col-span-8">
			<?php while (have_posts()) {
				the_post();
			?>
				<article class="mx-auto w-full">
					<!-- <div class="text-center uppercase font-bold text-blue-dark mb-6 text-sm"> -->
					<?php
					// the_category(); 
					?>
					<!-- </div> -->
					<h1 class="text-pretty text-stone-900 text-xl leading-normal md:text-3xl lg:text-5xl lg:leading-[1.15em] font-black mb-8"><?php the_title(); ?></h1>
					<div class="mb-8 flex items-center">
						<span class="uppercase relative pl-5 text-blue text-sm font-bold tracking-widest before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:w-3 before:h-3 before:rounded-full before:bg-red"><?php echo get_the_category_list(', '); ?></span>
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="9" cy="17" r="1" fill="#FACC15" />
							<circle cx="11" cy="14" r="1" fill="#FACC15" />
							<circle cx="13" cy="11" r="1" fill="#FACC15" />
							<circle cx="15" cy="8" r="1" fill="#FACC15" />
						</svg>
						<span class="text-stone-700"><?php echo get_the_date('d/m/Y H:i'); ?></span>
						<span class="text-stone-500">&nbsp;/ Atualizado há <?php echo human_time_diff(get_the_modified_time('U'), (new DateTime())->sub(DateInterval::createFromDateString('3 hours'))->format('U')); ?></span>
					</div>
					<?php the_post_thumbnail('full', ['class' => 'w-full object-cover rounded-md mb-2 sm:mb-8']); ?>
					<div class="py-8 sm:px-8 prose sm:prose-xl prose-red text-pretty selection:bg-red-dark selection:text-white
					prose-img:rounded-md ">
						<?php the_content(); ?>
					</div>
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