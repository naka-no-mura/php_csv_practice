<?php

// fputcsv関数
function csvFunctionOutput() {
  $data = [
    ['ID', '名前', '年齢'],
    ['1', '田中', '30'],
    ['2', '小林', '26'],
    ['3', '江口', '32'],
    ['4', '佐藤', '10'],
  ];

  if ($_GET['function_output']) {
    $fp = fopen('member_function.csv', 'w');

    foreach ($data as $line) {
      fputcsv($fp, $line, ',', '"');
    }
  }
  return;

  header('Location: index.php');
  exit();
}
csvFunctionOutput();


// SplFileObject
function csvObjectOutput() {
  $data = [
    ['ID', '名前', '年齢'],
    ['1', '田中', '30'],
    ['2', '小林', '26'],
    ['3', '江口', '32'],
    ['4', '佐藤', '10'],
  ];

  if ($_GET['object_output']) {
    $file = new SplFileObject('member_object.csv', 'w');

    foreach ($data as $line) {
      $file->fputcsv($line);
    }
  }
  return;

  header('Location: index.php');
  exit();
}
csvObjectOutput();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSV出力</title>
</head>
<body>
  <head>
    <h1>CSV出力練習</h1>
  </head>
  <main>
    <form action="" method="get">
      <input type="hidden" name="function_output" value="function_output">
      <input type="submit" value="fputcsv関数を使ってCSVを出力する">
    </form>
    <form action="" method="get">
      <input type="hidden" name="object_output" value="object_output">
      <input type="submit" value="SplFileObjectを使ってCSVを出力する">
    </form>
  </main>
</body>
</html>