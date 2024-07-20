<div class="khoi-trai">
    <div class="path-folder-film" style="margin-top: 20px">
        <ul itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" itemprop="url" href="/" title="Xem phim">
                    <span itemprop="name"> <i class="fa fa-home"></i> Xem phim</span>
                </a>
                <i class="fa fa-angle-right"></i>
                <meta itemprop="position" content="1"/>
            </li>
            <li>
                <a href="javascript:" class="active"><?php the_title(); ?></a>
            </li>
        </ul>
    </div>
    <div class="group-detail" itemscope itemtype="http://schema.org/Movie">
        <div style="display: none">
            <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                <span itemprop="ratingValue"><?= op_get_rating() ?></span>
                <meta itemprop="bestRating" content="10"/>
                <meta itemprop="worstRating" content="1"/>
                <span itemprop="ratingCount"><?= op_get_rating_count() ?></span>
            </div>
        </div>
        <a href="<?= watchUrl() ?>" class="big-img-film-detail">
            <img src="<?= op_get_poster_url() ?>"
                 style="position: absolute; width: 100%; height: 100%"/>
            <div style="position: absolute; width: 100%; height: 100%">
                <i class="fa fa-play-circle" aria-hidden="true"></i>
            </div>
        </a>
        <h1 class="title-film-detail-1" itemprop="name"><?php the_title(); ?> </h1>
        <h2 class="title-film-detail-2"><?= op_get_original_title() ?> (<?= op_get_year() ?>)</h2>
        <div class="fb-gg">
            <div class="fb-like" data-href="<?php the_permalink(); ?>"
                 data-layout="button_count" data-action="like" data-size="small" data-show-faces="false"
                 data-share="true">
            </div>
            <div class="g-plusone" data-size="medium"></div>
        </div>
        <div class="imdb">Điểm <?= op_get_rating(); ?></div>
        <ul class="rated-star hidden-xs">
            <i id="star"></i>
        </ul>
        <span class="rated-text">(<?= op_get_rating_count() ?> Đánh giá)</span>
        <span class="hd"><?= op_get_quality() ?></span>

        <br>

        <?php if (watchUrl()) { ?>
            <a href="<?= watchUrl() ?>" class="play-film">Xem Phim <i class="fa fa-caret-right" aria-hidden="true"></i>
            </a>
        <?php } ?>
        <?php if (op_get_trailer_url()) { ?>
            <a href="<?= op_get_trailer_url() ?>" class="play-trailer">Xem Trailer<i class="fa fa-caret-right"
                                                                                           aria-hidden="true"></i></a>
        <?php } ?>
        <?php if (op_get_notify()) { ?>
            <p class="lichchieu"><span
                        class="text-danger">• Thông báo</span>: <?= op_get_notify() ?></p>
        <?php } ?>
        <?php if (op_get_showtime_movies()) { ?>
            <p class="lichchieu"><span
                        class="text-info">• Lịch chiếu</span>: <?= op_get_showtime_movies() ?>
            </p>
        <?php } ?>
        <ul class="infomation-film">
            <li class="title">Thông tin:</li>
            <li>Trạng thái: <span><?= op_get_status()?></span>
            </li>
            <li>Thời lượng: <span><?= op_get_runtime() ?></span>
            </li>
            <li>Đạo diễn :
                <?= op_get_directors(10, ', ') ?>
            </li>
            <li>Diễn viên:
                <?= op_get_actors(10, ', ') ?>
            </li>
            <li>Thể loại:
                <?= op_get_genres(', ') ?>
            </li>
            <li>Quốc gia:
                <?= op_get_regions(', ') ?>
            </li>
            <li>Số tập: <span><?= op_get_total_episode() ?></span>
            </li>
            <li class="tags">
                <span>TAGS: </span>
                <?= op_get_tags(', ') ?>
            </li>
        </ul>
        <style>
            .content-film {
                font-size: 17px;
                color: #cdcdcd;
                font-weight: 100;
                line-height: 30px;
                padding-bottom: 35px;
                margin: 0;
            }
        </style>
        <div class="content-film" style="">
            <p><?php the_content(); ?></p>
        </div>

    </div>
    <div class="group-vote-detail">
        <h2>Đánh giá phim này</h2>
        <ul>
            <li class="star" id="star-vote"></li>
        </ul>
    </div>
    <div class="fbchat">

        <div class="fb-comments w-full" data-href="<?= getCurrentUrl() ?>" data-width="100%"
                 data-numposts="5" data-colorscheme="light" data-lazy="true">
            </div>
    </div>
    <div class="group-film">
        <h2>phim liên quan <i class="fa fa-caret-right" aria-hidden="true"></i>
        </h2>
        <span class="line-ngang"></span>
        <div class="group-film-small">
            <?php
            $postType = 'ophim';
            $taxonomyName = 'ophim_genres';
            $taxonomy = get_the_terms(get_the_id(), $taxonomyName);
            if ($taxonomy) {
                $category_ids = array();
                foreach ($taxonomy as $individual_category) $category_ids[] = $individual_category->term_id;
                $args = array('post_type' => $postType, 'post__not_in' => array(get_the_id()), 'posts_per_page' => 12, 'tax_query' => array(array('taxonomy' => $taxonomyName, 'field' => 'term_id', 'terms' => $category_ids,),));
                $my_query = new wp_query($args);
                if ($my_query->have_posts()):
                    while ($my_query->have_posts()):$my_query->the_post();
                        get_template_part('templates/movie_card');
                    endwhile;
                endif;
                wp_reset_query();
            }
            ?>
        </div>
    </div>
    <div class="group-tag-detail">
        <h3>
            <small><?php the_title(); ?> VietSub, <?php the_title(); ?> thuyết minh, <?php the_title(); ?>
                HD, <?php the_title(); ?>, <?php the_title(); ?> full/trọn bộ, <?php the_title(); ?> phụ
                đề, <?php the_title(); ?> trailer, <?php the_title(); ?> VietSub,
                <?php the_title(); ?> thuyet minh, <?php the_title(); ?> HD, <?php the_title(); ?>
                , <?php the_title(); ?> full/tron bo, <?php the_title(); ?> phu de, <?php the_title(); ?> trailer Xem
                phim <?= op_get_original_title() ?>,
                <?= op_get_original_title() ?>,
                <?= op_get_original_title() ?>
                VietSub, <?= op_get_original_title() ?> Thuyết minh,
                <?= op_get_original_title() ?> full HD, <?= op_get_original_title() ?> bản
                đẹp, <?= op_get_original_title() ?> trọn
                bộ, <?= op_get_original_title() ?> phụ đề,
                <?= op_get_original_title() ?> trailer</small>
        </h3>
    </div>
    <div class="modal fade" id="mediaModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body modal-padding">
                    <!-- content dynamically inserted -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
add_action('wp_footer', function () { ?>

    <script>
        var rating = <?= op_get_rating(); ?>;
        var GET_POST_ID = '<?php echo get_the_ID(); ?>';
        var URL_POST_AJAX = '<?php echo admin_url('admin-ajax.php')?>'
    </script>
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/rating.js"></script>
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/single.js"></script>
<?php }) ?>