# 課題コードの一部を自分で変更
### 平均点を求めるコードを配列から連想配列へ変更

変更前
```php:kadai-myself.php
for ($i = 0; $i < count($data); $i++) {
     $sum += $data[$i];
}
```
変更後
```php:kadai-myself.php
// 連想配列へ変更
foreach ($data as $score) {
        $sum += $score;
}
```
