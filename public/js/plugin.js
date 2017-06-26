$(document).ready(function(e) {

    /*add names in database*/
    $('form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'store',
            data: $(this).serialize(),
            success: function(data) {
                $('#table').append(
                        "<tr class='" + data.id + "'>" +
                        "<td>" + data.name + "</td>" +
                        "<td><button class='btn btn-info' id='edit' data-id='" + data.id + "' data-name='" + data.name + "'>Edit</button>" +
                        "  <button class='btn btn-danger' id='delete' data-id='" + data.id + "'>Delete</button>" +
                        "</td></tr>"
                        );

                $('#text').val('');
            }
        });
    });

    /*delete row*/
    $(document).on('click', '#delete', function(e) {
        var id = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: '/delete/' + id,
            success: function(data) {
                $('.' + id).remove();
            }
        });
    });

    /*show edite model and get data*/
    $(document).on('click', '#edit', function(e) {
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        $('#fid').val(id);
        $('#fname').val(name);
        $('#myModal').modal('show');
    });
    
    /*save edit */
    $(document).on('click', '#save-edit', function() {
        var id = $('#fid').val();
        var name = $('#fname').val();
        $.ajax({
            type: 'post',
            url: 'edit/',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': id,
                'name': name
            },
            success: function(data) {

                $('.' + data.id).replaceWith(
                        "<tr class='" + data.id + "'>" +
                        "<td>" + data.name + "</td>" +
                        "<td><button class='btn btn-info' id='edit' data-id='" + data.id + "' data-name='" + data.name + "'>Edit</button>" +
                        "  <button class='btn btn-danger' id='delete' data-id='" + data.id + "'>Delete</button>" +
                        "</td></tr>"
                        );
                $('#myModal').modal('hide');
            }
        });
    });

});