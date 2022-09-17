$(document).ready( function () 
{
    $('#table-category').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            'url': urlDT,
            'type': 'GET',
            'beforeSend': function (request) {
                request.setRequestHeader("Authorization", 'Bearer ' + token);
            },
            'dataSrc': function (response) {
                return response.data;
            }
        },
        "columnDefs": [
            {
                "targets": 0,
                "name": null,
                "render": function (data, type, row) {
                    return row.id
                }
            },
            {
                "targets": 1,
                "name": null,
                "render": function (data, type, row) {
                    return row.name
                }
            },
            {
                "targets": 2,
                "name": null,
                "render": function (data, type, row) {
                    return '<a href="kategori/' + row.id + '" class="btn btn-success me-2">Edit</a>' +
                        '<a href="kategori/' + row.id + '" class="btn btn-danger remove-item">Hapus</a>'
                }
            }
        ]
    });
        
    $('#table-category').on('click', '.remove-item', function (event) {
        var categoryId = $(this).data('id');
        var url = $(this).attr('href');
        event.preventDefault();
        if (confirm('Apakah anda yakin ingin menghapus kategori ini?')) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer ' + token
                }
            });
            $.ajax({
                url: url,
                type: "DELETE",
                success: function (response) {
                    $('.alert-success').addClass('d-none');
                    $('#table-category').DataTable().ajax.reload(null, false);
                    $('#delete-alert').removeClass('d-none');
                }
            });
        }
    });
    
});