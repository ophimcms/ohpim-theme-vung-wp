<div class="topphim-doc">
    <h3><?php echo $title; ?></h3>
    <ul class="film">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <li> <a href="<?php the_permalink(); ?>">
                    <div class="image"
                         style="background-image:url('<?= op_get_thumb_url() ?>')">
                    </div>
                    <div class="info"> <b class="title-film"><?php the_title(); ?></b>
                        <p><?= op_get_original_title() ?> (<?php echo get_post_meta(get_the_id(), 'ophim_year', true) ?>)</p>
                        <span class="luotxem">Lượt xem: <?= op_get_post_view(); ?></span>
                        <span class="imdb">Điểm :<?= op_get_rating(); ?></span>
                    </div>
                </a> </li>
        <?php endwhile; ?>
    </ul>
</div>