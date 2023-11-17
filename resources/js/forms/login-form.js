window.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('login-form');

    form.addEventListener('submit', (event) => {

        event.preventDefault();

        let email = form.querySelector('[name="email"]').value;
        let password = form.querySelector('[name="password"]').value;

        let loginUrl = form.getAttribute('action');

        let params = new URLSearchParams();
        params.set('email', email);
        params.set('password', password);

        let result = formSubmit(loginUrl, params);

        if (result.token) {
            window.location.href = ''
        }

        alert(result.message);
    });
});

async function formSubmit(loginUrl, params) {
    let response = await fetch(loginUrl, {
        headers: {
            'Accept': 'application/json',
        },
        method: 'post',
        body: params
    });

    return response.json();
}
