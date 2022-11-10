const loginForm = document.querySelector("#login-form");

loginForm.onsubmit = (e) => {
  e.preventDefault();

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/todoApp/php/user/Login.inc.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.responseText;
        if (data === "User Login Successfully") {
          alert(data);
          window.location.href = "index.php";
        } else {
          alert(data);
        }
      } else {
        console.error("error");
      }
    }
  };
  let formData = new FormData(loginForm);
  xhr.send(formData);
};
