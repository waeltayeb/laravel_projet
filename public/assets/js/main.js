/**
* Template Name: WeBuild
* Updated: Jan 09 2024 with Bootstrap v5.3.2
* Template URL: https://bootstrapmade.com/free-bootstrap-coming-soon-template-countdwon/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Countdown timer
   */

  let countdown = select('.countdown');

  const countDownDate = function() {
    let timeleft = new Date(countdown.getAttribute('data-count')).getTime() - new Date().getTime();

    let weeks = Math.floor(timeleft / (1000 * 60 * 60 * 24 * 7));
    let days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
    let hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

    let output = countdown.getAttribute('data-template');
    output = output.replace('%w', weeks).replace('%d', days).replace('%h', hours).replace('%m', minutes).replace('%s', seconds);
    countdown.innerHTML = output;
  }
  countDownDate();
  setInterval(countDownDate, 1000);

})()

function validatePasswordOnKeyPress() {
  // Get the values from the password fields
  var password = document.getElementById('password').value;
  var confirmPassword = document.getElementById('confirm_password').value;

  // Check if the values match
  if (password !== confirmPassword) {
      // Display an error message or perform any other action
      document.getElementById('passwordMismatchError').style.display = 'block';
  } else {
      // Passwords match, hide the error message
      document.getElementById('passwordMismatchError').style.display = 'none';
  }
}
function validateEmailOnKeyPress() {
  // Get the values from the input fields
  var email = document.getElementById('email').value;
  var confirmEmail = document.getElementById('confirm_email').value;

  // Check if the values match
  if (email !== confirmEmail) {
      // Display an error message or perform any other action
      document.getElementById('emailMismatchError').style.display = 'block';
  } else {
      // Emails match, hide the error message
      document.getElementById('emailMismatchError').style.display = 'none';
  }
}

