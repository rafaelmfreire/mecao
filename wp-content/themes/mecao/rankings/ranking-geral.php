<?php
$rankingJogos = json_decode(
    '{"jogos": ' .
        '[' .
        '{"nome":"Renan Bragança",  "j":38},' .
        '{"nome":"Souza",        "j":36},' .
        '{"nome":"Ferreira",       "j":35},' .
        '{"nome":"Alan",   "j":32},' .
        '{"nome":"Giovani",        "j":30},' .
        '{"nome":"Gustavo Henrique",         "j":27},' .
        '{"nome":"Norberto",           "j":27},' .
        '{"nome":"Marcos Ytalo",            "j":27},' .
        '{"nome":"Wenderson",    "j":25},' .
        '{"nome":"Rafael Jansen","j":25}' .
        ']}'
);
$rankingGols = json_decode(
    '{"gols": ' .
        '[' .
        '{"nome":"Souza","j":36,"g":11},' .
        '{"nome":"Gustavo Henrique",     "j":27,"g":7},' .
        '{"nome":"Rafinha",            "j":20,"g":6},' .
        '{"nome":"Gustavo Ramos",      "j":24,"g":5},' .
        '{"nome":"Wenderson",           "j":25,"g":5},' .
        '{"nome":"Matheuzinho",        "j":23,"g":4},' .
        '{"nome":"Marcos Ytalo",       "j":27,"g":4},' .
        '{"nome":"Giovani",         "j":30,"g":4},' .
        '{"nome":"Alan",    "j":32,"g":4},' .
        '{"nome":"Rodriguinho",       "j":20,"g":2}' .
        ']}'
);
$rankingAssistencias = json_decode(
    '{"assistencias": ' .
        '[' .
        '{"nome":"Souza",           "j":36,"a":12},' .
        '{"nome":"Giovani","j":30,"a":4},' .
        '{"nome":"Guilherme Guedes",   "j":19,"a":3},' .
        '{"nome":"Rafinha",         "j":20,"a":3},' .
        '{"nome":"Matheuzinho",     "j":23,"a":3},' .
        '{"nome":"João Lucas",        "j":19,"a":2},' .
        '{"nome":"Antônio Villa",        "j":22,"a":2},' .
        '{"nome":"Gustavo Ramos",        "j":24,"a":2},' .
        '{"nome":"Marcos Ytalo",        "j":27,"a":2},' .
        '{"nome":"Lucas Gabriel",        "j":2,"a":1}' .
        ']}'
);
$rankingMinutagem = json_decode(
    '{"minutagem": ' .
        '[' .
        '{"nome":"Renan Bragança","j":38,"m":3759},' .
        '{"nome":"Souza",         "j":36,"m":3277},' .
        '{"nome":"Ferreira",     "j":35,"m":3149},' .
        '{"nome":"Alan",           "j":32,"m":3097},' .
        '{"nome":"Rafael Jansen",        "j":25,"m":2332},' .
        '{"nome":"Marcos Ytalo",        "j":27,"m":2231},' .
        '{"nome":"Norberto",        "j":27,"m":2053},' .
        '{"nome":"Gustavo Henrique",   "j":27,"m":2052},' .
        '{"nome":"Wenderson",        "j":25,"m":1868},' .
        '{"nome":"Salazar",        "j":21,"m":1751}' .
        ']}'
);
$rankingAmarelos = json_decode(
    '{"amarelo": ' .
        '[' .
        '{"nome":"Marcos Ytalo",           "j":27,"a":10},' .
        '{"nome":"Wenderson",       "j":25,"a":8},' .
        '{"nome":"Alan",   "j":32,"a":8},' .
        '{"nome":"Antônio Villa","j":22,"a":7},' .
        '{"nome":"Rafael Jansen","j":25,"a":7},' .
        '{"nome":"Souza","j":36,"a":7},' .
        '{"nome":"Rodriguinho",    "j":20,"a":6},' .
        '{"nome":"Gustavo Ramos","j":24,"a":5},' .
        '{"nome":"Rafinha",   "j":20,"a":4},' .
        '{"nome":"Salazar","j":21,"a":4}' .
        ']}'
);
$rankingVermelhos = json_decode(
    '{"vermelho": ' .
        '[' .
        '{"nome":"Antônio Villa",            "j":22,"v":1},' .
        '{"nome":"Wenderson",            "j":25,"v":1},' .
        '{"nome":"Rafael Jansen",            "j":25,"v":1},' .
        '{"nome":"Gustavo Henrique",            "j":27,"v":1},' .
        '{"nome":"Alan",            "j":32,"v":1},' .
        '{"nome":"Ferreira",       "j":35,"v":1}' .
        ']}'
);
$jogos = $rankingJogos->jogos;
$gols = $rankingGols->gols;
$assistencias = $rankingAssistencias->assistencias;
$minutagens = $rankingMinutagem->minutagem;
$amarelos = $rankingAmarelos->amarelo;
$vermelhos = $rankingVermelhos->vermelho;
?>


