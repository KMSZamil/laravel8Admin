
function ConfirmDelete() {
    if(confirm("Want to delete?")) {
    return true;
    } else {
        return false;
    }
}

function deleteConfirmation(url,id,redirecturl) {
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
            //console.log(CSRF_TOKEN); return false;
            $.ajax({
                type: 'POST',
                url: url + "/" + id,
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                success: function (results) {

                    if (results.success === true) {
                        swal("Successfully deleted", results.message, "success").then(function() {
                            window.location = redirecturl;
                        });
                    } else {
                        swal("Error!", results.message, "error");
                    }
                }
            });
        } else {
            e.dismiss;
        }
    })
}



