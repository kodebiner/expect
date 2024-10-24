<?= $this->extend('layout') ?>

<?= $this->section('main') ?>
    <style>
        #page\#0 .el-image {
            max-width: 48vw;
        }
        #page\#1 .el-image {
            max-width: 43vw;
        }
    </style>
    <section class="uk-section-muted uk-inverse-dark uk-section uk-section-xlarge" uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-fade; delay: false;">
        <div class="uk-container">
            <div class="uk-grid tm-grid-expand uk-child-width-1-1 uk-grid-margin">
                <div class="uk-grid-item-match uk-width-1-1@m">
                    <div class="uk-panel uk-width-1-1">
                        <div class="uk-position-absolute uk-width-1-1 uk-text-left" id="page#0" uk-parallax="y: 0,-9vh; easing: 0.5" style="right: 33vw; top: -15vh; z-index: 0; transform: translateY(-1.25185vh); will-change: transform;">
                            <img src="/images/resources-hero-left.svg" width="630" height="540" class="el-image" loading="eager" />
                        </div>
                        <h1 class="uk-heading-large uk-font-primary uk-position-relative uk-text-center uk-scrollspy-inview" style="z-index: 3;" uk-scrollspy-class>
                            Galeri<br/>Expect
                        </h1>
                        <div class="uk-position-absolute uk-width-1-1 uk-text-right" id="page#1" uk-parallax="y: 4vh,-10vh; easing: 0.5" style="right: -30vw; bottom: -30vh; z-index: 0; transform: translateY(2.69129vh); will-change: transform;">
                            <img src="/images/resources-hero-right.svg" width="650" height="670" class="el-image" loading="eager" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="uk-section-muted uk-inverse-dark" uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-slide-bottom-small; delay: false;">
        <div data-src="/images/bottom-bg.svg" uk-img class="uk-background-norepeat uk-background-contain uk-background-bottom-left uk-section" uk-parallax="bgx: -120,-120; bgy: 420,120; easing: 0.5">
            <div class="uk-container uk-container-xlarge">
                <div class="uk-child-width-1-2 uk-child-width-1-4" uk-grid="masonry: pack">
                    <div>
                        <a href="#dummy-gallery" uk-toggle>
                            <div class="uk-card uk-card-default uk-card-hover">
                                <div class="uk-card-media-top uk-background-cover"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>