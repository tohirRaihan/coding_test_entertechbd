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
                    }
                })
                .catch((error) =>
                    Swal.fire('Something went wrong', '', 'warning')
                );
        }
    });
};
