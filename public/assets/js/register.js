const register = (event) => {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    const data = { name, email, password };
    console.log(data);

    if (password === confirmPassword) {
        fetch('../data/users/register.php', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-type': 'application/json' // sent request
            }
        })
            .then((res) => res.json())
            .then((data) => {
                console.log(data);
                if (data.status === 'user_exist') {
                    Swal.fire(
                        'Error!',
                        'User already registered! Please login!',
                        'warning'
                    );
                } else if (data.status === 'success') {
                    window.location = data.url;
                } else {
                    Swal.fire('Error!', 'Some info is missing', 'warning');
                }
            })
            .catch((error) => Swal.fire('Something went wrong', '', 'error'));
    } else {
        Swal.fire("Password doesn't match", '', 'warning');
    }
};
