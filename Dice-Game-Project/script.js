"use strict";

// document.querySelector(".message").textContent = "👏 Correct Number!";
// console.log(document.querySelector(".message").textContent);

// document.querySelector(".number").textContent = 13;
// document.querySelector(".score").textContent = score;

// console.log(document.querySelector(".guess").value);

// document.querySelector(".number").textContent = secretNumber;
// adding functionality of try again button

document.querySelector(".try-btn").addEventListener("click", function () {
  score = 20;
  document.querySelector(".message").textContent = "Start guessing...";
  document.querySelector(".score").textContent = 20;
  document.querySelector("body").style.backgroundColor = "darkslategray";
  secretNumber = Math.trunc(Math.random() * 20) + 1;
  document.querySelector(".number").textContent = "?";
  document.querySelector(".guess").textContent = "";
});
// game logic
let secretNumber = Math.trunc(Math.random() * 20) + 1;

let score = 20;
let highScore = 0;
document.querySelector(".check-btn").addEventListener("click", function () {
  const guess = Number(document.querySelector(".guess").value);
  console.log(guess);
  if (!guess) {
    document.querySelector(".message").textContent = "😒 No number!";
  } else {
    if (score > 0 && guess === secretNumber) {
      console.log(
        (document.querySelector(".message").textContent = "👏 Correct Number!"),
        (document.querySelector("body").style.backgroundColor = "#60b347"),
        (document.querySelector(".number").textContent = secretNumber)
      );
      // (document.querySelector(".number").textContent = number)
      if (score > highScore) {
        highScore = score;
        document.querySelector(".highscore").textContent = highScore;
      }
    } else if (score > 0 && guess > secretNumber) {
      console.log(
        (document.querySelector(".message").textContent = "🙆 Too high!")
      );
      score--;
      document.querySelector(".score").textContent = score;
    } else if (score > 0 && guess < secretNumber) {
      console.log(
        (document.querySelector(".message").textContent = "🙆 Too low!")
      );
      score--;
      document.querySelector(".score").textContent = score;
    } else if (score === 0) {
      console.log(
        (document.querySelector(".message").textContent = "🤦 You lose!"),
        (document.querySelector("body").style.backgroundColor = "#ff726f")
      );
    }
  }
});
