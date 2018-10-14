// Developer Ethan Houley
// Master.js
// This file is used to store all javascript and ajax requests.

// Hide sign up section
window.onload = function() {
  liveChatUpdated();
  setInterval(liveChatUpdated, 10000);
}

function changeBetweenSignUpAndSignIn() {
  var signUpForm = document.getElementById("signUp");
  var signInForm = document.getElementById("signIn");
  if (signUpForm.style.display === "none") {
    signUpForm.style.display = "block";
    signInForm.style.display = "none";
  } else {
    signUpForm.style.display = "none";
    signInForm.style.display = "block";
  }
}

function liveChatUpdated() {
  var reqURL = "ws.php?messageGet=true";
  var request = $.ajax({
    url: reqURL,
    method: "GET",
    dataType: "json",
    success: function(res) {
      renderLiveChat(res);
      console.log('Res')
    },
    error: function(err) {
      console.log('err');
      console.log(err);
    }
  });
}

function renderLiveChat(MessageFromDB) {
  console.log('test');
  console.table(MessageFromDB);
  outHTML = '';
  for (var loop = 0; loop < MessageFromDB.length; loop++) {
    outHTML += '<div class="RenderMessages">';
    outHTML += '<span>' + MessageFromDB[loop].username + ' ' + '</span>';
    outHTML += '<span>' + MessageFromDB[loop].message + ' ' + '</span>';
    outHTML += '<span>' + MessageFromDB[loop].timestamp + ' ' + '</span>';
    outHTML += '</div>';
  }
  document.getElementById('liveChat').innerHTML = outHTML;
}

function sendMessage() {
  // var  = document.getElementById("messageTextBox").value;
  // console.log(x);
  $.ajax({
    url: 'ws.php?messagePost=post',
    type: 'POST',
    data: $("#messageBox").serialize(),
    error: function(err) {
      console.log('Broken');
      console.log(err);
    },
    success: function(result) {
      console.log('pass');
      console.log(result);
      document.getElementById('messageTextBox').value = '';
    }
  });
  liveChatUpdated();
}