<script src="<?= base_url() ?>public/Parsley.js-2.9.2/dist/parsley.min.js"></script>
<script src="<?= base_url() ?>public/Parsley.js-2.9.2/dist/i18n/id.js"></script>
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <button type='button' id="kembali" class="btn btn-outline-primary mb-2 ml-3 float-right" onclick="kembali(this)"><i class="las la-arrow-left"></i> Back</button>
        <h5><?= $title ?></h5>
        <hr>
        <form id="formdata" data-parsley-validate>
            <div class="widget-content widget-content-area">
                <div class="form-group">
                    <label for="kode_lembaga">kode_lembaga <code>*</code></label>
                    <input type="text" onkeyup='ulang(this)' class="form-control col-8 " parsley-type="text" id="kode_lembaga" name="kode_lembaga" placeholder="name kode_lembaga" required="">
                    <div class='text-danger err_kode_lembaga ml-2'></div>
                </div>
                <div class="form-group">
                    <label for="Lembaga">Nama Lembaga <code>*</code></label>
                    <input type="text" onkeyup='ulang(this)' class="form-control col-8 " parsley-type="text" id="Lembaga" name="Lembaga" placeholder="name Lembaga" required="">
                    <div class='text-danger err_Lembaga ml-2'></div>
                </div>
                <button type="submit" class="btn btn-primary mr-2"><i class="la la-save"></i> Save</button>
                <button type="reset" class="btn btn-outline-primary"><i class="las la-undo-alt"></i> Reset</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
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
                        Lembaga: $('#Lembaga').val(),
                        kode_lembaga: $('#kode_lembaga').val(),
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