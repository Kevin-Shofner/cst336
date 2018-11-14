var imgPlayer;
var btnRock;
var btnPaper;
var btnScissors;
var btnGo;
var computerChoice;
var playerChoice;
var wins;
var losses;
function init(){
	imgPlayer = document.getElementById("imgPlayer");
	btnRock = document.getElementById("btnRock");
	btnPaper = document.getElementById("btnPaper");
	btnScissors = document.getElementById("btnScissors");
	btnGo = document.getElementById("btnGo");
	deselectAll();
	wins = 0;
	losses = 0;
}
	



function deselectAll() {
	btnPaper.style.backgroundColor = 'silver';
		btnScissors.style.backgroundColor = 'silver';
	btnRock.style.backgroundColor = 'silver';

}


function select(choice){
	//alert(choice)
	playerChoice = choice;
	imgPlayer.src = 'images/' + choice + '.png';
	deselectAll();
	if(choice=="rock"){
		btnRock.style.backgroundColor ='#888888';
	}
	if(choice =='paper') {
				btnPaper.style.backgroundColor ='#888888';

	}
	if(choice == 'scissors'){
		btnScissors.style.backgroundColor = '#888888';
	}
	btnGo.style.display = "block";
}

function go(){
	//alert('Ready to Go!');
	var numChoice = Math.floor(Math.random()*3);
	var imgComputer = document.getElementById('imgComputer');
	var txtEndTitle = document.getElementById('txtEndTitle');
	var txtEndMessage = document.getElementById('txtEndMessage');
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';

	if(numChoice==0){
		computerChoice = "rock";
		imgComputer.src = "images/rock.png";
		
		document.getElementById('lblRock').style.backgroundColor = 'yellow';
		if(playerChoice == "rock"){
		//	alert('TIE');
		txtEndTitle.innerHTML = "";
		txtEndMessage.innerHTML = "TIE";
		}
		else if(playerChoice == "paper"){
		//	alert('YOU WIN');
		txtEndTitle.innerHTML = "Paper covers Rock";
		txtEndMessage.innerHTML = 'YOU WIN';
		wins += 1;
		}
		else if(playerChoice == 'scissors'){
			//alert("YOU LOSE");
			txtEndTitle.innerHTML = "Rock smashes Scissors";
			txtEndMessage.innerHTML = "YOU LOSE";
			losses++;
		}
	}
	
		else if(numChoice == 1){
		computerChoice = "paper";
				imgComputer.src = "images/paper.png";
					document.getElementById('lblPaper').style.backgroundColor = 'yellow';
		if(playerChoice == "rock"){
			//alert('YOU LOSE');
			txtEndTitle.innerHTML = "Paper covers Rock";
			txtEndMessage.innerHTML = "YOU LOSE";
			losses++;
		}
		else if(playerChoice == "paper"){
			//alert('TIE');\
			txtEndMessage.innerHTML = "TIE";
			txtEndTitle.innerHTML = "";
		}
		else if(playerChoice == 'scissors'){
			//alert("YOU WIN");
			txtEndTitle.innerHTML = "Scissors cuts Paper";
			txtEndMessage.innerHTML = "YOU WIN";
			wins++;
		}
	}

	
	if(numChoice == 2){
		computerChoice = "scissors";
				imgComputer.src = "images/scissors.png";
					document.getElementById('lblScissors').style.backgroundColor = 'yellow';
		if(playerChoice == "rock"){
			//alert('YOU WIN');
			txtEndTitle.innerHTML = "Rock smashes Scissors";
			txtEndMessage.innerHTML = "YOU WIN";
			wins++;
		}
		else if(playerChoice == "paper"){
			//alert('YOU LOSE');
			txtEndTitle.innerHTML = "Scissors cuts Paper";
			txtEndMessage.innerHTML = "YOU LOSE";
			losses++;
			
		}
		else if(playerChoice == 'scissors'){
			//alert("TIE");
			txtEndTitle.innerHTML = "";
			txtEndMessage.innerHTML = "TIE";
		}
	}
	document.getElementById('endScreen').style.display = "block";

	}
	function startGame(){
	//	alert('Start Game button pressed!');
	document.getElementById('introScreen').style.display = 'none';
	}
	
	function replay(){
		document.getElementById('endScreen').style.display = 'none';
		btnGo.style.display = 'none';
		
		deselectAll();
		
		document.getElementById("lblRock").style.backgroundColor = "#EEEEEE";
		document.getElementById("lblPaper").style.backgroundColor = "#EEEEEE";
		document.getElementById("lblScissors").style.backgroundColor = "#EEEEEE";
		
		imgPlayer.src = 'images/question.png';
		document.getElementById('imgComputer').src = 'images/question.png';
		count();

	}
	function count() {
		var winCount = document.getElementById('winCount');
		var lossCount = document.getElementById("lossCount");
		winCount.innerHTML = ("Player wins: " + wins);
		lossCount.innerHTML = ("Computer wins: " + losses);
	}
	
	//alert(playerChoice + ", " + computerChoice)
