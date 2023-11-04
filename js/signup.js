//Validation form register and register user local storage
const inputUsernameRegister = document.querySelector(".input-signup-username");
const inputPasswordRegister = document.querySelector(".input-signup-password");
const btnRegister = document.querySelector(".signup_signInButton");
//Validation form register and register user local storage
btnRegister.addEventListener("click", (e){
    e.preventDefault();
    if (
        inputUsernameRegister.value === "" ||
        inputPasswordRegister.value === ""
    ) {
    alert("Vui lòng không để trống");
    } else{
        //Array user
        const user = {
            username: inputUsernameRegister.value,
            password: inputPasswordRegister.value,
        };
        let json = JSON.stringify(user);
        localStorage.setItem(inputUsernameRegister.value, json);
        alert("Đăng Ký Thành Công");
        window.location.href = "login.html";
    }
});

