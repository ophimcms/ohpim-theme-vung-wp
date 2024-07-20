<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid navbar-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= get_home_url(); ?>" title="">
                <?php op_the_logo('width:50px') ?>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                $menu_items = wp_get_menu_array('primary-menu');
                foreach ($menu_items as $item) : ?>
                    <li class="dropdown">
                        <a href="<?= $item['url'] ?>" <?php if (!empty($item['children'])): ?> class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" <?php endif; ?>><?= $item['title'] ?><?php if (!empty($item['children'])): ?>
                                <span
                                        class="caret"></span><?php endif; ?></a>
                        <?php if (!empty($item['children'])): ?>
                            <ul class="dropdown-menu" role="menu">
                                <?php foreach ($item['children'] as $child): ?>
                                    <li>
                                        <a href="<?= $child['url'] ?>"
                                           title="<?= $child['title'] ?>"><?= $child['title'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form" method="GET" id="form-search" action="<?= get_home_url(); ?>">
                        <div class="form-group">
                            <input placeholder="Tìm tên phim..." class="form-control" id="query_search" onkeyup="fetch()"
                                   value="<?php echo "$s"; ?>" type="text" name="s" maxlength="100" autocomplete="off"/>
                        </div>
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                        <div class="search-hint" id="search-hint"></div>
                    </form>
                    <ul class="" id="result"></ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
