<div class="group-film">
    <h2>
        <a href="<?= $slug ?>"><?php echo $title; ?> <i class="fa fa-caret-right" aria-hidden="true"></i>
        </a>
    </h2>
    <a href="<?= $slug ?>" class="more"></a>
    <span class="line-ngang"></span>
    <div class="row group-film-small">
        <?php while ($query->have_posts()) : $query->the_post();
        get_template_part('templates/movie_card');
        endwhile; ?>
    </div>
</div>