$(document).ready( function () {
    $('#table-product').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            'url': urlDT,
            'type': 'GET',
            'dataSrc': function (response) {
                return response.data;
            }
        },
        "columnDefs": [
            {
                "targets": 0,
                "name": null,
                "render": function (data, type, row) {
                    return row.sku
                }
            },
            {
                "targets": 1,
                "name": null,
                "render": function (data, type, row) {
                    return '<img src="' + row.detail.image + '" class="img w-25 h-25 border rounded">'
                }
            },
            {
                "targets": 2,
                "name": null,
                "render": function (data, type, row) {
                    return row.name
                }
            },
            {
                "targets": 3,
                "name": null,
                "render": function (data, type, row) {
                    return row.category.name
                }
            },
            {
                "targets": 4,
                "name": null,
                "render": function (data, type, row) {
                    return row.detail.price
                }
            },
            {
                "targets": 5,
                "name": null,
                "render": function (data, type, row) {
                    return '<a href="produk/' + row.id + '" class="btn btn-success me-2">Edit</a>' +
                        '<a href="produk/' + row.id + '" class="btn btn-danger remove-item">Hapus</a>'
                }
            }
        ]
    });
        
    $('#table-product').on('click', '.remove-item', function (event) {
        var productId = $(this).data('id');
        var url = $(this).attr('href');
        event.preventDefault();
        if (confirm('Apakah anda yakin ingin menghapus kategori ini?')) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: "DELETE",
                success: function (response) {
                    $('.alert-success').addClass('d-none');
                    $('#table-product').DataTable().ajax.reload(null, false);
                    $('#delete-alert').removeClass('d-none');
                }
            });
        }
    });
} );