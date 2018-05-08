var currentTabSell = 0; // Current tab is set to be the first tab (0)
showTabSell(currentTabSell); // Display the crurrent tab

function showTabSell(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tabSell");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtnSell").style.display = "none";
  } else {
    document.getElementById("prevBtnSell").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtnSell").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtnSell").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicatorSell(n)
}

function nextPrevSell(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tabSell");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateFormSell()) return false;
  // Hide the current tab:
  x[currentTabSell].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTabSell = currentTabSell + n;
  // if you have reached the end of the form...
  if (currentTabSell >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regFormSell").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTabSell(currentTabSell);
}

function validateFormSell() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tabSell");
  y = x[currentTabSell].getElementsByTagName("inputSell");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("stepSell")[currentTabSell].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicatorSell(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("stepSell");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}