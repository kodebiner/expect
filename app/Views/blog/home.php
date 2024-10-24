<?= $this->extend('layout') ?>

<?= $this->section('main') ?>
    <style>
        #template-Nx-VdaTD\#0 .el-image {
            max-width: 55vw;
        }
    </style>
    <section class="uk-section-muted uk-inverse-dark" uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-fade; delay: false;">
        <div data-src="/images/bottom-bg.svg" uk-img class="uk-background-norepeat uk-background-contain uk-background-bottom-left uk-section uk-section-large" uk-parallax="bgx: -120,-120; bgy: 420,120; easing: 0.5">
            <div class="uk-container uk-container-xlarge">
                <div class="tm-grid-expand uk-margin-xlarge" uk-grid>
                    <div class="uk-width-3-4@s">
                        <h1 class="uk-heading-large uk-position-relative uk-margin-medium uk-scrollspy-inview" uk-scrollspy-class>
                            Update & Inspirasi
                        </h1>
                        <div class="uk-panel uk-text-lead uk-position-relative uk-margin-large uk-margin-remove-top uk-width-2xlarge uk-scrollspy-inview" uk-scrollspy-class>
                            Lorem ipsum dolor sit amet, consectur adipiscing elit, usmod tempor incididunt ut labore et dolore magna aliqua enim minim veniam.
                        </div>
                    </div>
                    <div class="uk-grid-item-match uk-width-1-4@s">
                        <div class="uk-panel uk-width-1-1">
                            <div class="uk-position-absolute uk-width-1-1 uk-text-right" id="template-Nx-VdaTD#0" uk-parallax="y: 6vh,-10vh; easing: 0.5">
                                <img src="/images/blog-category-right.svg" width="880" height="840" class="el-image" loading="eager" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-grid tm-grid-expand uk-child-width-1-1 uk-margin-xlarge">
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin-xlarge">
                            <div class="uk-child-width-1-1 uk-child-width-1-2@s" uk-grid>
                                <div>
                                    <a href="blog/dummyarticle">
                                        <article class="el-item uk-panel uk-margin-remove-first-child uk-scrollspy-inview" uk-scrollspy-class>
                                            <div class="picture-continer">
                                                
                                            </div>
                                        </article>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>