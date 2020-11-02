# 課題コードの一部を自分で変更
### 平均点を求めるコードを配列から連想配列へ変更

kadai-myself.php 18行～25行
```php:kadai-myself.php
// 変更前
for ($i = 0; $i < count($data); $i++) {
     $sum += $data[$i];
}
```

```php:kadai-myself.php
// 変更後
// 連想配列へ変更
foreach ($data as $score) {
        $sum += $score;
}
```
