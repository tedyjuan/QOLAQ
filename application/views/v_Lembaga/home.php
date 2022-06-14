<link rel="stylesheet" href="<?= base_url() ?>public/demo-1/DataTables/datatables.min.css">
<script src="<?= base_url() ?>public/demo-1/DataTables/datatables.min.js"></script>
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="widget-content widget-content-area br-6">
        <h5 class="table-header"><?= $title ?></h5>
        <hr>
        <button type='button' class="btn  btn-primary mb-2 ml-3" onclick="adddata()"><i class="la la-pencil"></i> Create</button>
        <div class="table-responsive mb-2">
            <div id="basic-dt_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="myTable" class="table table-hover table-bordered dataTable " style="width: 100%;" role="grid" aria-describedby="basic-dt_info">
                            <thead>
                                <tr role="row">
                                    <th>No</th>
                                    <th>kode lembaga</th>
                                    <th>Nama lembaga</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-sm">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    /* start datatable */
    $(document).ready(function() {
        var handleDataTableButtons = function() {
            if ($("#myTable").length) {
                var t = $("#myTable").DataTable({
                    "columnDefs": [{
                        "searchable": false,
                        "orderable": false,
                        "targets": [0]
                    }],
                    'order': [
                        [1, 'asc']
                    ],
                    fixedHeader: true,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: false,
                    processing: true,
                    lengthMenu: [
                        [10, 25, 50, -1],
                        ['10 rows', '25 rows', '50 rows', 'Show all']
                    ],
                    responsive: true,
                    "ajax": {
                        "url": '<?php echo $url_grid; ?>',
                        "nm_Lembaga": 'POST', //untuk cekdata
                    },
                    "columns": [{
                            "data": 'incmt',
                            defaultContent: '', //penomoran
                            "width": "30px",
                            "sClass": "text-center",
                        },
                        {
                            "data": "kode_lembaga"
                        },
                        {
                            "data": "nm_Lembaga"
                        },
                        {
                            "data": "id_Lembaga",
                            "width": "100px",
                            "sClass": "text-center",
                            "bSortable": false,
                            "mRender": function(data, type, row) {
                                var btn = ``;
                                btn = btn + `<div class='btn-group text-center' role='group'>`;
                                btn = btn + `<button onclick='ParamFunc.editdata("` + row.id_Lembaga + `")' class='btn  btn-primary' type='button'><i class='la la-edit'></i></button>`;
                                btn = btn + `<button onClick='ParamFunc.deletedata("` + row.id_Lembaga + `")' class='btn  btn-danger tombolhapus' type='button'><i class='la la-trash'></i></button>`;
                                btn = btn + `</div>`;
                                return btn;
                            }
                        }
                    ]
                });
                // start membuat loop numbering 
                t.on('order.dt search.dt', function() {
                    t.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                        t.cell(cell).invalidate('dom');
                    });
                }).draw();
                // end membuat loop numbering 
            }
        };
        TableManageButtons = function() {
            "use strict";
            return {
                init: function() {
                    handleDataTableButtons();
                }
            };
        }();
        TableManageButtons.init();

    });
    /* end datatable */
    // ==================
    /*start edit, delete  function */
    var ParamFunc = {
        editdata: function(id) {
            load_form('<?= $url_edit; ?>' + '/' + id, 'Edit Data');
        },
        deletedata: function(id) {
            Swal.fire({
                title: 'Apa Anda Yakin?',
                text: "Data Hapus Permanen!",
                type: 'question',
                padding: '2em',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Iya, Hapus!',
                reverseButtons: true,

            }).then((result) => {
                if (result.value) {
                    var urlindex = '<?php echo $url_index ?>';
                    $.ajax({
                        url: '<?php echo $url_delete ?>',
                        type: "post",
                        dataType: "json",
                        cache: false,
                        data: {
                            id: id,
                        },
                        success: function(data) {
                            load_form(urlindex, "delete"); //load ke index c_agama
                            berhasilhapus();
                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    swal.fire(
                        'Batal',
                        'Data Batal di Hapus',
                        'info'
                    );
                }
            });
        }
    }
    /*end edit, delete  function */

    function adddata() {
        load_form('<?= $url_add; ?>', 'Add Data');
    }
</script>