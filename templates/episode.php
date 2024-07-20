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
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <span itemprop="name"> <?php the_title(); ?></span>
            </a>
            <i class="fa fa-angle-right"></i>
            <meta itemprop="position" content="3"/>
        </li>
        <li>
            <a href="javascript:"
               class="active">Tập <?= episodeName() ?></a>
        </li>
    </ul>
</div>

<div id="player-wrapper">
    <div id="player-holder" class="player-film">
    </div>
    <div class="buttonlight-film">
        <ul>
            <li>
                <div class="fb-gg">
                    <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count"
                         data-action="like" data-size="small" data-show-faces="false" data-share="true">
                    </div>
                    <div class="g-plusone" data-size="medium"></div>
                </div>
            </li>
            <li>
                <a id="report_error" data-toggle="modal" data-target="#ModalBaoloi">
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>Báo lỗi
                </a>
            </li>
            <li>
                <a data-id="<?= episodeName() ?>" data-link="<?= m3u8EpisodeUrl() ?>" data-type="m3u8"
                   onclick="chooseStreamingServer(this)" class="streaming-server">
                    <i class="fa fa-play" aria-hidden="true"></i>
                    Nguồn #1
                </a>
            </li>
            <li>
                <a data-id="<?= episodeName() ?>" data-link="<?= embedEpisodeUrl() ?>" data-type="embed"
                   onclick="chooseStreamingServer(this)" class="streaming-server">
                    <i class="fa fa-play" aria-hidden="true"></i>
                    Nguồn #2
                </a>
            </li>

            <li>
                <a class="light-on show1">Tắt đèn <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                </a>
                <a class="light-off">Bật đèn <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                </a>
            </li>
            <li class="scene-dim"></li>
        </ul>
    </div>
</div>
<div class="alert alert-warning" role="alert"> Xem tốt nhất trên trình duyệt Chrome, Safari. Nếu
    bạn không xem được phim, vui lòng <b>đổi nguồn phát</b> hoặc <b>đổi server</b>, chúc bạn xem phim
    vui vẻ.
</div>

<div class="episode-film group-detail">
    <?php if (op_get_showtime_movies()) { ?>
        <p class="lichchieu"><span
                    class="text-danger">• Thông báo</span>: <?= op_get_notify() ?></p>
    <?php } ?>
    <?php if (op_get_showtime_movies()) { ?>
        <p class="lichchieu"><span
                    class="text-info">• Lịch chiếu</span>: <?= op_get_showtime_movies() ?>
        </p>
    <?php } ?>

    <?php if(episodeList()) : foreach (episodeList() as $key => $server) : ?>
        <span class="text-success"><?= $server['server_name'] ?></span>
        <div class="episode-main">
            <ul>
                <?php foreach ($server['server_data'] as $list) :?>
                <li>
                    <a href="<?= hrefEpisode($list["name"],$key) ?>"
                    class="<?php if (slugify($list['name']) == episodeName() && episodeSV() == $key) : echo 'active'; endif?>">
                    <?= $list['name'] ?>
                    </a>
                </li>
         <?php endforeach;?>

            </ul>
        </div>
    <?php endforeach; endif ?>
</div>

<div class="title-film-film-0">
    <a href="<?php the_permalink(); ?>" class="">
        <h1 class="title-film-film-1"><?php the_title(); ?> - Tập <?=episodeName() ?> </h1> <br>
        <h2 class="title-film-film-2"><?= op_get_original_title() ?>
            (<?= op_get_year() ?>)</h2>
    </a>
</div>
<div class="group-detail ">
    <div class="imdb">Điểm : <?= op_get_rating(); ?></div>
    <ul class="rated-star hidden-xs">
        <i id="star"></i>
    </ul>
    <span class="rated-text"> <?= op_get_rating_count() ?> Đánh giá</span>
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

<div id="ModalBaoloi" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thông báo</h4>
            </div>
            <div class="modal-body" id="p_content">
                <p class="alert-danger" id="show_msg"></p>
                <div class="form-group">
                    <label for="log_des">Báo lỗi phim "<?php the_title(); ?> <?= op_get_original_title() ?>
                        (<?= op_get_year() ?>)"</label>
                    <textarea name="log_des" id="log_des" class="form-control" style="width:100%; height: 50px;"
                              placeholder="Mô tả lỗi phim <?php the_title(); ?> <?= op_get_original_title() ?>
            (<?= op_get_year() ?>)"></textarea>
                </div>
                <a href="javascript:" class="btn btn-primary" name="but_send_report" id="but_send_report">Gửi</a>
            </div>
        </div>
    </div>
