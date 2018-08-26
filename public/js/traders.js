$(document).ready(function () {
    ////----- Open the modal to CREATE a link -----////
    $('#btn-add').click(function (e) {
        e.preventDefault();
        $('#btn-save').val("add");
        $('#modalFormData').trigger("reset");
        $('#traderEditorModal').modal('show');
    });

    ////----- Open the modal to UPDATE a link -----////
    $('body').on('click', '.open-modal', function (e) {
        e.preventDefault();
        var trader_id = $(this).val();
        $.get('/users/trader/' + trader_id, function (data) {
            $('#trader_id').val(data.id);
            $('#traderName').val(data.name);
            $('#traderStreet').val(data.street);
            $('#traderZip').val(data.zip);
            $('#traderCity').val(data.city);
            $('#btn-save').val("update");
            $('#traderEditorModal').modal('show');
        })
    });

    // Clicking the save button on the open modal for both CREATE and UPDATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            name: $('#traderName').val(),
            street: $('#traderStreet').val(),
            zip: $('#traderZip').val(),
            city: $('#traderCity').val(),
        };
        var state = $('#btn-save').val();
        var type = "POST";
        var trader_id = $('#trader_id').val();
        var ajaxurl = '/users/trader/';
        if (state == "update") {
            type = "PUT";
            ajaxurl = '/users/trader/' + trader_id;
        }
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log('Data:', data);
                var trader = '<tr id="trader' + data.id + '"><td>' + data.name + '</td><td>' + data.street + '</td>';
                trader += '<td><button class="btn btn-info open-modal" value="' + data.id + '">Bearbeiten</button> ';
                trader += '<button class="btn btn-danger delete-link" value="' + data.id + '">Löschen</button></td></tr>';
                if (state == "add") {
                    $('#traders-list').append(trader);
                } else {
                    $("#trader" + data.id).replaceWith(trader);
                }
                $('#modalFormData').trigger("reset");
                $('#traderEditorModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    ////----- DELETE a link and remove from the page -----////
    $('.delete-link').click(function (e) {
        e.preventDefault();
        var trader_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: '/users/trader/' + trader_id,
            success: function (data) {
                console.log(data);
                $("#trader" + trader_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});
