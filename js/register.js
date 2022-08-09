
// REGISTER
const form = document.querySelector(".form");
const continueBtn = form.querySelector(".button");
const errorTxt = document.querySelector("#error-txt");
const message = form.querySelector(".message");

form.onsubmit = (e) => {
  // preventing form from submiting
  e.preventDefault();
};

continueBtn.onclick = () => {
  // ajax
  let xhr = new XMLHttpRequest(); // creating XML object
  xhr.open("POST", "php/signup.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == "success") {
          location.href = "login.php";
        } else {
          message.textContent = data;
          errorTxt.style.display = "block";
        }
      }
    }
  };
  // mengirim data dari form melalui ajax ke php
  let formData = new FormData(form); // creating new formData object
  xhr.send(formData); // mengirim data form ke php
};
