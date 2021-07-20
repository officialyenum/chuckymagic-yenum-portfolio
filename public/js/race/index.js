$(document).ready(() => {
    $.ajaxSetup(
        {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }
    );
});
// Assign global variables
var bet = null;
var STAKE = 0;
var MIN_BET = 100;
var MAX_BET = 1000000;
var player = null;
var game = null;
var comp1Score = 0;
var comp2Score = 0;
// Div Variable Elements
var comp1Name = document.getElementById("comp1Name");
var comp2Name = document.getElementById("comp2Name");
var betAmount = document.getElementById("betAmount");
var comp1ScoreDiv = document.getElementById("compScore1");
var comp2ScoreDiv = document.getElementById("compScore2");
var dice1ValueDiv = document.getElementById("diceValue1");
var dice2ValueDiv = document.getElementById("diceValue2");
var stakeDiv = document.getElementById("gameStake")
var dice_1 = document.getElementById("die-1");
var dice_2 = document.getElementById("die-2");
var die1Container = document.getElementById("die1container");
var die2Container = document.getElementById("die2container");


/** PLAYER FUNCTIONS  AND PROTOTYPES START **/

function Player(id, phone_no, email) {
    this.id = id;
    this.phone_no = phone_no;
    this.email = email;
}

/** PLAYER FUNCTIONS  AND PROTOTYPES END **/



/** BET FUNCTIONS AND PROTOTYPES START */
function Bet() {
    this.id = null;
    this.user;
    this.stake = 0;
    this.totalOdd = 0;
    this.amountWon = 0;
    this.status = "pending";
    this.list = [];
    this.count = 0;
}

