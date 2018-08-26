$(document).ready(function() {

    $('#btn-add').click(function(e) {
        e.preventDefault();
        if ($('#productName').val() != '') {
            var property = '<div class="input-group mb-2" id="property-' + count + '">';
            property += '<input type="text" name="productProperty[]" value="' + $('#productName').val() + '" aria-label="Product name" class="form-control">';
            property += '<span class="input-group-btn">';
            property += '<button class="btn btn-danger delete-property" onClick="deleteProperty(' + count + ')"  type="button">-</button>';
            property += '</span>';
            property += '</div>';
            $('#property-list').append(property);
            count = count + 1;
            $('#productName').val('')
        }
    });

    $('.delete-property').click(function(e) {
        deleteProperty($(this).val(), e);
    });
});

function deleteProperty(number, e) {
    console.log(number);
    if (e != undefined)
        e.preventDefault();
    $("#property-" + number).remove();
}