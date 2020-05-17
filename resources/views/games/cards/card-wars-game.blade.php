@extends('layouts.game')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row py-5">
                <div class="col-sm-4 d-flex justify-content-center text-white text-center mt-10">
                    <div class="res"></div>
                </div>
                <div class="col-sm-8 d-flex justify-content-center text-white text-center mx-auto">
                    <div>
                        <h4>Card Wars</h4>

                        <div class="message">Enter Number of players</div>
                        <div class="userPlay">
                            <input type="number" value="3">
                            <button type="button" class="btn-primary" style="border-radius: 5px">Start</button>
                            <button type="button"class="d-none btn-info" style="border-radius: 5px">Attack</button>
                        </div>
                        <div class="gameplay text-dark mt-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
@endsection

@section('scripts')

    <script>
        //connecting to document object model
        const message = document.querySelector(".message");
        const buttons = document.querySelectorAll("button");
        const gameplay = document.querySelector(".gameplay");
        const userPlay = document.querySelector(".userPlay");
        const res = document.querySelector(".res");
        // declaring varisbles
        let deck = [];
        let players = [];
        let deals = [];
        let rounds = 0;
        let inplay = false;
        let total = 0;
        const ranks = [2,3,4,5,6,7,8,9,10,"J","Q","K","A"];
        //const ranks = [2,3]; for testing
        const suits = ["hearts","diams","clubs","spades"];


        //set button event listener for all buttons
        buttons.forEach(function(item){
            //console.log(item);
            item.addEventListener('click',playGame);
        })

        //detect which button was clicked and perform its function
        function playGame(e) {
            let temp = e.target.textContent;
            //console.log(temp);
            if (temp == "Start") {
                btnToggle();
                startGame();
            }
            if (temp == "Attack") {
                let tempRuns = document.querySelector("input").value;
                round = 0
                for (let x = 0; x < tempRuns; x++) {
                    if (inplay) {
                        message.innerHTML = "Round " + (x+1);
                        makeCards();
                    }
                }
            }
        }

        //toggle buttons to appear and disappear
        function btnToggle() {
            buttons[1].classList.toggle("d-none");
            buttons[2].classList.toggle("d-none");
        }
        //this function starts the game
        function startGame() {
            total = 0;
            inplay = true;
            gameplay.innerHTML = "";
            // select number of players
            let numberPlayers = document.querySelector("input").value;
            //build Deck of cards
            buildDeck();
            //setup Players
            setupPlayers(numberPlayers);
            //share cards to players
            dealCards(0);
            makeCards();
            console.log(deck);
            // Reset input value to 1 to attack
            document.querySelector("input").value = "1";

        }

        //this  function styles the cards and shows it in dom
        function showCard(el, card) {
            console.log("show cards: "+card);
            if (card != undefined) {
                //el.style.backgroundColor = "whitesmoke";
                let html1 = "&"+card.suit+";";
                let html2 = card.rank + "&"+card.suit+";";

                let div = document.createElement("div");
                div.classList.add("warCard");

                if (card.suit === "hearts" || card.suit === "diams") {
                    div.classList.add("cred");
                }
                let span1 = document.createElement("span");
                span1.innerHTML = html2;
                span1.classList.add("ctiny")
                div.appendChild(span1)

                let span2 = document.createElement("span");
                span2.innerHTML = html1;
                span2.classList.add("cbig")
                div.appendChild(span2);

                el.appendChild(div);

                console.log(div);
            }
        }
        // this function handles a playoff if there is a draw
        function dealRound(playerList, tempHolder) {
            let curWinner = {
                "high":null,
                "player":playerList[0]
            }
            let playoff = [];
            for (let x = 0; x < playerList.length; x++) {
                let tempPlayerIndex = playerList[x];
                if (deals[tempPlayerIndex].length > 0) {
                    let card = deals[tempPlayerIndex].shift();
                    //console.log(card.value);
                    //console.log(curWinner.high);
                    //if previous player high is equal to current player card value return draw
                    if(curWinner.high == card.value){
                        //console.log("tie");
                        if (playoff.length == 0) {
                            //push previous player data to playoff
                            playoff.push(curWinner.player);
                        }
                        //push current player data to playoff
                        playoff.push(tempPlayerIndex)
                    }
                    //if currWinner high not set or previous player card is less than current player card
                    if(!curWinner.high || curWinner.high < card.value){
                        //clear playoff array
                        playoff = [];
                        //assign current player card value to current winner high
                        curWinner.high = card.value;
                        curWinner.player = tempPlayerIndex;
                        curWinner.card = card;
                    }
                    //console.log(card);
                    //console.log(deals[x]);
                    tempHolder.push(card);
                    showCard(players[tempPlayerIndex], card);
                }
            }
            if (playoff.length > 0) {
                dealRound(playoff,tempHolder)
            }else{
                updater(curWinner.player,tempHolder);
            }

        }

        //This sets up holder for cards
        function makeCards() {
            let tempHolder = [];
            let playerList = [];
            for (let x = 0; x < players.length; x++) {
                players[x].style.backgroundColor = "";
                players[x].innerHTML = "";
                if (deals[x].length > 0) {
                    playerList.push(x);
                }
            }
            if (playerList.length == 1) {
                winGame();
            }
            dealRound(playerList, tempHolder);
        }

        //This displays who won or lost and reset the game
        function winGame() {
            btnToggle();
            inplay = false;
            for (let x = 0; x < players.length; x++) {
                players[x].innerHTML += (deals[x].length >= total) ? "<br>WINNER" : "<br>LOSER";
            }
            message.innerHTML = "Select Number Of Players";
            document.querySelector("input").value = "3";
        }

        //This is called after a round to show who won the round
        function updater(winner, tempHolder) {
            //change background color to signify round winner
            players[winner].style.backgroundColor = "yellow";
            //console.log(tempHolder);
            //this sorts the cards in holder so its arranged randomly
            tempHolder.sort(function(){
                return .5 - Math.random();
            })
            console.log(tempHolder);
            //loop through cards in temporary holder and push them to winners deals
            for (let record of tempHolder) {
                deals[winner].push(record);
            }
            //loop through the players and display the length of their new cards in hand
            for (let x = 0; x < players.length; x++) {
                let div = document.createElement("div");
                div.classList.add("stat");
                //if player dealed cards length is equal to 52 announce winner
                if (deals[x].length == total) {
                    div.innerHTML = "Total: "+deals[x].length+" cards";
                    winGame();
                }else{
                    div.innerHTML = deals[x].length < 1 ? "Lost" : "Cards: "+ (deals[x].length);
                }
                players[x].appendChild(div);
            }
            let div2 = document.createElement("p");
            div2.innerHTML = "Player "+(winner + 1)+" Won "+ tempHolder.length + " cards";
            div2.classList.add("stat");
            res.appendChild(div2);

        }
        //Loop through deck of cards and add to players hand
        function dealCards(playerCard) {
            playerCard = (playerCard>=players.length) ? 0 : playerCard;
            console.log(playerCard);
            if (deck.length>0) {
                let randIndex = Math.floor(Math.random() * deck.length);
                let card = deck.splice(randIndex,1)[0];
                deals[playerCard].push(card);
                playerCard++;
                return dealCards(playerCard);
                console.log(deals);
            }else{
                message.textContent = "cards dealt now";
                return;
            }
        }

        //set up players number and push empty deals to each player to hold cards
        function setupPlayers(num) {
            players = [];
            deals = [];
            console.log("set up players")
            for (let x = 0; x < num; x++) {
                let div = document.createElement("div");
                div.setAttribute("id","player"+ (x+1));
                div.classList.add("players");
                let div1 = document.createElement("div");
                div1.textContent = "Player" + (parseInt(x)+1);
                players[x] = document.createElement("div");
                players[x].textContent = "Cards";
                div.appendChild(div1);
                div.appendChild(players[x]);
                gameplay.appendChild(div);
                deals.push([]);
                console.log(deals);
                console.log(div);
            }
        }

        function buildDeck() {
            deck = [];
            for (let i = 0; i < suits.length; i++) {
                for (let j = 0; j < ranks.length; j++) {
                    let card = {};
                    total++
                    card.suit = suits[i];
                    card.rank = ranks[j];
                    card.value = (j + 1);
                    deck.push(card);
                }
            }
            console.log(deck);
        }
    </script>

@endsection
