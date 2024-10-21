<!DOCTYPE html>
<html dir="ltr" lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="<?=base_url();?>">
        <title><?=$title;?></title>
        <meta name="description" content="<?=$description;?>">
        <meta name="author" content="PT. Eksekutif Persada Citra Jaya">
        <link rel="icon" href="favicon/favicon.ico">
        <link rel="apple-touch-icon" sizes="16x16" href="/favicon/apple-icon-16x16.png">
        <link rel="apple-touch-icon" sizes="32x32" href="/favicon/apple-icon-32x32.png">
        <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="96x96" href="/favicon/apple-icon-96x96.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
        <link rel="apple-touch-icon" sizes="192x192" href="/favicon/apple-icon-192x192.png">
        <link rel="manifest" href="/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="/css/theme.css">
        <script src="/js/core.min.js"></script>
        <script src="/js/uikit.min.js"></script>
        <script src="/js/uikit-icons.min.js"></script>
        <script src="/js/theme.js"></script>
        <script src="/js/jquery.min.js"></script>

        <?= $this->renderSection('extraSripts') ?>
    </head>
    <body>
        <div class="tm-page">
            <!-- Header -->
            <?php if ($ismobile) { ?>
                <header class="tm-header-mobile" uk-header uk-inverse="target: .uk-navbar-container; sel-active: .uk-navbar-transparent">
                    <div uk-sticy show-on-up animation="uk-animation-slide-top" cls-active="uk-navbar-sticky" sel-target=".uk-navbar-container" cls-inactive="uk-navbar-transparent" tm-section-start>

                    </div>
                </header>
            <?php } else { ?>
                <header class="tm-header tm-header-overlay" uk-header uk-inverse="target: .uk-navbar-container, .tm-headerbar; sel-active: .uk-navbar-transparent, .tm-headerbar">
                    <div uk-sticky show-on-up animation="uk-animation-slide-top" cls-active="uk-navbar-sticky" sel-target=".uk-navbar-container" cls-inactive="uk-navbar-transparent" tm-section-start>
                        <div class="uk-navbar-container">
                            <div class="uk-container uk-container-expand">
                                <nav uk-navbar="{'align':'center','container':'.tm-header > [uk-sticky]','boundary':'.tm-header .uk-navbar-container','target-x':'.tm-header .uk-navbar','target-y':'.tm-header .uk-navbar-container','dropbar':true,'dropbar-anchor':'.tm-header .uk-navbar-container','dropbar-transparent-mode':'remove'}">
                                    <div class="uk-navbar-left">
                                        <a href="<?=base_url()?>" class="uk-logo uk-navbar-item">
                                            <img alt="expect - Training Consultant" loading="eager" width="115" height="50" src="images/logo.png" />
                                        </a>
                                    </div>
                                    <div class="uk-navbar-right">
                                        <ul class="uk-navbar-nav">
                                            <li <?=(($uri->getSegment(1) === 'layanan') && ($uri->getSegment(2) === 'layanan') ? 'class="uk-active"' : '')?>><a href="layanan">Layanan</a></li>
                                            <li <?=(($uri->getSegment(1) === 'profil') && ($uri->getSegment(2) === 'profil') ? 'class="uk-active"' : '')?>><a href="profil">Profil</a></li>
                                            <li <?=(($uri->getSegment(1) === 'blog') && ($uri->getSegment(2) === 'blog') ? 'class="uk-active"' : '')?>><a href="blog">Blog</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </header>
            <?php } ?>
            <!-- end of Header -->
            <!-- Main -->
            <main class="tm-main">
                <?= $this->renderSection('main') ?>
            </main>
            <!-- end of Main -->
            <!-- Footer -->
            <footer>
                <div class="uk-section-default uk-section uk-section-large uk-padding-remove-bottom">
                    <div class="uk-container uk-container-xlarge">
                        <div class="tm-grid-expand uk-grid-row-large uk-grid-margin-large uk-grid-divider" uk-grid>
                                <div class="uk-width-1-1 uk-width-1-2@m uk-text-center uk-text-left@m">
                                <a href="<?=base_url()?>"><img class="uk-width-2-3 uk-width-1-2@m" src="images/logo.png" alt="Expect" /></a>
                                </div>
                            <div class="uk-width-1-1 uk-width-auto@m">
                            <h3 class="uk-h5 uk-text-left@m uk-text-center">Menu</h3>
                                <ul class="uk-list uk-text-left@m uk-text-center">
                                    <li><a class="el-link uk-link-muted uk-margin-remove-last-child" href="profil">Profil</a></li>
                                    <li><a class="el-link uk-link-muted uk-margin-remove-last-child" href="layanan">Layanan</a></li>
                                    <li><a class="el-link uk-link-muted uk-margin-remove-last-child" href="blog">Blog</a></li>
                                    <li><a class="el-link uk-link-muted uk-margin-remove-last-child" href="galeri">Galeri</a></li>
                                </ul>
                            </div>
                            <div class="uk-width-1-1 uk-width-auto@m">
                                <h3 class="uk-h5 uk-text-left@m uk-text-center">Kontak</h3>
                                <ul class="uk-list uk-text-left@m uk-text-center">
                                    <li><a class="el-link uk-link-muted uk-margin-remove-last-child" href="tel:02742850755"><i uk-icon="receiver"></i> 0274-2850755</a></li>
                                    <li><a class="el-link uk-link-muted uk-margin-remove-last-child" href="tel:02742850773"><i uk-icon="receiver"></i> 0274-2850773</a></li>
                                    <li><a class="el-link uk-link-muted uk-margin-remove-last-child" href="https://wa.me/08112500777"><i uk-icon="whatsapp"></i> 08112500777</a></a></li>
                                    <li><a class="el-link uk-link-muted uk-margin-remove-last-child" href="mailto:expectjogjatraining@gmail.com"><i uk-icon="mail"></i> expectjogjatraining@gmail.com</a></a></li>
                                    <li><a class="el-link uk-link-muted uk-margin-remove-last-child" href="https://www.instagram.com/expectjogja"><i uk-icon="instagram"></i> expectjogja</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-grid tm-grid-expand uk-child-width-1-1 uk-margin-xlarge">
                            <div class="uk-width-1-1@m">
                                <hr/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-section-default uk-section uk-section-small">
                    <div class="uk-container uk-container-xlarge">
                        <div class="uk-width-1-1 uk-text-center uk-text-right@m uk-text-meta">
                            <?php
                            function auto_copyright($year = 'auto') {
                                if(intval($year) == 'auto'){ $year = date('Y'); }
                                if(intval($year) == date('Y')){ echo intval($year); }
                                if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); }
                                if(intval($year) > date('Y')){ echo date('Y'); }
                            }
                            ?>
                            &copy copyright <?php auto_copyright("2024"); ?>. PT Eksekutif Persada Citra Jaya
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end of Footer -->
        </div>
    </body>
</html>