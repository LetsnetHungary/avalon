<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Metamorphous" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="shortcut icon" href="favicon.ico" />
		<!--<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">-->
		<link rel="stylesheet" type = "text/css" href="../linkafestmenyei/_assets/css/n.css">
    <link rel="stylesheet" type = "text/css" href="../linkafestmenyei/_assets/css/rules.css">
    <link rel="stylesheet" type = "text/css" href="../linkafestmenyei/_assets/css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <meta charset="utf-8">
    <script type ="text/javascript" src="../linkafestmenyei/_assets/js/rules.js"></script>

    <title>Avalon</title>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <script type ="text/javascript" src="../linkafestmenyei/_assets/js/rules.js"></script>
  <main>
    <div class="sidebar">
      <div class="sidebar__element__container">
        <div class="rules__part">
          <a href="#preparation"><span><?php echo$rules_data->preparation->sidebar ?></span></a>
        </div>
        <div class="rules__part">
          <a href="#endofgame"><span><?php echo$rules_data->endofgame->sidebar ?></span></a>
        </div>
        <div class="rules__part">
            <a href="#game"><span><?php echo$rules_data->game->sidebar ?></span></a>
            <div class="small__part">
              <a href="#players"><span><?php echo$rules_data->game->players->sidebar ?></span></a>
              <a href="#vote"><span><?php echo$rules_data->game->vote->sidebar ?></span></a>
              <a href="#quest"><span><?php echo$rules_data->game->quest->sidebar ?></span></a>
              <a href="#result"><span><?php echo$rules_data->game->result->sidebar ?></span></a>
            </div>
        </div>
        <div class="rules__part">
            <a href="#characters"><span><?php echo$rules_data->characters->sidebar ?></span></a>
            <div class="small__part">
              <a href="#merlin"><span>Merlin</span></a>
              <a href="#assassin"><span>Assassin</span></a>
              <a href="#oberon"><span>Oberon</span></a>
              <a href="#percival"><span>Percival</span></a>
              <a href="#morgana"><span>Morgana</span></a>
              <a href="#guinevere"><span>Guinevere</span></a>
              <a href="#mordred"><span>Mordred</span></a>
              <a href="#sirkay"><span>Sir Kay</span></a>
            </div>
        </div>
        <div class="rules__part">
            <a href="#suggestions"><span><?php echo$rules_data->suggestion->sidebar ?></span></a>
        </div>
      </div>
    </div>
    <div class="rules">
      <div class="text__holder">
        <div class="paragraph" id="preparation">
          <?php
          foreach ($rules_data->preparation as $key => $value) {
            if($key!="sidebar") echo($value);;
          }

          ?>
        </div>
        <div class="paragraph" id="endofgame">
          <?php
          foreach ($rules_data->endofgame as $key => $value) {
            if($key!="sidebar") echo($value);;
          }
          ?>
        </div>
        <div class="paragraph" id="game">
          <?php
          foreach ($rules_data->game->game as $key => $value) {
            if($key!="sidebar") echo($value);;
          }

          ?>
          <?php
          foreach ($rules_data->game->select as $key => $value) {
            if($key!="sidebar") echo($value);;
          }

          ?>
          <?php
          foreach ($rules_data->game->vote as $key => $value) {
            if($key!="sidebar") echo($value);;
          }

          ?>
          <?php
          foreach ($rules_data->game->quest as $key => $value) {
            if($key!="sidebar") echo($value);;
          }

          ?>

          <?php
          foreach ($rules_data->game->result as $key => $value) {
            if($key!="sidebar") echo($value);;
          }

          ?>
        </div>
        <div class="paragraph" id="characters">
          <?php
          foreach ($rules_data->characters->mom as $key => $value) {
            if($key!="sidebar") echo($value);;
          }

          ?>

            <h2 id="merlin">Merlin (Servant of Arthur)</h2><p>
              <?php
              foreach ($rules_data->characters->merlin as $key => $value) {
                if($key!="sidebar") echo($value);;
              }

              ?>
            <h2 id="assassin">Assassin (Minion of Mordred)</h2><p>
              <?php
              foreach ($rules_data->characters->assassin as $key => $value) {
                if($key!="sidebar") echo($value);;
              }

              ?>
            <h2 id="oberon">Oberon (Minion of Mordred)</h2>
            <?php
            foreach ($rules_data->characters->oberon as $key => $value) {
              if($key!="sidebar") echo($value);;
            }

            ?>
            <h2 id="percival">Percival (Loyal Servant of Arthur)</h2>
            <?php
            foreach ($rules_data->characters->percival as $key => $value) {
              if($key!="sidebar") echo($value);;
            }

            ?>
            <h2 id="morgana">Morgana (Minion of Mordred)</h2>
            <?php
            foreach ($rules_data->characters->morgana as $key => $value) {
              if($key!="sidebar") echo($value);;
            }

            ?>
            <h2 id="guinevere">Guinevere (Servant of Arthur)</h2>
            <?php
            foreach ($rules_data->characters->guinevere as $key => $value) {
              if($key!="sidebar") echo($value);;
            }

            ?>
            <h2 id="mordred">Mordred</h2>
            <?php
            foreach ($rules_data->characters->mordred as $key => $value) {
              if($key!="sidebar") echo($value);;
            }

            ?>
            <h2 id="sirkay">Sir Kay (Servant of Arthur)</h2>
            <?php
            foreach ($rules_data->characters->sirkay as $key => $value) {
              if($key!="sidebar") echo($value);;
            }

            ?>
        </div><div class="paragraph" id="suggestions">
          <?php
          foreach ($rules_data->suggestion as $key => $value) {
            if($key!="sidebar") echo($value);;
          }

          ?>
        </div>

      </div>
    </div>
  </main>
  </body>
</html>
