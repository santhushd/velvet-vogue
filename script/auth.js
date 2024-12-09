document.addEventListener("DOMContentLoaded", () => {
  const urlParams = new URLSearchParams(window.location.search);
  const registerParam = urlParams.get("register");

  if (registerParam !== null) {
    document.getElementById("authImage").classList.add("register-image");
    document.getElementById("authImage").classList.remove("login-image");
    document.getElementById("divAuthLogin").style.display = "none";
    document.getElementById("divAuthRegister").style.display = "block";
  } else {
    document.getElementById("authImage").classList.add("login-image");
    document.getElementById("authImage").classList.remove("register-image");
    document.getElementById("divAuthLogin").style.display = "block";
    document.getElementById("divAuthRegister").style.display = "none";
  }
});
