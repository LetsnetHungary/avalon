<script>

var gameplay = new Array()

  gameplay[5] = (new Array(2, 3, 2, 3, 3))
  gameplay[6] = (new Array(2, 3, 4, 3, 4))
  gameplay[7] = (new Array(2, 3, 3, 4, 4))
  gameplay[8] = (new Array(3, 4, 4, 5, 5))
  gameplay[9] = (new Array(3, 4, 4, 5, 5))
  gameplay[10] = (new Array(3, 4, 4, 5, 5))
  gameplay[11] = (new Array(3, 4, 5, 5, 6))
  document.getElementById("quest").onclick = startQuest
  for (var i = 0; i < document.getElementsByClassName("votes").length; i++) {
  document.getElementsByClassName("votes")[i].onclick = function() {voteManager(true) }
  }
var lastcard = true
var cards = document.getElementsByClassName("successfail")
cards[0].onclick = function(){howSureAreYou(cards[0].getAttribute("data-success-fail-type"))};
cards[1].onclick = function(){howSureAreYou(cards[1].getAttribute("data-success-fail-type"))};

  document.getElementsByClassName("sure")[1].onclick = async function(){
      document.getElementsByClassName("how_sure_are_you")[0].style.opacity = "0";
    await sleep(200)
  document.getElementsByClassName("how_sure_are_you")[0].style.display = "none"
  }
  document.getElementsByClassName("sure")[0].onclick = async function() {
    document.getElementsByClassName("how_sure_are_you")[0].style.opacity = "0";
    await sleep(200)
    document.getElementsByClassName("how_sure_are_you")[0].style.display = "none"
    successfail(lastcard)}

var voteStatus = 0;
var rounds = 0;
var nextPlayers = gameplay[players][rounds];
var successfailStatus = 0;

var successfailArray = new Array();
var victorydefeat = new Array();


  function setTable(){
    nextPlayers = gameplay[players][rounds]
    var missions =  document.getElementsByClassName("p")
    for (var i = 0; i < 5; i++) {
      missions[i].innerHTML = gameplay[players][i]
    }
    tableDataManager()
  }

  function voteManager(bool) {
    if (bool) {
      if(voteStatus < 4){
        document.getElementsByClassName("votes")[voteStatus].style.backgroundColor = "rgba(250,250,250,0.2)"

        voteStatus++;

        document.getElementsByClassName("votes")[voteStatus].style.backgroundColor = "red"
        document.getElementsByClassName("votes")[voteStatus].style.border = "none"
      }
      if (voteStatus == 0) {
        document.getElementsByClassName("votes")[5].style.backgroundColor = "rgba(250,250,250,0.2)"

        document.getElementsByClassName("votes")[voteStatus].style.backgroundColor = "red"
        document.getElementsByClassName("votes")[voteStatus].style.border = "none"
      }
    }
    else {
      var votes = document.getElementsByClassName("votes")
      for (var i = 0; i < votes.length; i++) {
        votes[i].style.backgroundColor = "rgba(250,250,250,0.2)"
        votes[i].style.border = "none"
      }
      votes[0].style.backgroundColor = "red"
    }
  }

  function tableDataManager() {
    var table = document.getElementById("nextquest")
    if (players > 6 && rounds == 3) {
      table.innerHTML = nextPlayers + " <?php echo($third_data->players) ?>" + "</br> <?php echo $third_data->roundfour ?>"
    }
    else{
      table.innerHTML = nextPlayers + " <?php echo($third_data->players) ?>"
    }
  }


  async function startQuest() {
    voteStatus = 0

    document.getElementById("sleepingtown").style.display = "none"
    document.getElementsByClassName("how_sure_are_you")[0].style.display = "none"
    document.getElementById('table').style.opacity = 0;
    await sleep(200)
    document.getElementById('table').style.display = "none";

    document.getElementById('successfail').style.display = "flex";
    await sleep(200)
    document.getElementById('successfail').style.opacity = 1;


    var array = ["success", "fail"]
    array = orderChars(array)
    var cards = document.getElementsByClassName("successfail")
    cards[0].style.backgroundImage = "url('../linkafestmenyei/_assets/img/" + array[0] + ".jpg')"
    cards[0].setAttribute("data-success-fail-type", array[0])
    cards[1].style.backgroundImage = "url('../linkafestmenyei/_assets/img/" + array[1] + ".jpg')"
    cards[1].setAttribute("data-success-fail-type", array[1])
  }

  async function howSureAreYou(bool) {
    var dictionary = {"success":"<?php echo($third_data->success) ?>", "fail":"<?php echo($third_data->fail) ?>"}
    var div = document.getElementsByClassName("how_sure_are_you")[0]
    div.style.display = "flex"
    div.style.position = "absolute"
    div.style.zIndex = "5"
    await sleep(200)
    div.style.opacity = "1";

    document.getElementById("areyousure").innerHTML = "<?php echo($third_data->sure) ?>  " + dictionary[bool] + "?"
    if (bool == "success") {
      lastcard = true
    }
    else{
      lastcard = false
    }

  }

  function successfail(bool) {
    successfailArray[successfailStatus] = bool
    if (successfailStatus == nextPlayers - 1){
      rounds++
      nextPlayers = gameplay[players][rounds]
      victoryDefeat(rounds - 1)
    }
    else {
      successfailStatus++
      startQuest()
    }
  }

  function victoryDefeat(int){
    var bool = true
    if (rounds != 4 || players < 7) {
      for (var i = 0; i < successfailArray.length; i++) {
        if (!successfailArray[i]) {
          bool = false
        }
      }
    }
    else {
      var n = 0;
      for (var i = 0; i < successfailArray.length; i++) {
        if (!successfailArray[i]) {
          n++
        }
      }
      if (n >= 2) {
        bool = false
      }
    }
    victorydefeat[int] = bool
    successfailStatus = 0;

      endQuest()
  }
  async  function endQuest(){
    document.getElementById('successfail').style.opacity = 0;
    await sleep(200)
    document.getElementById('successfail').style.display = "none";

    document.getElementById('table').style.display = "flex";
    await sleep(200)
    document.getElementById('table').style.opacity = 1;

    document.getElementsByClassName("data_holder")[0].style.display = "none"
    var div = document.getElementsByClassName("card_container")[0]
    div.style.display = "flex"
    div.style.opacity = 1
    div.innerHTML = '<input type="submit" name="" value="<?php echo($third_data->result) ?>" onclick = "showCards()" class="input2 button" id="cardresult">'

    document.getElementById("cardresult").style.display = "flex";
    document.getElementById("cardresult").style.opacity = 1;
    tableDataManager()
  }
