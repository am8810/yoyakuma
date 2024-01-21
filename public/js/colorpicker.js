function buttonClick(){
  nowcolor.innerHTML = ('現在選択している色は ' + colorBox.value + ' です。');
  console.log('現在選択している色は ' + colorBox.value + ' です。');
}

let colorBox = document.getElementById('colorBox');

let checkButton = document.getElementById('checkButton');
checkButton.addEventListener('click', buttonClick);

var nowcolor = document.getElementById("nowcolor");
nowcolor.innerHTML = ('現在選択している色は ' + colorBox.value + ' です。');







