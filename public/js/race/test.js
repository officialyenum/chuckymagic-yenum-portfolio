/* * * * * * *
 * Load Game *
 * * * * * * */
$(document).ready(() => {
    $.ajaxSetup(
        {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }
    );
    window.onload = main
});

var probability = {
    "1": 40,
    "2": 30,
    "3": 15,
    "4": 10,
    "5": 3,
    "6": 2
}

//setup variables
var stage, manifest, loader, dice1, dice2, spriteSheet, rolling;
var cupStatus = 'idle';
var diceStatus = 'idle';
var turn = 1;
var gameState = 'idle';
//AI
var simulateGame, simulateSound;
//SPEED
var speed1, speed2;
//DICE AND NUMBERS
var dice1Score, dice2Score, dicenum1, dicenum2, randNum, idle;
var diceProbability = [];
//BUTTONS
var btnplus,btnsound,btninfo,btncancel;
//SPRITE ASSET
var cup, cup1, cup2, player1icon, player2icon, dice1, dice2
//TEXT
var round, player1, player2, player1Score, player1Score, player1DiceScore, player2DiceScore;
var mockScore1 = 0, mockScore2 = 0
var assets = [];
//AUDIO
var muteGameSound = true;
//BET DETAILS
var bet = JSON.parse(localStorage.getItem("bet")) || Object();
var game = JSON.parse(localStorage.getItem("game")) || Object();
var stake = bet.stake || 100;
var payout = bet.amountWon || 0;
var payoutBalance = 50000;
// Game Data
var diceData;

//Generate random payout times
function main() {

    var manifest = [
        {src: "../images/sprite/diceAsset.json", id: "sheet1", type: "spritesheet"},
        {src: "../audio/shake-cup.mp3", id: "cupShake", type: "sound"},
        {src: "../audio/soundtrack.ogg", id: "bgSound", type: "sound"},
        {src: "../audio/sounds/click.ogg", id: "click", type: "sound"},
    ];

    var loader = new createjs.LoadQueue(true, "./");
    createjs.Sound.alternateExtensions = ["mp3"];
    loader.installPlugin(createjs.Sound);
    loader.on("fileload", handleFileLoad);
    loader.on("complete", handleComplete);
    loader.loadManifest(manifest);
}

function handleFileLoad(event)
{
    assets.push(event);
}

function handleComplete()
{
    for (var i = 0; i < assets.length; i++)
    {
        var event = assets[i];
        var result = event.result;

        switch (event.item.id)
        {
            case 'sheet1':
                spriteSheet = result;
                break;
        }
    }

    initScene();
}

function initScene()
{

    setupGameView();
    //generateGameResult();
    if (payout < payoutBalance) {
        generateLoseGame();
        console.log(diceData);
        simulate();
    } else {
        generateGame();
        console.log(generateGame);
        console.log(diceData);
        simulate();
    }
    createjs.Ticker.on("tick", tick);
}

function generateLoseGame() {
    diceData = {
        play1name : "player1",
        play1 : [0,0,0,0,0,0],
        play1dice1 : [0,0,0,0,0,0],
        play1dice2 : [0,0,0,0,0,0],
        play2name : "player2",
        play2 : [0,0,0,0,0,0],
        play2dice1 : [0,0,0,0,0,0],
        play2dice2 : [0,0,0,0,0,0],
    }
    diceProbability = [];
    for (x in probability) {
        for (let i = 0; i < probability[x]; i++) {
            diceProbability.push(parseInt(x));
        }
    }
    //sort randomly
    diceProbability.sort(function(a, b){return 0.5 - Math.random()});
    console.log(diceProbability);
    //console.log(diceProbability[0]);
    //console.log(diceProbability[diceProbability.length]);
    for (let i = 0; i < diceData.play1dice1.length; i++) {
        //get an index to pick dice randomly from pool of arrays
        diceData.play1dice1[i] = random(0,99);
        diceData.play1dice2[i] = random(0,99);
        diceData.play2dice1[i] = random(0,99);
        diceData.play2dice2[i] = random(0,99);
        //get dice value from probability array
        diceData.play1dice1[i] = diceProbability[diceData.play1dice1[i]]
        diceData.play1dice2[i] = diceProbability[diceData.play1dice2[i]]
        diceData.play2dice1[i] = diceProbability[diceData.play2dice1[i]]
        diceData.play2dice2[i] = diceProbability[diceData.play2dice2[i]]
        for (let j = 0; j < diceData.play1.length; j++) {
            diceData.play1[j] = diceData.play1dice1[j] + diceData.play2dice1[j]
            diceData.play2[j] = diceData.play2dice1[j] + diceData.play2dice2[j]
            //CHECK ROUND WINNER
            if (diceData.play1[j] > diceData.play2[j]) {
                mockScore1 = mockScore1 + 1;
            }
            if (diceData.play1[j] < diceData.play2[j]) {
                mockScore2 = mockScore2 + 1;
            }
        }
    }

    betStatus = checkBetListWins(mockScore1,mockScore2)

    if (!betStatus) {
        return diceData;
    } else {
        generateLoseGame();
    }
}

