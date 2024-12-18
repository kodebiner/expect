<?= $this->extend('layout') ?>

<?= $this->section('main') ?>
    <article class="uk-section-muted uk-inverse-dark uk-section" uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-fade; delay: false;">
        <div class="uk-container">
            <div class="uk-width-1-1 uk-margin" uk-scrollspy-class>
                <picture class="uk-width-1-1">
                    <img class="uk-width-1-1" src="images/blog/<?=$blog['images']?>" alt="<?=$blog['title']?>" />
                </picture>
            </div>
            <div class="uk-margin-large uk-container uk-container-xsmall">
                <h1 uk-scrollspy-class><?=$blog['title']?></h1>
                <div class="uk-panel uk-margin" uk-scrollspy-class>
                    <?=$blog['content']?>
                </div>
            </div>
        </div>
    </article>
<?= $this->endSection() ?>