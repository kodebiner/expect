<?= $this->extend('office/layout') ?>

<?= $this->section('main') ?>
<section class="uk-section uk-section-small">
    <div class="uk-container uk-container-expand">
        <h1 class="uk-h3 uk-heading-bullet uk-margin-large-bottom"><?=$title;?></h1>
        <div class="uk-child-width-1-2 uk-child-width-1-4@m" uk-grid  uk-height-match="target: > div > .uk-card > .uk-card-header">
            <?php foreach ($clients as $client) { ?>
                <div>
                    <div class="uk-card uk-card-default uk-card-hover">
                        <div class="uk-card-header">
                            <h3 class="uk-text-lead"><?=$client['name']?></h3>
                        </div>
                        <div class="uk-card-body">
                            <div class="uk-height-small uk-flex uk-flex-middle uk-flex-center">
                                <img src="images/clients/<?=$client['image']?>" style="max-height:100%; max-width:100%" />
                            </div>
                        </div>
                        <div class="uk-card-footer">
                            <div class="uk-child-width-auto uk-flex-center" uk-grid>
                                <div>
                                    <a href="#edit-<?=$client['id']?>" uk-toggle class="uk-icon-button" uk-icon="pencil"></a>
                                </div>
                                <div>
                                    <a href="#delete-<?=$client['id']?>" uk-toggle class="uk-icon-button uk-button-danger" uk-icon="trash"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="edit-<?=$client['id']?>" class="uk-flex-top" uk-modal>
                        <div class="uk-modal-dialog uk-margin-auto-vertical">
                            <div class="uk-modal-body">
                                <form class="uk-margin uk-form-stacked" action="office/client/edit-<?=$client['id']?>" method="post">
                                    <?= csrf_field() ?>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="name">Nama Client</label>
                                        <div class="uk-from-controls">
                                            <input class="uk-input" id="name" name="name" type="text" placeholder="Nama Client" value="<?=$client['name']?>" />
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="logo">Logo Client</label>
                                        <div class="uk-from-controls">
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>