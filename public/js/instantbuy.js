var currentTabBuy = 0; // Current tab is set to be the first tab (0)
showTabBuy(currentTabBuy); // Display the crurrent tab

function showTabBuy(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tabBuy");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtnBuy").style.display = "none";
  } else {
    document.getElementById("prevBtnBuy").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtnBuy").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtnBuy").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicatorBuy(n)
}

function nextPrevBuy(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tabBuy");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateFormBuy()) return false;
  // Hide the current tab:
  x[currentTabBuy].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTabBuy = currentTabBuy + n;
  // if you have reached the end of the form...
  if (currentTabBuy >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regFormBuy").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTabBuy(currentTabBuy);
}

function validateFormBuy() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tabBuy");
  y = x[currentTabBuy].getElementsByTagName("inputBuy");
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
    document.getElementsByClassName("stepBuy")[currentTabBuy].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicatorBuy(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("stepBuy");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}