<div x-show="show == 0" x-transition class="col-span-12 grid grid-cols-12 gap-4 lg:gap-8">
    <div class="col-span-12 space-y-4 lg:space-y-0 md:col-span-6 xl:col-span-4">
        <div class="bg-white border border-gray-dark/20 rounded-lg shadow-small overflow-hidden">
            <div class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
                <h2 class="font-black sm:text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Jogos</h2>
            </div>
            <div>
                <div class="flex items-end justify-between" style="background-image: url(<?php echo get_theme_file_uri('/images/bg-pattern.png'); ?>); background-size: cover;">
                    <div class="p-4 flex flex-col justify-between self-stretch">
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
    <div class="col-span-12 space-y-4 lg:space-y-0 md:col-span-6 xl:col-span-4">
        <div class="bg-white border border-gray-dark/20 rounded-lg shadow-small overflow-hidden">
            <div class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
                <h2 class="font-black sm:text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Gols</h2>
            </div>
            <div>
                <div class="flex items-end justify-between" style="background-image: url(<?php echo get_theme_file_uri('/images/bg-pattern.png'); ?>); background-size: cover;">
                    <div class="p-4">
                        <p class="font-black text-lg"><?php echo $gols[0]->nome; ?></p>
                        <p class="text-stone-700 font-medium text-sm uppercase"><span class="font-black"><?php echo $gols[0]->j; ?></span> jogos</p>
                        <p class="text-red font-medium uppercase"><span class="text-6xl font-black"><?php echo $gols[0]->g; ?></span> gols</p>
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
    <div class="col-span-12 space-y-4 lg:space-y-0 md:col-span-6 xl:col-span-4">
        <div class="bg-white border border-gray-dark/20 rounded-lg shadow-small overflow-hidden">
            <div class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
                <h2 class="font-black sm:text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Assistências</h2>
            </div>
            <div>
                <div class="flex items-end justify-between" style="background-image: url(<?php echo get_theme_file_uri('/images/bg-pattern.png'); ?>); background-size: cover;">
                    <div class="p-4">
                        <p class="font-black text-lg"><?php echo $assistencias[0]->nome; ?></p>
                        <p class="text-stone-700 font-medium text-sm uppercase"><span class="font-black"><?php echo $assistencias[0]->j; ?></span> jogos</p>
                        <p class="text-red font-medium uppercase"><span class="text-6xl font-black"><?php echo $assistencias[0]->a; ?></span> assistências</p>
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
    <div class="col-span-12 space-y-4 lg:space-y-0 md:col-span-6 xl:col-span-4">
        <div class="bg-white border border-gray-dark/20 rounded-lg shadow-small overflow-hidden">
            <div class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
                <h2 class="font-black sm:text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Minutos Jogados</h2>
            </div>
            <div>
                <div class="flex items-end justify-between" style="background-image: url(<?php echo get_theme_file_uri('/images/bg-pattern.png'); ?>); background-size: cover;">
                    <div class="p-4">
                        <p class="font-black text-lg"><?php echo $minutagens[0]->nome; ?></p>
                        <p class="text-stone-700 font-medium text-sm uppercase"><span class="font-black"><?php echo $minutagens[0]->j; ?></span> jogos</p>
                        <p class="text-red font-medium uppercase"><span class="text-6xl font-black"><?php echo $minutagens[0]->m; ?></span> minutos</p>
                    </div>
                    <img src="<?php echo get_theme_file_uri('/images/jogadores/' . $minutagens[0]->nome . '.png') ?>" class="h-[140px] w-auto mr-4" alt="">
                </div>
            </div>
            <div class="p-4 w-full">
                <table class="min-w-full text-sm sm:text-base text-stone-900">
                    <tr>
                        <th class="p-4 text-center font-normal text-stone-400">#</th>
                        <th class="p-4 text-left font-bold text-stone-400 w-full">Jogador</th>
                        <th class="p-4 text-center font-normal text-stone-400">J</th>
                        <th class="p-4 text-center font-black text-stone-400">MJ</th>
                    </tr>
                    <?php
                    for ($i = 1; $i < count($minutagens); $i++) { ?>
                        <tr class="border-b-2 border-dotted last:border-b-0 border-gray-light/10">
                            <td class="px-4 py-3 font-normal"><?= $i + 1; ?>º</td>
                            <td class="px-4 py-3 font-bold"><?= $minutagens[$i]->nome ?></td>
                            <td class="px-4 py-3 font-normal text-center"><?= $minutagens[$i]->j ?></td>
                            <td class="px-4 py-3 font-black text-center"><?= $minutagens[$i]->m ?></td>
                        </tr>
                    <?php }; ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-span-12 space-y-4 lg:space-y-0 md:col-span-6 xl:col-span-4">
        <div class="bg-white border border-gray-dark/20 rounded-lg shadow-small overflow-hidden">
            <div class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
                <h2 class="font-black sm:text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Cartões Amarelos</h2>
            </div>
            <div>
                <div class="flex items-end justify-between" style="background-image: url(<?php echo get_theme_file_uri('/images/bg-pattern.png'); ?>); background-size: cover;">
                    <div class="p-4">
                        <p class="font-black text-lg"><?php echo $amarelos[0]->nome; ?></p>
                        <p class="text-stone-700 font-medium text-sm uppercase"><span class="font-black"><?php echo $amarelos[0]->j; ?></span> jogos</p>
                        <p class="text-red font-medium uppercase"><span class="text-6xl font-black"><?php echo $amarelos[0]->a; ?></span> cartões amarelos</p>
                    </div>
                    <img src="<?php echo get_theme_file_uri('/images/jogadores/' . $amarelos[0]->nome . '.png') ?>" class="h-[140px] w-auto mr-4" alt="">
                </div>
            </div>
            <div class="p-4 w-full">
                <table class="min-w-full text-sm sm:text-base text-stone-900">
                    <tr>
                        <th class="p-4 text-center font-normal text-stone-400">#</th>
                        <th class="p-4 text-left font-bold text-stone-400 w-full">Jogador</th>
                        <th class="p-4 text-center font-normal text-stone-400">J</th>
                        <th class="p-4 text-center font-black text-stone-400">CA</th>
                    </tr>
                    <?php
                    for ($i = 1; $i < count($amarelos); $i++) { ?>
                        <tr class="border-b-2 border-dotted last:border-b-0 border-gray-light/10">
                            <td class="px-4 py-3 font-normal"><?= $i + 1; ?>º</td>
                            <td class="px-4 py-3 font-bold"><?= $amarelos[$i]->nome ?></td>
                            <td class="px-4 py-3 font-normal text-center"><?= $amarelos[$i]->j ?></td>
                            <td class="px-4 py-3 font-black text-center"><?= $amarelos[$i]->a ?></td>
                        </tr>
                    <?php }; ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-span-12 space-y-4 lg:space-y-0 md:col-span-6 xl:col-span-4">
        <div class="bg-white border border-gray-dark/20 rounded-lg shadow-small overflow-hidden">
            <div class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
                <h2 class="font-black sm:text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Cartões Vermelhos</h2>
            </div>
            <div>
                <div class="flex items-end justify-between" style="background-image: url(<?php echo get_theme_file_uri('/images/bg-pattern.png'); ?>); background-size: cover;">
                    <div class="p-4">
                        <p class="font-black text-lg"><?php echo $vermelhos[0]->nome; ?></p>
                        <p class="text-stone-700 font-medium text-sm uppercase"><span class="font-black"><?php echo $vermelhos[0]->j; ?></span> jogos</p>
                        <p class="text-red font-medium uppercase"><span class="text-6xl font-black"><?php echo $vermelhos[0]->v; ?></span> cartões vermelhos</p>
                    </div>
                    <img src="<?php echo get_theme_file_uri('/images/jogadores/' . $vermelhos[0]->nome . '.png') ?>" class="h-[140px] w-auto mr-4" alt="">
                </div>
            </div>
            <div class="p-4 w-full">
                <table class="min-w-full text-sm sm:text-base text-stone-900">
                    <tr>
                        <th class="p-4 text-center font-normal text-stone-400">#</th>
                        <th class="p-4 text-left font-bold text-stone-400 w-full">Jogador</th>
                        <th class="p-4 text-center font-normal text-stone-400">J</th>
                        <th class="p-4 text-center font-black text-stone-400">CV</th>
                    </tr>
                    <?php
                    for ($i = 1; $i < count($vermelhos); $i++) { ?>
                        <tr class="border-b-2 border-dotted last:border-b-0 border-gray-light/10">
                            <td class="px-4 py-3 font-normal"><?= $i + 1; ?>º</td>
                            <td class="px-4 py-3 font-bold"><?= $vermelhos[$i]->nome ?></td>
                            <td class="px-4 py-3 font-normal text-center"><?= $vermelhos[$i]->j ?></td>
                            <td class="px-4 py-3 font-black text-center"><?= $vermelhos[$i]->v ?></td>
                        </tr>
                    <?php }; ?>
                </table>
            </div>
        </div>
    </div>
</div>