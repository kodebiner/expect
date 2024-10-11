<?= $this->extend('layout') ?>

<?= $this->section('main') ?>
    <section class="uk-section-muted uk-inverse-dark uk-section uk-section-xlarge uk-padding-remove-bottom" uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-fade; delay: false;">
        <div class="uk-container uk-container-xlarge">
            <div class="uk-grid tm-grid-expand uk-child-width-1-1 uk-grid-margin">
                <div class="uk-width-1-1 uk-text-center">
                    <img class="uk-width-1-1 uk-width-2-3@m" src="images/logo.png"/>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>