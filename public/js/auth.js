
const password = document.getElementById('password');
const icon = document.querySelector('.show-password i');

    icon.addEventListener('click', function() {
        if (password.type == "password") {
            password.type = "text"
            icon.classList.remove('fa-eye')
            icon.classList.add('fa-eye-slash')
        } else {
            password.type = "password"
            icon.classList.add('fa-eye')
            icon.classList.remove('fa-eye-slash')
        }
    })

    const confPassword = document.getElementById('password-confirm');
    const confIcon = document.querySelector('.show-confirm-password i');
    
        confIcon.addEventListener('click', function() {
            if (confPassword.type == "password") {
                confPassword.type = "text"
                confIcon.classList.remove('fa-eye')
                confIcon.classList.add('fa-eye-slash')
            } else {
                confPassword.type = "password"
                confIcon.classList.add('fa-eye')
                confIcon.classList.remove('fa-eye-slash')
            }
        })
