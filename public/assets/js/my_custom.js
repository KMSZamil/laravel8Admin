function myFunction() {
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        padding: '2em'
    }).then(function(result) {
        if (result.value) {
            swal(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
}
