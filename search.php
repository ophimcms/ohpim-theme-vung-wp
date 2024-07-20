<?php
get_header();
?>
<?php
if (!isset($_GET['filter'])){
    $_GET['filter']['categories'] ='';
    $_GET['filter']['genres'] ='';
    $_GET['filter']['regions'] ='';
    $_GET['filter']['years'] ='';
}
?>
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
                        <span itemprop="name"> Tìm kiếm</span>
                    </a>
                    <i class="fa fa-angle-right"></i>
                    <meta itemprop="position" content="2"/>
                </li>
            </ul>
        </div>
        <div class="group-film group-film-category">
            <h1>Kết quả tìm kiếm : <?php echo "$s"; ?><i class="fa fa-caret-right" aria-hidden="true"></i></h1> </span>

            <ul class="locphim-category">
                <form class="form-filter" id="form_filter" method="GET">
                    <li>
                        <select name="filter[categories]" form="form-search" class="scroll bg-main-700 p-2 outline-none">
                            <option value="">-- Định dạng --</option>
                            <?php $categories = get_terms(array('taxonomy' => 'ophim_categories', 'hide_empty' => false,));?>
                            <?php foreach($categories as $category) { ?>
                                <option value='<?php echo $category->name; ?>' <?php if ($category->name == $_GET['filter']['categories']) echo 'selected="selected"'; ?>><?php echo $category->name ; ?> </option>
                            <?php } ?>
                        </select>
                    </li>
                    <li class="text-center">
                        <select name="filter[regions]" form="form-search" class="scroll bg-main-700 p-2 outline-none">
                            <option value="">-- Quốc gia --</option>
                            <?php $regions = get_terms(array('taxonomy' => 'ophim_regions', 'hide_empty' => false,));?>
                            <?php foreach($regions as $region) { ?>
                                <option value='<?php echo $region->name; ?>' <?php if ($region->name == $_GET['filter']['regions']) echo 'selected="selected"'; ?>><?php echo $region->name ; ?> </option>
                            <?php } ?>
                        </select>
                    </li>
                    <li>
                        <select name="filter[genres]" form="form-search" class="scroll bg-main-700 p-2 outline-none">
                            <option value="">-- Thể loại --</option>
                            <?php $genres = get_terms(array('taxonomy' => 'ophim_genres', 'hide_empty' => false,));?>
                            <?php foreach($genres as $genre) { ?>
                                <option value='<?php echo $genre->name; ?>' <?php if ($genre->name == $_GET['filter']['genres']) echo 'selected="selected"'; ?>><?php echo $genre->name ; ?> </option>
                            <?php } ?>
                        </select>
                    </li>
                    <li>
                        <select class="form-control" name="filter[years]" form="form-search">
                            <option value="">-- Năm phát hành --</option>
                            <?php $years = get_terms(array('taxonomy' => 'ophim_years', 'hide_empty' => false,));?>
                            <?php foreach($years as $year) { ?>
                                <option value='<?php echo $year->name; ?>' <?php if ($year->name == $_GET['filter']['years']) echo 'selected="selected"'; ?>><?php echo $year->name ; ?> </option>
                            <?php } ?>
                        </select>
                    </li>
                    <li> <button type="submit" type="submit" form="form-search" class="submit-filter">Lọc Phim</button> </li>
                </form>
            </ul>
            <div class="row group-film-small">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post(); get_template_part('templates/movie_card'); }
                    wp_reset_postdata();
                } ?>
            </div>
            <?php ophim_pagination(); ?>
        </div>
    </div>

<?php
get_sidebar('ophim');
get_footer();
?>