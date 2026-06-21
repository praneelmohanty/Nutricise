document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("changePWForm")
    .addEventListener("submit", function (event) {
      let currentPassword = document.getElementById("currentPassword").value;
      let newPassword = document.getElementById("newPassword").value;
      let confirmPassword = document.getElementById("confirmPassword").value;
      let errorMessage = document.getElementById("error-message");
      
      if (newPassword !== confirmPassword) {
        errorMessage.textContent = "New passwords do not match!";
        errorMessage.style.display = "block";
        event.preventDefault();
      }
    });
});

function togglePassword(inputId, eyeId) {
  let inputField = document.getElementById(inputId);
  let eyeIcon = document.getElementById(eyeId);

  if (inputField.type === "password") {
    inputField.type = "text";
    eyeIcon.classList.replace("bx-hide", "bx-show-alt"); 
  } else {
    inputField.type = "password";
    eyeIcon.classList.replace("bx-show-alt", "bx-hide"); 
  }
}

