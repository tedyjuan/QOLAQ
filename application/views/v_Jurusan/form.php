<link href="<?= base_url() ?>public/common-assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>public/Parsley.js-2.9.2/dist/parsley.min.js"></script>
<script src="<?= base_url() ?>public/Parsley.js-2.9.2/dist/i18n/id.js"></script>
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

    <div class="widget-content widget-content-area br-6">
        <button type='button' id="kembali" class="btn btn-outline-primary mb-2 ml-3 float-right" onclick="kembali(this)"><i class="las la-arrow-left"></i> Back</button>
        <h5><?= $title ?></h5>
        <hr>
        <form id="formdata" data-parsley-validate>
            <div class="widget-content widget-content-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-12">
                            <div class="form-group">
                                <label for="Lembaga">Lembaga <code>*</code></label>
                                <select class="form-control " parsley-type="text" name="Lembaga" id="Lembaga" data-parsley-required="true" data-parsley-errors-container=".err_Lembaga" required=''>
                                    <option value="">- Pilih Lembaga -</option>
                                    <?php foreach ($Lembaga as $row) : ?>
                                        <option value="<?= $row->id_Lembaga ?>"><?= $row->kode_lembaga ?> - <?= $row->nm_Lembaga ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="err_Lembaga"></span>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <div class="form-group">
                                <label for="kd_jurusan">Kode Jurusan <code>*</code></label>
                                <input type="text" class="form-control" id="kd_jurusan" name="kd_jurusan" placeholder="Name kd_jurusan" data-parsley-required="true" data-parsley-errors-container=".err_kd_jurusan" required=''>
                                <span class="err_kd_jurusan"></span>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12">
                            <div class="form-group">
                                <label for="jurusan">Jurusan <code>*</code></label>
                                <input type="text" class="form-control" id="Jurusan" name="Jurusan" placeholder="Name Jurusan" data-parsley-required="true" data-parsley-errors-container=".err_jurusan" required=''>
                                <span class="err_jurusan"></span>
                            </div>
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
            successClass: 'is-valid',
            errorClass: 'is-invalid',
            errorsContainer: function(el) {
                return el.$element.closest('.row');
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
                        Lembaga: $('#Lembaga').val(),
                        Jurusan: $('#Jurusan').val(),
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
                            $(".err_Lembaga").html(data.err_Lembaga).fadeIn("slow");
                            document.getElementById("Lembaga").classList.remove('input-success');
                            document.getElementById("Lembaga").classList.add('input-error');
                            gagalsave();
                        }
                    },
                    complete: function() {
                        $("#preloading").fadeOut('slow');
                    },
                });
            }
        });
    });

    function kembali(elem) {
        var urlindex = "<?= $url_index ?>";
        load_form(urlindex);
    }
</script>
<script src="<?= base_url() ?>public/common-assets/plugins/select2/select2.min.js"></script>
<script src="<?= base_url() ?>public/demo-1/ltr/assets/js/forms/custom-select2.js"></script>