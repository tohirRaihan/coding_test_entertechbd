// Increase the order quantity
const increase = (event) => {
    const quantityInput = event.target
        .closest('div')
        .querySelector('.quantity');
    const quantity = parseInt(quantityInput.value);
    const newQuantity = quantity + 1;
    quantityInput.value = newQuantity;
};

// Decrease the order quantity
const decrease = (event) => {
    const quantityInput = event.target
        .closest('div')
        .querySelector('.quantity');
    const quantity = parseInt(quantityInput.value);
    if (quantity > 0) {
        const newQuantity = quantity - 1;
        quantityInput.value = newQuantity;
    }
};

const buyProduct = (event, id) => {
    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you really want to purchase this product?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, purchase it!'
    }).then((result) => {
        if (result.isConfirmed) {
            console.log(id);
            const productId = id;
            const orderQuantity = event.target
                .closest('div')
                .querySelector('.quantity').value;
            const data = { productId, orderQuantity };
            fetch('data/orders/new_order.php', {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-type': 'application/json' // sent request
                }
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.status === 'success') {
                        Swal.fire(
                            'Purchased!',
                            data.successMessage,
                            'success'
                        );
                    } else if (data.status === 'userNotLoggedIn') {
                        window.location = data.url;
                    } else if (data.status === 'failure') {
                        Swal.fire(
                            'Failed!',
                            data.failureMessage,
                            'error'
                        );
                    }
                })
                .catch((error) =>
                    Swal.fire('Something went wrong', '', 'warning')
                );
        }
    });
};

// create a new product
const newProduct = (event) => {
    event.preventDefault();
    console.log('new product');
    const name = document.getElementById('name').value;
    const unitPrice = document.getElementById('unit_price').value;
    const location = document.getElementById('location').value;
    const data = {name, unitPrice, location};
    console.log(data);

    // // hiding the modal
    // const truck_modal = document.querySelector('#new-product');
    // const modal = bootstrap.Modal.getInstance(truck_modal);
    // modal.hide();
}
