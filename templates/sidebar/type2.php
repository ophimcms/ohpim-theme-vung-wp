<div class="top-tintuc">
    <h3><?php echo $title; ?></h3>
    <ul class="film active">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>">
                    <div class="image"
                         style="background-image:url(<?= op_get_thumb_url() ?>)">
                    </div>
                    <div class="info">
                        <b class="title-phim"><?php the_title(); ?> <br /> <?= op_get_original_title() ?> (<?php echo get_post_meta(get_the_id(), 'ophim_year', true) ?>)</b>
                    </div>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</div>