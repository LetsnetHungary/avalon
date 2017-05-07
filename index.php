<!DOCTYPE html>
<html>
  <head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="shortcut icon" href="favicon.ico" />
		<!--<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">-->
		<link rel="stylesheet" type = "text/css" href="../_asstes/css/n.css">
    <link rel="stylesheet" type = "text/css" href="../_assets/css/first.css">
    <link rel="stylesheet" type = "text/css" href="../_assets/css/secound.css">
    <link rel="stylesheet" type = "text/css" href="../_assets/css/third.css">
    <link rel="stylesheet" type = "text/css" href="../_assets/css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <meta charset="utf-8">
    <title>Avalon</title>
  </head>
  <body id="body">
    <header>
      <div class="logoholder">
        <a href="index.php" class="title">Avalon</a>
      </div>
      <div class="menu">
        <nav>
          <span id="back"><a href="#">Back</a></span>
          <span id="newgame"><a href="#">New Game</a></span>
        </nav>
      </div>
    </header>
    <main id="first" class="main main1">
      <div class="players">
        <span>Select number of players</span>
        <input type="number" name="quantity"
           min="5" max="12" step="1" value="9" id="numofplayers">
      </div>
        <?php
          $characters = file_get_contents('characters.json');
          $character = json_decode($characters, true);

          foreach ($character as $key => $value) {
            $c_a = count($value);
            ?>
            <div class="characters">

            <?php
            for ($i=0; $i < $c_a; $i++) {
              ?>
              <div class="character">
                <img src="../_assets/img/<?php echo $value[$i] ?>.JPG" id="<?php echo($value[$i]) ?>" class="image" alt="<?php echo($value[$i]) ?>">
                <img src="../_assets/img/tick_green.jpg" class="tick" alt="">
              </div>
              <?php
            }?>
            <div class="num">
              <span id="<?php echo($key) ?>plus" style="font-weight: bold; color: rgb(20,200,20); font-size: 30px; cursor: pointer">
                +
              </span>
              <p id="<?php echo($key) ?>n">0</p>
              <span id="<?php echo($key) ?>minus" style="font-weight: bold; color: rgb(200,20,20); font-size: 30px; cursor: pointer">
                -
              </span>
            </div>
          </div>
            <?php
          }
        ?>

        <div class="submit">
          <button class="button"  type="submit" name="button" id="submit">Submit</button>
          <span id="remaining">7 remaining</span>
        </div>
    </main>
    <main id="secound" class="main main2">
      <div class="title">
        <span id ="text">Player 1</span>
      </div>
      <div class="card_holder">
        <div class="card" id ="card">

        </div>
      </div>
      <div class="input">
        <input class="button" type="submit" name="Next" value="Next" id="next">
      </div>
    </main>
    <main id="third" class="main main3">
      <div class="success_fail" id="successfail">
        <div class="how_sure_are_you">
          <p id="areyousure"></p>
          <div style = "">
            <input type="button" name="" value="Yes" class="sure button">
            <input type="button" name="" value="No" class="sure button">
          </div>
        </div>
        <div class="successfail" data-success-fail-type = "">

        </div>
        <div class="successfail" data-success-fail-type = "">

        </div>
      </div>
      <div class="table" id="table">
        <div class="missions">
          <div class="mission">
            <p class="p"></p>
          </div>
          <div class="mission">
            <p class="p"></p>
          </div>
          <div class="mission">
            <p class="p"></p>
          </div>
          <div class="mission">
            <p class="p"></p>
          </div>
          <div class="mission">
            <p class="p"></p>
          </div>
        </div>
        <div class="main_table">
          <div class="card_container">
            <input class="button"  type="submit" name="" value="Show result" id="cardresult">
          </div>
          <div class="data_holder">
            <div class="info_holder" id="nextquest">

            </div>
            <div class="inputholder">
              <input class="button"  type="submit" name="" value="Go to quest" onclick = "showCards()" class="input2 button" id="quest">
            </div>
          </div>
        </div>
        <div class="vote_bar">
          <span>Vote</span>
          <div class="votes" style="background-color:red;">
            1
          </div>
          <div class="votes">
            2
          </div>
          <div class="votes">
            3
          </div>
          <div class="votes">
            4
          </div>
          <div class="votes" style="box-shadow: red 0 0 30px;">
            5
          </div>
        </div>
      </div>
    </main>
    <script type ="text/javascript" src="../_assets/js/index.js"></script>
    <script type ="text/javascript" src="../_assets/js/secound.js"></script>
    <script type ="text/javascript" src="../_assets/js/third.js"></script>
    <footer>
    </footer>
  </body>
</html>