function generateGame() {
    diceData = {
        play1name : "player1",
        play1 : [0,0,0,0,0,0],
        play1dice1 : [0,0,0,0,0,0],
        play1dice2 : [0,0,0,0,0,0],
        play2name : "player2",
        play2 : [0,0,0,0,0,0],
        play2dice1 : [0,0,0,0,0,0],
        play2dice2 : [0,0,0,0,0,0],
    }
    diceProbability = [];
    for (x in probability) {
        for (let i = 0; i < probability[x]; i++) {
            diceProbability.push(parseInt(x));
        }
    }
    //sort randomly
    diceProbability.sort(function(a, b){return 0.5 - Math.random()});
    console.log(diceProbability);
    //console.log(diceProbability[0]);
    //console.log(diceProbability[diceProbability.length]);
    for (let i = 0; i < diceData.play1dice1.length; i++) {
        //get an index to pick dice randomly from pool of arrays
        diceData.play1dice1[i] = random(0,99);
        diceData.play1dice2[i] = random(0,99);
        diceData.play2dice1[i] = random(0,99);
        diceData.play2dice2[i] = random(0,99);
        //get dice value from probability array
        diceData.play1dice1[i] = diceProbability[diceData.play1dice1[i]]
        diceData.play1dice2[i] = diceProbability[diceData.play1dice2[i]]
        diceData.play2dice1[i] = diceProbability[diceData.play2dice1[i]]
        diceData.play2dice2[i] = diceProbability[diceData.play2dice2[i]]
        for (let j = 0; j < diceData.play1.length; j++) {
            diceData.play1[j] = diceData.play1dice1[j] + diceData.play2dice1[j]
            diceData.play2[j] = diceData.play2dice1[j] + diceData.play2dice2[j]
            //CHECK ROUND WINNER
            if (diceData.play1[j] > diceData.play2[j]) {
                mockScore1 = mockScore1 + 1;
            }
            if (diceData.play1[j] < diceData.play2[j]) {
                mockScore2 = mockScore2 + 1;
            }
        }
    }

    return diceData;
}

