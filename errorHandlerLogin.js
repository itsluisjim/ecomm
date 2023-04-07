const systemID = document.querySelector("#systemID");
const password = document.querySelector("#password");
const inputs = document.querySelectorAll("input");
const submitBtn = document.querySelector("#submitBtn");
const forgotPassword = document.querySelector("#forgotPassword");


forgotPassword.addEventListener("click", (e) => notDoneYet(e));

function notDoneYet(e){
  alert('This functionality does not work yet. It will be left for future implementation.');
}

window.addEventListener("keyup", enableSubmit);

// Adds and event listener of type onChange to every input
// and an event is passed down to a function to he able to target
// each input
inputs.forEach((input) => {
  input.addEventListener("change", (e) => emptyInputHandler(e));
});

systemID.addEventListener("change", (e) => invalidSystemID(e));

function emptyInputHandler(e) {
  if (e.target.value == "") {
    e.target.classList.add("error");
  } else {
    if (e.target.classList.contains("error")) {
      e.target.classList.remove("error");
    }
  }
}

function invalidSystemID(e) {
  const eval = /[^0-9]/g.test(e.target.value);
  if (e.target.value.length == 8 && !eval) {
    if (e.target.classList.contains("error")) {
      e.target.classList.remove("error");
    }
  } else {
    e.target.classList.add("error");
  }
}

function enableSubmit() {
  if (systemID.value !== "" && password.value !== "" && systemID.value.length == 8 && /[^0-9]/g.test(systemID.value) !== true) {
    submitBtn.style.backgroundColor = "#003882";
    submitBtn.disabled = false;
    submitBtn.style.cursor = "pointer";

  } else if (systemID.value !== "" || password.value !== "" || systemID.value.length <= 7 || /[^0-9]/g.test(systemID.value) !== false) {
    submitBtn.style.backgroundColor = "#CCC";
    submitBtn.disabled = true;
    submitBtn.style.cursor = "not-allowed";
  }
}