<?php
get_header();
?>

<div class="khoi-trai">
    <style>
        p {
            color: #8b8b8b;
            font-size: 16px;
        }
    </style>
    <?php
    while ( have_posts() ) : the_post();
        ?>

        <div class="group-film">
            <h2><?php the_title(); ?>
            </h2>
            <div class="row group-film-small">
                <?php  the_content(); ?>
            </div>

        </div>


    <?php
    endwhile;
    ?>
</div>
<?php
get_sidebar('ophim');
get_footer();
?>
