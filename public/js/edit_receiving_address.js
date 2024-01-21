const inputforms = document.getElementById('inputforms'); // id属性がinputformsの要素を取得し、変数inputformsに格納
let inputformsArray = inputforms.value.split(","); // inputformsの値をカンマで分割し、配列として変数inputformsArrayに格納
const inputform_0 = document.getElementById('inputform_0'); // id属性がinputform_oの要素を取得し、変数inputform_0に格納
inputform_0.value = inputformsArray[0]; // 変数inputform_0に、inputformsArrayの最初の値を取得

for (let i = 1; i < inputformsArray.length; i++) { // inputformsArray配列の要素を i というカウンターを使用して反復処理
  if (inputformsArray[i] != '') { // inputformsArray配列の i 番目の要素が空でない場合
    editForm(inputformsArray[i], i); // 関数editFormを呼び出し、
  }
}



function editForm(inputform, i) { // 関数editFormを宣言
  var input_data = document.createElement('input'); // input要素を作成し、変数input_dataに代入
  input_data.type = 'email'; // type属性をemailに設定
  input_data.id = 'inputform_' + i; // id属性をinputform_の後を数字でそれぞれ分ける
  input_data.name = 'inputform[]'; // 複数あるフィールドの同じname属性を配列として設定
  input_data.value = inputform; // input_dataの値を、引数である変数inputformに格納

  var form_div = document.createElement('div'); // 新しいdiv要素を作成して、変数form_divに代入
  form_div.appendChild(input_data); // divの子要素としてinput_dataのinput要素を作成

  var parent = document.getElementById('receiving_address'); // 最初の受信メールアドレスのフォームのidを取得し、変数parentに代入
  parent.appendChild(form_div); // 新しいdiv要素を、変数parentの要素の中に追加
  i++; // 変数iの値を1つずつ反復的に増加
}