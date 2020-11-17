<?php

// バリデーション処理
function validate($exam)
{
    $errors = [];

    // 受験者氏名が正しく入力されているかチェック
    if (!strlen($exam['name'])) {
        $errors['name'] = '受験者氏名を入力してください';
    } elseif (strlen($exam['name']) > 20) {
        $errors['name'] = '受験者氏名は20文字以内で入力してください';
    }

    // 各教科の得点が正しく入力されているかチェック
    if (($exam['japanese'] < 0 || $exam['japanese'] > 100)) {
        $errors['japanese'] = '国語の得点は0～100点の整数で入力してください。';
    }
    if (($exam['english'] < 0 || $exam['english'] > 100)) {
        $errors['english'] = '英語の得点は0～100点の整数で入力してください。';
    }
    if (($exam['mathematics'] < 0 || $exam['mathematics'] > 100)) {
        $errors['mathematics'] = '数学の得点は0～100点の整数で入力してください。';
    }
    if (($exam['science'] < 0 || $exam['science'] > 100)) {
        $errors['science'] = '理科の得点は0～100点の整数で入力してください。';
    }
    if (($exam['society'] < 0 || $exam['society'] > 100)) {
        $errors['society'] = '社会の得点は0～100点の整数で入力してください。';
    }

    return $errors;
}

// 受験者氏名と各教科の点数を登録
function createExam()
{
    $exam = [];

    // 標準入力
    echo '-----------------------' . PHP_EOL;
    echo '受験者氏名と各教科の点数を入力してください。' . PHP_EOL;
    echo '受験者氏名：';
    $exam['name'] = trim(fgets(STDIN));
    echo '点数' . PHP_EOL;
    echo '国語：';
    $exam['japanese'] = (int) trim(fgets(STDIN));
    echo '英語：';
    $exam['english'] = (int) trim(fgets(STDIN));
    echo '数学：';
    $exam['mathematics'] = (int) trim(fgets(STDIN));
    echo '理科：';
    $exam['science'] = (int) trim(fgets(STDIN));
    echo '社会：';
    $exam['society'] = (int) trim(fgets(STDIN));
    echo '-----------------------' . PHP_EOL;

    // バリデーション関数の呼び出し
    $validated = validate($exam);
    if (count($validated) > 0) {
        foreach ($validated as $error) {
            echo $error . PHP_EOL;
        }
        return;
    }

    return $exam;
}

// 受験者氏名と各教科の点数、5教科の平均点を表示
function listExam($exam)
{
    // 5教科平均の計算
    $avg = ($exam['japanese'] + $exam['english'] + $exam['mathematics'] + $exam['science'] + $exam['society']) / 5;

    // 表示
    echo '-----------------------' . PHP_EOL;
    echo '受験者氏名：' . $exam['name'] . PHP_EOL;
    echo '点数' . PHP_EOL;
    echo '国語：' . $exam['japanese'] . PHP_EOL;
    echo '英語：' . $exam['english'] . PHP_EOL;
    echo '数学：' . $exam['mathematics'] . PHP_EOL;
    echo '理科：' . $exam['science'] . PHP_EOL;
    echo '社会：' . $exam['society'] . PHP_EOL;
    echo '5教科平均は' . $avg . '点です' . PHP_EOL;
    echo '-----------------------' . PHP_EOL;
}

while (true) {

    echo '1. 受験者氏名と各教科の点数を登録' . PHP_EOL;
    echo '2. 受験者氏名と各教科の点数を表示' . PHP_EOL;
    echo '9. アプリケーションを終了' . PHP_EOL;
    echo '番号を選択してください(1,2,9)：';

    $num = trim(fgets(STDIN));

    if ($num === '1') {
        $exam = createExam();
    } elseif ($num === '2') {
        listExam($exam);
    } elseif ($num === '9') {
        break;
    }
}
