<?= $this->extend('office/layout') ?>

<?= $this->section('main') ?>

<!-- Tiny MCE Js  -->
<script src="https://cdn.tiny.cloud/1/fbtmdxwnanfjdicy4oh9uxzzp0idhv1sdbyxml3t9lgz0v6r/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 25px;
    }
    
    .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
    }
    
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }
    
    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 4px;
        bottom: 3px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }
    
    input:checked + .slider {
        background-color: #1452dd;
    }
    
    input:focus + .slider {
        box-shadow: 0 0 1px #1452dd;
    }
    
    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }
    
    .slider.round:before {
        border-radius: 50%;
    }
</style>

<!-- Loading Js -->
<script>
    jQuery(window).on("load", function () {
        $('#loading').attr('hidden', '');
        $('#main').removeAttr('hidden');
    });
</script>

<section id="loading" class="uk-width-1-1 uk-height-1-1 uk-flex uk-flex-center uk-flex-middle">
    <div uk-spinner="ratio: 3"></div>
</section>
<section id="main" class="uk-section uk-section-small" hidden>
    <div class="uk-container uk-container-expand">
        <!-- Alert Container -->
        <div>
            <?php if (session('errors') !== null) { ?>
                <div class="uk-alert-danger" uk-alert>
                    <a href class="uk-alert-close" uk-close></a>
                    <ul class="uk-list uk-list-disc">
                        <?php foreach (session('errors') as $error) { ?>
                            <li><?=$error?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
            <?php if (session('error') !== null) { ?>
                <div class="uk-alert-danger" uk-alert>
                    <a href class="uk-alert-close" uk-close></a>
                    <p><?=session('error')?></p>
                </div>
            <?php } ?>
            <?php if (session('message') !== null) { ?>
                <div class="uk-alert-success" uk-alert>
                    <a href class="uk-alert-close" uk-close></a>
                    <p><?=session('message')?></p>
                </div>
            <?php } ?>
        </div>

        <!-- Title -->
        <div class="uk-child-width-auto uk-flex-between uk-margin" uk-grid>
            <div>
                <h1 class="uk-h3 uk-heading-bullet uk-margin-remove"><?=$title;?></h1>
            </div>
            <div>
                <a class="uk-button uk-button-secondary" href="office/blog/add" uk-toggle>Tambah Artikel</a>
            </div>
        </div>

        <!-- Blog Grid -->
        <div class="uk-child-width-1-1 uk-child-width-1-4@m" uk-grid  uk-height-match="target: > div > .uk-card > .uk-card-header">
            <?php foreach ($blogs as $blog) { ?>
                <div>
                    <div class="uk-card uk-card-default uk-card-hover">
                        <div class="uk-card-header">
                            <h3 class="uk-text-lead"><?=$blog['title']?></h3>
                        </div>
                        <div class="uk-card-body">
                            <div class="uk-height-small uk-flex uk-flex-middle uk-flex-center">
                                <img src="images/blog/<?=$blog['images']?>" style="max-height:100%; max-width:100%" />
                            </div>
                        </div>
                        <div class="uk-card-footer">
                            <div class="uk-child-width-auto uk-flex-center" uk-grid>
                                <div>
                                    <a href="office/blog/edit-<?=$blog['id']?>" uk-toggle class="uk-icon-button" uk-icon="pencil"></a>
                                </div>
                                <div>
                                    <a href="#delete-<?=$blog['id']?>" uk-toggle class="uk-icon-button uk-button-danger" uk-icon="trash"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div id="delete-<?=$blog['id']?>" class="uk-flex-top" uk-modal="bg-close:false;">
                        <div class="uk-modal-dialog uk-margin-auto-vertical">
                            <div class="uk-modal-body">
                                <div class="uk-modal-title uk-text-center">Anda yakin akan menghapus<br/><b><?=$blog['title']?></b>?</div>
                            </div>
                            <div class="uk-modal-footer">
                                <div class="uk-child-width-auto uk-grid-small uk-flex-center" uk-grid>
                                    <div>
                                        <form class="uk-margin uk-form-stacked" action="office/blog/delete" method="post">
                                            <?= csrf_field() ?>
                                            <input id="blog-id" name="blog-id" value="<?=$blog['id']?>" hidden required />
                                            <button class="uk-button uk-button-secondary" type="submit">Ya</button>
                                        </form>
                                    </div>
                                    <div><a class="uk-button uk-button-danger uk-modal-close">Tidak</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Pagination -->
    <div class="uk-container uk-container-xlarge uk-margin-top">
        <?= $pager->links('blogs', 'uikit_full') ?>
    </div>
</section>
<?= $this->endSection() ?>