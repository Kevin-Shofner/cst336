 var selectedWord ="";
 var selectedHint = "";     
 var board = [];
 var remainingGuesses = 6;
 var madeOnce = 0;
 
 var wins = 0;
 var guessedWords = new Array();
 var words = [{word: "snake", hint: "It's a reptile"}, {word: "monkey", hint: "It's a mammal"}, {word: "beetle", hint: "It's an insect"}];
 //var randomInt = Math.floor(Math.random() * words.length);
// selectedWord = words[randomInt];
 var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

 window.onload = startGame();
  
 
 $(".replayBtn").on("click", function() {
    location.reload();
});

 function startGame(){
     pickWord();
     initBoard();
     updateBoard();
     createLetters();
    // showVictory(wins);
 }
 

 
 function initBoard() {
     for(var letter in selectedWord){
         board.push("_");
     }
 }
 
 function pickWord() {
     var randomInt = Math.floor(Math.random() * words.length);
     selectedWord = words[randomInt].word.toUpperCase();
     selectedHint = words[randomInt].hint;
 }
 function updateBoard(){
  
  $("#word").empty();
  
     for (var i = 0; i < board.length; i++){
         //document.getElementById("word").innerHTML += letter + " ";
         $("#word").append(board[i] + " ");
     }
     
     $("#word").append("<br />");
     $("#word").append("<span class = 'hint'>Hint: </span>");
 }
 
 
 
 function createLetters() {
    
    
                    for(var letter of alphabet){
                        $("#letters").append("<button class ='letter' id ='" + letter + "'>" + letter + "</button>");
                    }
                    if(madeOnce == 0){
                         $("#letters").append("<button class ='letter' id ='hint'>  hint </button>");
                       madeOnce += 100;
                    }
                   console.log($(this).attr("id"));
                        
                    $(".letter").click(function(){
                     if (($(this).attr("id")) == "hint"){
                      makeHint();
                      remainingGuesses -= 1;
                      updateMan();
                      if (remainingGuesses <= 0){
                       endGame(false);
                      }
                     }
                     else{
                         checkLetter($(this).attr("id"));
                     }
                         disableButton($(this));
                    });
 
}

function checkLetter(letter){
     var positions = new Array();
     
     for(var i = 0; i < selectedWord.length; i++) {
       console.log(selectedWord);
       if(letter == selectedWord[i]){
           positions.push(i);
      }
     }
     
     if (positions.length > 0){
        updateWord(positions, letter);
        if(!board.includes("_")){
         endGame(true);
        }
       }
     else {
        remainingGuesses -= 1;
        updateMan();
     }
     if (remainingGuesses <= 0) {
      endGame(false);
     }
     
}

function updateWord(positions, letter) {
     for(var pos of positions){
      board[pos] = letter;
     }
     updateBoard();
}

function updateMan() {
 $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

function endGame(win) {
 $("letters").hide();
 
 if(win) {
  $('#won').show();
  guessedWords.push(selectedWord);
  wins += 1;
 // showVictory(wins);
 }
 else{
  $('#lost').show();
  //showVictory(wins);
 }
}

function disableButton(btn) {
 btn.prop('disabled', true);
 btn.attr("class", "btn btn-danger");
}
function makeHint() {
      $("#word").append("<span class = 'hint'>Hint: " + selectedHint + "</span>");

}
function showVictory(winsHad){
 if (winsHad >= 1){
 // $("#wins").append("<h2> You won " + winsHad + " times! Your words you guessed are: ");
 
 		var count = document.getElementById('count');
 		var wordsGuess = document.getElementById('wordGuessed');
 		localStorage.setItem(1, wins); // storing number or wins in key 1
 		localStorage.setItem(2, guessedWords)
 		count.innerHTML = ("You won " + localStorage.getItem(1) +" game(s)!")
   var wordString = "Guessed words are: ";
  
 for(var i = 0; i < winsHad; i++){
 // $("#wins").append(guessedWords[i] + " ");
 wordString += guessedWords[i];
 wordString += " ";
 }
 wordsGuess.innerHTML = (wordString);
// $("#wins").append("</h2>");
 } 
}