function setvictoryDefeat() {

      var missions =  document.getElementsByClassName("mission")
      if (victorydefeat[rounds -1]) {
        missions[rounds-1].innerHTML = "<img src = '../linkafestmenyei/_assets/img/s.jpg' class='missionimage'>"
      }
      else {
        missions[rounds-1].innerHTML = "<img src = '../linkafestmenyei/_assets/img/f.jpg' class='missionimage'>"
      }
}
  async function showCards(){
    var div = document.getElementsByClassName("card_container")[0]
    var content = "";
    successfailArray = orderChars(successfailArray)

    document.getElementById("cardresult").style.opacity = 0;
    await sleep(200)
    document.getElementById("cardresult").style.display = "none";

    for (var i = 0; i < successfailArray.length; i++) {
      if(successfailArray[i]){
        content += "<img src = '../linkafestmenyei/_assets/img/success.jpg' onclick = 'showTable()' class = 'cardimage' style='cursor: pointer; max-height: 245px; max-width: calc(90% / " + successfailArray.length + " - 20px)'> "
      }
      else{
        content += "<img src = '../linkafestmenyei/_assets/img/fail.jpg' class = 'cardimage' onclick = 'showTable()' style='cursor: pointer; max-height: 245px; max-width: calc(90% / " + successfailArray.length + " - 20px)'> "
      }
      div.innerHTML = content
    }
    for (var i = 0; i < document.getElementsByClassName("cardimage").length; i++) {
      document.getElementsByClassName("cardimage")[i].style.opacity = 1;
      await sleep(1000)
    }
    setvictoryDefeat()
    successfailArray = new Array()

    var countsuccess = 0
    var countfail = 0
    for (var i = 0; i < victorydefeat.length; i++) {
      if (victorydefeat[i]) {
        countsuccess++
      }
      else {
        countfail++
      }
    }
    if(countsuccess >= 3){
      endGame(true)
    }
    else if(countfail >= 3){
      endGame(false)
    }
  }

  async function showTable() {
    var div = document.getElementsByClassName("card_container")[0]
    div.style.opacity = 0;
    await sleep(200)
    div.style.display = "none"

    div = document.getElementsByClassName("data_holder")[0]
    div.style.opacity = 0;
    div.style.display = "flex"
    await sleep(200)
    div.style.opacity = 1;
    voteManager()
  }
  function endGame(bool) {
    var div = document.getElementsByClassName("card_container")[0]
    div.innerHTML = ""
    if (bool) {
      div.innerHTML = "<p style = 'width: 60%; text-align: center' ><?php echo($third_data->victory) ?></p>"
    }
    else {
      div.innerHTML = "<p style = 'width: 60%; text-align: center' ><?php echo($third_data->defeat) ?></p>"
    }
  }
</script>
