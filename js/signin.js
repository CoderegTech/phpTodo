const signinForm = document.querySelector("#signin-form");

signinForm.onsubmit = (e) => {
  e.preventDefault();

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/todoApp/php/user/Register.inc.php", true);
  xhr.responseType = "text";
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "User Registered Successfully") {
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
  let formData = new FormData(signinForm);
  xhr.send(formData);
};
