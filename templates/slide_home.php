<div class="group-film">
    <h2>
        <a href="<?= $slug ?>"><?php echo $title; ?> <i class="fa fa-caret-right" aria-hidden="true"></i>
        </a>
    </h2>
    <span class="line-ngang"></span>
    <div class="phimdecu-slider">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="item">
                <a href="<?php the_permalink(); ?>"
                   style="background-image:url(<?= op_get_thumb_url() ?>)">
                    <div class="black-gradient">
                        <b class="title-film"><?php the_title(); ?></b>
                        <p><?= op_get_original_title() ?> (<?= op_get_year() ?>)</p>
                        <div class="sotap"><?= op_get_episode() ?></div>
                        <ul class="tag-film">
                            <li>
                                <div class="hd"><?= op_get_quality() ?></div>
                            </li>
                        </ul>
                    </div>
                    <div class="play"></div>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</div>