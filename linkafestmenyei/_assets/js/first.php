<script>

var characters = ["merlin", "morgana", "percival", "mom", "lsoa", "gini", "kay", "mordred", "oberon", "assassin"]

document.getElementById(characters[0]).onclick = function(){save(characters[0])}
document.getElementById(characters[1]).onclick = function(){save(characters[1])}
document.getElementById(characters[2]).onclick = function(){save(characters[2])}
document.getElementById(characters[5]).onclick = function(){save(characters[5])}
document.getElementById(characters[6]).onclick = function(){save(characters[6])}
document.getElementById(characters[7]).onclick = function(){save(characters[7])}
document.getElementById(characters[8]).onclick = function(){save(characters[8])}
document.getElementById(characters[9]).onclick = function(){save(characters[9])}

document.getElementById("badcharactersplus").onclick = function(){save(characters[3], true)}
document.getElementById("badcharactersminus").onclick = function(){save(characters[3], false)}

document.getElementById("goodcharactersplus").onclick = function(){save(characters[4], true)}
document.getElementById("goodcharactersminus").onclick = function(){save(characters[4], false)}

document.getElementById("back").onclick = back
document.getElementById("newgame").onclick = newgame
var numOfPlayers = document.getElementById("numofplayers")
numOfPlayers.oninput = setnumofplayers
var players = numOfPlayers.value;
var setCharacters = new Array();
var startCharacters = ["merlin", "assassin"]
var submit = document.getElementById("submit")
var maincounter = 0;
var mains = document.getElementsByClassName("main")
var isaudioplayed = false;

submit.onclick = function(){next()};

first(startCharacters)

  var button = document.getElementById("sleepingtown")
  button.value = "<?php echo($third_data->sleepingtown) ?> ";
  button.onclick = sleepingtown


async function sleepingtown(){
  isaudioplayed = true
  document.getElementById("sleepingtown").style.display = "none";
  document.getElementById("pauseaudio").style.display = "block";


  await playAudio(9)
//EVILS
  if(ischarset("oberon") && isaudioplayed){
    await playAudio(1);
  }
  else if(!ischarset("oberon") && isaudioplayed){
    await playAudio(0);
  }
  else{
    document.getElementById("sleepingtown").style.display = "block";
    return;
  }
  //MERLIN
  if(ischarset("kay") && !ischarset("mordred")&& isaudioplayed){
    await playAudio(2)
  }
  else if(ischarset("kay") && ischarset("mordred")&& isaudioplayed){
    await playAudio(3)
  }
  else if(!ischarset("kay") && ischarset("mordred")&& isaudioplayed){
    await playAudio(4)
  }
  else if(!ischarset("kay") && !ischarset("mordred") && isaudioplayed){
    await playAudio(5)
  }
  else{
    document.getElementById("sleepingtown").style.display = "block";
    return
  }
  //Percival
  if(ischarset("percival")&& isaudioplayed){
    await playAudio(6)
  }
  else {
    document.getElementById("sleepingtown").style.display = "block";
    return
  }
  //guinevere
  if(ischarset("gini") && ischarset("lsoa") && isaudioplayed){
    await playAudio(7)
  }
  else {
    document.getElementById("sleepingtown").style.display = "block";
    return
  }
  //end
  if (isaudioplayed) {
    await playAudio(8);
  }
}
async function playAudio(num){
  var sounds = document.getElementsByClassName('sleepingtown');
  sounds[num].play()
  var duration = sounds[num].duration * 1000
  await sleep(duration)

}
function pauseaudio() {
  var sounds = document.getElementsByClassName('sleepingtown');
  for (var i = 0; i < sounds.length; i++) {
    sounds[i].load()
    sounds[i].pause()
  }
  isaudioplayed = false
  document.getElementById("pauseaudio").style.display = "none"

}

function ischarset(string){
  for (var i = 0; i < setCharacters.length; i++) {
    if (setCharacters[i] == string) {
      return true;
    }
  }
  return false;
}

function first(array){
  for (var i = 0; i < array.length; i++) {
    save(array[i], true)
  }
}
function setnumofplayers(){
  players = numOfPlayers.value
  setRemaining();
  isReady();
}

