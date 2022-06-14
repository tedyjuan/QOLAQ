    <link href="<?= base_url() ?>public/common-assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
    <script src="<?= base_url() ?>public/Parsley.js-2.9.2/dist/parsley.min.js"></script>
    <script src="<?= base_url() ?>public/Parsley.js-2.9.2/dist/i18n/id.js"></script>
    <style>
        hr.new5 {
            border: 1px solid #8585bf;
            border-radius: 5px;
        }
    </style>
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <form id="formdata" data-parsley-validate>

                <div class="widget-content widget-content-area">
                    <h5>(A)Register Akun</h5>
                    <hr class="new5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="username">Username <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="username" name="username" placeholder="Username" data-parsley-error-message="username harus di isi" required="">
                                <div class='text-danger err_username '></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email <code>*</code></label>
                                <input type="email" class="form-control" parsley-type="email" id="email" name="nik" placeholder="Email" required="" data-parsley-error-message="Email harus di isi">
                                <div class='text-danger err_email '></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password"> Password <code>*</code></label>
                                <input type="password" class="form-control" parsley-type="password" id="password" name="password" placeholder="password" required="" data-parsley-error-message="password harus di isi">
                                <div class='text-danger err_password '></div>
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-3">(B)Biodata Peserta didik</h5>
                    <hr class="new5">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nm_lngkap">Nama Lengkap <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="nm_lngkap" name="nm_lngkap" placeholder="Nama Lengkap" data-parsley-error-message="nama lengkap harus di isi" required="">
                                <div class='text-danger err_nm_lngkap '></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nik">NIK <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="nik" name="nik" placeholder="NIK" required="" data-parsley-error-message="NIK harus di isi">
                                <div class='text-danger err_nik '></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nisn"> NISN <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="nisn" name="nisn" placeholder="NISN" required="" data-parsley-error-message="NISN harus di isi">
                                <div class='text-danger err_nisn '></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tmpt_lahir"> Tempat Lahir<code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="tmpt_lahir" name="tmpt_lahir" placeholder="Tempat Lahir" required="" data-parsley-error-message="Tempat Lahir harus di isi">
                                <div class='text-danger err_tmpt_lahir '></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tgl_lahir"> Tanggal Lahir<code>*</code></label>
                                <input type="date" class="form-control" parsley-type="date" id="tgl_lahir" name="tgl_lahir" required="" data-parsley-error-message="Tanggal Lahir harus di isi">
                                <div class='text-danger err_tgl_lahir '></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jml_saudara">Jumlah Saudara<code>*</code></label>
                                <input type="text" class="form-control " parsley-type="text" id="jml_saudara" name="jml_saudara" placeholder="Jumlah saudara" required="">
                                <div class='text-danger err_jml_saudara '></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="anak_ke">Anak Ke <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="anak_ke" name="anak_ke" placeholder="Anak Ke" required="" data-parsley-error-message="Urutan anak harus di isi">
                                <div class='text-danger err_anak_ke '></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group ml-4 col-md-12">
                            <label for="radio-grp"> Jenis Kelamin<code>*</code></label>
                            <div class="custom-radio-1">
                                <label for="rdo-1" class="btn-radio">
                                    <input type="radio" class="form-control" id="rdo-1" name="radio-grp" required="" data-parsley-errors-container=".genderError" data-parsley-error-message="jenis Kelamin harus di isi">
                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                        <circle cx="10" cy="10" r="9"></circle>
                                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                    </svg>
                                    <span>Laki Laki</span>
                                </label>
                                <label for="rdo-2" class="btn-radio">
                                    <input type="radio" class="form-control" id="rdo-2" name="radio-grp">
                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                        <circle cx="10" cy="10" r="9"></circle>
                                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                    </svg>
                                    <span>Perempuan</span>
                                </label>
                            </div>
                        </div>
                        <div class='text-danger genderError '></div>
                    </div>
                    <h5 class="">Alamat Rumah Peserta</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jalan"> Jalan</label>
                                <input type="text" class="form-control" parsley-type="text" id="jalan" name="jalan" placeholder="Nama Jalan" required="" data-parsley-error-message="harus di isi">
                                <div class='text-danger err_jalan '></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="desa"> Desa / Kelurahan <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="desa" name="desa" placeholder="Nama Desa" required="">
                                <div class='text-danger err_desa '></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="rt">RT <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="rt" name="rt" placeholder="NO RT" required="">
                                <div class='text-danger err_rt '></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="rw">RW <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="rw" name="rw" placeholder="NO RW" required="">
                                <div class='text-danger err_rw '></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kec">kec <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="kec" name="kec" placeholder="Nama Kecamatan" required="">
                                <div class='text-danger err_kec '></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kab"> Kabupaten / Kota <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="kab" name="kab" placeholder="Nama Kabupaten" required="">
                                <div class='text-danger err_kab '></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="prov">Provinsi <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="prov" name="prov" placeholder="Nama Provinsi" required="">
                                <div class='text-danger err_prov '></div>
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-3">(C)Identitas Orangtua </h5>
                    <hr class="new5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_kk"> Nomor Kartu Keluarga<code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="no_kk" name="no_kk" placeholder="Nomor Kartu Keluarga" required="">
                                <div class='text-danger err_no_kk '></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pengahasilan_ortu">Penghasilan Orangtua <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="pengahasilan_ortu" name="pengahasilan_ortu" placeholder="Pengahasilan Orangtua" required="">
                                <div class='text-danger err_pengahasilan_ortu '></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nikibu">NIK Ibu<code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="nik_ibu" name="nik_ibu" placeholder="NIK Ibu" required="">
                                <div class='text-danger err_nik_ibu '></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik_ayah">NIK Ayah<code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="nik_ayah" name="nik_ayah" placeholder="NIK Ayah" required="">
                                <div class='text-danger err_nik_ayah '></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nm_ibu">Nama Ibu <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="nm_ibu" name="nm_ibu" placeholder="Nama Ibu" required="">
                                <div class='text-danger err_nm_ibu '></div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pendidikan_ibu">Pendidikan Ibu <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="pendidikan_ibu" name="pendidikan_ibu" placeholder="Pendidikan Ibu" required="">
                                <div class='text-danger err_pendidikan_ibu '></div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pekerjaan_ibu">Pekerjaan Ibu <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Pendidikan Ayah" required="">
                                <div class='text-danger err_pekerjaan_ibu '></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nohp_ibu">No. Hp. Ibu<code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="nohp_ibu" name="nohp_ibu" placeholder="NO Hp Ibu" required="">
                                <div class='text-danger err_nohp_ibu '></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nm_ayah">Nama Ayah <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="nm_ayah" name="nm_ayah" placeholder="Nama Ayah" required="">
                                <div class='text-danger err_nm_ayah '></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pendidikan_ayah">Pendidikan Ayah <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="pendidikan_ayah" name="pendidikan_ayah" placeholder="Pendidikan Ayah" required="">
                                <div class='text-danger err_pendidikan_ayah '></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" required="">
                                <div class='text-danger err_pekerjaan_ayah '></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nohp_ayah">No. Hp. Ayah <code>*</code></label>
                                <input type="text" class="form-control" parsley-type="text" id="nohp_ayah" name="nohp_ayah" placeholder="No HP Ayah" required="">
                                <div class='text-danger err_nohp_ayah '></div>
                            </div>
                        </div>

                    </div>
                    <h5 class="mt-3">(D)Rencana Pendidikan</h5>
                    <hr class="new5">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label>Mondok</label>
                                <div class="radio-inline">
                                    <label class="radio">
                                        <input type="radio" name="radios2" required='' data-parsley-errors-container=".radio_mondok"><span></span>Ya
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="radios2"><span></span>Tidak
                                    </label>
                                </div>
                            </div>
                            <div class='text-danger radio_mondok '></div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jns_daftar">Jenis Pendaftaran<code>*</code></label>
                                <select class="form-control " parsley-type="text" id="jns_daftar" name="jns_daftar" required="">
                                    <option value="">-- Pilih --</option>
                                    <option value="baru">Peserta Baru</option>
                                    <option value="mutasi">Peserta Mutasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="lembaga">Lembaga<code>*</code></label>
                                <select class="form-control " parsley-type="text" id="lembaga" name="lembaga" required="">
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($lembaga as $row) : ?>
                                        <option value="<?= $row->kode_lembaga ?>"><?= $row->kode_lembaga . '-' . $row->nm_Lembaga ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jurusan">Jurusan<code>*</code></label>
                                <select class="form-control " parsley-type="text" id="jurusan" name="jurusan" required="">
                                    <option value="">-- Pilih --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"><i class="la la-save"></i> Save</button>
                    <button type="reset" class="btn btn-outline-primary"><i class="las la-undo-alt"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('select').select2({
                placeholder: '-- pilih --',
                allowClear: true
            });
            $(".row span").removeClass("mb-4");
            $('#formdata').parsley({
                successClass: 'input-success',
                errorClass: 'input-error',
                errorsContainer: function(el) {
                    return el.$element.closest('.form-group');
                },
            });

            $('#formdata').on('submit', function(event) {
                event.preventDefault();
                if ($('#formdata').parsley().isValid()) {
                    var urlpost = "<?= $url_post ?>";
                    var urlindex = "<?= $url_index ?>";
                    $.ajax({
                        url: urlpost,
                        method: "POST",
                        dataType: "json",
                        data: {
                            category: $('#category').val(),
                        },
                        cache: false,
                        beforeSend: function() {
                            $("#preloading").show();
                        },
                        success: function(data) {
                            if (data.hasil == "true") {
                                load_form(urlindex);
                                berhasil();
                            } else {
                                $(".err_category").html(data.err_category).fadeIn("slow");
                                document.getElementById("category").classList.remove('input-success');
                                document.getElementById("category").classList.add('input-error');
                                gagalsave();
                            }
                        },
                        complete: function() {
                            $("#preloading").fadeOut('slow');
                        },
                    });
                }
            });

            $('#lembaga').change(function() {
                var kode_lembaga = $(this).val();
                var myurl = "<?= base_url('Pendaftaran/post_jurusan_byid'); ?>";
                console.log(myurl);
                console.log(kode_lembaga);
                $.ajax({
                    url: myurl,
                    method: "POST",
                    dataType: "json",
                    data: {
                        kode_lembaga: kode_lembaga,
                    },
                    cache: false,
                    beforeSend: function() {
                        $("#preloading").show();
                    },
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].kode_lembaga + '> ' + data[i].kode_jurusan + ' - ' + data[i].nm_Jurusan + '</option>';
                        }
                        $('#jurusan').html(html);
                    },
                    complete: function() {
                        $("#preloading").fadeOut('slow');
                    },
                });
            });
        });

        function kembali(elem) {
            var urlindex = "<?= base_url() ?>";
            load_form(urlindex);
        }
    </script>
    <script src="<?= base_url() ?>public/common-assets/plugins/select2/select2.min.js"></script>
    <script src="<?= base_url() ?>public/demo-1/ltr/assets/js/forms/custom-select2.js"></script>