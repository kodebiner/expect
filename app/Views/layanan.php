<?= $this->extend('layout') ?>

<?= $this->section('main') ?>
    <style>
        #page\#0 .el-image {
            max-width: 48vw;
        }
        #page\#1 .el-image {
            max-width: 43vw;
        }
    </style>
    <section class="uk-section-muted uk-inverse-dark uk-section uk-section-xlarge uk-padding-remove-bottom" uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-fade; delay: false;">
        <div class="uk-container">
            <div class="uk-grid tm-grid-expand uk-child-width-1-1 uk-grid-margin">
                <div class="uk-grid-item-match uk-width-1-1@m">
                    <div class="uk-panel uk-width-1-1">
                        <div class="uk-position-absolute uk-width-1-1 uk-text-left" id="page#0" uk-parallax="y: 0,-9vh; easing: 0.5" style="right: 33vw; top: -15vh; z-index: 0; transform: translateY(-1.25185vh); will-change: transform;">
                            <img src="/images/resources-hero-left.svg" width="630" height="540" class="el-image" loading="eager" />
                        </div>
                        <h1 class="uk-heading-large uk-font-primary uk-position-relative uk-text-center uk-scrollspy-inview" style="z-index: 3;" uk-scrollspy-class>
                            Layanan Pelatihan<br/>Expect
                        </h1>
                        <div class="uk-position-absolute uk-width-1-1 uk-text-right" id="page#1" uk-parallax="y: 4vh,-10vh; easing: 0.5" style="right: -30vw; bottom: -30vh; z-index: 0; transform: translateY(2.69129vh); will-change: transform;">
                            <img src="/images/resources-hero-right.svg" width="650" height="670" class="el-image" loading="eager" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="uk-section-muted uk-inverse-dark" uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-slide-bottom-small; delay: false;">
        <div data-src="/images/bottom-bg.svg" uk-img class="uk-background-norepeat uk-background-contain uk-background-bottom-left uk-section uk-section-large" uk-parallax="bgx: -120,-120; bgy: 420,120; easing: 0.5">
            <div class="uk-container">
                <p>Bidang-bidang pelatihan dalam <b><i>Training</i></b> yang dapat dilaksanakan, <b><i>Public & InHouse</i></b> Training meliputi bidang Banking & Insurance; Technical & Engineering; Health Safety & Security; Electrical,Instrument & Telecomunication; Human Resources; Financial, Budgeting, Tax, Law, Legal; Logistic, Supplychain, Purchasin, Procurement & Transportation; Soft Skill; IT ; <b><i>Pra Purnabakti dan Sertifikasi</i></b>.</p>
                <p><b><i>Event Organizer</i></b> seperti Gathering: <b><i>MICE (Meeting, Incentive, Convention, and Exhibition); Outbound, Family Gathering, Creative Concept, Outing, Gala Dinner; Study Banding, Meeting Internal Perusahaan, Rakormas, Raker, dll</i></b>.</p>
                <p>Kami dari Expect selalu memperbarui konsep, ide agar pelatihan dan Mice tidak hanya itu-itu saja atau monoton. Selalu menghadirkan hal – hal baru yang penuh Kreatif & Inovatif dan selalu menyesuaikan dengan perkembangan tehnologi saat ini.</p>
                <p>Pelaksanaan pelatihan sebagian besar dilaksanakan di Yogyakarta, dan juga kota-kota besar lainnya seperti Jakarta, Bandung, Bali, Surabaya, Malang, Lombok,dll. (Dan tempat pelatihan dapat menyesuaikan kebutuhan Perusahaan)</p>
                <div class="uk-padding">
                    <div id="inhouse" class="uk-margin-large uk-card uk-card-primary uk-child-width-1-2@s" uk-grid uk-scroll>
                        <div class="uk-card-media-left uk-cover-container">
                            <img src="images/LayananIH.JPG" alt="Pelatihan Inhouse" uk-cover>
                            <canvas class="uk-width-1-1 uk-height-1-1"></canvas>
                        </div>
                        <div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title uk-margin-remove-bottom">Pelatihan Inhouse</h3>
                                <div class="uk-margin uk-margin-remove-top uk-text-meta">Online / Offline</div>
                                <p>Program pelatihan ini dibuat khusus dengan dasar kontrak kerja dengan perusahaan pengguna jasa inhouse. Pelaksanaan pelatihan di lokasi perusahaan atau di tempat yang ditunjuk oleh perusahaan yang bersangkutan dengan pesertanya hanya dari perusahaan tersebut. Waktu pelaksanaan dan judul pelatihan sesuai dengan permintaan perusahaan.</p>
                            </div>
                        </div>
                    </div>
                    <div id="public" class="uk-margin-large uk-card uk-card-secondary uk-child-width-1-2@s" uk-grid uk-scroll>
                        <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
                            <img src="images/LayananPub.jpg" alt="Pelatihan Public" uk-cover>
                            <canvas class="uk-width-1-1 uk-height-1-1"></canvas>
                        </div>
                        <div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title uk-margin-remove-bottom">Pelatihan Public</h3>
                                <div class="uk-margin uk-margin-remove-top uk-text-meta">Online / Offline</div>
                                <p>Program ini dilaksanakan di kota-kota besar sesuai dengan penawaran yang diajukan (Yogyakarta, Surabaya, Malang, Bandung, Bali,dll) dengan menggunakan fasilitas ruang ber AC atau ruang pertemuan hotel bintang 3, 4 dan 5. Waktu pelaksanaan 2 - 3 hari, dan juga berdasarkan permintaan dari perusahaan. Tidak menutup kemungkinan kami juga menerima permintaan judul pelatihan yang tidak tercantum dalam Schedule Pelatihan EXPECT JOGJA.</p>
                            </div>
                        </div>
                    </div>
                    <div id="outbound" class="uk-margin-large uk-card uk-card-primary uk-child-width-1-2@s" uk-grid uk-scroll>
                        <div class="uk-card-media-left uk-cover-container">
                            <img src="images/LayananTB.jpeg" alt="Gathering & Outbound" uk-cover>
                            <canvas class="uk-width-1-1 uk-height-1-1"></canvas>
                        </div>
                        <div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title">Gathering & Outbound</h3>
                                <p>Program ini menyesuaikan Kebutuhan Perusahaan (By Request). Kami membuatkan konsep acara dan menyesuaikan tema dari perusahaan dan Goals yang akan dicapai.</p>
                            </div>
                        </div>
                    </div>
                    <div id="purnabakti" class="uk-margin-large uk-card uk-card-secondary uk-child-width-1-2@s" uk-grid uk-scroll>
                        <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
                            <img src="images/LayananPurna.JPG" alt="Pelatihan Pra Purnabakti Bisnis & Kewirausahaan" uk-cover>
                            <canvas class="uk-width-1-1 uk-height-1-1"></canvas>
                        </div>
                        <div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title">Pelatihan Pra Purnabakti Bisnis & Kewirausahaan</h3>
                                <p>Program ini menyesuaikan Kebutuhan Perusahaan (By Request). Kami membuat konsep yang mana pelatihan ditujukan kepada para karyawan yang akan memasuki masa pensiun, beberapa bekal yang nanti bisa di aplikasikan pada waktu pensiun. Konsep mengabungkan sesi presentasi dikelas, sharing & kunjungan bisnis lapangan langsung bertemu sang Owner/Pemilik dan entertainment agar para peserta tidak merasa bosan dan tetap nyaman selama mengikuti pelatihan.</p>
                            </div>
                        </div>
                    </div>
                    <div id="bnsp" class="uk-margin-large uk-card uk-card-primary uk-child-width-1-2@s" uk-grid uk-scroll>
                        <div class="uk-card-media-left uk-cover-container">
                            <img src="images/LayananBNSP.jpeg" alt="Sertifikasi BNSP" uk-cover>
                            <canvas class="uk-width-1-1 uk-height-1-1"></canvas>
                        </div>
                        <div>
                            <div class="uk-card-body">
                                <h3 class="uk-card-title">Serifikasi BNSP</h3>
                                <p>Program ini dapat dilaksanakan secara In House atau Public. Sertifikasi profesi sangat penting karena memberikan bukti formal bahwa seseorang memiliki kompetensi dalam bidang tertentu. Dan sangat berguna bagi perusahaan dan organisasi yang mencari tenaga kerja yang kompeten, karena sertifikasi ini menjamin bahwa seseorang yang diakui memiliki kompetensi yang dibutuhkan.</p>
                                <p>Kami memberikan Refreshment (Pelatihan) sebelum para peserta melaksanakan Uji Kompetensi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="uk-section uk-section-secondary">
        <div class="uk-container">
            <h2 class="uk-heading-bullet uk-margin-large-bottom" uk-scrollspy-class>Agenda Expect</h2>
            <div class="uk-margin" uk-accordion>
                <?php foreach ($agendas as $agenda) { ?>
                    <li>
                        <a class="uk-accordion-title" href><?=$agenda['name'];?></a>
                        <div class="uk-accordion-content">
                            <table class="uk-table uk-table-divider uk-table-hover">
                                <tbody>
                                    <?php foreach ($agenda['list'] as $list) { ?>
                                        <tr><td><?=$list;?></td></tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </li>
                <?php } ?>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>