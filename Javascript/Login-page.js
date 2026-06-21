function myFunction() {
  var x = document.getElementById("myInput");
  var y = document.getElementById("hide1");
  var z = document.getElementById("hide2");

  if (x.type === "password") {
    x.type = "text";
    y.style.display = "inline-block";
    z.style.display = "none";
  } else {
    x.type = "password";
    y.style.display = "none";
    z.style.display = "inline-block";
  }
}
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has("error")) {
  const errorMessage = document.getElementById("error-message");
  errorMessage.style.display = "block";
  errorMessage.textContent = "Username or password is incorrect.";
}

