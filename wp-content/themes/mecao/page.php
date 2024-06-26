<?php
get_header();

?>

<main>
	<div class="bg-white container mx-auto rounded-[24px] py-8 my-6 px-8 grid grid-cols-12 gap-8">
		<div class="col-span-8">
			<article>
				<div class="relative rounded-md overflow-hidden shadow">
					<div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent"></div>
					<img src="<?php echo get_theme_file_uri('/images/rafinha.jpg'); ?>" alt="">
					<header class="p-6 absolute bottom-0">
						<div class="flex items-center text-white mb-2">
							<time class="text-sm font-medium relative pl-5 before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:w-3 before:h-3 before:rounded-full before:bg-red">15/04/2024</time>
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="9" cy="17" r="1" fill="#FACC15" />
								<circle cx="11" cy="14" r="1" fill="#FACC15" />
								<circle cx="13" cy="11" r="1" fill="#FACC15" />
								<circle cx="15" cy="8" r="1" fill="#FACC15" />
							</svg>
							<span class="uppercase text-xs font-bold tracking-widest">Notícias</span>
						</div>
						<h2 class="text-[2.5rem] leading-[2.875rem] font-bold text-white [text-shadow:_2px_2px_2px_rgb(0_0_0_/_50%)]">Pagina</h2>
						<!-- <h2 class="text-[2.5rem] leading-[2.875rem] font-bold text-white">Rafinha comemora título e vê América-RN no “caminho certo” antes da Série D</h2> -->
					</header>
				</div>
			</article>
			<div class="flex items-center justify-center mt-14 space-x-8">
				<span class="text-sm font-bold text-gray-dark/85">Parceiro Master</span>
				<img src="<?php echo get_theme_file_uri('/images/emobi-large.png'); ?>" alt="">
				<img src="<?php echo get_theme_file_uri('/images/bar.svg'); ?>" alt="">
				<span class="text-sm font-bold text-gray-dark/85">Seja sócio do América</span>
				<img src="<?php echo get_theme_file_uri('/images/socio-mecao.png'); ?>" alt="">
			</div>

		</div>
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

		</section>
		<div class="col-span-8 mt-10 space-y-4">

			<?php while (have_posts()) {
				the_post(); ?>
				<article class="group border border-gray-dark/10 rounded-lg shadow-small overflow-hidden ">
					<div class=" hidden group-first-of-type:flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
						<h2 class="font-black text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Últimas Notícias</h2>
					</div>
					<div class="grid grid-cols-12">
						<a class="col-span-6" href="<?php the_permalink(); ?>">
							<img class="h-full min-h-[265px] object-cover" src="<?php echo get_theme_file_uri('/images/news2.png'); ?>" alt="">
						</a>
						<div class="p-8 col-span-6">
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
								<h3 class="font-bold text-lg leading-6 mb-2 line-clamp-3">
									<?php echo get_the_title(); ?>
								</h3>
							</a>
							<p class="line-clamp-3">
								<?php echo get_the_excerpt(); ?>
							</p>
						</div>
					</div>
				</article>
			<?php }
			echo paginate_links(); ?>

			<div class="mt-8 flex justify-center"><a href="#" class="inline-block text-sm text-stone-600 font-medium px-5 py-3 rounded-md border border-[#292524] border-opacity-10 shadow-small">Ver mais notícias</a></div>

		</div>
		<div class="col-span-4">
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
		</div>
	</div>
</main>

<?php
get_footer();
?>