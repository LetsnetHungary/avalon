<?php session_start();
  if (!isset($_SESSION["language"])) {
    $_SESSION["language"] = "english";
  }

  $header_data = json_decode(file_get_contents("_assets/".$_SESSION["language"]."/header.json"));
  $first_data = json_decode(file_get_contents("_assets/".$_SESSION["language"]."/first.json"));
  $secound_data = json_decode(file_get_contents("_assets/".$_SESSION["language"]."/secound.json"));
  $third_data = json_decode(file_get_contents("_assets/".$_SESSION["language"]."/third.json"));
 ?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Metamorphous" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="shortcut icon" href="favicon.ico" />
		<!--<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">-->
		<link rel="stylesheet" type = "text/css" href="../linkafestmenyei/_asstes/css/n.css">
    <link rel="stylesheet" type = "text/css" href="../linkafestmenyei/_assets/css/first.css">
    <link rel="stylesheet" type = "text/css" href="../linkafestmenyei/_assets/css/secound.css">
    <link rel="stylesheet" type = "text/css" href="../linkafestmenyei/_assets/css/third.css">
    <link rel="stylesheet" type = "text/css" href="../linkafestmenyei/_assets/css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <title>Avalon</title>
  </head>
  <body id="body">
    <?php include 'header.php' ?>
    <main id="first" class="main main1">
      <div class="players">
        <span><?php echo($first_data->numofplayers) ?></span>
        <input type="number" name="quantity"
           min="5" max="12" step="1" value="9" id="numofplayers">
      </div>
        <div class="start_cards">
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
                  <img src="../linkafestmenyei/_assets/img/<?php echo $value[$i] ?>.jpg" id="<?php echo($value[$i]) ?>" class="image" alt="<?php echo($value[$i]) ?>">
                  <img src="../linkafestmenyei/_assets/img/tick_green.jpg" class="tick" alt="">
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

        </div>
        <div class="submit">
          <button class="button"  type="submit" name="button" id="submit"><?php echo($first_data->button) ?></button>
          <span id="remaining">7 <?php echo($first_data->remaining) ?></span>
        </div>
    </main>
    <main id="secound" class="main main2">
      <div class="title">
        <span id ="text"><?php echo($secound_data->players) ?> 1</span>
      </div>
      <div class="card_holder">
        <div class="card" id ="card">

        </div>
      </div>
      <div class="input">
        <input class="button" type="submit" name="Next" value="<?php echo ($secound_data->button)?>" id="next">
      </div>
    </main>
    <main id="third" class="main main3">
      <div class="success_fail" id="successfail">
        <div class="how_sure_are_you">
          <p id="areyousure"></p>
          <div style = "">
            <input type="button" name="" value="<?php echo($third_data->yes) ?>" class="sure button">
            <input type="button" name="" value="<?php echo($third_data->no) ?>" class="sure button">
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
            <input class="button"  type="submit" name="" value="<?php echo($third_data->result) ?>" id="cardresult">
          </div>
          <div class="data_holder">
            <div class="info_holder" id="nextquest">

            </div>
            <div class="inputholder">
              <input class="button"  type="submit" name="" value="<?php echo($third_data->questbutton) ?> " onclick = "showCards()" class="input2 button" id="quest">
            </div>
          </div>
        </div>
        <div class="vote_bar">
          <span><?php echo($third_data->vote) ?> </span>
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
    <?php include('../linkafestmenyei/_assets/js/first.php'); include('../linkafestmenyei/_assets/js/secound.php'); include('../linkafestmenyei/_assets/js/third.php') ?>
    <footer>
    </footer>
  </body>
</html>
