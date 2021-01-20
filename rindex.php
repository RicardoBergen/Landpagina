<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landpagina.css">
    <link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="small.css" />
    <?php include 'var.php';?>
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
            <p id="1" class="blob thisOne" style="width: auto;"><?php echo $vraag1; ?></p>
            <p id="2" class="blob" style="width: 15px;">2</p>
            <p id="3" class="blob" style="width: 15px;">3</p>
            <p id="4" class="blob" style="width: 15px;">4</p>
        </div>
        <div id="q1">
            <div class="center">
                <?php
                    foreach ($antworden1 as $antword) {
                      $change = '"#q1", "#q2", 1';
                      echo "<button onclick='changeScreen(". $change .")'>". $antword . "</button>";
                    }
                ?>
            </div>
        </div>
        <div id="q2">
            <div class="center">
                <?php
                    foreach ($antworden2 as $antword) {
                      $change = '"#q2", "#q3", 2';
                      echo "<button onclick='changeScreen(". $change .")'>". $antword . "</button>";
                    }
                ?>
            </div>
        </div>
        <div id="q3">
            <div class="center">
                <?php
                    foreach ($antworden3 as $antword) {
                      $change = '"#q3", "#q4", 3';
                      echo "<button onclick='changeScreen(". $change .")'>". $antword . "</button>";
                    }
                ?>
            </div>
        </div>
        <div id="q4">
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
    var vraag2 = "<?php echo $vraag2; ?>";
    var vraag3 = "<?php echo $vraag3; ?>";
    var vraag4 = "<?php echo $vraag4; ?>";
    $("#q2").hide(0);
    $("#q3").hide(0);
    $("#q4").hide(0);
    function changeScreen(from, to, number) {
        $(from).fadeOut(500);
        $(to).delay(500).fadeIn(500);
        switch(number) {
            case 1:
                $("#1").text("1").animate({width: '15px'}, 750);
                $("#2").text(vraag2).animate({width: (vraag2.length * 10)}, 750);
                break;
            case 2:
                $("#2").text("2").animate({width: '15px'}, 750);
                $("#3").text(vraag3).animate({width: (vraag3.length * 10)}, 750);
                break;
            case 3:
                $("#3").text("3").animate({width: '15px'}, 750);
                $("#4").text(vraag4).animate({width: (vraag4.length * 10)}, 750);
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
