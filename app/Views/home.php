<?= $this->extend('layout') ?>

<?= $this->section('main') ?>
    <style>
        #page\#0 .el-image{max-width: 48vw;}
        #page\#1 .el-image{max-width: 43vw;}
    </style>
    <section class="uk-section-muted uk-inverse-dark uk-section uk-section-xlarge uk-padding-remove-bottom" uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-fade; delay: false;">
        <div class="uk-container uk-container-xlarge">
            <div class="uk-grid tm-grid-expand uk-child-width-1-1 uk-grid-margin">
                <div class="uk-panel uk-width-1-1">
                    <div class="uk-position-absolute uk-width-1-1 uk-text-left" id="page#0" uk-parallax="y: 0,-9vh; easing: 0.5" style="right: 30vw; top: -16vh; z-index: 0; transform: translateY(0vh); will-change: transform;">
                        <img src="images/home-hero-left.svg" width="800" height="750" class="el-image" loading="eager" />
                    </div>
                    <div class="uk-text-center">
                        <img class="uk-width-1-1 uk-width-1-2@m" src="images/logo.png"/>
                    </div>
                    <div class="uk-position-absolute uk-width-1-1 uk-text-right" id="page#1" uk-parallax="y: 4vh,-10vh; easing: 0.5" style="right: -20vw; bottom: -24vh; z-index: 0; transform: translateY(4vh); will-change: transform;">
                        <img src="images/home-hero-right.svg" width="650" height="600" class="el-image" loading="eager" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="uk-section-muted uk-section uk-section-large" uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-slide-bottom-small; delay: false;">
        <div class="uk-container uk-container-xlarge">
            <div class="uk-grid tm-grid-expand uk-child-width-1-1 uk-grid-margin">
                <div class="uk-width-1-1@m">
                    <h2 class="uk-h3 uk-heading-bullet uk-margin-medium uk-scrollspy-inview" uk-scrollspy-class>Program Pelatihan</h2>
                    <div class="uk-margin">
                        <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-4@m" uk-grid uk-height-match="target: > div > a > .uk-card > .uk-card-body">
                            <div>
                                <a>
                                    <div class="uk-card uk-card-default uk-card-hover">
                                        <div class="uk-card-media-top">
                                            <img src="images/pelatihan-inhouse.jpg" alt="Pelatiha Inhouse" />
                                        </div>
                                        <div class="uk-card-body uk-margin-remove-first-child">
                                            <h3 class="el-title uk-h5 uk-margin-top uk-margin-remove-bottom">Pelatihan Inhouse</h3>
                                            <div class="el-meta uk-text-meta uk-margin-small-top">Online / Offline</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a>
                                    <div class="uk-card uk-card-default uk-card-hover">
                                        <div class="uk-card-media-top">
                                            <img src="images/pelatihan-public.png" alt="Pelatiha Public" />
                                        </div>
                                        <div class="uk-card-body uk-margin-remove-first-child">
                                            <h3 class="el-title uk-h5 uk-margin-top uk-margin-remove-bottom">Pelatihan Public</h3>
                                            <div class="el-meta uk-text-meta uk-margin-small-top">Online / Offline</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a>
                                    <div class="uk-card uk-card-default uk-card-hover">
                                        <div class="uk-card-media-top">
                                            <img src="images/outbound.jpg" alt="Gathering & Outbound" />
                                        </div>
                                        <div class="uk-card-body uk-margin-remove-first-child">
                                            <h3 class="el-title uk-h5 uk-margin-top uk-margin-remove-bottom">Gathering & OutBound</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a>
                                    <div class="uk-card uk-card-default uk-card-hover">
                                        <div class="uk-card-media-top">
                                            <img src="images/pelatihan-pra-purnabakti.png" alt="Pelatihan Pra Purnabakti" />
                                        </div>
                                        <div class="uk-card-body uk-margin-remove-first-child">
                                            <h3 class="el-title uk-h5 uk-margin-top uk-margin-remove-bottom">Pelatihan Pra Purnabakti Bisnis & Kewirausahaan</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="uk-section-secondary uk-preserve-color uk-section" uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-slide-bottom-small; delay: false;">
        <div class="uk-container uk-container-xlarge">
            <div class="tm-grid-expand uk-grid-column-large uk-grid-margin" uk-grid>
                <div class="uk-light uk-width-1-4@m">
                    <h2 class="uk-position-relative uk-scrollspy-inview" style="top: 15px;" uk-scrollspy-class>Update Terbaru<br/>dari Expect</h2>
                </div>
                <div class="uk-width-3-4@m">
                    <div uk-slider="autoplay: true; sets: true;">
                        <div class="uk-position-relative">
                            <div class="uk-slider-container">
                                <div class="uk-slider-items uk-visible-toggle uk-child-width-1-2@m uk-grid" uk-height-match="target: > div > a > .uk-card > .uk-card-body">
                                    <div>
                                        <a>
                                            <div class="uk-card uk-card-default uk-card-hover">
                                                <div class="uk-card-media-top uk-height-medium uk-background-cover" style="background-image:url('images/blog/outbound-news.jpg');">
                                                    <img class="uk-hidden" src="images/blog/outbound-news.jpg" alt="Lorem Ipsum" />
                                                </div>
                                                <div class="uk-card-body">
                                                    <h3 class="el-card-title">Lorem Ipsum</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div>
                                        <a>
                                            <div class="uk-card uk-card-default uk-card-hover">
                                                <div class="uk-card-media-top uk-height-medium uk-background-cover" style="background-image:url('images/blog/online-meeting.jpg');">
                                                    <img class="uk-hidden" src="images/blog/online-meeting.jpg" alt="Dolor Sit Amet Lorem" />
                                                </div>
                                                <div class="uk-card-body">
                                                    <h3 class="el-card-title">Lorem Ipsum</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div>
                                        <a>
                                            <div class="uk-card uk-card-default uk-card-hover">
                                                <div class="uk-card-media-top uk-height-medium uk-background-cover" style="background-image:url('images/blog/seminar.jpg');">
                                                    <img class="uk-hidden" src="images/blog/seminar.jpg" alt="Lorem Ipsum Dolor sit Amet" />
                                                </div>
                                                <div class="uk-card-body">
                                                    <h3 class="el-card-title">Lorem Ipsum Dolor sit Amet</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div>
                                        <a>
                                            <div class="uk-card uk-card-default uk-card-hover">
                                                <div class="uk-card-media-top uk-height-medium uk-background-cover" style="background-image:url('images/blog/group-meeting.jpg');">
                                                    <img class="uk-hidden" src="images/blog/group-meeting.jpg" alt="Nulla vel enim sed nunc efficitur rutrum in ut dui" />
                                                </div>
                                                <div class="uk-card-body">
                                                    <h3 class="el-card-title">Nulla vel enim sed nunc efficitur rutrum in ut dui</h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin uk-margin-remove-bottom"></ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>