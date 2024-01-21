var i = 1; // 変数iを初期化し、値1を代入
function addForm() { // 「追加」ボタンをクリックしたら実行される関数
  var input_data = document.createElement('input'); // input要素を作成し、変数input_dataに代入
  input_data.type = 'email'; // type属性をemailに設定
  input_data.id = 'inputform_' + i; // id属性をinputform_の後を数字でそれぞれ分ける
  input_data.name = 'inputform[]'; // 複数あるフィールドの同じname属性を配列として設定
  input_data.placeholder = '○○○@△△△.com'; // placeholderを設定
  input_data.className = 'form-control'; // class属性にform-controlを入れる

  var form_div = document.createElement('div'); // 新しいdiv要素を作成して、変数form_divに代入
  form_div.appendChild(input_data); // divの子要素としてinput_dataのinput要素を作成

  var parent = document.getElementById('receiving_address'); // 最初の受信メールアドレスのフォームのidを取得し、変数parentに代入
  parent.appendChild(form_div); // 新しいdiv要素を、変数parentの要素の中に追加
  i++; // 変数iの値を1つずつ反復的に増加
}
