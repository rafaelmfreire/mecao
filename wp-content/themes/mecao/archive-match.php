<?php
get_header();

?>

	<main>
		<div class="bg-white container mx-auto rounded-[24px] py-8 my-6 px-8 grid grid-cols-12 gap-8">
			<div class="col-span-8">
				<?php while(have_posts()) {
					the_post();
				?>
				<article>
					<h2><?php the_title(); ?></h2>
				</article>
				<?php } ?>
			</div>
		</div>
	</main>

<?php
get_footer();
?>