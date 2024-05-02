<?php
$nextMatch = new WP_Query([
    'posts_per_page' => 1,
    'post_type' => 'match',
    'meta_query' => [
        [
            'key' => 'home_score',
            'value' => '',
            'compare' => '=='
        ],
    ],
    'meta_key' => 'match_time',
    'orderby' => 'meta_value',
    'order' => 'ASC'
]);

if ($nextMatch->have_posts()) {
    $nextMatch->the_post();
?>
    <!-- NEXT GAME -->
    <div class="bg-white border border-gray-dark/20 rounded-lg shadow-small mb-8">
        <?php
        $matchTime = new DateTime(get_field('match_time'));
        ?>
        <header class="flex items-center justify-between bg-gradient-to-r blue-gradient rounded-t-md px-4 py-1">
            <time class="flex items-center space-x-1">
                <span class="font-display font-semibold text-[2.5rem] text-yellow leading-none">
                    <?php echo $matchTime->format('d'); ?>
                </span>
                <div class="flex-col space-y-0">
                    <?php
                    $formatter = new IntlDateFormatter(
                        'pt_BR',
                        IntlDateFormatter::SHORT,
                        IntlDateFormatter::SHORT,
                        'UTC',
                        IntlDateFormatter::GREGORIAN,
                    );
                    ?>
                    <span class="block uppercase leading-none text-white font-black  text-xs lg:text-sm">
                        <?php
                        $formatter->setPattern('cccc');
                        echo $formatter->format($matchTime);
                        ?>

                    </span>
                    <span class="block uppercase leading-none text-white  text-xs lg:text-sm">
                        <?php
                        $formatter->setPattern('MMMM');
                        echo $formatter->format($matchTime);
                        ?>
                    </span>
                </div>
            </time>
            <h2 class="font-black text-xl lg:text-2xl tracking-tighter yellow-gradient text-transparent italic uppercase inline-block bg-clip-text">Próximo Jogo</h2>
        </header>
        <a href="mailto:contato@mecao.com.br" class="group md:hidden lg:inline">
            <div class="flex justify-center items-center space-x-4 p-4 group-hover:bg-red/5 transition-all duration-500 ease-in-out">
                <span class="hidden sm:inline uppercase text-[0.625rem] text-gray-dark/60 font-medium">Apresentado por</span>
                <img class="hidden sm:block" src="<?php echo get_theme_file_uri('/images/bar.svg'); ?>" alt="">
                <div class="flex justify-center">
                    <span class=" text-xs text-red font-medium px-3 py-2 rounded-md bg-transparent group-hover:bg-red group-hover:text-white border border-red/40 shadow-small group-hover:shadow-red/20 transition-all duration-300 ease-in-out">
                        Seja parceiro do Portal Mecão
                    </span>
                </div>
            </div>
        </a>
        <a class="group" href="<?php the_permalink(); ?>">
            <div class="px-4 py-6 group-hover:bg-yellow/5 transition-all duration-1000 ease-in-out">
                <div class="grid grid-cols-home-matches justify-items-stretch">
                    <?php
                    $homeTeam = get_field('home_team');
                    $awayTeam = get_field('away_team');
                    ?>
                    <div class="justify-self-start self-end">
                        <img class="h-full max-h-[72px] object-cover" src="<?php echo esc_url($homeTeam['url']) ?>" alt="">
                    </div>
                    <div class="justify-self-center">
                        <h3 class="text-center leading-none text-xs text-gray-light font-medium uppercase mb-6">
                            <?php
                            echo get_the_title(get_field('match_competition')[0]);
                            ?>
                        </h3>
                        <p class="text-center leading-none text-xs text-gray-light mb-3">Horário</p>
                        <p class="text-center leading-none text-[2.5rem] mb-6">
                            <span class="score-gradient px-4 py-0 font-display font-semibold text-yellow-dark rounded-lg border-2 border-black">
                                <?php
                                $formatter->setPattern('HH:mm');
                                echo $formatter->format($matchTime);
                                ?>
                            </span>
                        </p>
                        <p class="hidden lg:block text-center leading-none text-base font-black mb-4 text-gray-dark">
                            <span class=" <?php echo $homeTeam['title'] == 'América' ? 'text-base uppercase text-red' : ''; ?>">
                                <?php echo $homeTeam['title'] ?>
                            </span>
                            <span> x </span>
                            <span class=" <?php echo $awayTeam['title'] == 'América' ? 'text-sm uppercase text-red' : ''; ?>">
                                <?php echo $awayTeam['title']; ?>
                            </span>
                        </p>
                        <p class="hidden lg:block text-center leading-none text-[0.6875rem] text-gray-dark"><?php echo get_field('match_stadium'); ?></p>
                    </div>
                    <div class="justify-self-end self-end">
                        <img class="h-full max-h-[72px] object-cover" src="<?php echo esc_url($awayTeam['url']) ?>" alt="">
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- END NEXT GAMES -->
<?php }
wp_reset_postdata();
?>