<?php
get_header();
?>

<main>
    <div x-data="{ show: 4 }" class="bg-white container mx-auto rounded-xl lg:rounded-[24px] p-4 lg:p-8 my-6 grid grid-cols-12 gap-4 lg:gap-8">
        <div class="col-span-12">
            <h1 class="font-black text-3xl">Estatísticas 2024</h1>
            <ul class="flex items-center space-x-4 mt-6">
                <li><button @click="show = 0" class="px-4 py-1.5 font-medium rounded-md" :class="show == 0 ? 'bg-red text-white' : 'text-stone-500 hover:text-stone-950'">Geral</button></li>
                <li><button @click="show = 4" class="px-4 py-1.5 font-medium rounded-md" :class="show == 4 ? 'bg-red text-white' : 'text-stone-500 hover:text-stone-950'">Série D</button></li>
                <li><button @click="show = 3" class="px-4 py-1.5 font-medium rounded-md" :class="show == 3 ? 'bg-red text-white' : 'text-stone-500 hover:text-stone-950'">Copa do Brasil</button></li>
                <li><button @click="show = 2" class="px-4 py-1.5 font-medium rounded-md" :class="show == 2 ? 'bg-red text-white' : 'text-stone-500 hover:text-stone-950'">Copa do Nordeste</button></li>
                <li><button @click="show = 1" class="px-4 py-1.5 font-medium rounded-md" :class="show == 1 ? 'bg-red text-white' : 'text-stone-500 hover:text-stone-950'">Campeonato Potiguar</button></li>
            </ul>
        </div>


        <?php get_template_part('rankings/ranking', 'geral'); ?>
        <?php get_template_part('rankings/ranking', 'potiguar'); ?>
        <?php get_template_part('rankings/ranking', 'copanordeste'); ?>
        <?php get_template_part('rankings/ranking', 'copadobrasil'); ?>
        <?php get_template_part('rankings/ranking', 'seried'); ?>

    </div>

    <section class="col-span-12 xl:col-span-4 md:grid md:grid-cols-1 xl:block">
    </section>

    </div>
</main>
<?php
get_footer();
?>