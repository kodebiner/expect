<?= $this->extend('office/layout') ?>

<?= $this->section('main') ?>
<section class="uk-section uk-section-small">
    <div class="uk-container uk-container-expand">
        <!-- Alert -->
        <?= view('Views/auth/_message_block') ?>

        <!-- Title -->
        <div class="uk-child-width-auto uk-flex-between" uk-grid>
            <div>
                <h1 class="uk-h3 uk-heading-bullet uk-margin-remove"><?=$title;?></h1>
            </div>
            <!-- New Agenda Category Modal -->
            <div>
                <a class="uk-button uk-button-secondary" href="#add" uk-toggle>Tambah Kategori</a>
                <div id="add" class="uk-flex-top" uk-modal="bg-close:false;">
                    <div class="uk-modal-dialog uk-margin-auto-vertical">
                        <form class="uk-margin uk-form-stacked" action="office/agenda/add-category" method="post">
                            <div class="uk-modal-body">
                                <?= csrf_field() ?>
                                <div class="uk-margin">
                                    <div class="uk-margin uk-child-width-1-2" uk-grid>
                                        <div>
                                            <label class="uk-form-label" for="name">Nama Kategori</label>
                                        </div>
                                        <div class="uk-flex-right uk-text-right">
                                            <a onclick="createNewCategory()">+ Tambah List Kategori</a>
                                        </div>
                                    </div>
                                    <div class="uk-from-controls" id="createCategory">
                                        <div id='newCategory0'>
                                            <input class="uk-input" id="name[0]" name="name[0]" type="text" placeholder="Nama Kategori" />
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    var createCount = 0;

                                    function createNewCategory() {
                                        createCount++;

                                        var createCategory  = document.getElementById("createCategory");

                                        var gridNewCategory = document.createElement('div');
                                        gridNewCategory.setAttribute('id', 'newCategory' + createCount);
                                        gridNewCategory.setAttribute('class', 'uk-margin-small');
                                        gridNewCategory.setAttribute('uk-grid', '');

                                        var createName  = document.createElement('div');
                                        createName.setAttribute('id', 'newName' + createCount);
                                        createName.setAttribute('class', 'uk-width-5-6');

                                        var createNameInput = document.createElement('input');
                                        createNameInput.setAttribute('type', 'text');
                                        createNameInput.setAttribute('class', 'uk-input');
                                        createNameInput.setAttribute('placeholder', 'Nama Kategori');
                                        createNameInput.setAttribute('id', 'name[' + createCount + ']');
                                        createNameInput.setAttribute('name', 'name[' + createCount + ']');

                                        var createRemove    = document.createElement('div');
                                        createRemove.setAttribute('id', 'remove' + createCount);
                                        createRemove.setAttribute('class', 'uk-width-1-6 uk-text-center uk-text-bold uk-text-danger uk-flex uk-flex-middle');

                                        var createRemoveButton  = document.createElement('a');
                                        createRemoveButton.setAttribute('onclick', 'createRemove(' + createCount + ')');
                                        createRemoveButton.setAttribute('class', 'uk-link-reset');
                                        createRemoveButton.innerHTML = 'X';

                                        createName.appendChild(createNameInput);
                                        gridNewCategory.appendChild(createName);
                                        createRemove.appendChild(createRemoveButton);
                                        gridNewCategory.appendChild(createRemove);
                                        createCategory.appendChild(gridNewCategory);
                                    };

                                    function createRemove(i) {
                                        var createRemoveElement = document.getElementById('newCategory' + i);
                                        createRemoveElement.remove();
                                    };
                                </script>
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
        </div>

        <!-- Category Grid -->
        <div class="uk-child-width-1-1 uk-child-width-1-4@m" uk-grid  uk-height-match="target: > div > .uk-card > .uk-card-header">
            <?php foreach ($categories as $category) { ?>
                <div>
                    <div class="uk-card uk-card-default uk-card-hover">
                        <div class="uk-card-header">
                            <h3 class="uk-text-lead"><?=$category['name']?></h3>
                        </div>
                        <div class="uk-card-footer">
                            <div class="uk-child-width-auto uk-flex-center" uk-grid>
                                <div>
                                    <a href="office/agenda/edit-agenda-<?=$category['id']?>" uk-toggle class="uk-icon-button" uk-icon="pencil"></a>
                                </div>
                                <div>
                                    <a href="#delete-<?=$category['id']?>" uk-toggle class="uk-icon-button uk-button-danger" uk-icon="trash"></a>
                                    <!-- <a href="office/agenda/delete-category-</?=$category['id']?>" class="uk-icon-button uk-button-danger" uk-icon="trash" onclick="return confirm('Anda yakin ingin menghapus Kategori </?=$category['name']?>?')"></a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div id="delete-<?=$category['id']?>" class="uk-flex-top" uk-modal="bg-close:false;">
                        <div class="uk-modal-dialog uk-margin-auto-vertical">
                            <div class="uk-modal-body">
                                <div class="uk-modal-title uk-text-center">Anda yakin akan menghapus<br/><b><?=$category['name']?></b>?</div>
                            </div>
                            <div class="uk-modal-footer">
                                <div class="uk-child-width-auto uk-grid-small uk-flex-center" uk-grid>
                                    <div>
                                        <form class="uk-margin uk-form-stacked" action="office/agenda/delete-category" method="post">
                                            <?= csrf_field() ?>
                                            <input id="category-id" name="category-id" value="<?=$category['id']?>" hidden required />
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
        <?= $pager->links('agenda', 'uikit_full') ?>
    </div>
</section>
<?= $this->endSection() ?>