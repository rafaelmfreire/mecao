<?php
$rankingJogos = json_decode(
    '{"jogos": ' .
        '[' .
        '{"nome":"Renan Bragança",  "j":14},' .
        '{"nome":"Ferreira",        "j":13},' .
        '{"nome":"Souza",           "j":12},' .
        '{"nome":"Alan",            "j":11},' .
        '{"nome":"Wenderson",       "j":11},' .
        '{"nome":"Gustavo Henrique","j":11},' .
        '{"nome":"Henrique",        "j":11},' .
        '{"nome":"Marcos Ytalo",    "j":10},' .
        '{"nome":"Marquinhos Pedroso","j":10},' .
        '{"nome":"Gabriel Davis",   "j":10}' .
        ']}'
);
$rankingGols = json_decode(
    '{"gols": ' .
        '[' .
        '{"nome":"Souza",           "j":12,"g":4},' .
        '{"nome":"Gustavo Henrique","j":11,"g":3},' .
        '{"nome":"Wenderson",       "j":11,"g":3},' .
        '{"nome":"Marcos Ytalo",    "j":10,"g":2},' .
        '{"nome":"Alan",            "j":11,"g":2},' .
        '{"nome":"Matheuzinho",     "j":2,"g":1},' .
        '{"nome":"Caio Hones",      "j":7,"g":1},' .
        '{"nome":"Giovani",         "j":8,"g":1},' .
        '{"nome":"Norberto",        "j":9,"g":1}' .
        ']}'
);
$rankingAssistencias = json_decode(
    '{"assistencias": ' .
        '[' .
        '{"nome":"Guilherme Guedes","j":9,"a":3},' .
        '{"nome":"Souza",           "j":12,"a":3},' .
        '{"nome":"Rafinha",         "j":2,"a":1},' .
        '{"nome":"Cauã Paixão",     "j":4,"a":1},' .
        '{"nome":"Antônio Villa",   "j":8,"a":1},' .
        '{"nome":"Marcos Ytalo",   "j":10,"a":1},' .
        '{"nome":"Henrique",        "j":10,"a":1}' .
        ']}'
);
$rankingMinutagem = json_decode(
    '{"minutagem": ' .
        '[' .
        '{"nome":"Renan Bragança","j":14,"m":1378},' .
        '{"nome":"Ferreira",      "j":13,"m":1146},' .
        '{"nome":"Alan",     "j":11,"m":1080},' .
        '{"nome":"Souza",        "j":12,"m":1067},' .
        '{"nome":"Marcos Ytalo",        "j":10,"m":892},' .
        '{"nome":"Wenderson",   "j":11,"m":872},' .
        '{"nome":"Marquinhos Pedroso", "j":10,"m":842},' .
        '{"nome":"Gustavo Henrique",        "j":11,"m":806},' .
        '{"nome":"Salazar",           "j":8,"m":698},' .
        '{"nome":"Norberto",        "j":9,"m":610}' .
        ']}'
);
$rankingAmarelos = json_decode(
    '{"amarelo": ' .
        '[' .
        '{"nome":"Wenderson",       "j":11,"a":5},' .
        '{"nome":"Souza",           "j":12,"a":5},' .
        '{"nome":"Alan",            "j":11,"a":4},' .
        '{"nome":"Antônio Villa",   "j":8,"a":3},' .
        '{"nome":"Norberto",   "j":9,"a":3},' .
        '{"nome":"Marcos Ytalo",    "j":10,"a":3},' .
        '{"nome":"Gustavo Henrique","j":11,"a":3},' .
        '{"nome":"Rafael Jansen","j":6,"a":2},' .
        '{"nome":"Salazar",         "j":8,"a":2},' .
        '{"nome":"Guilherme Guedes","j":9,"a":2}' .
        ']}'
);
$rankingVermelhos = json_decode(
    '{"vermelho": ' .
        '[' .
        '{"nome":"Wenderson",            "j":11,"v":1},' .
        '{"nome":"Alan",            "j":11,"v":1}' .
        ']}'
);
$jogos = $rankingJogos->jogos;
$gols = $rankingGols->gols;
$assistencias = $rankingAssistencias->assistencias;
$minutagens = $rankingMinutagem->minutagem;
$amarelos = $rankingAmarelos->amarelo;
$vermelhos = $rankingVermelhos->vermelho;
?>

<div x-show="show == 4" x-transition class="col-span-12 grid grid-cols-12 gap-4 lg:gap-8">
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