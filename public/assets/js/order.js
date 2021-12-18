const changeStatus = (event, id) => {
    event.preventDefault();
    const status = event.target.querySelector('.change_status').value;
    const data = { id, status };

    // confirm if you want to update or not
    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you really want to update the order status?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, update it!'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('../data/orders/update_status.php', {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-type': 'application/json' // sent request
                }
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.status === 'success') {
                        window.location.reload();
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Failed!',
                            text: 'Unable to update the status'
                        });
                    }
                })
                .catch((error) =>
                    Swal.fire('Something went wrong', '', 'warning')
                );
        }
    });
};
