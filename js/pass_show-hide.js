// pass show / hide
// from input password
var passField = document.getElementById("pass");
var toggleBtn = document.getElementById("btn-eye");

toggleBtn.onclick = () => {
  if (passField.type == "password") {
    passField.type = "text";
    toggleBtn.classList.add("active");
  } else {
    passField.type = "password";
    toggleBtn.classList.remove("active");
  }
};