<?php
get_header();

?>

	<main>
		<div class="bg-white container mx-auto rounded-[24px] py-8 my-6 px-8 grid grid-cols-12 gap-8">
			Archive
			<?php while(have_posts()) {
				the_post();
			?>
			<?php } ?>
		</div>
	</main>

<?php
get_footer();
?>