<?php
    $snap1 = "SNAP1";
    $snap2 = "SNAP2";
    $snap3 = "SNAP3";
    $snap4 = "SNAP4";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landpagina.css">
    <link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="small.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Snapchat Sex</title>
</head>
<body>
    <header>
        <img src="https://variety.com/wp-content/uploads/2017/11/snapchat-logo.jpg" class="logo">
        <h1>Snapchat Sex</h1>
    </header>
    <main>
        <div style="display: flex; justify-content: center;">
            <p id="1" class="blob" style="width: 225px;">Deze website is alleen voor volwassenen. Ben je 18+?</p>
            <p id="2" class="blob" style="width: 15px;">2</p>
            <p id="3" class="blob" style="width: 15px;">3</p>
            <p id="4" class="blob" style="width: 15px;">4</p>
        </div>
        <div id="q1">
            <div class="center">
                <button onclick='changeScreen("#q1", "#q2", 1)'>Ja</button>
                <button onclick='changeScreen("#q1", "#q2", 1)'>Nee</button>
            </div>
        </div>
        <div id="q2">
            <div class="center">
                <button onclick='changeScreen("#q2", "#q3", 2)'>Ja</button>
                <button onclick='changeScreen("#q2", "#q3", 2)'>Nee</button>
            </div>
        </div>
        <div id="q3">
            <div class="center">
                <button onclick='changeScreen("#q3", "#q4", 3)'>Ja</button>
                <button onclick='changeScreen("#q3", "#q4", 3)'>Nee</button>
            </div>
        </div>
        <div id="q4">
            <div style="display: flex; justify-content: space-around; flex-wrap:wrap">
                <div class="card" id="card1" onclick='flipcard("card1")'>
                    <div class="card-front"></div>
                    <div class="card-back">
                        <h3>Voeg me toe op Snapchat: <span><?php echo $snap1 ?></span></h3>
                    </div>
                </div>
                <div class="card" id="card2" onclick='flipcard("card2")'>
                    <div class="card-front"></div>
                    <div class="card-back">
                        <h3>Voeg me toe op Snapchat: <span><?php echo $snap2 ?></span></h3>
                    </div>
                </div>
                <div class="card" id="card3" onclick='flipcard("card3")'>
                    <div class="card-front"></div>
                    <div class="card-back">
                        <h3>Voeg me toe op Snapchat: <span><?php echo $snap3 ?></span></h3>
                    </div>
                </div>
                <div class="card" id="card4" onclick='flipcard("card4")'>
                    <div class="card-front"></div>
                    <div class="card-back">
                        <h3>Voeg me toe op Snapchat: <span><?php echo $snap4 ?></span></h3>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>
<script defer>
    $("#q2").hide(0);
    $("#q3").hide(0);
    $("#q4").hide(0);
    function changeScreen(from, to, number) {
        $(from).fadeOut(500);
        $(to).delay(500).fadeIn(500);
        switch(number) {
            case 1:
                $("#1").text("1").animate({width: '15px'}, 750);
                $("#2").text("Wil je jongere vrouwen ontmoeten?").animate({width: '225px'}, 750);
                break;
            case 2:
                $("#2").text("2").animate({width: '15px'}, 750);
                $("#3").text("Ze zijn alleen op zoek naar snelle, vrijblijvende seks. Ga je hiermee akkoord?").animate({width: '225px'}, 750);
                break;
            case 3:
                $("#3").text("3").animate({width: '15px'}, 750);
                $("#4").text("Wie wil je neuken?").animate({width: '225px'}, 750);
                break;
        }
    }
    function flipcard(card) {
        if (document.getElementById(card).classList.contains('cardClicked')) {
            document.getElementById(card).classList.remove('cardClicked');
        } else {
            document.getElementById(card).classList.add('cardClicked');
        }
    }
</script>
</html>