function setupGameView() {
    //[Canvas and stage setup]
    canvas = document.getElementById('canvasBg');
    stage = new createjs.Stage(canvas);
    stage.canvas.width = window.bodyWidth;
    stage.canvas.height = 700
    var bg = new createjs.Bitmap("../images/sprite/legend-banner.png");
    bg.x = 0;
    bg.y = 0;
    bg.width = stage.canvas.width;
    bg.height = stage.canvas.height;
    stage.addChild(bg);

    //[Cup Sprite setup]
    cup1 = new createjs.Sprite(spriteSheet, "dice-cup");
    cup1.x = 50;
    cup1.y = stage.canvas.height / 2 - 100;
    cup1.scaleX = 0.2;
    cup1.scaleY = 0.2;
    cup1.rotation = 180;
    cupStatus = 'idle';
    stage.addChild(cup1);
    cup1.addEventListener("click", simulate);


    cup2 = new createjs.Sprite(spriteSheet, "dice-cup");
    cup2.x = stage.canvas.width - 50;
    cup2.y = stage.canvas.height / 2 - 100;
    cup2.scaleX = 0.2;
    cup2.scaleY = 0.2;
    cup2.rotation = 180;
    cupStatus = 'idle';
    stage.addChild(cup2);
    cup2.addEventListener("click", simulate);


    cup = new createjs.Sprite(spriteSheet, "dice-cup");
    cup.x = stage.canvas.width/2;
    cup.y = stage.canvas.height/2 + 100;
    cup.scaleX = 0.5;
    cup.scaleY = 0.5;
    cup.alpha = 0.3;
    cupStatus = 'idle';
    stage.addChild(cup);
    cup.addEventListener("click", simulate);

    //[Dice Sprite Setup]
    dice1 = new createjs.Sprite(spriteSheet, "idle1");
    dice1.x = stage.canvas.width/2 + 20 ;
    dice1.y = 370;
    dice1.scale = 0.7
    dice1.alpha = 0;
    rolling = false;
    stage.addChild(dice1);
    console.log(dice1);

    dice2 = new createjs.Sprite(spriteSheet, "idle2");
    dice2.x = stage.canvas.width/2 - 20 ;
    dice2.y = 370;
    dice2.scale = 0.7
    dice2.alpha = 0;
    rolling = false;
    stage.addChild(dice2);
    console.log(dice2);

    //[player name Text and Container Setup]
    var roundBg = new createjs.Sprite(spriteSheet, "btn-center");
    roundBg.x = stage.canvas.width/2;
    roundBg.y = 65;
    roundBg.scale = 0.2;
    stage.addChild(roundBg);

    player1 = new createjs.Text('Africa', 'normal 18px Arial', '#fff');
    player1.x = 50;
    player1.y = 20;
    player1.textAlign = "start"
    stage.addChild(player1);

    player1icon = new createjs.Sprite(spriteSheet, "playeroneicon");
    player1icon.x = 30;
    player1icon.y = 30;
    player1icon.scale = 0.5
    stage.addChild(player1icon);

    round = new createjs.Text('1', 'italic 36px Arial', '#fff');
    round.x = stage.canvas.width / 2;
    round.y = 20;
    round.textAlign = "center"
    stage.addChild(round);


    player2 = new createjs.Text('N.America', 'normal 18px Arial', '#fff');
    player2.x = stage.canvas.width - 50;
    player2.y = 20;
    player2.textAlign = "end"
    stage.addChild(player2);


    player2icon = new createjs.Sprite(spriteSheet, "playertwoicon");
    player2icon.x = stage.canvas.width - 30;
    player2icon.y = 30;
    player2icon.scale = 0.5
    stage.addChild(player2icon);

    //[Player Score Text and Container setup ]

    player1Score = new createjs.Text('0', 'bold 18px Arial', '#fff');
    player1Score.x = 50;
    player1Score.y = 50;
    player1Score.textAlign = "start"
    stage.addChild(player1Score);


    player2Score = new createjs.Text('0', 'bold 18px Arial', '#fff');
    player2Score.x = stage.canvas.width - 50;
    player2Score.y = 50;
    player2Score.textAlign = "end"
    stage.addChild(player2Score);

    //[Dice Score Text and Container Setup]
    player1DiceScore = new createjs.Text('0', 'bold 36px Arial', '#fff');
    player1DiceScore.x = 50;
    player1DiceScore.y = 150;
    //player1DiceScore.parent = diceScoreBg;
    player1DiceScore.textAlign = "start"
    stage.addChild(player1DiceScore);



    player2DiceScore = new createjs.Text('0', 'bold 36px Arial', '#fff');
    player2DiceScore.x = stage.canvas.width - 50;
    player2DiceScore.y = 150;
    player2DiceScore.textAlign = "end"
    stage.addChild(player2DiceScore);

    //[Total Dice Score Text and Container Setup]
    //[Round Text and Container Setup]
    //[GameList Container and Text setup]
    //[Info and Help Button Container and Text setup]
    btnplus = new createjs.Sprite(spriteSheet, "btn-plus");
    btnplus.x = stage.canvas.width - 50;
    btnplus.y = stage.canvas.height - 200;
    //roundBg.rotation = 90;
    btnplus.scale = 0.4;
    stage.addChild(btnplus);
    btnplus.addEventListener("click", displayButtons);

    btnsound = new createjs.Sprite(spriteSheet, "btn-sound");
    btnsound.x = stage.canvas.width - 50;
    btnsound.y = stage.canvas.height - 250;
    //roundBg.rotation = 90;
    btnsound.scale = 0.5;
    //stage.addChild(btnsound);
    btnsound.addEventListener("click", toggleSound);

    btninfo = new createjs.Sprite(spriteSheet, "btn-info");
    btninfo.x = stage.canvas.width - 50;
    btninfo.y = stage.canvas.height - 300;
    //roundBg.rotation = 90;
    btninfo.scale = 0.5;
    //stage.addChild(btninfo);
    btninfo.addEventListener("click", showGameInfo);

    btncancel = new createjs.Sprite(spriteSheet, "btn-cancel");
    btncancel.x = stage.canvas.width - 50;
    btncancel.y = stage.canvas.height - 350;
    //roundBg.rotation = 90;
    btncancel.scale = 0.5;
    //stage.addChild(btncancel);
    btncancel.addEventListener("click", disableButtons);

    //List of Games


    //Turn on Bg SOUND
    createjs.Sound.muted = true;

}

