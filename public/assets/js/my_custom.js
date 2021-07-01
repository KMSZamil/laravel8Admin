
function ConfirmDelete() {
    if(confirm("Want to delete?")) {
    return true;
    } else {
        return false;
    }
}

function deleteConfirmation(url,id,redirect_url) {
    swal({
        title: "Want to delete?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        reverseButtons: false
    }).then(function (e) {
        if (e.value === true) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: url + "/" + id,
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                success: function (results) {
                    //console.log(data); return false;
                    if (results.success === true) {
                        swal("Successfully deleted", results.message, "success").then(function() {
                            window.location = redirect_url;
                        });
                    } else {
                        swal("Error!", results.message, "error");
                    }
                },error: function(e) { console.log(e); }
            });
        } else {
            e.dismiss;
        }
    })
}



