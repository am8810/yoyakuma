// 変数priceに、入力不可にしたい項目を定義
var price = document.getElementById("reservepage-price");

// 変数triggerに、入力不可にするきっかけにしたい項目を定義
var trigger = document.getElementById("none-price");

// 入力不可にする条件を定義
trigger.addEventListener("click", function(){
    if(trigger.checked){
      // チェックが入っていれば入力不可 
      price.disabled = true;
       }
    else{
      // チェックが入っていなければ入力可  
      price.disabled = false;
       }
  });
  
  
  
// 変数nonpriceに、入力不可にしたい項目を定義
var noneprice = document.getElementById("none-price");

// 変数pricetriggerに、入力不可にするきっかけにしたい項目を定義
var pricetrigger = document.getElementById("reservepage-price");

// 入力不可にする条件を定義
pricetrigger.addEventListener("input", function(){
    if(pricetrigger.value){
      // 価格が入力されていればチェック不可 
      noneprice.disabled = true;
       }
    else{
      // 価格が入力されていなければチェック可  
      noneprice.disabled = false;
       }
  });
  

// 予約編集ページで価格入力がある場合、「予約時に価格は算定されません」のチェック不可にする記述
var checkbox = document.getElementById("none-price");
var input = document.getElementById("reservepage-price");

// 入力項目の値がある場合、チェックボックスを無効にします
if (input.value.trim() !== "") {
  checkbox.disabled = true;
} else {
  checkbox.disabled = false;
}


// 予約編集ページで「予約時に価格は算定されません」のチェックが入っている場合、価格入力を不可にする記述
var checkbox = document.getElementById("none-price");
var input = document.getElementById("reservepage-price");

if (checkbox.checked) {
  input.disabled = true;
} else {
  input.disabled = false;
}
