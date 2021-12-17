const buyProduct = (id) => {
// console.log(id);
    // const confirmBuy = confirm('do you want to buy?');
    // console.log(confirmBuy);
    // if (confirmBuy) {
    //     console.log(id);
    // }
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
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
