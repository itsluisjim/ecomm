const firstName = document.querySelector("#firstName");
const lastName = document.querySelector("#lastName");
const email = document.querySelector("#email");
const systemID = document.querySelector("#systemID");
const password = document.querySelector("#password");
const confirmPassword = document.querySelector("#passwordConfirm");
const inputs = document.querySelectorAll("input");
const submitBtn = document.querySelector("#submitBtn");

window.addEventListener("keyup", enableSubmit);

inputs.forEach((input) => {
  input.addEventListener("change", (e) => emptyInputHandler(e));
});

firstName.addEventListener("keyup", (e) => invalidName(e));
lastName.addEventListener("keyup", (e) => invalidName(e));
email.addEventListener("change", (e) => invalidEmail(e));
systemID.addEventListener("change", (e) => invalidSystemID(e));
password.addEventListener("keyup", (e) => passwordValidate(e));
window.addEventListener("keyup", () => passwordMatch());

function invalidName(e) {
  const letterOnly = /[^A-Z]/gi.test(e.target.value);

  if (!letterOnly) {
    if (e.target.classList.contains("error")) {
      e.target.classList.remove("error");
    }
  } else {
    e.target.classList.add("error");
  }
}

//if empty add dispaly error class
function emptyInputHandler(e) {
  if (e.target.value == "") {
    e.target.classList.add("error");
  } else {
    if (e.target.classList.contains("error")) {
      e.target.classList.remove("error");
    }
  }
}

// Validate email
function invalidEmail(e) {
  //^ Matches the beginning of the string
  // [ ] Matches any character in the set
  // \w matches any alphanumeric and _
  // . matches a period
  // - matches a dash
  // + matches any 1 or more of the prev set -> []+

  // @ matches the at sign
  // () matches a group
  // my\. matches the word my.
  // ? matches if at least 1 or 0 occurance exists
  // untdallas\. matches the domain
  // edu$ matches the end of the string
  const regEx = /^[\w.-]+@(my\.)?untdallas\.edu$/i;

  if (regEx.test(e.target.value)) {
    if (e.target.classList.contains("error")) {
      e.target.classList.remove("error");
    }
  } else {
    e.target.classList.add("error");
  }
}
// Validate email
function invalidSystemID(e) {
  const exceptionLetter = /[^0-9]/g.test(e.target.value);

  if (e.target.value.length == 8 && !exceptionLetter) {
    if (e.target.classList.contains("error")) {
      e.target.classList.remove("error");
    }
  } else {
    e.target.classList.add("error");
  }
  // if we wish to prevent letter or sym from being inputted.
  // if(!((/^[0-9]*$/).test(e.target.value))){
  //   e.target.value = e.target.value.replace(/[^0-9]/g, '');
  // }
}

//Password Match Check
function passwordValidate(e) {
  let eval = true;
  let password = e.target.value;

  if (password.length <= 8) {
    eval = false;
  }
  if (!/[a-z]/.test(password)) {
    eval = false;
  }
  if (!/[A-Z]/i.test(password)) {
    eval = false;
  }
  if (!/[0-9]/.test(password)) {
    eval = false;
  }
  if (!/[!@#$&]/.test(password)) {
    eval = false;
  }

  if (eval == false) {
    e.target.style.border = "2px solid red";
  } else {
    e.target.style.border = "2px solid green";
  }
}

function passwordMatch() {
  if(confirmPassword.value === password.value && confirmPassword.value.length > 8 && password.value.length > 8){
    password.style.border = "2px solid green";
    confirmPassword.style.border = "2px solid green";

  } else if(confirmPassword.value !== password.value && confirmPassword.value != "" && password.value != "") {
    password.style.border = "2px solid red";
    confirmPassword.style.border = "2px solid red";
  }
}

function enableSubmit() {
  if (
    firstName.value !== "" &&
    lastName.value !== "" &&
    email.value !== "" &&
    systemID.value !== "" &&
    password.value.length >= 8 &&
    confirmPassword.value !== "" &&
    /^[\w.-]+@(my\.)?untdallas\.edu$/i.test(email.value) &&
    systemID.value.length == 8 &&
    password.value == confirmPassword.value &&

    /[a-z]/.test(password.value) && 
    /[A-Z]/i.test(password.value) &&
    /[0-9]/.test(password.value) &&
    /[!@#$&]/.test(password.value) &&


    /[^0-9]/g.test(systemID.value) !== true &&
    /[^A-Z]/gi.test(firstName.value) !== true &&
    /[^A-Z]/gi.test(lastName.value) !== true
  ) {
    submitBtn.style.backgroundColor = "#003882";
    submitBtn.disabled = false;
    submitBtn.style.cursor = "pointer";
  } else if (
    firstName.value == "" ||
    lastName.value == "" ||
    email.value == "" ||
    systemID.value == "" ||
    password.value == "" ||
    confirmPassword.value == "" ||
    !/^[\w.-]+@(my\.)?untdallas\.edu$/i.test(email.value) ||
    systemID.value.length < 8 ||
    password !== confirmPassword ||
    /[^0-9]/g.test(systemID.value) !== false ||
    /[^A-Z]/gi.test(firstName.value) !== false ||
    /[^A-Z]/gi.test(lastName.value) !== false
  ) {
    submitBtn.style.backgroundColor = "#CCC";
    submitBtn.disabled = true;
    submitBtn.style.cursor = "not-allowed";
  }
}
