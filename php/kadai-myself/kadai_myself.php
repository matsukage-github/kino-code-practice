<?php
    class Student {

        public $name;

        public function __construct($name)
        {
            $this->name = $name;
        }

        function avg($math, $english) {
            echo (($math + $english) / 2) . PHP_EOL;
        }

        function cal_avg($data) {
            $sum = 0;

            // for ($i = 0; $i < count($data); $i++) {
            //     $sum += $data[$i];
            // } ↓↓↓↓↓↓

            // 連想配列へ変更
            foreach ($data as $score) {
                $sum += $score;
            }
            $avg = $sum / count($data);

            return $avg;
        }

        function judge($avg) {
            if ($avg >= 60) {
                $result = 'passed';
            } else {
                $result = 'failed';
            }

            return $result;
        }
    }

    $data = [70, 65, 50, 10, 30];
    $a001 = new Student('sato');
    $avg = $a001->cal_avg($data);
    $result = $a001->judge($avg);

    echo count($data) . PHP_EOL;
    echo $a001->name . PHP_EOL;
    echo $avg . PHP_EOL;
    echo $result . PHP_EOL;
