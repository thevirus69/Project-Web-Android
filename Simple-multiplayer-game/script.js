"use strict";
// JS FOR MODAL WINDOW
// selecting element
const modal = document.getElementById("simple-modal");
const modalBtn = document.querySelector(".btn--instructions");
const closeBtn = document.querySelector(".closeBtn");

// responding to open click
modalBtn.addEventListener("click", openModal);
function openModal() {
  modal.style.display = "block";
}

// responding to close click
closeBtn.addEventListener("click", closeModal);
function closeModal() {
  modal.style.display = "none";
}

//responding to outside clicks
window.addEventListener("click", clickOutside);
function clickOutside(e) {
  if (e.target == modal) {
    modal.style.display = "none";
  }
}

//selecting elements

const score0El = document.querySelector("#score--0");
const score1El = document.getElementById("score--1");
const diceEl = document.querySelector(".dice");
const btnNew = document.querySelector(".btn--new");
const btnRoll = document.querySelector(".btn--roll");
const btnHold = document.querySelector(".btn--hold");
const current0El = document.getElementById("current-score--0");
const current1El = document.getElementById("current-score--1");
const player0El = document.querySelector(".player--0");
const player1El = document.querySelector(".player--1");

// //starting values
// let scores = [0, 0];
// score0El.textContent = 0;
// score1El.textContent = 0;
// current0El.textContent = 0;
// current1El.textContent = 0;
// diceEl.classList.add("hidden");
// let currentScore = 0;
// let activePlayer = 0;
// let playing = true;

//initialized value function
let scores, currentScore, activePlayer, playing;
const initValues = function () {
  score0El.textContent = 0;
  score1El.textContent = 0;
  current0El.textContent = 0;
  current1El.textContent = 0;

  scores = [0, 0];
  currentScore = 0;
  activePlayer = 0;
  playing = true;

  player0El.classList.remove(".player--winner");
  player1El.classList.remove(".player--winner");
  player0El.classList.add(".player--active");
  player1El.classList.remove(".player--active");
  diceEl.classList.remove("hidden");
  diceEl.classList.add("hidden");
};

initValues();

//switch player function
const switchPlayer = function () {
  // current score ko zero kr do
  document.getElementById(`current-score--${activePlayer}`).textContent = 0;
  //swtich the player
  activePlayer = activePlayer === 0 ? 1 : 0;

  currentScore = 0;
  player0El.classList.toggle("player--active");
  player1El.classList.toggle("player--active");
};
//Roll Dice
btnRoll.addEventListener("click", function () {
  if (playing) {
    //1. creating Random values
    const dice = Math.trunc(Math.random() * 6) + 1;

    //2. removing the hidden class, display dice
    diceEl.classList.remove("hidden");

    //3. changing the dice pic acc to random values
    diceEl.src = `dice${dice}.png`;

    //4. changing the current score
    // if dice not equals 1

    if (dice !== 1) {
      currentScore += dice;
      document.getElementById(`current-score--${activePlayer}`).textContent =
        currentScore;
    } else {
      switchPlayer();
    }
  }
});

btnHold.addEventListener("click", function () {
  if (playing) {
    //1. add current score to the active player score
    scores[activePlayer] += currentScore;

    //2.displaying the score
    document.getElementById(`score--${activePlayer}`).textContent =
      scores[activePlayer];

    //3. check if score is >= 100, finish the game
    if (scores[activePlayer] >= 100) {
      //setting if game is already finished, hiding the dice again
      playing = false;
      diceEl.classList.add("hidden");
      document
        .querySelector(`.player--${activePlayer}`)
        .classList.add("player--winner");
      document
        .querySelector(`.player--${activePlayer}`)
        .classList.remove("player--active");
    } else {
      //4. switch the player
      switchPlayer();
    }
  }
});

btnNew.addEventListener("click", function () {
  initValues();
});
