<?= $this->extend('office/layout') ?>

<?= $this->section('main') ?>
<section class="uk-section uk-section-small">
    <div class="uk-container uk-container-expand">
        <!-- Alert Container -->
        <div>
            <?php if (session('error') !== null) { ?>
                <div class="uk-alert-danger" uk-alert>
                    <a href class="uk-alert-close" uk-close></a>
                    <ul class="uk-list uk-list-disc">
                        <?php foreach (session('errors') as $error) { ?>
                            <li><?=$error?></li>
                        <?php } ?>
                    </ul>
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
        <div class="uk-child-width-auto uk-flex-between" uk-grid>
            <div>
                <h1 class="uk-h3 uk-heading-bullet uk-margin-remove"><?=$title;?></h1>
            </div>
            <div>
                <a class="uk-button uk-button-secondary" href="#new-client" uk-toggle>Tambah Client</a>
            </div>
        </div>
        <!-- New Client Modal -->
        <div id="new-client" class="uk-flex-top" uk-modal="bg-close:false;">
            <div class="uk-modal-dialog uk-margin-auto-vertical">
                <form class="uk-margin uk-form-stacked" action="office/client/new" method="post">
                    <div class="uk-modal-body">
                        <?= csrf_field() ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="name">Nama Client</label>
                            <div class="uk-from-controls">
                                <input class="uk-input" id="name" name="name" type="text" placeholder="Nama Client" required/>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="logo">Logo Client</label>
                            <div class="uk-from-controls">
                                <div class="new-upload uk-placeholder uk-text-center">
                                    <span uk-icon="icon:move; ratio:2;"></span><br/>
                                    <span class="uk-text-middle">Tarik dan lepas file di sini atau</span>
                                    <div uk-form-custom>
                                        <input type="file" multiple>
                                        <span class="uk-link">pilih satu</span>
                                    </div>
                                    <br/>
                                    <span>Maks 500kb</span>
                                </div>
                                <progress id="new-progressbar" class="uk-progress" value="0" max="100" hidden></progress>
                                <input id="logo" name="logo" required hidden />
                                <div id="logo-container" class="uk-height-small uk-flex uk-flex-middle uk-flex-center"></div>
                                <script>
                                    var bar = document.getElementById('new-progressbar');
                                    UIkit.upload('.new-upload', {
                                        url: 'office/client/upload',
                                        multiple: false,
                                        name: 'upload',
                                        method: 'POST',
                                        type: 'json',
                                        beforeSend: function () {
                                            console.log('beforeSend', arguments);
                                        },
                                        beforeAll: function () {
                                            console.log('beforeAll', arguments);
                                        },
                                        load: function () {
                                            console.log('load', arguments);
                                        },
                                        error: function () {
                                            console.log('error', arguments);
                                            var error = arguments[0].xhr.response.message.upload;
                                            alert(error);
                                        },
                                        complete: function () {
                                            console.log('complete', arguments);
                                            var filename = arguments[0].response;
                                            var imagecontainer = document.getElementById("logo-container");

                                            imagecontainer.innerHTML = '';
                                            document.getElementById("logo").value = filename;

                                            var image = document.createElement('img');
                                            image.setAttribute('src', 'images/clients/'+filename);
                                            image.setAttribute('style', 'max-height:100%; max-width:100%;');

                                            imagecontainer.appendChild(image);
                                        },
                                        loadStart: function (e) {
                                            console.log('loadStart', arguments);
                                            bar.removeAttribute('hidden');
                                            bar.max = e.total;
                                            bar.value = e.loaded;
                                        },
                                        progress: function (e) {
                                            console.log('progress', arguments);
                                            bar.max = e.total;
                                            bar.value = e.loaded;
                                        },
                                        loadEnd: function (e) {
                                            console.log('loadEnd', arguments);
                                            bar.max = e.total;
                                            bar.value = e.loaded;
                                        },
                                        completeAll: function () {
                                            console.log('completeAll', arguments);
                                            setTimeout(function () {
                                                bar.setAttribute('hidden', 'hidden');
                                            }, 1000);
                                            alert('Upload Selesai');
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="uk-modal-footer">
                        <div class="uk-child-width-auto uk-grid-small uk-flex-center" uk-grid>
                            <div><button class="uk-button uk-button-secondary" type="submit">Simpan</button></div>
                            <div><a class="uk-button uk-button-danger uk-modal-close">Batal</a></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Pagination Top -->
        <div class="uk-flex uk-flex-right uk-margin">
            <?= $pager->links('clients', 'uikit_full') ?>
        </div>
        <!-- Client Grid -->
        <div class="uk-child-width-1-1 uk-child-width-1-4@m" uk-grid  uk-height-match="target: > div > .uk-card > .uk-card-header">
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
                    <div id="edit-<?=$client['id']?>" class="uk-flex-top" uk-modal="bg-close:false;">
                        <div class="uk-modal-dialog uk-margin-auto-vertical">
                            <form class="uk-margin uk-form-stacked" action="office/client/edit/<?=$client['id']?>" method="post">
                                <div class="uk-modal-body">
                                    <?= csrf_field() ?>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="name-<?=$client['id']?>">Nama Client</label>
                                        <div class="uk-from-controls">
                                            <input class="uk-input" id="name-<?=$client['id']?>" name="name" type="text" placeholder="Nama Client" value="<?=$client['name']?>" required />
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="new-logo-<?=$client['id']?>">Logo Client</label>
                                        <div class="uk-from-controls">
                                            <div class="edit-upload-<?=$client['id']?> uk-placeholder uk-text-center">
                                                <span uk-icon="icon:move; ratio:2;"></span><br/>
                                                <span class="uk-text-middle">Tarik dan lepas file di sini atau</span>
                                                <div uk-form-custom>
                                                    <input type="file" multiple>
                                                    <span class="uk-link">pilih satu</span>
                                                </div>
                                                <br/>
                                                <span>Maks 500kb</span>
                                            </div>
                                            <progress id="edit-progressbar-<?=$client['id']?>" class="uk-progress" value="0" max="100" hidden></progress>
                                            <input id="old-logo-<?=$client['id']?>" name="old-logo" value="<?=$client['image']?>" hidden required />
                                            <input id="new-logo-<?=$client['id']?>" name="new-logo" value="<?=$client['image']?>" hidden required />
                                            <div id="logo-container-<?=$client['id']?>" class="uk-height-small uk-flex uk-flex-middle uk-flex-center">
                                                <img src="images/clients/<?=$client['image']?>" style="max-height:100%; max-width:100%;" />
                                            </div>
                                            <script>
                                                var bar = document.getElementById('edit-progressbar-<?=$client['id']?>');
                                                UIkit.upload('.edit-upload-<?=$client['id']?>', {
                                                    url: 'office/client/upload',
                                                    multiple: false,
                                                    name: 'upload',
                                                    method: 'POST',
                                                    type: 'json',
                                                    beforeSend: function () {
                                                        console.log('beforeSend', arguments);
                                                    },
                                                    beforeAll: function () {
                                                        console.log('beforeAll', arguments);
                                                    },
                                                    load: function () {
                                                        console.log('load', arguments);
                                                    },
                                                    error: function () {
                                                        console.log('error', arguments);
                                                        var error = arguments[0].xhr.response.message.upload;
                                                        alert(error);
                                                    },
                                                    complete: function () {
                                                        console.log('complete', arguments);
                                                        var filename = arguments[0].response;
                                                        var imagecontainer = document.getElementById("logo-container-<?=$client['id']?>");

                                                        imagecontainer.innerHTML = '';
                                                        document.getElementById("new-logo-<?=$client['id']?>").value = filename;

                                                        var image = document.createElement('img');
                                                        image.setAttribute('src', 'images/clients/'+filename);
                                                        image.setAttribute('style', 'max-height:100%; max-width:100%;');

                                                        imagecontainer.appendChild(image);
                                                    },
                                                    loadStart: function (e) {
                                                        console.log('loadStart', arguments);
                                                        bar.removeAttribute('hidden');
                                                        bar.max = e.total;
                                                        bar.value = e.loaded;
                                                    },
                                                    progress: function (e) {
                                                        console.log('progress', arguments);
                                                        bar.max = e.total;
                                                        bar.value = e.loaded;
                                                    },
                                                    loadEnd: function (e) {
                                                        console.log('loadEnd', arguments);
                                                        bar.max = e.total;
                                                        bar.value = e.loaded;
                                                    },
                                                    completeAll: function () {
                                                        console.log('completeAll', arguments);
                                                        setTimeout(function () {
                                                            bar.setAttribute('hidden', 'hidden');
                                                        }, 1000);
                                                        alert('Upload Selesai');
                                                    }
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-modal-footer">
                                    <div class="uk-child-width-auto uk-grid-small uk-flex-center" uk-grid>
                                        <div><button class="uk-button uk-button-secondary" type="submit">Simpan</button></div>
                                        <div><a class="uk-button uk-button-danger uk-modal-close">Batal</a></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- Pagination Bottom -->
        <div class="uk-flex uk-flex-right uk-margin">
            <?= $pager->links('clients', 'uikit_full') ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>