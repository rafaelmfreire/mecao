<article class="mx-auto w-full">
    <h1 class="text-pretty text-stone-900 text-xl leading-normal md:text-3xl lg:text-5xl lg:leading-[1.15em] font-black mb-8"><?php the_title(); ?></h1>
    <div class="mb-8 flex items-center justify-between md:justify-start">
        <div class="uppercase relative pl-5 text-blue text-sm font-bold tracking-widest before:absolute before:top-1/2 before:-translate-y-1/2 before:left-0 before:w-3 before:h-3 before:rounded-full before:bg-red"><?php echo get_the_category_list(', '); ?></div>
        <svg width="24" height="24" class="hidden md:block" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="9" cy="17" r="1" fill="#FACC15" />
            <circle cx="11" cy="14" r="1" fill="#FACC15" />
            <circle cx="13" cy="11" r="1" fill="#FACC15" />
            <circle cx="15" cy="8" r="1" fill="#FACC15" />
        </svg>
        <div class="text-stone-700"><?php echo get_the_date('d/m/Y H:i'); ?></div>
        <svg width="24" height="24" class="hidden md:block" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="9" cy="17" r="1" fill="#FACC15" />
            <circle cx="11" cy="14" r="1" fill="#FACC15" />
            <circle cx="13" cy="11" r="1" fill="#FACC15" />
            <circle cx="15" cy="8" r="1" fill="#FACC15" />
        </svg>
        <div class="text-stone-500 hidden md:block ">Atualizado há <?php echo human_time_diff(get_the_modified_time('U'), (new DateTime())->sub(DateInterval::createFromDateString('3 hours'))->format('U')); ?></div>
    </div>
    <figure>
        <?php the_post_thumbnail('full', ['class' => 'w-full object-cover rounded-md']); ?>
        <figcaption class=" text-stone-500 p-1"><?php echo the_post_thumbnail_caption(get_the_ID()); ?></figcaption>
    </figure>
    <div class="py-8 sm:px-8 prose sm:prose-xl prose-red text-pretty selection:bg-red-dark selection:text-white
					prose-img:rounded-md prose-a:no-underline hover:prose-a:underline">
        <?php the_content(); ?>
    </div>
</article>