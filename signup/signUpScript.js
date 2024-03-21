        let pass1;
        let pass2;
        let btn = document.getElementById("sub-btn");
        btn.onclick = function () {
            //get form
            let form = document.getElementById("Signup");
            pass1 = form.password;
            pass2 = form.password2;
            pass2.setCustomValidity('');
            //display password message
            if (pass1.value !== pass2.value) {
                pass2.setCustomValidity('Passwords do not match.');
                pass2.reportValidity();
            };
        }