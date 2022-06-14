<script src="<?= base_url() ?>public/Parsley.js-2.9.2/dist/parsley.min.js"></script>
<script src="<?= base_url() ?>public/Parsley.js-2.9.2/dist/i18n/id.js"></script>
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <button type='button' id="kembali" class="btn btn-outline-primary mb-2 ml-3 float-right" onclick="kembali(this)"><i class="las la-arrow-left"></i> Back</button>
        <h5><?= $title ?></h5>
        <hr>
        <form id="formdata" data-parsley-validate>
            <div class="widget-content widget-content-area">
                <?php foreach ($editdata as $row) : ?>
                    <div class="form-group">
                        <label for="category">Category <code>*</code></label>
                        <input type="hidden" value="<?= $row->id_category ?>" id="id_category" name="id_category">
                        <input type="text" class="form-control col-8" value="<?= $row->nm_category ?>" parsley-type="text" id="category" name="category" placeholder="name category" required="">
                        <div class='text-danger err_category ml-2'></div>
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-primary mr-2"><i class="la la-save"></i> Update</button>
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
                var urlpost = "<?= $url_postedit ?>";
                var urlindex = "<?= $url_index ?>";
                $.ajax({
                    url: urlpost,
                    method: "POST",
                    dataType: "json",
                    data: {
                        id_category: $('#id_category').val(),
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
    });
</script>