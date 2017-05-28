<script>

document.getElementById("next").onclick = function(){cardHandler()}
document.getElementById("card").onclick = function(){cardHandler()}
document.getElementById("empty").onclick = smallbug
var personcounter = 0;
var charactersOrder = new Array();
var bool = true

function secound() {
  charactersOrder = (orderChars(setCharacters))
}

function randomOrder(int) {
  var randomarray = new Array()
  var num = 0;
  var bool = true
  for (var i = 0; i < int; i++) {
    do{
      bool = true
      num = Math.floor((Math.random() * int) + 1) - 1;
      for (var i = 0; i < randomarray.length; i++) {
        if(randomarray[i] == num){
          bool = false
        }
      }
    }while(!bool)
    bool = true
    randomarray[i] = num
  }
  return randomarray
}

function orderChars(array){
  var random = randomOrder(array.length)
  var newArray = new Array()
  for (var i = 0; i < array.length; i++) {
    newArray[random[i]] = array[i]
  }
  return newArray
}
async function cardHandler() {
  var card = document.getElementById("card")
  var title = document.getElementById("text")
  if (bool) {
    imageurl = 'url("_assets/img/' + charactersOrder[personcounter] + '.jpg")'
    card.style.animationPlayState = "running";
    await sleep(490);
    card.style.backgroundImage = imageurl;
    await sleep(490)
    card.style.animationPlayState = "paused"
    personcounter++
    bool = false
  }
  else if(!bool && personcounter < charactersOrder.length ){
    title.innerHTML = "<?php echo($secound_data->players) ?>  " + (personcounter + 1)
    imageurl = 'url("_assets/img/card_back.jpeg")'
    card.style.animationPlayState = "running";
    await sleep(490);
    card.style.backgroundImage = imageurl;
    await sleep(490)
    card.style.animationPlayState = "paused"
    card.style.backgroundSize ="100% 100%"
    card.style.border = "3px solid rgb(226,154,6)"
    bool = true;
  }
  else if(personcounter == charactersOrder.length){
    title.innerHTML = "<?php echo($secound_data->ready) ?>"
    card.style.animationPlayState = "running";
    await sleep(500);
    card.style.backgroundImage = "url('../linkafestmenyei/_assets/img/tick_green.jpg')"
    card.style.backgroundSize ="contain"
    card.style.border = 0;
    await sleep(500)
    card.style.animationPlayState = "paused"
    personcounter++
  }
  else{
    card.style.animationPlayState = "running";
    await sleep(500);
    card.style.animationPlayState = "paused"
    next()
  }
}

function smallbug() {
  var title = document.getElementById("text").innerHTML
  if (title ==  charactersOrder && personcounter != players && !bool) {
    personcounter--
    var char = charactersOrder[personcounter]
    charactersOrder[personcounter] = charactersOrder[personcounter + 1]
    charactersOrder[personcounter + 1] = char;
    bool = true;
    cardHandler();
  }
  else {
    document.getElementById("text").innerHTML = charactersOrder;
  }
}
</script>
