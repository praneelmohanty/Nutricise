document.addEventListener("DOMContentLoaded", function () {
  fetch("../Php/Credentials.php")
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("userDetails").innerHTML = data;
    })
    .catch((error) => {
      console.error("Error fetching data:", error);
      document.getElementById("userDetails").innerHTML =
        "<p>Error loading data.</p>";
    });

  document.addEventListener("click", function (event) {
    if (event.target.classList.contains("togglePassword")) {
      let passwordField = event.target.previousElementSibling;
      if (passwordField.type === "password") {
        passwordField.type = "text";
        event.target.classList.replace("bx-hide", "bx-show");
      } else {
        passwordField.type = "password";
        event.target.classList.replace("bx-show", "bx-hide");
      }
    }
  });
});

