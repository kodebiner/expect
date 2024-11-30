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
<section class="uk-section uk-section-small">
    <div class="uk-container uk-container-expand">
        <!-- Alert -->
        <?= view('Views/auth/_message_block') ?>

        <!-- Title -->
        <div class="uk-child-width-auto uk-flex-between" uk-grid>
            <div>
                <h1 class="uk-h3 uk-heading-bullet uk-margin-remove"><?=$title;?></h1>
            </div>
            <div>
                <a class="uk-button uk-button-secondary" href="#new-blog" uk-toggle>Tambah Artikel</a>
            </div>
        </div>

        <!-- New Blog Modal -->
        <div id="new-blog" class="uk-modal-container" uk-modal="bg-close:false;">
            <div class="uk-modal-dialog uk-margin-auto-vertical">
                <form class="uk-margin uk-form-stacked" action="office/blog/new" method="post">
                    <div class="uk-modal-body">
                        <?= csrf_field() ?>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="featured">Featured</label>
                            <label class="switch uk-margin-small-left">
                                <input id="featured" name="featured" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="highlight">Highlight</label>
                            <label class="switch uk-margin-small-left">
                                <input id="highlight" name="highlight" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="title">Judul Artikel</label>
                            <div class="uk-from-controls">
                                <input class="uk-input" id="title" name="title" type="text" placeholder="Judul Artikel" required/>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="description">Deskripsi</label>
                            <div class="uk-from-controls">
                                <input class="uk-input" id="description" name="description" type="text" placeholder="Deskripsi" required/>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label">Konten</label>
                            <div class="uk-form-controls">
                                <textarea name="content" id="file-picker" placeholder="Masukkan Konten.." onchange="preview()"></textarea>
                            </div>
                        </div>

                        <script>
                            tinymce.init({
                                selector:                   'textarea#file-picker',
                                plugins:                    ' link code table lists wordcount image searchreplace fullscreen autolink help',
                                toolbar:                    ['undo redo | styles bold italic underline strikethrough subscript superscript | backcolor forecolor | table link image | alignleft aligncenter alignright alignjustify | numlist bullist | lineheight | indent outdent | searchreplace fullscreen help code'],
                                link_default_target:        '_blank',
                                link_default_protocol:      'https',
                                image_title:                false,
                                automatic_uploads:          true,
                                file_picker_types:          'image',
                                setup:                      (ed) => {
                                                                ed.on('change', (e) => {
                                                                    preview();
                                                                })
                                                            },
                                file_picker_callback:       (cb, value, meta) => {
                                                                const input = document.createElement('input');
                                                                input.setAttribute('type', 'file');
                                                                input.setAttribute('accept', 'images/blog/tinymce/*');

                                                                input.addEventListener('change', (e) => {
                                                                const file = e.target.files[0];

                                                                const reader = new FileReader();
                                                                reader.addEventListener('load', () => {
                                                                    /*
                                                                    Note: Now we need to register the blob in TinyMCEs image blob
                                                                    registry. In the next release this part hopefully won't be
                                                                    necessary, as we are looking to handle it internally.
                                                                    */
                                                                    const id = 'blobid' + (new Date()).getTime();
                                                                    const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                                                                    const base64 = reader.result.split(',')[1];
                                                                    const blobInfo = blobCache.create(id, file, base64);
                                                                    blobCache.add(blobInfo);

                                                                    /* call the callback and populate the Title field with the file name */
                                                                    cb(blobInfo.blobUri(), { title: file.name });
                                                                });
                                                                reader.readAsDataURL(file);
                                                                });

                                                                input.click();
                                                            },

                            });
                        </script>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="images">Foto Sampul</label>
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
                                <input id="images" name="images" required hidden />
                                <div id="images-container" class="uk-height-small uk-flex uk-flex-middle uk-flex-center"></div>
                                <script>
                                    var bar = document.getElementById('new-progressbar');
                                    UIkit.upload('.new-upload', {
                                        url: 'office/blog/upload',
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
                                            var imagecontainer = document.getElementById("images-container");

                                            imagecontainer.innerHTML = '';
                                            document.getElementById("images").value = filename;

                                            var image = document.createElement('img');
                                            image.setAttribute('src', 'images/blog/'+filename);
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
                            <div><a class="uk-button uk-button-default" href="#preview" uk-toggle>Preview</a></div>
                            <div><button class="uk-button uk-button-secondary" type="submit">Simpan</button></div>
                            <div><a class="uk-button uk-button-danger uk-modal-close">Batal</a></div>
                        </div>
                    </div>
                </form>
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
                        <div class="uk-card-footer">
                            <div class="uk-child-width-auto uk-flex-center" uk-grid>
                                <div>
                                    <a href="#edit-<?=$blog['id']?>" uk-toggle class="uk-icon-button" uk-icon="pencil"></a>
                                </div>
                                <div>
                                    <a href="#delete-<?=$blog['id']?>" uk-toggle class="uk-icon-button uk-button-danger" uk-icon="trash"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div id="edit-<?=$blog['id']?>" class="uk-flex-top" uk-modal="bg-close:false;">
                        <div class="uk-modal-dialog uk-margin-auto-vertical">
                            <form class="uk-margin uk-form-stacked" action="office/blog/edit/<?=$blog['id']?>" method="post">
                                <div class="uk-modal-body">
                                    <?= csrf_field() ?>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="featured-<?=$blog['id']?>">Featured</label>
                                        <label class="switch uk-margin-small-left">
                                            <?php if ($blog['featured'] == '1') { ?>
                                                <input id="featured-<?=$blog['id']?>" name="featured" type="checkbox" checked>
                                            <?php } else { ?>
                                                <input id="featured-<?=$blog['id']?>" name="featured" type="checkbox">
                                            <?php } ?>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>

                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="highlight-<?=$blog['id']?>">Highlight</label>
                                        <label class="switch uk-margin-small-left">
                                            <?php if ($blog['highlight'] == '1') { ?>
                                                <input id="highlight-<?=$blog['id']?>" name="highlight" type="checkbox" checked>
                                            <?php } else { ?>
                                                <input id="highlight-<?=$blog['id']?>" name="highlight" type="checkbox">
                                            <?php } ?>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>

                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="title-<?=$blog['id']?>">Judul Artikel</label>
                                        <div class="uk-from-controls">
                                            <input class="uk-input" id="title-<?=$blog['id']?>" name="title" type="text" placeholder="Judul Artikel" value="<?=$blog['title']?>" required />
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="description-<?=$blog['id']?>">Deskripsi</label>
                                        <div class="uk-from-controls">
                                            <input class="uk-input" id="description-<?=$blog['id']?>" name="description" type="text" placeholder="Deskripsi" value="<?=$blog['description']?>" required/>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <label class="uk-form-label">Konten</label>
                                        <div class="uk-form-controls">
                                            <textarea name="content" id="file-picker-<?=$blog['id']?>" placeholder="Masukkan Konten.." onchange="preview()"><?= $blog['content'] ?></textarea>
                                        </div>
                                    </div>

                                    <script>
                                        tinymce.init({
                                            selector:                   'textarea#file-picker-<?=$blog['id']?>',
                                            plugins:                    ' link code table lists wordcount image searchreplace fullscreen autolink help',
                                            toolbar:                    ['undo redo | styles bold italic underline strikethrough subscript superscript | backcolor forecolor | table link image | alignleft aligncenter alignright alignjustify | numlist bullist | lineheight | indent outdent | searchreplace fullscreen help code'],
                                            link_default_target:        '_blank',
                                            link_default_protocol:      'https',
                                            image_title:                false,
                                            automatic_uploads:          true,
                                            file_picker_types:          'image',
                                            setup:                      (ed) => {
                                                                            ed.on('change', (e) => {
                                                                                preview();
                                                                            })
                                                                        },
                                            file_picker_callback:       (cb, value, meta) => {
                                                                            const input = document.createElement('input');
                                                                            input.setAttribute('type', 'file');
                                                                            input.setAttribute('accept', 'images/blog/tinymce/*');

                                                                            input.addEventListener('change', (e) => {
                                                                            const file = e.target.files[0];

                                                                            const reader = new FileReader();
                                                                            reader.addEventListener('load', () => {
                                                                                /*
                                                                                Note: Now we need to register the blob in TinyMCEs image blob
                                                                                registry. In the next release this part hopefully won't be
                                                                                necessary, as we are looking to handle it internally.
                                                                                */
                                                                                const id = 'blobid' + (new Date()).getTime();
                                                                                const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                                                                                const base64 = reader.result.split(',')[1];
                                                                                const blobInfo = blobCache.create(id, file, base64);
                                                                                blobCache.add(blobInfo);

                                                                                /* call the callback and populate the Title field with the file name */
                                                                                cb(blobInfo.blobUri(), { title: file.name });
                                                                            });
                                                                            reader.readAsDataURL(file);
                                                                            });

                                                                            input.click();
                                                                        },

                                        });
                                    </script>

                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="new-images-<?=$blog['id']?>">Foto Sampul</label>
                                        <div class="uk-from-controls">
                                            <div class="edit-upload-<?=$blog['id']?> uk-placeholder uk-text-center">
                                                <span uk-icon="icon:move; ratio:2;"></span><br/>
                                                <span class="uk-text-middle">Tarik dan lepas file di sini atau</span>
                                                <div uk-form-custom>
                                                    <input type="file" multiple>
                                                    <span class="uk-link">pilih satu</span>
                                                </div>
                                                <br/>
                                                <span>Maks 500kb</span>
                                            </div>
                                            <progress id="edit-progressbar-<?=$blog['id']?>" class="uk-progress" value="0" max="100" hidden></progress>
                                            <input id="images-<?=$blog['id']?>" name="images" value="<?=$blog['images']?>" hidden required />
                                            <div id="images-container-<?=$blog['id']?>" class="uk-height-small uk-flex uk-flex-middle uk-flex-center">
                                                <img src="images/blog/<?=$blog['images']?>" style="max-height:100%; max-width:100%;" />
                                            </div>
                                            <script>
                                                var bar = document.getElementById('edit-progressbar-<?=$blog['id']?>');
                                                UIkit.upload('.edit-upload-<?=$blog['id']?>', {
                                                    url: 'office/blog/upload',
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
                                                        var imagecontainer = document.getElementById("images-container-<?=$blog['id']?>");

                                                        imagecontainer.innerHTML = '';
                                                        document.getElementById("images-<?=$blog['id']?>").value = filename;

                                                        var image = document.createElement('img');
                                                        image.setAttribute('src', 'images/blog/'+filename);
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