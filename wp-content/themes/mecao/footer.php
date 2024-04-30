<footer class="py-8 bg-red">
	<div class="container mx-auto px-8 text-white flex items-start justify-between">
		<div class="flex flex-col self-stretch justify-between">
			<div class="flex items-center space-x-2 -ml-2">
				<img src="<?php echo get_theme_file_uri('/images/mecao-white.svg'); ?>" alt="">
				<span class="font-black text-xl">Portal Mecão</span>
			</div>
			<p class="font-medium text-sm">© Portal Mecão 2024 | Todos os direitos reservados.</p>
		</div>
		<div class="space-y-6">
			<h2 class="font-black uppercase">Notícias</h2>
			<ul class="space-y-4">
				<li><a href="<?php echo site_url('/noticias') ?>">Últimas Notícias</a></li>
				<!-- <li>Mais Vistas</li> -->
			</ul>
		</div>
		<div class="space-y-6">
			<h2 class="font-black uppercase">Time Principal</h2>
			<ul class="space-y-4">
				<li><a href="<?php echo site_url('/campeonatos') ?>">Campeonatos</a></li>
				<li><a href="<?php echo site_url('/jogos') ?>">Jogos</a></li>
			</ul>
		</div>
		<!-- <div class="space-y-6">
			<h2 class="font-black uppercase">Jogadores</h2>
			<ul class="space-y-4">
				<li>Goleiro</li>
				<li>Defesa</li>
				<li>Meio-Campo</li>
				<li>Ataque</li>
			</ul>
		<div class="space-y-6">
			<h2 class="font-black uppercase">Fale Conosco</h2>
			<ul class="space-y-4">
				<li>Mande sua foto</li>
				<li>Envie uma notícia</li>
				<li><a href="mailto:contato@mecao.com.br">Contato</a></li>
			</ul>
		</div> -->
		<div class="space-y-6">
			<h2 class="font-black uppercase">Parceiros</h2>
			<a href="mailto:contato@mecao.com.br" class="inline-block text-sm text-white font-medium px-5 py-3 rounded-md bg-transparent hover:bg-white hover:text-red border border-white/40 shadow-small hover:shadow-white/10 transition-all duration-300 ease-in-out">Seja parceiro do Portal Mecão</a>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>

</html>