function simulate() {
    createjs.Sound.play("click");
    if (gameState == 'idle') {
        console.log(diceData);
        for (let i = 0; i < diceData.play1.length; i++) {
            for (let j = 0; j < 2; j++) {
                if (j == 0) {
                    simulateSound = setTimeout(rollDiceSound, 100);
                    rollDice(diceData.play1name, diceData.play1dice1[i], diceData.play1dice2[i]);
                }else{
                    simulateSound = setTimeout(rollDiceSound, 100);
                    rollDice(diceData.play2name, diceData.play2dice1[i], diceData.play2dice2[i]);
                }
            }
        }
        checkWinner()
        gameState = 'rolling'
    }
}

function endSimulation() {
    gameState = 'idle'
    clearInterval(simulateGame);
}

function tick(e) {
    if (rolling == true) {
        dice1.y = dice1.y - e.delta * speed1;
        dice2.y = dice2.y - e.delta * speed2;
        console.log(dice1.y, dice2.y);
    }
    if (cupStatus == "idle") {
        stage.removeChild(cup);
        cup = new createjs.Sprite(spriteSheet, "dice-cup");
        cup.x = stage.canvas.width/2;
        cup.y = stage.canvas.height/2 + 100;
        cup.scaleX = 0.5;
        cup.scaleY = 0.5;
        cupStatus = "idle"
        cup.addEventListener("click", simulate);
        stage.addChild(cup);
    }
    if (dice1.y <= 150 || dice2.y <= 150) {
        idle1 = "idle"+dice1Score;
        idle2 = "idle"+dice2Score;
        console.log(idle1, idle2);
        stage.removeChild(dice1);
        dice1 = new createjs.Sprite(spriteSheet, idle1);
        dice1.x = stage.canvas.width/2 + 30 ;
        dice1.y = 150;
        dice1.scale = 0.6;
        cupStatus = "idle"
        rolling = false
        stage.addChild(dice1);

        stage.removeChild(dice2);
        dice2 = new createjs.Sprite(spriteSheet, idle2);
        dice2.x = stage.canvas.width/2 - 30 ;
        dice2.y = 150;
        dice2.scale = 0.6;
        cupStatus = "idle"
        rolling = false
        stage.addChild(dice2);
    }
    stage.update();
}

function rollDiceSound() {
    console.log("sound played")
    //createjs.Sound.play("cupShake");
}

function rollDice(name, _dice1, _dice2) {
    //console.log(diceData);
    speed1 = randomFloat(0.4, 0.6);
    speed2 = randomFloat(0.4, 0.6);
    var roundCount = parseInt(round.text);
    if (roundCount == 7) {
        checkWinner()
    } else if (roundCount == 1) {
        player1Score.text = parseInt(0);
        player2Score.text = parseInt(0);
        console.log("check round one")
        setTimeout(checkTurn(name, _dice1, _dice2), 2000000);
    } else {
        console.log("check round", roundCount)
        window.setTimeout(checkTurn(name, _dice1, _dice2), 2000000);
    }
}

