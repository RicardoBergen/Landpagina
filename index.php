<?php include 'settings.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="only screen and (max-device-width: 480px)" href="small.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Snapchat Sex</title>
</head>
<style>
    #card1 .card-front{background-image:url(<?php echo $pic1; ?>);}
    #card2 .card-front{background-image:url(<?php echo $pic2; ?>);}
    #card3 .card-front{background-image:url(<?php echo $pic3; ?>);}
    #card4 .card-front{background-image:url(<?php echo $pic4; ?>);}
</style>
<body>
    <header>
        <img src="https://variety.com/wp-content/uploads/2017/11/snapchat-logo.jpg" class="logo">
        <h1>Snapchat Sex</h1>
    </header>
    <main>
        <div style="display: flex; justify-content: center;">
            <p id="1" class="blob current">1</p>
            <p id="2" class="blob">2</p>
            <p id="3" class="blob">3</p>
            <p id="4" class="blob">4</p>
        </div>
        <div id="q1">
            <h1 class="center"><?php echo $vraag1; ?></h1>
            <div class="center">
                <?php
                    foreach ($antwoorden1 as $antwoord) {
                        echo '<button onclick="next(1)">' . $antwoord . '</button>';
                    }
                ?>
            </div>
        </div>
        <div id="q2">
            <h1 class="center"><?php echo $vraag2; ?></h1>
            <div class="center">
                <?php
                    foreach ($antwoorden2 as $antwoord) {
                        echo '<button onclick="next(2)">' . $antwoord . '</button>';
                    }
                ?>
            </div>
        </div>
        <div id="q3">
            <h1 class="center"><?php echo $vraag3; ?></h1>
            <div class="center">
                <?php
                    foreach ($antwoorden3 as $antwoord) {
                        echo '<button onclick="next(3)">' . $antwoord . '</button>';
                    }
                ?>
            </div>
        </div>
        <div id="q4">
            <h1 class="center"><?php echo $vraag4; ?></h1>
            <div style="display: flex; justify-content: space-around; flex-wrap:wrap">
                <div class="card" id="card1" onclick='flipcard("card1")'>
                    <div class="card-front"></div>
                    <div class="card-back">
                        <h3>Voeg me toe op Snapchat: <span><?php echo $snap1; ?></span></h3>
                    </div>
                </div>
                <div class="card" id="card2" onclick='flipcard("card2")'>
                    <div class="card-front"></div>
                    <div class="card-back">
                        <h3>Voeg me toe op Snapchat: <span><?php echo $snap2; ?></span></h3>
                    </div>
                </div>
                <div class="card" id="card3" onclick='flipcard("card3")'>
                    <div class="card-front"></div>
                    <div class="card-back">
                        <h3>Voeg me toe op Snapchat: <span><?php echo $snap3; ?></span></h3>
                    </div>
                </div>
                <div class="card" id="card4" onclick='flipcard("card4")'>
                    <div class="card-front"></div>
                    <div class="card-back">
                        <h3>Voeg me toe op Snapchat: <span><?php echo $snap4; ?></span></h3>
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
    function next(number) {
        $("#" + number).removeClass("current");
        $("#" + (number + 1)).addClass("current");
        $("#q" + number).fadeOut(500);
        $("#q" + (number + 1)).delay(500).fadeIn(500);
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