function save(data, bool){
  if(data == "mom" || data == "lsoa"){
    multipleadd(data, bool)
    setRemaining();
    return
  }
  var n = isItSaved(data);
  if (n == "true") {
      setCharacters[setCharacters.length] = data
      document.getElementById(data).style.border = "5px solid rgba(0, 185,0,1)"
      document.getElementById(data).style.zIndex = "2"
  }
  else{
    setCharacters.splice(n, 1);
    document.getElementById(data).style.border = "0px solid green"
    document.getElementById(data).style.zIndex = "5"
  }
  isReady()
  setRemaining()
}
function setRemaining(){
  var span = document.getElementById("remaining")
  if(!isReady()){
    span.innerHTML =" " + players - setCharacters.length + " <?php echo($first_data->remaining) ?>"
  }
  else{
    span.innerHTML = ""
  }
}
function isReady(){
  if (setCharacters.length==players) {
    submit.style.opacity = 1;
    return true
  }
  else {
    submit.style.opacity = .6
    return false
  }
}

function isItSaved(data){
  for (var i = 0; i < setCharacters.length; i++) {
    if(setCharacters[i] == data){
      return i
    }

  }
  return "true";
}
function multipleadd(data, bool) {
  var n = isItSaved(data);
  if (bool) {
    setCharacters[setCharacters.length] = data
    if (data=="mom") {
        document.getElementById("badcharactersn").innerHTML++
    }
    else{
        document.getElementById("goodcharactersn").innerHTML++
    }
  }
  else if(!bool && n!="true"){
  if (data=="mom") {
      document.getElementById("badcharactersn").innerHTML--
  }
  else{
      document.getElementById("goodcharactersn").innerHTML--
  }
    setCharacters.splice(n, 1)
  }
  isReady();
  for (var i = 0; i < setCharacters.length; i++) {
    if (setCharacters[i] == data) {
      document.getElementById(data).style.border = "5px solid rgba(0,185,0,1)"
      document.getElementById(data).style.zIndex = "2"
      return
    }
  }
  document.getElementById(data).style.border = "0px solid green"
  document.getElementById(data).style.zIndex = "5"
}
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}
async function next() {
  if (isReady()) {
    var main1 = mains[maincounter]
    var main2 = mains[maincounter+1]
    main1.style.animationPlayState = "running";
    await sleep(1000)
    main1.style.display = "none";
    main2.style.display = "flex";
    main2.style.animationPlayState = "running"
    await sleep(1000)
    main2.style.animationPlayState = "paused"
    main1.style.animationPlayState = "paused"
    document.getElementById("badcharactersn").innerHTML = "0"
    document.getElementById("goodcharactersn").innerHTML = "0"
    maincounter++;
    mains[maincounter].id = "first"
    if (maincounter < 2) {
      mains[maincounter + 1].id = "secound"
    }
    mains[maincounter - 1].id = "displayed"
    secound()
    setTable()
  }
}
function back(){
  if(maincounter != 0){
    maincounter--
  }
  mains[maincounter].id = "first"

  mains[maincounter + 1].id = "secound"
  var main1 = mains[maincounter]
  var main2 = mains[maincounter + 1]
  main2.style.display = "none";
  main1.style.display = "flex";
  startCharacters = setCharacters
  setCharacters = new Array();
  first(startCharacters)

}
function newgame(){
  var main1 = mains[0]
  var main2 = mains[maincounter]
  main1.style.animationPlayState = "paused"
  main2.style.display = "none";
  main1.style.display = "flex";
  startCharacters = setCharacters
  setCharacters = new Array();
  first(startCharacters)

  maincounter = 0;
  mains[0].id = "first"
  mains[1].id = "secound"
  mains[2].id = "third"

  personcounter = 0;
  cardHandler(false)
  charactersOrder = null;
  charactersOrder = new Array()

  showTable()

  voteStatus = 0;
  rounds = 0;
  nextPlayers = gameplay[players][rounds];
  successfailStatus = 0;
  successfailArray = new Array();
  victorydefeat = new Array();
  document.getElementById("sleepingtown").style.display = "block"
  var missions =  document.getElementsByClassName("mission")
  for (var i = 0; i < missions.length; i++) {
    missions[i].innerHTML = '<p class="p"></p>'
  }
}
</script>
