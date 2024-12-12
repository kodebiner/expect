<?= $this->extend('office/layout') ?>

<?= $this->section('extraSripts') ?>
<script>
    jQuery(window).on("load", function () {
        $('#loading').attr('hidden', '');
        $('#main').removeAttr('hidden');
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
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

        <!-- Edit Category -->
        <div class="uk-margin">
            <form class="uk-margin uk-form-stacked" action="office/agenda/edit-category-<?=$category['id']?>" method="post">
                <?= csrf_field() ?>
                <div class="uk-child-width-auto uk-flex-between uk-flex-middle" uk-grid>
                    <div>
                        <h1 class="uk-h3 uk-heading-bullet uk-margin-remove">Formulir Ubah Kategori
                            <input class="uk-input" id="name-category-<?=$category['id']?>" name="name-category" type="text" placeholder="Nama Kategori" value="<?=$category['name']?>" />
                        </h1>
                    </div>
                    <div>
                        <button class="uk-button uk-button-secondary" type="submit">Simpan Kategori</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Divider -->
        <hr style ="border-top: 3px double #8c8b8b">

        <!-- Add Agenda -->
        <div class="uk-child-width-auto uk-flex-between uk-flex-middle" uk-grid>
            <div>
                <h1 class="uk-h3 uk-heading-bullet uk-margin-remove">Daftar Agenda</h1>
            </div>
            <div>
                <a class="uk-button uk-button-secondary uk-button-default" href="#add" uk-toggle>Tambah Agenda</a>
            </div>
        </div>
        <div id="add" class="uk-flex-top" uk-modal="bg-close:false;">
            <div class="uk-modal-dialog uk-margin-auto-vertical">
                <form class="uk-margin uk-form-stacked" action="office/agenda/add-agenda" method="post">
                    <input name="cat_id" type="text" value="<?=$category['id']?>" hidden />
                    <div class="uk-modal-body">
                        <?= csrf_field() ?>
                        <div class="uk-margin">
                            <div class="uk-margin uk-child-width-1-2" uk-grid>
                                <div>
                                    <label class="uk-form-label" for="name">Nama Agenda</label>
                                </div>
                                <div class="uk-flex-right uk-text-right">
                                    <a onclick="createNewAgenda()">+ Tambah List Agenda</a>
                                </div>
                            </div>
                            <div class="uk-from-controls" id="createAgenda">
                                <div id='newAgenda0' class="uk-margin-small" uk-grid>
                                    <div class="uk-width-5-6">
                                        <input class="uk-input" id="name[0]" name="name[0]" type="text" placeholder="Nama Agenda" required />
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            var createCount = 0;

                            function createNewAgenda() {
                                createCount++;

                                var createAgenda    = document.getElementById("createAgenda");

                                var gridNewAgenda   = document.createElement('div');
                                gridNewAgenda.setAttribute('id', 'newAgenda' + createCount);
                                gridNewAgenda.setAttribute('class', 'uk-margin-small');
                                gridNewAgenda.setAttribute('uk-grid', '');

                                var createName  = document.createElement('div');
                                createName.setAttribute('id', 'newName' + createCount);
                                createName.setAttribute('class', 'uk-width-5-6');

                                var createNameInput = document.createElement('input');
                                createNameInput.setAttribute('type', 'text');
                                createNameInput.setAttribute('class', 'uk-input');
                                createNameInput.setAttribute('required', '');
                                createNameInput.setAttribute('placeholder', 'Nama Agenda');
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
                                gridNewAgenda.appendChild(createName);
                                createRemove.appendChild(createRemoveButton);
                                gridNewAgenda.appendChild(createRemove);
                                createAgenda.appendChild(gridNewAgenda);
                            };

                            function createRemove(i) {
                                var createRemoveElement = document.getElementById('newAgenda' + i);
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
        
        <!-- Pagination Top -->
        <div class="uk-flex uk-flex-right uk-margin">
            <?= $pager->links('editagenda', 'uikit_full') ?>
        </div>

        <!-- Agenda Table -->
        <div class="uk-overflow-auto">
            <table class="uk-table uk-table-striped uk-table-hover">
                <tbody>
                    <?php foreach($agendas as $agenda){ ?>
                        <tr>
                            <td class="uk-table-expand"><?=$agenda['name']?></td>
                            <td class="uk-width-small">
                                <div class="uk-child-width-auto uk-flex-middle uk-grid-row-small uk-grid-column-small uk-text-center" uk-grid>
                                    <div>
                                        <a href="#edit-<?=$agenda['id']?>" uk-toggle class="uk-icon-button" uk-icon="pencil"></a>
                                    </div>
                                    <div>
                                        <a href="#delete-<?=$agenda['id']?>" uk-toggle class="uk-icon-button uk-button-danger" uk-icon="trash"></a>
                                        <!-- <a href="office/agenda/delete-agenda-</?=$agenda['id']?>" class="uk-icon-button uk-button-danger" uk-icon="trash" onclick="return confirm('Anda yakin ingin menghapus Agenda </?=$agenda['name']?>?')"></a> -->
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- Edit Modal -->
                        <div id="edit-<?=$agenda['id']?>" class="uk-flex-top" uk-modal="bg-close:false;">
                            <div class="uk-modal-dialog uk-margin-auto-vertical">
                                <form class="uk-margin uk-form-stacked" action="office/agenda/edit-agenda-<?=$agenda['id']?>" method="post">
                                    <input name="cat_id" type="text" value="<?=$category['id']?>" hidden />
                                    <div class="uk-modal-body">
                                        <?= csrf_field() ?>
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="name-<?=$agenda['id']?>">Nama Agenda</label>
                                            <div class="uk-from-controls">
                                                <input class="uk-input" id="name-<?=$agenda['id']?>" name="name" type="text" placeholder="Nama Agenda" value="<?=$agenda['name']?>" />
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

                        <!-- Delete Modal -->
                        <div id="delete-<?=$agenda['id']?>" class="uk-flex-top" uk-modal="bg-close:false;">
                            <div class="uk-modal-dialog uk-margin-auto-vertical">
                                <div class="uk-modal-body">
                                    <div class="uk-modal-title uk-text-center">Anda yakin akan menghapus<br/><b><?=$agenda['name']?></b>?</div>
                                </div>
                                <div class="uk-modal-footer">
                                    <div class="uk-child-width-auto uk-grid-small uk-flex-center" uk-grid>
                                        <div>
                                            <form class="uk-margin uk-form-stacked" action="office/agenda/delete-agenda" method="post">
                                                <?= csrf_field() ?>
                                                <input id="agenda-id" name="agenda-id" value="<?=$agenda['id']?>" hidden required />
                                                <button class="uk-button uk-button-secondary" type="submit">Ya</button>
                                            </form>
                                        </div>
                                        <div><a class="uk-button uk-button-danger uk-modal-close">Tidak</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>

            <!-- Pagination Agenda -->
            <div class="uk-container uk-container-xlarge uk-margin-top">
                <?= $pager->links('editagenda', 'uikit_full') ?>
            </div>
        </div>

        <!-- Pagination Bottom -->
        <div class="uk-flex uk-flex-right uk-margin">
            <?= $pager->links('editagenda', 'uikit_full') ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>