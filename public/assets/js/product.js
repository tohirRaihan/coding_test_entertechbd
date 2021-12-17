
// Increase the order quantity
const increase = (event) => {
    const quantityInput = event.target.closest('div').querySelector('input')
    const quantity = parseInt(quantityInput.value);
    const newQuantity = quantity + 1;
    quantityInput.value = newQuantity;
}

// Decrease the order quantity
const decrease = (event) => {
    const quantityInput = event.target.closest('div').querySelector('input')
    const quantity = parseInt(quantityInput.value);
    if (quantity > 0) {
        const newQuantity = quantity - 1;
        quantityInput.value = newQuantity;
    }
}

const buyProduct = (id) => {
// console.log(id);
    // const confirmBuy = confirm('do you want to buy?');
    // console.log(confirmBuy);
    // if (confirmBuy) {
    //     console.log(id);
    // }
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you really want to purchase this product?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, purchase it!'
      }).then((result) => {
        if (result.isConfirmed) {
        //   Swal.fire(
        //     'Deleted!',
        //     'Your file has been deleted.',
        //     'success'
        //   )
        console.log(id);
        }
      })
}
