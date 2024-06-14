<?php
get_header();

$rankingJogos = json_decode(
    '{"jogos": ' .
        '[' .
        '{"nome":"Renan Bragança",  "j":8},' .
        '{"nome":"Ferreira",        "j":7},' .
        '{"nome":"Wenderson",       "j":7},' .
        '{"nome":"Salazar",         "j":7},' .
        '{"nome":"Henrique",        "j":7},' .
        '{"nome":"Gabriel Davis",   "j":7},' .
        '{"nome":"Souza",           "j":6}' .
        ']}'
);
$rankingGols = json_decode(
    '{"gols": ' .
        '[' .
        '{"nome":"Gustavo Henrique","j":4,"g":2},' .
        '{"nome":"Alan",            "j":5,"g":2},' .
        '{"nome":"Souza",           "j":6,"g":1},' .
        '{"nome":"Matheuzinho",     "j":2,"g":1},' .
        '{"nome":"Caio Hones",      "j":3,"g":1},' .
        '{"nome":"Norberto",        "j":4,"g":1},' .
        '{"nome":"Giovani",         "j":4,"g":1},' .
        '{"nome":"Marcos Ytalo",    "j":5,"g":1}' .
        ']}'
);
$rankingAssistencias = json_decode(
    '{"assistencias": ' .
        '[' .
        '{"nome":"Guilherme Guedes","j":4,"a":2},' .
        '{"nome":"Souza",           "j":6,"a":2},' .
        '{"nome":"Rafinha",         "j":2,"a":1},' .
        '{"nome":"Antônio Villa",   "j":4,"a":1},' .
        '{"nome":"Cauã Paixão",     "j":4,"a":1},' .
        '{"nome":"Henrique",        "j":5,"a":1}' .
        ']}'
);
$jogos = $rankingJogos->jogos;
$gols = $rankingGols->gols;
$assistencias = $rankingAssistencias->assistencias;
?>

