let loginForm = document.querySelector('#login-form');
if (loginForm !== null) {
    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault()

        let errors = {}
        let inputs = Array.from(e.target)
        inputs.forEach((input) => {
            if (input.type != 'submit') {
                if (input.value == '') {
                    errors[input.id] = input.value;
                }
            }
        })
        if (Object.keys(errors).length !== 0) {
            for (const errorKey in errors) {
                // todo add error message for every input that have error
            }
        }
        let response = await (await fetch('/auth/login', {
            method: "POST",
            body: JSON.stringify({[inputs[0].name]: inputs[0].value, [inputs[1].name]: inputs[1].value})
        })).json()

        if (response.status === 'ok') {
            window.location.replace('/')
        } else {
            // todo add errors
        }
    })
}


let registerForm = document.querySelector('#register-form');
if (registerForm !== null) {
    registerForm.addEventListener('submit', async (e) => {
        e.preventDefault()

        let errors = {}
        let inputs = Array.from(e.target)
        inputs.forEach((input) => {
            if (input.type != 'submit') {
                if (input.value == '') {
                    errors[input.id] = input.value;
                }
            }
        })
        if (Object.keys(errors).length !== 0) {
            for (const errorKey in errors) {
                // todo add error message for every input that have error
            }
        }
        let response = await (await fetch('/auth/register', {
            method: "POST",
            body: JSON.stringify({[inputs[0].name]: inputs[0].value, [inputs[1].name]: inputs[1].value})
        })).json()

        if (response.status === 'ok') {
            window.location.replace('/')
        } else {
            // todo add errors
        }
    })
}


let noteCreateForm = document.querySelector('#note-create');
if (noteCreateForm !== null) {
    noteCreateForm.addEventListener('submit', async (e) => {
        e.preventDefault()

        let errors = {}
        let inputs = Array.from(e.target)
        inputs.forEach((input) => {
            if (input.type != 'submit') {
                if (input.value == '') {
                    errors[input.id] = input.value;
                }
            }
        })
        if (Object.keys(errors).length !== 0) {
            for (const errorKey in errors) {
                // todo add error message for every input that have error
            }
        }

        console.log(inputs)
        let response = await (await fetch('/note/new/create', {
            method: "POST",
            body: JSON.stringify({[inputs[0].name]: inputs[0].value, [inputs[1].name]: inputs[1].value})
        })).json()
        console.log(response)
        if (response.status === 'ok') {
            window.location.replace('/')
        } else {
            // todo add errors
        }
    })
}