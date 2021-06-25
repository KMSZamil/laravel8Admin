
function ConfirmDelete() {
    var result = confirm("Want to delete?");
    if (result) {
    alert(result);
    return true;
} else {
    return false;
}
}


function myDeleteFunction() {
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        padding: '2em'
    }).then(function(result) {
        if (result) {
            swal(
                'Deleted!',
                'success'
            )
        }
    })
}