Bet.prototype.createBet = function (data) {
    if (this.list.length == 0) {
        this.updateStake();
        this.insertBet(data);
        //create new bet in database
        this.addToBetList(data);
        this.resetOdd();
        this.updateBetCount(this.list.length);
        this.updateBetListView();
        localStorage.setItem("bet", JSON.stringify(bet));
    } else {
        if (this.validateBet(data))
        {
            this.updateStake();
            this.updateBet();
            //update bet in database using
            this.addToBetList(data);
            this.resetOdd();
            this.updateBetCount(this.list.length);
            this.updateBetListView();
            localStorage.setItem("bet", JSON.stringify(bet));
        }
    }
    //console.log(this.list);
}
Bet.prototype.updateBetCount = function (length) {
    this.count = length;
    var betCount = document.getElementsByClassName('betCount');
    console.log(betCount[0].innerHTML);
    for (let i = 0; i < betCount.length; i++) {
        betCount[i].innerHTML = this.count;
    }
    //document.getElementById('betCount').innerText = this.count;
    //document.getElementById('betCountLog').innerText = this.count;
    //document.getElementById('betCountStart').innerText = this.count;
}
Bet.prototype.updateStake = function () {
    this.stake = STAKE;
    this.updateBetListView();
}
Bet.prototype.updateBetListView = function () {
    var count = 1;
    //reset table
    document.getElementById('betTableBody').innerHTML = "";
    document.getElementById('betTableFooter').innerHTML = "";
    document.getElementById('startGameButton').setAttribute('href', ajax.game );
    for (let i = 0; i < this.list.length; i++) {
        document.getElementById('betTableBody').innerHTML += "<tr><th scope='row'>"+count+"</th><td>"+this.list[i].comp1+" VS "+this.list[i].comp2+"</td><td>"+this.list[i].type+"</td><td>"+this.list[i].odd.toFixed(2)+"</td><td>"+this.list[i].status+"</td></tr>";
        count += 1
    }
    //Get winning
    console.log(this.stake);
    this.amountWon = this.stake.toFixed(2) * this.totalOdd.toFixed(2) * this.list.length * Math.PI/2;
    //Update
    document.getElementById('betTableFooter').innerHTML = "<tr><th scope='col'>Total</th><th scope='col'></th><th scope='col'></th><th scope='col'>"+this.totalOdd.toFixed(2)+"</th><th scope='col'>"+this.status+"</th></tr>";
    document.getElementById('betTableFooter').innerHTML += "<tr><th scope='col'>Stake</th><th scope='col'></th><th scope='col'></th><th scope='col'>₦"+this.stake.toFixed(2)+"</th><th scope='col'>"+this.status+"</th></tr>";
    document.getElementById('betTableFooter').innerHTML += "<tr><th scope='col'>Winning</th><th scope='col'></th><th scope='col'></th><th scope='col'>₦"+this.amountWon.toFixed(2)+"</th><th scope='col'>"+this.status+"</th></tr>";
    this.updateBet(this.list);
}
Bet.prototype.resetOdd = function () {
    if (this.list.length == 0) {
        //reset odd
        this.totalOdd = 0;
    }else{
        //reset odd
        this.totalOdd = 0;
        //loop and add current betlist odd
        for (let i = 0; i < this.list.length; i++) {
            this.totalOdd += this.list[i].odd;
        }
    }
}
Bet.prototype.validateBet = function (data) {
    //loop through betlist
    for (let i = 0; i < this.list.length; i++) {
        //check if bet is the same name
        if (this.list[i].name == data.name) {
            //check if bet is same type
            if (this.list[i].type == data.type) {
                // remove the bet
                removeBet(data);
                console.log('This bet type has been selected before');
                return false;
            }
        }
    }
    return true;
}
Bet.prototype.addToBetList = function (data) {
    //Disable Buttons depending on datatype selected
    switch (data.type) {
        case "one":
            document.getElementById(data.name+"one").classList.add("bg-sv-warning", "text-dark");
            document.getElementById(data.name+"one").setAttribute('onclick',`removeBet(${JSON.stringify(data)})`)
            document.getElementById(data.name+'draw').setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"two").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"drawtwo").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"onedraw").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"onetwo").setAttribute('onclick','disableButton()')
            break;
        case "draw":
            document.getElementById(data.name+"draw").classList.add("bg-sv-warning", "text-dark");
            document.getElementById(data.name+"draw").setAttribute('onclick',`removeBet(${JSON.stringify(data)})`)
            document.getElementById(data.name+"one").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"two").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"drawtwo").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"onedraw").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"onetwo").setAttribute('onclick','disableButton()')
            break;
        case "two":
            document.getElementById(data.name+"two").classList.add("bg-sv-warning", "text-dark");
            document.getElementById(data.name+"two").setAttribute('onclick',`removeBet(${JSON.stringify(data)})`)
            document.getElementById(data.name+"draw").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"one").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"drawtwo").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"onedraw").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"onetwo").setAttribute('onclick','disableButton()')
            break;
        case "onedraw":
            document.getElementById(data.name+"onedraw").classList.add("bg-sv-warning", "text-dark");
            document.getElementById(data.name+"onedraw").setAttribute('onclick',`removeBet(${JSON.stringify(data)})`)
            document.getElementById(data.name+"draw").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"two").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"drawtwo").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"one").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"onetwo").setAttribute('onclick','disableButton()')
            break;
        case "onetwo":
            document.getElementById(data.name+"onetwo").classList.add("bg-sv-warning", "text-dark");
            document.getElementById(data.name+"onetwo").setAttribute('onclick',`removeBet(${JSON.stringify(data)})`)
            document.getElementById(data.name+"one").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"two").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"drawtwo").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"onedraw").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"draw").setAttribute('onclick','disableButton()')
            break;
        case "drawtwo":
            document.getElementById(data.name+"drawtwo").classList.add("bg-sv-warning", "text-dark");
            document.getElementById(data.name+"drawtwo").setAttribute('onclick',`removeBet(${JSON.stringify(data)})`)
            document.getElementById(data.name+"draw").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"one").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"two").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"onedraw").setAttribute('onclick','disableButton()')
            document.getElementById(data.name+"onetwo").setAttribute('onclick','disableButton()')
            break;
        case "under":
            document.getElementById(data.name+"under").classList.add("bg-sv-warning", "text-dark");
            document.getElementById(data.name+"under").setAttribute('onclick',`removeBet(${JSON.stringify(data)})`)
            document.getElementById(data.name+"over").setAttribute('onclick','disableButton()')
            break;
        case "over":
            document.getElementById(data.name+"over").classList.add("bg-sv-warning", "text-dark");
            document.getElementById(data.name+"over").setAttribute('onclick',`removeBet(${JSON.stringify(data)})`)
            document.getElementById(data.name+"under").setAttribute('onclick','disableButton()')
            break;
        default:
            break;
    }
    //push data to list
    this.list.push(data);
}
Bet.prototype.resetBet = function (data) {
    //Disable Buttons depending on datatype selected
    console.log(data);
    switch (data.type) {
        case "one":
            //loop through game list
            for (let i = 0; i < gameList.length; i++) {
                for (let j = 0; j < gameList[i].championship_games.length; j++) {
                    // if game name is equal to data name pass the respective data
                    if (gameList[i].championship_games[j].name == data.name) {
                        let newGame = gameList[i].championship_games[j];
                        console.log(data.name);
                        document.getElementById(data.name+"one").classList.remove("bg-sv-warning", "text-dark");
                        document.getElementById(data.name+"one").classList.add("bg-sv-primary", "text-white");
                        document.getElementById(data.name+"one").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.one},'${data.id}','one')`)
                        document.getElementById(data.name+"draw").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.draw},'${data.name+"draw"}','draw')`)
                        document.getElementById(data.name+"two").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.two},'${data.name+"two"}','two')`)
                        document.getElementById(data.name+"drawtwo").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.drawtwo},'${data.name+"drawtwo"}','drawtwo')`)
                        document.getElementById(data.name+"onedraw").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.onedraw},'${data.name+"onedraw"}','onedraw')`)
                        document.getElementById(data.name+"onetwo").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.onetwo},'${data.name+"onetwo"}','onetwo')`)
                    }
                }
            }
            console.log(data);
            break;
        case "draw":
            //loop through game list
            for (let i = 0; i < gameList.length; i++) {
                for (let j = 0; j < gameList[i].championship_games.length; j++) {
                    // if game name is equal to data name pass the respective data
                    if (gameList[i].championship_games[j].name == data.name) {
                        let newGame = gameList[i].championship_games[j];
                        console.log(data.name);
                        document.getElementById(data.name+"draw").classList.remove("bg-sv-warning", "text-dark");
                        document.getElementById(data.name+"draw").classList.add("bg-sv-primary", "text-white");
                        document.getElementById(data.name+"draw").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.draw},'${data.id}','draw')`)
                        document.getElementById(data.name+"one").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.one},'${data.id}','one')`)
                        document.getElementById(data.name+"two").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.two},'${data.id}','two')`)
                        document.getElementById(data.name+"drawtwo").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.drawtwo},'${data.id}','drawtwo')`)
                        document.getElementById(data.name+"onedraw").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.onedraw},'${data.id}','onedraw')`)
                        document.getElementById(data.name+"onetwo").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.onetwo},'${data.id}','onetwo')`)
                    }
                }
            }
            console.log(data);
            break;
        case "two":
            //loop through game list
             for (let i = 0; i < gameList.length; i++) {
                for (let j = 0; j < gameList[i].championship_games.length; j++) {
                    // if game name is equal to data name pass the respective data
                    if (gameList[i].championship_games[j].name == data.name) {
                        let newGame = gameList[i].championship_games[j];
                        document.getElementById(data.name+"two").classList.remove("bg-sv-warning", "text-dark");
                        document.getElementById(data.name+"two").classList.add("bg-sv-primary", "text-white");
                        document.getElementById(data.name+"two").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.two},'${data.id}','two')`)
                        document.getElementById(data.name+"draw").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.draw},'${data.id}','draw')`)
                        document.getElementById(data.name+"one").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.one},'${data.id}','one')`)
                        document.getElementById(data.name+"drawtwo").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.drawtwo},'${data.id}','drawtwo')`)
                        document.getElementById(data.name+"onedraw").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.onedraw},'${data.id}','onedraw')`)
                        document.getElementById(data.name+"onetwo").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.onetwo},'${data.id}','onetwo')`)
                        console.log(data);
                    }
                }
            }
            break;
        case "onedraw":
            //loop through game list
             for (let i = 0; i < gameList.length; i++) {
                for (let j = 0; j < gameList[i].championship_games.length; j++) {
                    // if game name is equal to data name pass the respective data
                    if (gameList[i].championship_games[j].name == data.name) {
                        let newGame = gameList[i].championship_games[j];
                        document.getElementById(data.name+"onedraw").classList.remove("bg-sv-warning", "text-dark");
                        document.getElementById(data.name+"onedraw").classList.add("bg-sv-primary", "text-white");
                        document.getElementById(data.name+"onedraw").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.onedraw},'${data.id}','onedraw')`)
                        document.getElementById(data.name+"draw").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.draw},'${data.id}','draw')`)
                        document.getElementById(data.name+"two").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.two},'${data.id}','two')`)
                        document.getElementById(data.name+"drawtwo").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.drawtwo},'${data.id}','drawtwo')`)
                        document.getElementById(data.name+"one").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.one},'${data.id}','one')`)
                        document.getElementById(data.name+"onetwo").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.onetwo},'${data.id}','onetwo')`)
                        console.log(data);
                    }
                }
            }
            break;
        case "onetwo":
            //loop through game list
             for (let i = 0; i < gameList.length; i++) {
                for (let j = 0; j < gameList[i].championship_games.length; j++) {
                    // if game name is equal to data name pass the respective data
                    if (gameList[i].championship_games[j].name == data.name) {
                        let newGame = gameList[i].championship_games[j];
                        document.getElementById(data.name+"onetwo").classList.remove("bg-sv-warning", "text-dark");
                        document.getElementById(data.name+"onetwo").classList.add("bg-sv-primary", "text-white");
                        document.getElementById(data.name+"onetwo").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.onetwo},'${data.id}','onetwo')`)
                        document.getElementById(data.name+"one").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.one},'${data.id}','one')`)
                        document.getElementById(data.name+"two").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.two},'${data.id}','two')`)
                        document.getElementById(data.name+"drawtwo").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.drawtwo},'${data.id}','drawtwo')`)
                        document.getElementById(data.name+"onedraw").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.onedraw},'${data.id}','onedraw')`)
                        document.getElementById(data.name+"draw").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.draw},'${data.id}','draw')`)
                        console.log(data);
                    }
                }
            }
            break;
        case "drawtwo":
            //loop through game list
             for (let i = 0; i < gameList.length; i++) {
                for (let j = 0; j < gameList[i].championship_games.length; j++) {
                    // if game name is equal to data name pass the respective data
                    if (gameList[i].championship_games[j].name == data.name) {
                        let newGame = gameList[i].championship_games[j];
                        document.getElementById(data.name+"drawtwo").classList.remove("bg-sv-warning", "text-dark");
                        document.getElementById(data.name+"drawtwo").classList.add("bg-sv-primary", "text-white");
                        document.getElementById(data.name+"drawtwo").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.drawtwo},'${data.id}','drawtwo')`)
                        document.getElementById(data.name+"draw").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.draw},'${data.id}','draw')`)
                        document.getElementById(data.name+"one").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.one},'${data.id}','one')`)
                        document.getElementById(data.name+"two").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.two},'${data.id}','two')`)
                        document.getElementById(data.name+"onedraw").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.onedraw},'${data.id}','onedraw')`)
                        document.getElementById(data.name+"onetwo").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.onetwo},'${data.id}','onetwo')`)
                        console.log(data);
                    }
                }
            }
            break;
        case "under":
            //loop through game list
             for (let i = 0; i < gameList.length; i++) {
                for (let j = 0; j < gameList[i].championship_games.length; j++) {
                    // if game name is equal to data name pass the respective data 
                    if (gameList[i].championship_games[j].name == data.name) {
                        let newGame = gameList[i].championship_games[j];
                         document.getElementById(data.name+"under").classList.remove("bg-sv-warning", "text-dark");
                        document.getElementById(data.name+"under").classList.add("bg-sv-primary", "text-white");
                        document.getElementById(data.name+"under").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.under},'${data.id}','under')`)
                        document.getElementById(data.name+"over").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.over},'${data.id}','over')`)
                        console.log(data);
                    }
                }
            }
            break;
        case "over":
            //loop through game list
             for (let i = 0; i < gameList.length; i++) {
                for (let j = 0; j < gameList[i].championship_games.length; j++) {
                    // if game name is equal to data name pass the respective data 
                    if (gameList[i].championship_games[j].name == data.name) {
                        let newGame = gameList[i].championship_games[j];
                        document.getElementById(data.name+"over").classList.remove("bg-sv-warning", "text-dark");
                        document.getElementById(data.name+"over").classList.add("bg-sv-primary", "text-white");
                        document.getElementById(data.name+"over").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.over},'${data.id}','over')`)
                        document.getElementById(data.name+"under").setAttribute('onclick',`submitBet(${JSON.stringify(data)},'${data.name}',${newGame.under},'${data.id}','under')`)
                        console.log(data);
                    }
                }
            }
            break;
        default:
            break;
    }
}
Bet.prototype.removeFromBetList = function (b) {
    this.list = this.list.filter(bet => {
        return bet.id != b.id;
    });
}
Bet.prototype.insertBet = function (data) {
    //upload data to database
    console.log("insert bet");

    /* $.post(ajax.insert,data, function(response){
            //let newResult = result
            //bet.id = newResult.lastID;
            console.log(response.data);
        }).fail(function(e) {
            alert(`${response.responseJSON.message}`);
    });*/
}
Bet.prototype.updateBet = function (data) {
    console.log("update bet");
    /* $.post(ajax.update,data, function(response){
            //let newResult = result
            //bet.id = newResult.lastID;
            console.log(response.status);
        }).fail(function(e) {
            alert(`${response.responseJSON.message}`);
        }); */
}
Bet.prototype.updateBetWin = function (data) {
    console.log("update bet win");
    /* $.post({
        url: ajax.update_win,
        data: data,
        success: function(response){
            console.log(response.status);
        }
    }); */
}
Bet.prototype.updateBetLost = function (data) {
    console.log("update bet lose");
    /* $.post({
        url: ajax.update_lose,
        data: data,
        success: function(response){
            console.log(response.status);
        }
    }); */
}
/** BET FUNCTIONS AND PROTOTYPES END */



/** GAME FUNCTIONS AND PROTOTYPES START */
function Game() {
    this.playTurn = 1;
    this.round = 1;
    this.roundWinner = [];
    this.playWinner = "";
    this.matchFinished = false;
    this.totalNoOfDice;
    this.gameStatus =  "pending";
    this.state = "menu";
    this.list = [];
}

Game.prototype.startGame = function () {
    console.log("Game Started ")
    this.addToGameList(bet.list, gameList)
    this.openGameView();
}

Game.prototype.openGameView = function () {
    console.log("Game View Opened")
    bet = localStorage.bet;
    window.href = ajax.game;
    console.log(bet);
    this.setupGameView();
}

Game.prototype.addToGameList = function(betlist, gamelist) {
    //loop through bet list
    for (let i = 0; i < betlist.length; i++) {
        //pick games affiliated with bet placed
        for (let j = 0; j < gamelist.length; j++) {
            console.log(betlist[i]);
            console.log(gamelist[j]);
            /*
            if (betlist[i].name == gamelist[j].name) {
            }
            */
        }
    }
}

Game.prototype.setupGameView = function () {
    console.log("Game View SetUp")
    stakeDiv.value = bet.stake;

}
Game.prototype.rollDice = function () {
    if (this.round <= 3) {
        if (playerTurn = 1) {
            var ranNum = [];
            // var dice = document.getElementById("die-1");
            for(var i = 0; i < 2; i++) {
                ranNum[i] = Math.floor( 1 + Math.random() * 6 );
            }

            this.dice_1.src=`${photoUrl}/${ranNum[0]}.png`;
            this.dice_2.src=`${photoUrl}/${ranNum[1]}.png`;

            setTimeout(this.rollComp1Dice(), 1500);
        }else{
            var ranNum = [];
            // var dice = document.getElementById("die-1");
            for(var i = 0; i < 2; i++) {
                ranNum[i] = Math.floor( 1 + Math.random() * 6 );
            }

            dice_1.src=`${photoUrl}/${ranNum[0]}.png`;
            dice_2.src=`${photoUrl}/${ranNum[1]}.png`;

            setTimeout(this.rollComp2Dice(), 1500);
        }
        this.round += 1;
    }else{
        this.matchFinished = true;
        this.round = 1;
    }
}
Game.prototype.rollComp1Dice = function () {
    if(this.matchFinished) { matchFinished = false; return ;}

	stopDice();
	node.classList.remove('animated', 'tada', 'infinite');
	audio.pause();
	audio.currentTime = 0;
	start = 1;
	this.playTurn = 2;
}

Game.prototype.rollComp2Dice = function () {
    if(this.matchFinished) { matchFinished = false; return ;}

	this.stopDice();
	node.classList.remove('animated', 'tada', 'infinite');
	audio.pause();
	audio.currentTime = 0;
	start = 1;
	this.playTurn = 1;
}

Game.prototype.stopDice = function () {
    var res = [];
	switch(this.totalNoOfDice) {
		case 1:
			dice_1.style.display = "block";
			res = [
                parseInt(dice_1.src.slice(-5, -4))
            ];
		break;

		case 2:
			dice_1.style.display = "block";
			dice_2.style.display = "block";
			res = [
                parseInt(dice_1.src.slice(-5, -4)),
                parseInt(dice_2.src.slice(-5, -4))
            ];
		break;
	}
	this.response(res);
}

Game.prototype.response = function (res) {
    if(this.playTurn == 1) {
		var score = parseInt(this.comp1Score); // Get score of player 1
		var diceOutput = "";
		for(var i = 0; i < res.length; i++) {
			score += res[i];
			this.comp1Score = score;
			diceOutput += ", "+res[i];
		}
		diceOutput = diceOutput.slice(1);
		this.dice1Value.innerHTML = diceOutput;
		playerThrowCount += 1;
		this.comp1ScoreValue.innerHTML = this.comp1Score;
		this.playTurn = 2;
		showToast(2);
	} else {
		var score = parseInt(this.comp2Score);	// Get score of computer
		var diceOutput = "";
		for(var i = 0; i < res.length; i++) {
			score += res[i];
			this.comp2Score = score;
			diceOutput += ", "+res[i];
		}
		diceOutput = diceOutput.slice(1);
		this.dice2Value.innerHTML = diceOutput;
		round += 1;
		this.comp2ScoreValue.innerHTML = this.comp2Score;
		this.playTurn = 1;
		showToast(1);
	}
}


/**GAME FUNCTIONS AND PROTOTYPES END */

console.log("Object Game List")
console.log(ajax);
console.log(document.getElementById('betAmount').value);
console.log(gameList);




// VALIDATE BET

// SAVE BET

// START GAME

// REDIRECT TO GAME PAGE WITH BET DATA

// ASSIGN COUNTRY NAMES, AMOUNT AND AND SCORES TO THEIR DIV ELEMENT

// ONCLICK START GAME LET DICE ROLL FOR COMP 1
// UPDATE TURN
// ROLL FOR COMP 2
// UPDATE COUNT
// IF COUNT == 3 CHECK WINNERS AND UPDATE TO BETLIST
// IF WIN INSERT BET WIN TO DATABASE
// IF LOSE INSERT BET LOSE TO DATABASE






// GENERAL FUNCTIONS
/* gotoPreviousPage = () => {
	window.history.back();
} */
/** Bet Button Clicks Start */
function submitBet(data, name, odd, id, type) {
    gameData = {
        gameId : data.id,
        comp1: data.comp1,
        comp2: data.comp2,
        name: name,
        odd : odd,
        id : id,
        type : type,
        status : "pending"
    };
    //check if bet variable is created
    if (bet == null) {
        STAKE = parseInt(document.getElementById('amountStaked').value)
        bet = new Bet();
        //play = new Play();
        bet.createBet(gameData);
        console.log(bet);
    }
    else {
        bet.createBet(gameData);
        console.log(bet);
        console.log(bet.list.length)
    }
        //if true add to betlist
    //else create bet,
    //validate bet
        //if bet list is validated
            //disable button and add to betlist
            //update bet list table and count
        //else return message to message div "Bet can't be placed"
    console.log(odd);
    console.log(id);
    console.log(type);
}
function removeBet(data) {
    //remove bet
    bet.removeFromBetList(data);
    //reset totalOdds
    bet.resetOdd();
    // reset bet onclick function and class
    bet.resetBet(data);
    // update bet count
    bet.updateBetCount(bet.list.length);
    // update bet table list view
    bet.updateBetListView();
}
function removeAllBets() {
    var data = bet.list;
    if (data.length > 0) {
        for (let i = 0; i < data.length; i++) {
            //remove bet
            bet.removeFromBetList(data[i]);
            // reset bet onclick function and class
            bet.resetBet(data[i]);
        }
    } else {
        document.getElementById('betMessage').innerText = "Sorry There are no bets to delete";
    }
    //reset totalOdds
    bet.resetOdd();
    // update bet count
    bet.updateBetCount(bet.list.length);
    // update bet table list view
    bet.updateBetListView();
}
/** Bet Button Clicks End */
/** Amount Functions Start */
function addAmount(value) {
    var oldValue = document.getElementById('amountStaked').value;
    var newValue = parseInt(oldValue) + parseInt(value);
    STAKE = newValue;
    document.getElementById('amountStaked').value = newValue;
    console.log(bet != null)
    if (bet != null) {
        console.log(bet.stake);
        bet.updateStake();
    }
}
function updateAmount() {
    var newValue = document.getElementById('amountStaked').value;
    STAKE = parseInt(newValue);
    if (bet != null) {
        console.log(bet.stake);
        bet.updateStake();
    }
}
function resetAmount() {
    document.getElementById('amountStaked').value = 100;
    STAKE = 100;
    if (bet != null) {
        bet.updateStake();
        console.log(bet.stake);
    }
}

//This function displays all bet list error message in a modal
function openBetListModal() {
    $("#comingSoonModal").modal("show");
    //check if bet is set
    
    // if(bet == null){
    //     document.getElementById('betMessage').innerHTML = "Sorry You need to place a bet"
    //     $('#betMessageModal').modal('show')
    // }else if (bet.list.length < 2) {
    //     document.getElementById('betMessage').innerHTML = "Sorry You need to place bet on at least 2 games"
    //     $('#betMessageModal').modal('show')
    // }else if (bet.stake != 0) {
    //     //check amount staked
    //     if (bet.stake < MIN_BET || bet.stake >= MAX_BET) {
    //         document.getElementById('betMessage').innerHTML = "Sorry The Minimum bet Amount is ₦100 <br>"
    //         document.getElementById('betMessage').innerHTML += "and The Maximum bet Amount is ₦1,000,000"
    //         $('#betMessageModal').modal('show')
    //     }else{
    //         $('#betListModal').modal('show')
    //     }
    // }else{
    //     document.getElementById('betMessage').innerHTML = "Sorry Bet Amount not set"
    //     $('#betMessageModal').modal('show')
    // }
}

/** Amount Functions End */
/**
 *
 *
 *
 */
/**Start Game Function */
function startGame() {
    //loop bet list and create games for each bet
    Game.prototype.startGame();
}

function disableButton() {
    document.getElementById('betMessage').innerText = "Sorry, This bet can't be placed"
    $('#betMessageModal').modal('show')
    console.log("this button has been disabled");
    // $('#betMessageBody').html('Sorry, bet cannot be placed');
    // $('#betMessageToast').toast('show');
}

function hideToast(turnNumber) {
    $('#betMessageToast').toast('hide');
}