function checkTurn(name, _dice1, _dice2){
    var score = _dice1 + _dice2;
    var roundCount = parseInt(round.text);
    if (turn == 1 && name == "player1"){
        resetcuptwo();
        movecupone();
        resetDiceScore();
        play(_dice1, _dice2);
        updatePlayer1Score(score);
        turn = 2;
        setTimeout(rollDiceSound, 200);
    } else {
        resetcupone();
        movecuptwo();
        play(_dice1, _dice2);
        updatePlayer2Score(score);
        turn = 1;
        checkRoundWinner()
        simulateSound = setTimeout(rollDiceSound, 200);
        round.text = roundCount + 1
    }
}

function updateCup() {
    switch (cupStatus) {
        case "shaking":
            shakeCup();
            break;
        case "throw":
            animateCup();
            break;
        default:
            idleCup();
            break;
    }
}

function shakeCup() {
    //throw cup animation
    stage.removeChild(cup);
    cup = new createjs.Sprite(spriteSheet, "cupshake");
    cup.x = stage.canvas.width/2;
    cup.y = stage.canvas.height/2 + 100;
    cup.scaleX = 0.5;
    cup.scaleY = 0.5;
    cup.alpha = 0.2;
    stage.addChild(cup);
}

function idleCup() {
    stage.removeChild(cup);
    cup = new createjs.Sprite(spriteSheet, "dice-cup");
    cup.x = stage.canvas.width/2;
    cup.y = stage.canvas.height/2 + 100;
    cup.scaleX = 0.5;
    cup.scaleY = 0.5;
    cup.alpha = 0.2;
    cup.addEventListener("click", simulate);
    stage.addChild(cup);
    console.log(cup.width);
}

function throwCup() {
    //throw cup animation
    stage.removeChild(cup);
    cup = new createjs.Sprite(spriteSheet, "cupthrow");
    cup.x = stage.canvas.width/2;
    cup.y = stage.canvas.height/2 + 100;
    cup.scaleX = 0.5;
    cup.scaleY = 0.5;
    cup.alpha = 0.2;
    cupStatus = "throw"
    stage.addChild(cup);
}

function animateCup() {
    //throw cup animation
    stage.removeChild(cup);
    cup = new createjs.Sprite(spriteSheet, "cupanimate");
    cup.x = stage.canvas.width/2;
    cup.y = stage.canvas.height/2 + 100;
    cup.scaleX = 0.5;
    cup.scaleY = 0.5;
    cupStatus = "throw"
    stage.addChild(cup);
}

function movecupone() {
    createjs.Tween.get(cup1).to({x:stage.canvas.width/2,y:stage.canvas.height/2 + 100,scaleX:0.5,scaleY:0.5,rotation:0},500,createjs.Ease.backOut);
}

function movecuptwo() {
    createjs.Tween.get(cup2).to({x:stage.canvas.width/2,y:stage.canvas.height/2 + 100,scaleX:0.5,scaleY:0.5,rotation:0},500,createjs.Ease.backOut);
}

function resetcupone(){
    createjs.Tween.get(cup1).to({x:50,y:stage.canvas.height / 2 - 100,scaleX:0.2,scaleY:0.2,rotation:180},500,createjs.Ease.backOut);
}

function resetcuptwo(){
    createjs.Tween.get(cup2).to({x:stage.canvas.width - 50,y:stage.canvas.height/2 - 100,scaleX:0.2,scaleY:0.2,rotation:180},500,createjs.Ease.backOut);
}

