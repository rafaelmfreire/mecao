<?php
get_header();
?>

<main class="antialiased">
	<div class="bg-white container mx-auto rounded-xl lg:rounded-[24px] p-4 lg:p-8 my-6 grid grid-cols-12 gap-4 lg:gap-8">
		<div class="col-span-12 space-y-4 lg:space-y-0 xl:col-span-8">
			<?php while (have_posts()) {
				the_post();
				if (in_category('video')) {
					get_template_part('template-parts/content', 'video');
				} else {
					get_template_part('template-parts/content', 'single');
				}
			?>
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