<main>
    <div class="bg-white container mx-auto rounded-xl lg:rounded-[24px] p-4 lg:p-8 my-6 grid grid-cols-12 gap-4 lg:gap-8">
        <div class="col-span-12">
            <h1 class="font-black text-3xl">Estatísticas 2024</h1>
        </div>
        <div class="col-span-12 space-y-4 lg:space-y-0 xl:col-span-4">
            <div class="bg-white border border-gray-dark/20 rounded-lg shadow-small overflow-hidden">
                <div class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
                    <a href="<?php echo site_url('/campeonatos/brasileirao-serie-d/'); ?>">
                        <h2 class="font-black sm:text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Jogos</h2>
                    </a>
                </div>
                <div>
                    <div class="flex items-end justify-between" style="background-image: url(<?php echo get_theme_file_uri('/images/bg-pattern.png'); ?>); background-size: cover;">
                        <div class="p-4">
                            <span class="font-bold text-lg">1º</span>
                            <p class="font-black text-lg"><?php echo $jogos[0]->nome; ?></p>
                            <p class="text-red font-medium uppercase"><span class="text-6xl font-black"><?php echo $jogos[0]->j; ?></span> jogos</p>
                        </div>
                        <img src="<?php echo get_theme_file_uri('/images/jogadores/' . $jogos[0]->nome . '.png') ?>" class="h-[140px] w-auto mr-4" alt="">
                    </div>
                </div>
                <div class="p-4 w-full">
                    <table class="min-w-full text-sm sm:text-base text-stone-900">
                        <tr>
                            <th class="p-4 text-center font-normal text-stone-400">#</th>
                            <th class="p-4 text-left font-bold text-stone-400 w-full">Jogador</th>
                            <th class="p-4 text-center font-black text-stone-400">J</th>
                        </tr>
                        <?php
                        for ($i = 1; $i < count($jogos); $i++) { ?>
                            <tr class="border-b-2 border-dotted last:border-b-0 border-gray-light/10">
                                <td class="px-4 py-3 font-normal"><?= $i + 1; ?>º</td>
                                <td class="px-4 py-3 font-bold"><?= $jogos[$i]->nome ?></td>
                                <td class="px-4 py-3 font-black text-center"><?= $jogos[$i]->j ?></td>
                            </tr>
                        <?php }; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-span-12 space-y-4 lg:space-y-0 xl:col-span-4">
            <div class="bg-white border border-gray-dark/20 rounded-lg shadow-small overflow-hidden">
                <div class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
                    <a href="<?php echo site_url('/campeonatos/brasileirao-serie-d/'); ?>">
                        <h2 class="font-black sm:text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Gols</h2>
                    </a>
                </div>
                <div>
                    <div class="flex items-end justify-between" style="background-image: url(<?php echo get_theme_file_uri('/images/bg-pattern.png'); ?>); background-size: cover;">
                        <div class="p-4">
                            <span class="font-bold text-lg">1º</span>
                            <p class="font-black text-lg"><?php echo $gols[0]->nome; ?></p>
                            <p class="text-red font-medium uppercase"><span class="text-6xl font-black"><?php echo $gols[0]->j; ?></span> gols</p>
                        </div>
                        <img src="<?php echo get_theme_file_uri('/images/jogadores/' . $gols[0]->nome . '.png') ?>" class="h-[140px] w-auto mr-4" alt="">
                    </div>
                </div>
                <div class="p-4 w-full">
                    <table class="min-w-full text-sm sm:text-base text-stone-900">
                        <tr>
                            <th class="p-4 text-center font-normal text-stone-400">#</th>
                            <th class="p-4 text-left font-bold text-stone-400 w-full">Jogador</th>
                            <th class="p-4 text-center font-normal text-stone-400">J</th>
                            <th class="p-4 text-center font-black text-stone-400">G</th>
                        </tr>
                        <?php
                        for ($i = 1; $i < count($gols); $i++) { ?>
                            <tr class="border-b-2 border-dotted last:border-b-0 border-gray-light/10">
                                <td class="px-4 py-3 font-normal"><?= $i + 1; ?>º</td>
                                <td class="px-4 py-3 font-bold"><?= $gols[$i]->nome ?></td>
                                <td class="px-4 py-3 font-normal text-center"><?= $gols[$i]->j ?></td>
                                <td class="px-4 py-3 font-black text-center"><?= $gols[$i]->g ?></td>
                            </tr>
                        <?php }; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-span-12 space-y-4 lg:space-y-0 xl:col-span-4">
            <div class="bg-white border border-gray-dark/20 rounded-lg shadow-small overflow-hidden">
                <div class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
                    <a href="<?php echo site_url('/campeonatos/brasileirao-serie-d/'); ?>">
                        <h2 class="font-black sm:text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Assistências</h2>
                    </a>
                </div>
                <div>
                    <div class="flex items-end justify-between" style="background-image: url(<?php echo get_theme_file_uri('/images/bg-pattern.png'); ?>); background-size: cover;">
                        <div class="p-4">
                            <span class="font-bold text-lg">1º</span>
                            <p class="font-black text-lg"><?php echo $assistencias[0]->nome; ?></p>
                            <p class="text-red font-medium uppercase"><span class="text-6xl font-black"><?php echo $assistencias[0]->j; ?></span> assistências</p>
                        </div>
                        <img src="<?php echo get_theme_file_uri('/images/jogadores/' . $assistencias[0]->nome . '.png') ?>" class="h-[140px] w-auto mr-4" alt="">
                    </div>
                </div>
                <div class="p-4 w-full">
                    <table class="min-w-full text-sm sm:text-base text-stone-900">
                        <tr>
                            <th class="p-4 text-center font-normal text-stone-400">#</th>
                            <th class="p-4 text-left font-bold text-stone-400 w-full">Jogador</th>
                            <th class="p-4 text-center font-normal text-stone-400">J</th>
                            <th class="p-4 text-center font-black text-stone-400">A</th>
                        </tr>
                        <?php
                        for ($i = 1; $i < count($assistencias); $i++) { ?>
                            <tr class="border-b-2 border-dotted last:border-b-0 border-gray-light/10">
                                <td class="px-4 py-3 font-normal"><?= $i + 1; ?>º</td>
                                <td class="px-4 py-3 font-bold"><?= $assistencias[$i]->nome ?></td>
                                <td class="px-4 py-3 font-normal text-center"><?= $assistencias[$i]->j ?></td>
                                <td class="px-4 py-3 font-black text-center"><?= $assistencias[$i]->a ?></td>
                            </tr>
                        <?php }; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <section class="col-span-12 xl:col-span-4 md:grid md:grid-cols-1 xl:block">
    </section>

    </div>
</main>

<?php
get_footer();
?>