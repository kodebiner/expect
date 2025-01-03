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
                        <h1 class="uk-heading-large uk-position-relative uk-margin-medium" uk-scrollspy-class>
                            Update & Inspirasi
                        </h1>
                        <div class="uk-panel uk-text-lead uk-position-relative uk-margin-large uk-margin-remove-top uk-width-2xlarge" uk-scrollspy-class>
                            Blog Expect menyajikan informasi terkini mengenai kegiatan perusahaan, termasuk update proyek, berita industri, dan laporan kegiatan.
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
                                <?php foreach ($highlights as $highlight) { ?>
                                    <div>
                                        <a href="blog/<?=$highlight['slug']?>">
                                            <article class="el-item uk-panel uk-margin-remove-first-child" uk-scrollspy-class>
                                                <div class="uk-height-large uk-background-cover"  data-src="images/blog/<?=$highlight['images']?>" uk-img></div>
                                                <h3 class="el-title uk-h3 uk-link-reset uk-margin-top uk-margin-remove-bottom"><?=$highlight['title']?></h3>
                                                <div class="uk-margin-small-top">
                                                    <div class="el-link uk-button uk-button-text">Selengkapnya</div>
                                                </div>
                                            </article>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-grid-row-large uk-grid-match" uk-grid>
                                <?php foreach ($blogs as $blog) { ?>
                                    <div>
                                        <a href="blog/<?=$blog['slug']?>">
                                            <article class="el-item uk-grid-item-match" uk-scrollspy-class>
                                                <picture class="uk-cover-container">
                                                    <canvas width="370" height="208"></canvas>
                                                    <img src="images/blog/<?=$blog['images']?>" uk-cover />
                                                </picture>
                                                <h3 class="el-title uk-h4 uk-margin-top uk-margin-remove-bottom"><?=$blog['title']?></h3>
                                                <div class="uk-margin-small-top">
                                                    <div class="el-link uk-button uk-button-text">Selengkapnya</div>
                                                </div>
                                            </article>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>                        
                        <!-- Pagination Top -->
                        <div class="uk-flex uk-flex-center uk-margin-large">
                            <?= $pager->links('blogs', 'uikit_full') ?>
                        </div>
                    </div>
                </div>
                <div class="uk-grid-margin uk-container uk-container-small">
                    <div class="uk-grid tm-grid-expand uk-child-width-1-1">
                        <div class="uk-grid-item-match uk-width-1-1@m">
                            <div class="uk-tile-secondary uk-tile">
                                <h2 class="uk-margin-medium uk-text-center" uk-scrollspy-class>
                                    Berlangganan Newsletter kami
                                    <br/>
                                    Dapatkan Update Berkala
                                </h2>
                                <div class="uk-width-2xlarge uk-margin-auto@s uk-margin-auto uk-text-center" uk-scrollspy-class>
                                    <form class="uk-form uk-panel js-form-newsletter">
                                        <div class="uk-grid-small" uk-grid>
                                            <div class="uk-width-1-1 uk-width-expand@m">
                                                <input class="el-input uk-input" type="email" placeholder="Alamat Email" />
                                            </div>
                                            <div class="uk-width-1-1 uk-width-auto@m uk-text-center@m">
                                                <button class="el-button uk-button uk-button-default" type="submit">Berlangganan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>