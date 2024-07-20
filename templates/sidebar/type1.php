<div id="widget_top_film_country_by_type_phim-bo" class="topphim-ngang">
    <h3><?php echo $title; ?></h3>
    <ul class="film active">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <div class="image"
                         style="background-image:url(<?= op_get_thumb_url() ?>)">
                    </div> <span class="imdb">Điểm <br> <b><?= op_get_rating(); ?></b></span>
                    <div class="info"> <b class="title-film"><?php the_title(); ?></b>
                        <p><?= op_get_original_title() ?> (<?php echo get_post_meta(get_the_id(), 'ophim_year', true) ?>)</p>
                    </div>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</div>