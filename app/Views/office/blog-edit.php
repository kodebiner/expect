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
        
        <!-- Edit Blog -->
        <form class="uk-margin uk-form-stacked" action="office/blog/edit/<?=$blog['id']?>" method="post">
            <div class="uk-child-width-auto uk-flex-between" uk-grid>
                <div>
                    <h1 class="uk-h3 uk-heading-bullet uk-margin-remove">Formulir Perubahan Artikel <?= $blog['title'] ?></h1>
                </div>
                <div class="uk-navbar-right">
                    <div class="uk-child-width-auto uk-grid-small uk-flex-center" uk-grid>
                        <div><a class="uk-button uk-button-default" href="#preview" uk-toggle>Preview</a></div>
                        <div><button class="uk-button uk-button-secondary" type="submit">Simpan</button></div>
                    </div>
                </div>
            </div>
            <?= csrf_field() ?>
            <div class="uk-margin">
                <label class="uk-form-label" for="featured">Featured</label>
                <label class="switch uk-margin-small-left">
                    <?php if ($blog['featured'] == '1') { ?>
                        <input id="featured" name="featured" type="checkbox" checked>
                    <?php } else { ?>
                        <input id="featured" name="featured" type="checkbox">
                    <?php } ?>
                    <span class="slider round"></span>
                </label>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="highlight">Highlight</label>
                <label class="switch uk-margin-small-left">
                    <?php if ($blog['highlight'] == '1') { ?>
                        <input id="highlight" name="highlight" type="checkbox" checked>
                    <?php } else { ?>
                        <input id="highlight" name="highlight" type="checkbox">
                    <?php } ?>
                    <span class="slider round"></span>
                </label>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="title">Judul Artikel</label>
                <div class="uk-from-controls">
                    <input class="uk-input" id="title" name="title" type="text" placeholder="Judul Artikel" value="<?=$blog['title']?>" onchange="preview()" required />
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="description">Deskripsi</label>
                <div class="uk-from-controls">
                    <input class="uk-input" id="description" name="description" type="text" placeholder="Deskripsi" value="<?=$blog['description']?>" required/>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Konten</label>
                <div class="uk-form-controls">
                    <textarea name="content" id="file-picker" placeholder="Masukkan Konten.." onchange="preview()"><?= $blog['content'] ?></textarea>
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
                <label class="uk-form-label" for="new-images">Foto Sampul</label>
                <div class="uk-from-controls">
                    <div class="edit-upload uk-placeholder uk-text-center">
                        <span uk-icon="icon:move; ratio:2;"></span><br/>
                        <span class="uk-text-middle">Tarik dan lepas file di sini atau</span>
                        <div uk-form-custom>
                            <input type="file" multiple>
                            <span class="uk-link">pilih satu</span>
                        </div>
                        <br/>
                        <span>Maks 500kb</span>
                    </div>
                    <progress id="edit-progressbar" class="uk-progress" value="0" max="100" hidden></progress>
                    <input id="images" name="images" value="<?=$blog['images']?>" hidden onchange="preview()" required />
                    <div id="images-container" class="uk-height-small uk-flex uk-flex-middle uk-flex-center">
                        <img src="images/blog/<?=$blog['images']?>" style="max-height:100%; max-width:100%;" />
                    </div>
                    <script>
                        var bar = document.getElementById('edit-progressbar');
                        UIkit.upload('.edit-upload', {
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

                                $('#previewimage').attr('src', 'images/blog/'+filename);
                                $('#previewimage').attr('width', '300');
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
        </form>
    </div>

    <!-- Preview Modal -->
    <div class="uk-modal-full" id="preview" uk-modal="bg-close:false;">
        <div class="uk-modal-dialog" uk-height-viewport>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title">Preview Ubah Artikel <?=$blog['title']?></h2>
                <button class="uk-modal-close-default" type="button" uk-close></button>
            </div>

            <div class="uk-modal-body">
                <article class="uk-section-muted uk-inverse-dark uk-section" uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-fade; delay: false;">
                    <div class="uk-container">
                        <div class="uk-width-1-1 uk-margin" uk-scrollspy-class>
                            <picture class="uk-width-1-1">
                                <img id="previewimage" class="uk-width-1-1" src="images/blog/<?=$blog['images']?>" alt="" />
                            </picture>
                        </div>
                        <div class="uk-margin-large uk-container uk-container-xsmall">
                            <h1 class="uk-margin uk-text-center" id="previewtitle" uk-scrollspy-class><?=$blog['title']?></h1>
                            <div class="uk-panel uk-margin" id="previewfulltext" uk-scrollspy-class><?=$blog['content']?></div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <script>
        function preview(inst) {
            var title           = $('#title').val();
            // var description     = $('#ringkasan').val();
            // var introtext       = $('#pendahuluan').val();
            var fulltext        = $('#file-picker').val();

            $('#previewtitle').html(title);
            // $('#previewintrotext').html(introtext);
            $('#previewfulltext').html(tinyMCE.activeEditor.getContent());
        };
    </script>
</section>
<?= $this->endSection() ?>