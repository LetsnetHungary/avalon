<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Metamorphous" rel="stylesheet">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="shortcut icon" href="favicon.ico" />
		<!--<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">-->
		<link rel="stylesheet" type = "text/css" href="../linkafestmenyei/_assets/css/n.css">
    <link rel="stylesheet" type = "text/css" href="../linkafestmenyei/_assets/css/first.css">
    <link rel="stylesheet" type = "text/css" href="../linkafestmenyei/_assets/css/secound.css">
    <link rel="stylesheet" type = "text/css" href="../linkafestmenyei/_assets/css/third.css">
    <link rel="stylesheet" type = "text/css" href="../linkafestmenyei/_assets/css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
              <input class="button"  type="submit" name="" value="<?php echo($third_data->sleepingtown) ?> " onclick = "sleepingtown()" class="input2 button" id="sleepingtown">
              <input class="button"  type="submit" name="" value="Stop" onclick = "pauseaudio()" class="input2 button" id="pauseaudio" style="display: none;">
              <input class="button"  type="submit" name="" value="<?php echo($third_data->questbutton) ?> " class="input2 button" id="quest">
            </div>
            <div class="sleepingtown__holder">
              <audio   class="sleepingtown">
                <source src="_assets/<?php echo($_SESSION["language"]) ?>/sounds/minions.mp3" type="audio/mpeg">
              </audio>
              <audio   class="sleepingtown">
                <source src="_assets/<?php echo($_SESSION["language"]) ?>/sounds/minionsoberon.mp3" type="audio/mpeg">
              </audio>
              <audio   class="sleepingtown">
                <source src="_assets/<?php echo($_SESSION["language"]) ?>/sounds/merlinsirkay.mp3" type="audio/mpeg">
              </audio>
              <audio   class="sleepingtown">
                <source src="_assets/<?php echo($_SESSION["language"]) ?>/sounds/merlinsirkaymordred.mp3" type="audio/mpeg">
              </audio>
              <audio   class="sleepingtown">
                <source src="_assets/<?php echo($_SESSION["language"]) ?>/sounds/merlinmordred.mp3" type="audio/mpeg">
              </audio>
              <audio   class="sleepingtown">
                <source src="_assets/<?php echo($_SESSION["language"]) ?>/sounds/merlin.mp3" type="audio/mpeg">
              </audio>
              <audio   class="sleepingtown">
                <source src="_assets/<?php echo($_SESSION["language"]) ?>/sounds/percival.mp3" type="audio/mpeg">
              </audio>
              <audio   class="sleepingtown">
                <source src="_assets/<?php echo($_SESSION["language"]) ?>/sounds/guinevere.mp3" type="audio/mpeg">
              </audio>
              <audio   class="sleepingtown">
                <source src="_assets/<?php echo($_SESSION["language"]) ?>/sounds/end.mp3" type="audio/mpeg">
              </audio>
              <audio   class="sleepingtown">
                <source src="_assets/<?php echo($_SESSION["language"]) ?>/sounds/start.mp3" type="audio/mpeg">
              </audio>

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
    <?php include('_assets/js/first.php');
     include('_assets/js/secound.php');
      include('_assets/js/third.php');
      ?>
    <footer>
    </footer>
  </body>
</html>