function play(_dice1, _dice2) {
    cupStatus = "throw"
    //updateCup();
    dice1Score = _dice1
    dice2Score = _dice2
    console.log(dice1Score, dice2Score);
    setTimeout(() => {
        stage.removeChild(dice1);
        stage.removeChild(dice2);
        //throwCup();
        //roll dice 1
        dice1 = new createjs.Sprite(spriteSheet, "rolldice");
        dice1.x = stage.canvas.width/2 + 30;
        dice1.y = 380;
        dice1.scale = 0.6
        rolling = true
        stage.addChild(dice1);
        //roll dice 2
        dice2 = new createjs.Sprite(spriteSheet, "rolldice");
        dice2.x = stage.canvas.width/2 - 30;
        dice2.y = 380;
        dice2.scale = 0.6
        rolling = true
        stage.addChild(dice2);
    }, 40000);
}

function checkRoundWinner() {
    var score1 = parseInt(player1DiceScore.text);
    var score2 = parseInt(player2DiceScore.text);
    if (score1 > score2) {
        player1Score.text = parseInt(player1Score.text + 1);
    }
    if (score1 < score2) {
        player2Score.text = parseInt(player2Score.text + 1);
    }
}

function checkWinner(){
    var score1 = parseInt(player1Score.text);
    var score2 = parseInt(player2Score.text);
    if (score1 > score2) {
        player1Score.text = score1
        player2Score.text = score2
        player1DiceScore.text = "WIN"
        player2DiceScore.text = "LOSE"
        round.text = parseInt(1);
        endSimulation();
    } else if(score1 == score2) {
        player2Score.text = score2
        player1Score.text = score1
        player1DiceScore.text = "DRAW"
        player2DiceScore.text = "DRAW"
        round.text = parseInt(1);
        endSimulation();
    } else {
        player2Score.text = score2
        player1Score.text = score1
        player1DiceScore.text = "LOSE"
        player2DiceScore.text = "WIN"
        round.text = parseInt(1);
        endSimulation();
    }
}

function checkBetListWins(score1, score2) {
    var status = []
    for (let i = 0; i < bet.list.length; i++) {
        var betType = bet.list[i].type;
        if (score1 > score2 && betType == "one") {
            status.push("won");
        }else if (score1 >= score2 && betType == "drawtwo") {
            status.push("won");
        }else if (score1 < score2 && betType == "two") {
            status.push("won");
        }else if (score1 <= score2 && betType == "onedraw") {
            status.push("won");
        }else if (score1 != score2 && betType == "onetwo") {
            status.push("won");
        }else if (score1 == score2 && betType == "draw") {
            status.push("won");
        }else if (score1 + score2 > 6 && betType == "over") {
            status.push("won");
        }else if (score1 + score2 <= 6 && betType == "under") {
            status.push("won");
        }else {
            status.push("lost");
        }
    }
    console.log(status);

    for (let j = 0; j < status.length; j++) {
        if(status[j] == "lost") {
            //bet lost
            return false;
        } else {
            //bet won
            return true;
        }

    }
}

function resetDiceScore() {
    player1DiceScore.text = 0;
    player2DiceScore.text = 0;
}

function updatePlayer1Score(score){
    player1DiceScore.text = parseInt(player1DiceScore.text + score);
}

function updatePlayer2Score(score) {
    player2DiceScore.text = parseInt(player2DiceScore.text + score);
}

function random(min, max) {
    return Math.floor( min + Math.random() * max );
}

function randomFloat(min, max) {
    return min + Math.random() * max;
}

//BUTTON FUNCTIONS
function displayButtons() {
    // Display the extra buttons
    createjs.Sound.play("click");
    stage.addChild(btnsound)
    stage.addChild(btninfo)
    stage.addChild(btncancel)
}

function toggleSound(){
    if (muteGameSound === false) {
        createjs.Sound.play("click");
        createjs.Sound.muted = true
        muteGameSound = true;
    } else {
        createjs.Sound.muted = false
        createjs.Sound.play("click");
        muteGameSound = false;
        createjs.Sound.play("bgSound", {loop:-1});
    }
}

function showGameInfo() {
    //show game info
    createjs.Sound.play("click");
}

function disableButtons() {
    //hide extra buttons
    createjs.Sound.play("click");
    stage.removeChild(btnsound)
    stage.removeChild(btninfo)
    stage.removeChild(btncancel)
}





