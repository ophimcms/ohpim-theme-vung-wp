<a href="<?php the_permalink(); ?>" class="col-xs-4 col-lg-2 film-small">
    <div class="poster-film-small"
         style="background-image:url('<?= op_get_thumb_url() ?>')">

        <div class="sotap"><?= op_get_episode() ?></div>
        <ul class="tag-film">
            <li>
                <div class="hd"><?= op_get_quality() ?></div>
            </li>

        </ul>
        <div class="play"></div>
    </div>
    <div class="title-film-small">
        <b class="title-film"><?php the_title(); ?></b>
        <p><?= op_get_original_title() ?> (<?= op_get_year() ?>)</p>
    </div>
</a>