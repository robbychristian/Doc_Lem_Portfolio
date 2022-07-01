/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/chatbot.js ***!
  \*********************************/
//CHAT bot
var chatStatus = true;
$("#chatbot-btn").click(function () {
  if (chatStatus == true) {
    $("#chat-bot").removeClass("hidden");
    chatStatus = !chatStatus;
  } else {
    $("#chat-bot").addClass("hidden");
    chatStatus = !chatStatus;
  }
});
var trigger = [//0
["what are your work experiences"], //1
["what certifications have you accumulated"]];
var reply = [//0
["He has experience working across and communicating with a variety of Information Systems audiences (e.g. business and technical resources) from requirements gathering through design, build, test and deployment to operations. Able to take complex, technical information and translate it both verbally and in diagrammatic form in a clear, concise, and professional manner. Able to understand business requirements and convert them into solution options and designs."], //1
["My certifications are as follows: <br> <span class='font-bold ml-3'>(1)</span> Accredited Project Manager Certification™ <br> <span class='font-bold ml-3'>(2)</span> Scrum Master Accredited Certification™ <br> <span class='font-bold ml-3'>(3)</span> Certified International Software Testing Qualifications Board <br> <span class='font-bold ml-3'>(4)</span> Certified Six Sigma Black Belt"]];
var alternative = ["Ask another question."];
var robot = ["How do you do, fellow human", "I am not a bot"];

var compare = function compare(triggerArray, replyArray, text) {
  var item;

  for (var i = 0; i < triggerArray.length; i++) {
    for (var j = 0; j < replyArray.length; j++) {
      if (triggerArray[i][j] == text) {
        items = replyArray[i];
        item = items[Math.floor(Math.random() * items.length)];
      }
    }
  }

  return item;
};

var output = function output(input) {
  var product;
  var text = input.toLowerCase().replace(/[^\w\s\d]/gi, "");
  text = text.replace(/ a /g, " ").replace(/i feel /g, "").replace(/whats/g, "what is").replace(/please /g, "").replace(/ please/g, "");

  if (compare(trigger, reply, text)) {
    product = compare(trigger, reply, text);
  } else if (text.match(/robot/gi)) {
    product = robot[Math.floor(Math.random() * robot.length)];
  } else {
    product = alternative[Math.floor(Math.random() * alternative.length)];
  } //   addChat(input, product);


  document.getElementById("botReply").innerHTML = product;
};

document.addEventListener("DOMContentLoaded", function () {
  var inputField = document.getElementById("chatInput");
  document.querySelector("#chatInput").addEventListener("keydown", function (e) {
    if (e.code === "Enter") {
      var input = inputField.value;
      document.getElementById("userReply").innerHTML = input;
      output(input);
    }
  });
});
$("#question1").on("click", function () {
  var input = $("#question1").html();
  $("#userReply").text(input);
  output(input);
});
$("#question2").on("click", function () {
  var input = $("#question2").html();
  $("#userReply").text(input);
  output(input);
});
/******/ })()
;