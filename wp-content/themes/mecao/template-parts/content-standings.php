<div class="bg-white border border-gray-dark/20 rounded-lg shadow-small mt-10 overflow-hidden">
    <div class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-2">
        <a href="<?php echo site_url('/campeonatos/brasileirao-serie-d/'); ?>">
            <h2 class="font-black sm:text-2xl yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Série D</h2>
        </a>
    </div>
    <?php
    $classificacao = json_decode('{"times": ' .
        '[' .
        '{"nome":"Treze",       "j":10, "v": 7, "e": 3, "d": 0, "gp": 23, "gc": 6},' .
        '{"nome":"Atlético-CE", "j":10, "v": 5, "e": 1, "d": 4, "gp": 12, "gc": 12},' .
        '{"nome":"Iguatu",      "j":9, "v": 4, "e": 3, "d": 2, "gp": 8,  "gc": 6},' .
        '{"nome":"América",     "j":9, "v": 3, "e": 4, "d": 2, "gp": 11, "gc": 7},' .
        '{"nome":"Santa Cruz",  "j":9, "v": 4, "e": 0, "d": 5, "gp": 13, "gc": 15},' .
        '{"nome":"Sousa",       "j":9, "v": 3, "e": 2, "d": 4, "gp": 7,  "gc": 11},' .
        '{"nome":"Maracanã-CE", "j":9, "v": 2, "e": 2, "d": 5, "gp": 9,  "gc": 15},' .
        '{"nome":"Potiguar",    "j":9, "v": 1, "e": 1, "d": 7, "gp": 4,  "gc": 15}' .
        ']}');
    ?>
    <div class="px-4 py-4 w-full">
        <table class="min-w-full text-sm sm:text-base text-stone-900">
            <tr>
                <th class="p-4 text-center font-normal text-stone-400">#</th>
                <th class="p-4 text-left font-bold text-stone-400 w-full">Equipe</th>
                <th class="p-4 text-center font-normal text-stone-400">J</th>
                <th class="p-4 text-center font-normal text-stone-400 hidden md:table-cell xl:hidden">V</th>
                <th class="p-4 text-center font-normal text-stone-400 hidden md:table-cell xl:hidden">E</th>
                <th class="p-4 text-center font-normal text-stone-400 hidden md:table-cell xl:hidden">D</th>
                <th class="p-4 text-center font-normal text-stone-400">GP</th>
                <th class="p-4 text-center font-normal text-stone-400 hidden md:table-cell xl:hidden">GC</th>
                <th class="p-4 text-center font-normal text-stone-400 hidden md:table-cell xl:hidden">SG</th>
                <th class="p-4 text-center font-black text-stone-400">P</th>
            </tr>
            <?php foreach ($classificacao->times as $key => $time) { ?>
                <tr class="border-b-2 border-dotted border-gray-light/10">
                    <td class="px-4 py-3 font-bold"><?= ++$key; ?></td>
                    <td class="px-4 py-3 font-bold <?php echo $time->nome == 'América' ? 'text-red' : '' ?>"><?= $time->nome ?></td>
                    <td class="px-4 py-3 text-center"><?= $time->j ?></td>
                    <td class="px-4 py-3 text-center hidden md:table-cell xl:hidden"><?= $time->v ?></td>
                    <td class="px-4 py-3 text-center hidden md:table-cell xl:hidden"><?= $time->e ?></td>
                    <td class="px-4 py-3 text-center hidden md:table-cell xl:hidden"><?= $time->d ?></td>
                    <td class="px-4 py-3 text-center"><?= $time->gp ?></td>
                    <td class="px-4 py-3 text-center hidden md:table-cell xl:hidden"><?= $time->gc ?></td>
                    <td class="px-4 py-3 text-center hidden md:table-cell xl:hidden"><?= $time->gp - $time->gc ?></td>
                    <td class="px-4 py-3 font-black text-center"><?= ($time->v * 3) + ($time->e) ?></td>
                </tr>
            <?php }; ?>
        </table>
    </div>
</div>