</div>
</div>
<?php
add_action('wp_footer', function (){?>

    <script>
        var rating = <?= op_get_rating(); ?>;
        var GET_POST_ID = '<?php echo get_the_ID(); ?>';
        var URL_POST_AJAX = '<?php echo admin_url('admin-ajax.php')?>'
    </script>
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/rating.js"></script>
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/episode.js"></script>

    <script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-core.min.js"></script>
    <script src="<?= get_template_directory_uri() ?>/assets/player/js/p2p-media-loader-hlsjs.min.js"></script>

    <script src="<?= get_template_directory_uri() ?>/assets/js/jwplayer-8.9.3.js"></script>
    <script src="<?= get_template_directory_uri() ?>/assets/js/hls.min.js"></script>
    <script src="<?= get_template_directory_uri() ?>/assets/js/jwplayer.hlsjs.min.js"></script>

    <script>
        var episode_id = '<?= episodeName() ?>';
        const wrapper = document.getElementById('player-holder');
        const vastAds = "<?= get_option('ophim_jwplayer_advertising_file') ?>";

        function chooseStreamingServer(el) {
            const type = el.dataset.type;
            const link = el.dataset.link.replace(/^http:\/\//i, 'https://');
            const id = el.dataset.id;

            const newUrl =
                location.protocol +
                "//" +
                location.host +
                location.pathname.replace(`-${episode_id}`, `-${id}`);

            history.pushState({
                path: newUrl
            }, "", newUrl);
            episode_id = id;


            Array.from(document.getElementsByClassName('streaming-server')).forEach(server => {
                server.classList.remove('active');
            })
            el.classList.add('active');

            link.replace('http://', 'https://');
            renderPlayer(type, link, id);
        }

        function renderPlayer(type, link, id) {
            if (type == 'embed') {
                if (vastAds) {
                    wrapper.innerHTML = `<div id="fake_jwplayer"></div>`;
                    const fake_player = jwplayer("fake_jwplayer");
                    const objSetupFake = {
                        key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                        aspectratio: "16:9",
                        width: "100%",
                        file: "<?= get_template_directory_uri() ?>/assets/player/1s_blank.mp4",
                        volume: 100,
                        mute: false,
                        autostart: true,
                        advertising: {
                            tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                            client: "vast",
                            vpaidmode: "insecure",
                            skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?:  5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                            skipmessage: "Bỏ qua sau xx giây",
                            skiptext: "Bỏ qua"
                        }
                    };
                    fake_player.setup(objSetupFake);
                    fake_player.on('complete', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });

                    fake_player.on('adSkipped', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });

                    fake_player.on('adComplete', function(event) {
                        $("#fake_jwplayer").remove();
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                        fake_player.remove();
                    });
                } else {
                    if (wrapper) {
                        wrapper.innerHTML = `<iframe width="100%" height="100%" src="${link}" frameborder="0" scrolling="no"
                    allowfullscreen="" allow='autoplay'></iframe>`
                    }
                }
                return;
            }

            if (type == 'm3u8' || type == 'mp4') {
                wrapper.innerHTML = `<div id="jwplayer"></div>`;
                const player = jwplayer("jwplayer");
                const objSetup = {
                    key: "<?= get_option('ophim_jwplayer_license', 'ITWMv7t88JGzI0xPwW8I0+LveiXX9SWbfdmt0ArUSyc=') ?>",
                    aspectratio: "16:9",
                    width: "100%",
                    image: "<?= op_get_poster_url() ?>",
                    file: link,
                    playbackRateControls: true,
                    playbackRates: [0.25, 0.75, 1, 1.25],
                    sharing: {
                        sites: [
                            "reddit",
                            "facebook",
                            "twitter",
                            "googleplus",
                            "email",
                            "linkedin",
                        ],
                    },
                    volume: 100,
                    mute: false,
                    autostart: true,
                    logo: {
                        file: "<?= get_option('ophim_jwplayer_logo_file') ?>",
                        link: "<?= get_option('ophim_jwplayer_logo_link') ?>",
                        position: "<?= get_option('ophim_jwplayer_logo_position') ?>",
                    },
                    advertising: {
                        tag: "<?= get_option('ophim_jwplayer_advertising_file') ?>",
                        client: "vast",
                        vpaidmode: "insecure",
                        skipoffset: <?= get_option('ophim_jwplayer_advertising_skipoffset') ?:  5 ?>, // Bỏ qua quảng cáo trong vòng 5 giây
                        skipmessage: "Bỏ qua sau xx giây",
                        skiptext: "Bỏ qua"
                    }
                };

                if (type == 'm3u8') {
                    const segments_in_queue = 50;

                    var engine_config = {
                        debug: !1,
                        segments: {
                            forwardSegmentCount: 50,
                        },
                        loader: {
                            cachedSegmentExpiration: 864e5,
                            cachedSegmentsCount: 1e3,
                            requiredSegmentsPriority: segments_in_queue,
                            httpDownloadMaxPriority: 9,
                            httpDownloadProbability: 0.06,
                            httpDownloadProbabilityInterval: 1e3,
                            httpDownloadProbabilitySkipIfNoPeers: !0,
                            p2pDownloadMaxPriority: 50,
                            httpFailedSegmentTimeout: 500,
                            simultaneousP2PDownloads: 20,
                            simultaneousHttpDownloads: 2,
                            // httpDownloadInitialTimeout: 12e4,
                            // httpDownloadInitialTimeoutPerSegment: 17e3,
                            httpDownloadInitialTimeout: 0,
                            httpDownloadInitialTimeoutPerSegment: 17e3,
                            httpUseRanges: !0,
                            maxBufferLength: 300,
                            // useP2P: false,
                        },
                    };
                    if (Hls.isSupported() && p2pml.hlsjs.Engine.isSupported()) {
                        var engine = new p2pml.hlsjs.Engine(engine_config);
                        player.setup(objSetup);
                        jwplayer_hls_provider.attach();
                        p2pml.hlsjs.initJwPlayer(player, {
                            liveSyncDurationCount: segments_in_queue, // To have at least 7 segments in queue
                            maxBufferLength: 300,
                            loader: engine.createLoaderClass(),
                        });
                    } else {
                        player.setup(objSetup);
                    }
                } else {
                    player.setup(objSetup);
                }


                const resumeData = 'OPCMS-PlayerPosition-' + id;
                player.on('ready', function() {
                    if (typeof(Storage) !== 'undefined') {
                        if (localStorage[resumeData] == '' || localStorage[resumeData] == 'undefined') {
                            console.log("No cookie for position found");
                            var currentPosition = 0;
                        } else {
                            if (localStorage[resumeData] == "null") {
                                localStorage[resumeData] = 0;
                            } else {
                                var currentPosition = localStorage[resumeData];
                            }
                            console.log("Position cookie found: " + localStorage[resumeData]);
                        }
                        player.once('play', function() {
                            console.log('Checking position cookie!');
                            console.log(Math.abs(player.getDuration() - currentPosition));
                            if (currentPosition > 180 && Math.abs(player.getDuration() - currentPosition) >
                                5) {
                                player.seek(currentPosition);
                            }
                        });
                        window.onunload = function() {
                            localStorage[resumeData] = player.getPosition();
                        }
                    } else {
                        console.log('Your browser is too old!');
                    }
                });

                player.on('complete', function() {
                    <?php if(nextEpisodeUrl()){ ?>
                    window.location.href = "<?= nextEpisodeUrl() ?>";
                    <?php }?>
                    if (typeof(Storage) !== 'undefined') {
                        localStorage.removeItem(resumeData);
                    } else {
                        console.log('Your browser is too old!');
                    }
                })

                function formatSeconds(seconds) {
                    var date = new Date(1970, 0, 1);
                    date.setSeconds(seconds);
                    return date.toTimeString().replace(/.*(\d{2}:\d{2}:\d{2}).*/, "$1");
                }
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const episode = '<?= episodeName() ?>';
            let playing = document.querySelector(`[data-id="${episode}"]`);
            if (playing) {
                playing.click();
                return;
            }

            const servers = document.getElementsByClassName('streaming-server');
            if (servers[0]) {
                servers[0].click();
            }
        });
    </script>
<?php }) ?>