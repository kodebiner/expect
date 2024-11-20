<!DOCTYPE html>
<html dir="ltr" lang="id" style="overflow-y:hidden;">
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
        <header class="uk-navbar-container uk-section-secondary" style="background:#1c5bea;">
            <div class="uk-container uk-container-expand">
                <nav uk-navbar>
                    <div class="uk-navbar-left">
                        <?php if ($ismobile) { ?>
                            <a uk-toggle href="#offcanvas" class="uk-navbar-toggle" role="button" aria-label="Open menu">
                                <div uk-navbar-toggle-icon></div>
                            </a>
                        <?php } else { ?>
                            <a class="uk-navbar-item uk-logo" href="office">
                                <img src="images/logo-white.svg" loading="eager" width="115" height="50" uk-svg />
                            </a>
                        <?php } ?>
                    </div>
                    <?php if ($ismobile) { ?>
                        <div class="uk-navbar-center">
                            <a class="uk-navbar-item uk-logo" href="office">
                                <img src="images/logo-white.svg" loading="eager" width="115" height="50" uk-svg />
                            </a>
                        </div>
                    <?php } else { ?>
                        <div class="uk-navbar-right">
                            <a href="logout" class="uk-button uk-button-default">Logout</a>
                        </div>
                    <?php } ?>
                </nav>
            </div>
        </header>
        <main>
            <div class="uk-grid-collapse" uk-grid>
                <?php if (!$ismobile) { ?>
                    <div class="uk-width-1-5">
                        <div class="uk-panel-scrollable" uk-height-viewport="offset-top:true; offset-bottom:#footer;" style="resize:none;">
                            <ul class="uk-nav uk-nav-primary">
                                <li <?=(($uri->getSegment(1) === 'office') && ($uri->getSegment(2) === '') ? 'class="uk-active"' : '')?>>
                                    <a href="office"><span class="uk-margin-small-right" uk-icon="home"></span> Dashboard</a>
                                </li>
                                <li class="uk-nav-divider"></li>
                                <li <?=(($uri->getSegment(1) === 'office') && ($uri->getSegment(2) === 'blog') ? 'class="uk-active"' : '')?>>
                                    <a href="office/blog"><span class="uk-margin-small-right" uk-icon="rss"></span> Blog</a>
                                </li>
                                <li class="uk-nav-divider"></li>
                                <li <?=(($uri->getSegment(1) === 'office') && ($uri->getSegment(2) === 'agenda') ? 'class="uk-active"' : '')?>>
                                    <a href="office/agenda"><span class="uk-margin-small-right" uk-icon="calendar"></span> Agenda</a>
                                </li>
                                <li class="uk-nav-divider"></li>
                                <li <?=(($uri->getSegment(1) === 'office') && ($uri->getSegment(2) === 'client') ? 'class="uk-active"' : '')?>>
                                    <a href="office/client"><span class="uk-margin-small-right" uk-icon="bookmark"></span> Client</a>
                                </li>
                                <li class="uk-nav-divider"></li>
                                <li <?=(($uri->getSegment(1) === 'office') && ($uri->getSegment(2) === 'gallery') ? 'class="uk-active"' : '')?>>
                                    <a href="office/gallery"><span class="uk-margin-small-right" uk-icon="image"></span> Gallery</a>
                                </li>
                                <?php if ($user->inGroup('superadmin')) { ?>
                                    <li class="uk-nav-divider"></li>
                                    <li <?=(($uri->getSegment(1) === 'office') && ($uri->getSegment(2) === 'users') ? 'class="uk-active"' : '')?>>
                                        <a href="office/users"><span class="uk-margin-small-right" uk-icon="users"></span> Users</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
                <div class="uk-width-1-1 uk-width-4-5@m">
                    <div class="uk-panel-scrollable" uk-height-viewport="offset-top:true; offset-bottom:#footer;" style="resize:none;">
                        <?= $this->renderSection('main') ?>
                    </div>
                </div>
            </div>
        </main>
        <footer id="footer" class="uk-padding-small uk-section-secondary">
            <div class="uk-container uk-container-expand">
                <div class="uk-child-width-auto uk-grid-small uk-flex-center uk-flex-between@m" uk-grid>
                    <div class="uk-text-meta Uk-text-center uk-text-left@m">
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
                    <div class="uk-text-meta Uk-text-center uk-text-right@m">Developed by <a href="https://binary111.com" target="_blank">PT Kodebiner Teknologi Indonesia</a></div>
                </div>
            </div>
        </footer>
        <?php if ($ismobile) { ?>
            <div id="offcanvas" uk-offcanvas="mode: push; overlay: true">
                <div class="uk-offcanvas-bar">
                    <ul class="uk-nav uk-nav-primary">
                        <li <?=(($uri->getSegment(1) === 'office') && ($uri->getSegment(2) === '') ? 'class="uk-active"' : '')?>>
                            <a href="office"><span class="uk-margin-small-right" uk-icon="home"></span> Dashboard</a>
                        </li>
                        <li class="uk-nav-divider"></li>
                        <li <?=(($uri->getSegment(1) === 'office') && ($uri->getSegment(2) === 'blog') ? 'class="uk-active"' : '')?>>
                            <a href="office/blog"><span class="uk-margin-small-right" uk-icon="rss"></span> Blog</a>
                        </li>
                        <li class="uk-nav-divider"></li>
                        <li <?=(($uri->getSegment(1) === 'office') && ($uri->getSegment(2) === 'agenda') ? 'class="uk-active"' : '')?>>
                            <a href="office/agenda"><span class="uk-margin-small-right" uk-icon="calendar"></span> Agenda</a>
                        </li>
                        <li class="uk-nav-divider"></li>
                        <li <?=(($uri->getSegment(1) === 'office') && ($uri->getSegment(2) === 'client') ? 'class="uk-active"' : '')?>>
                            <a href="office/client"><span class="uk-margin-small-right" uk-icon="bookmark"></span> Client</a>
                        </li>
                        <li class="uk-nav-divider"></li>
                        <li <?=(($uri->getSegment(1) === 'office') && ($uri->getSegment(2) === 'gallery') ? 'class="uk-active"' : '')?>>
                            <a href="office/gallery"><span class="uk-margin-small-right" uk-icon="image"></span> Gallery</a>
                        </li>
                        <?php if ($user->inGroup('superadmin')) { ?>
                            <li class="uk-nav-divider"></li>
                            <li <?=(($uri->getSegment(1) === 'office') && ($uri->getSegment(2) === 'users') ? 'class="uk-active"' : '')?>>
                                <a href="office/users"><span class="uk-margin-small-right" uk-icon="users"></span> Users</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="uk-margin-large uk-text-center">
                        <a href="logout" class="uk-button uk-button-default">Logout</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </body>
</html>