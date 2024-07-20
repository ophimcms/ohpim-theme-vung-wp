<?php
get_header();
?>
<style>
    p {
        color: #8b8b8b;
        font-size: 16px;
    }
</style>
<div class="khoi-trai">
    <div class="path-folder-film" style="margin-top: 30px">
        <ul itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" itemprop="url" href="/" title="Xem phim">
                    <span itemprop="name"> <i class="fa fa-home"></i> Xem phim</span>
                </a>
                <i class="fa fa-angle-right"></i>
                <meta itemprop="position" content="1"/>
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" itemprop="url"
                   href=""
                   title="">
                    <span itemprop="name"> <?php echo single_tag_title(); ?></span>
                </a>
                <i class="fa fa-angle-right"></i>
                <meta itemprop="position" content="2"/>
            </li>
        </ul>
    </div>

    <div class="group-film group-film-category">

        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-md-12 blogShort">
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <a href="<?php the_permalink(); ?>"><img style="width: 150px;margin-right: 15px" src="<?= op_remove_domain(get_the_post_thumbnail_url()) ?>"
                                                                 alt="<?php the_title(); ?>" class="pull-left img-responsive thumb margin10 img-thumbnail"></a>
                        <br>
                        <article>
                            <p>
                                <?php the_excerpt(); ?>
                            </p></article>
                        <a class="btn btn-blog pull-right marginBottom10" href="<?php the_permalink(); ?>">Xem thêm</a>
                    </div>

                </div>
            <?php }
            wp_reset_postdata();
        } ?>
        <?php ophim_pagination(); ?>
    </div>
</div>

<?php
get_sidebar('ophim');
get_footer();
?>
