@extends('layouts.game')

@section('content')
    <div class="content hero-image">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 d-flex justify-content-center text-white text-center mx-auto">
                    <div>
                        <h4>Higher or Lower</h4>
                        <div>Streak: <div class="score">0</div></div>
                        <div class="message">Click to Start</div>
                        <button type="button" class="btn-primary" style="border-radius: 5px">Start</button>
                        <button type="button"class="d-none btn-info" style="border-radius: 5px">Higher</button>
                        <button type="button"class="d-none btn-danger" style="border-radius: 5px">Lower</button>
                        <div class="d-flex">
                            <div class="gameplay text-dark mt-5"></div>
                        </div>
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
    const message = document.querySelector(".message");
    const score = document.querySelector(".score");
    const button = document.querySelectorAll("button");
    const gameplay = document.querySelector(".gameplay");

    let curCardValue = 0;
    let scoreValue = 0;
    let deck = [];
    const ranks = [2,3,4,5,6,7,8,9,10,"J","Q","K","A"];
    const suits = ["hearts","diams","clubs","spades"]

    for(let i = 0; i < button.length;i++){
        button[i].addEventListener("click", playGame);
    }

    function toggleButtons() {
        //hide start button
        button[1].classList.toggle("d-none");
        //show higher and lower button
        button[2].classList.toggle("d-none");
        button[3].classList.toggle("d-none");
    }

    function playGame(e){
        console.log(e.target);
        let temp = e.target.innerText;
        let myCard = drawCard();
        let win = false;
        console.log("you clicked: "+ temp);
        if (temp == "Start") {
            console.log("you clicked start");
            message.innerHTML ="Higher or Lower";
            gameplay.innerHTML = "";
            scoreValue = 0;
            makeCard(myCard);
            toggleButtons();
            return;
        }
        console.log(myCard);
        if (myCard.value == curCardValue) {
            win = "draw";
            message.innerHTML = "Draw"
        }else{
            if ((temp == "Higher" && (myCard.value > curCardValue)) || (temp == "Lower" && (myCard.value < curCardValue))) {
                scoreValue++;
                score.innerHTML = scoreValue;
                message.innerHTML = "Correct Next?";
            }else{
                scoreValue = 0;
                score.innerHTML = scoreValue;
                message.innerHTML = "Wrong Game Over !!!";
                toggleButtons();
            }
        }
        makeCard(myCard);

    }

    function drawCard(){
        if (deck.length > 0) {
            let randIndex = Math.floor(Math.random()*deck.length)
            card = deck.splice(randIndex,1)[0];
            console.log(card);
            return card;
        }else{
            makeDeck();
            return drawCard();
        }
    }

    function makeDeck() {
        deck = [];
        for (let i = 0; i < suits.length; i++) {
            for (let j = 0; j < ranks.length; j++) {
                let card = {};
                card.suit = suits[i];
                card.rank = ranks[j];
                card.value = (j + 1);
                deck.push(card);
            }
        }
        console.log(deck);

    }

    function makeCard(card){
        console.log(card);
        let html1 = "&"+card.suit+";";
        let html2 = card.rank + "&"+card.suit+";";
        let curCards = document.querySelectorAll(".cCard");

        let div = document.createElement("div");
        div.setAttribute("class","cCard");
        div.style.left = (curCards.length * 25) + "px";
        curCardValue = card.value;
        if (card.suit === "hearts" || card.suits === "diams") {
            div.classList.add("cred");
        }
        let span1 = document.createElement("SPAN");
        span1.setAttribute("class", "ctiny");
        span1.innerHTML = html2;
        div.appendChild(span1)
        console.log(span1);

        let span2 = document.createElement("SPAN");
        span2.setAttribute("class", "cbig");
        span2.innerHTML = html1;
        div.appendChild(span2)
        console.log(span2);
        console.log(div);

        gameplay.appendChild(div);

    }
</script>

@endsection
