<?php
interface TimeToWordConvertingInterface {
    public function convert(int $hours, int $minutes): string;
}
class TimeToWordConverter implements TimeToWordConvertingInterface
{
    private array $numbers = [
        1 => 'один',
        2 => 'два',
        3 => 'три',
        4 => 'четыре',
        5 => 'пять',
        6 => 'шесть',
        7 => 'семь',
        8 => 'восемь',
        9 => 'девять',
        10 => 'десять',
        11 => 'одиннадцать',
        12 => 'двенадцать',
        13 => 'тринадцать',
        14 => 'четырнадцать',
        15 => 'пятнадцать',
        16 => 'шестнадцать',
        17 => 'семнадцать',
        18 => 'восемнадцать',
        19 => 'девятнадцать',
        20 => 'двадцать'

    ];
    private array $lastmins = [
        1 => 'одна',
        2 => 'две',
        3 => 'три',
        4 => 'четыре',
        5 => 'пять',
        6 => 'шесть',
        7 => 'семь',
        8 => 'восемь',
        9 => 'девять'
    ];
    private array $hrs = [
        1 => 'часа',
        2 => 'двух',
        3 => 'трех',
        4 => 'четырех',
        5 => 'пяти',
        6 => 'шести',
        7 => 'семи',
        8 => 'восьми',
        9 => 'девяти',
        10 => 'десяти',
        11 => 'одиннадцати',
        12 => 'двенадцати'
    ];
    private array $hrs2 = [
        1 => 'первого',
        2 => 'второго',
        3 => 'третьего',
        4 => 'четвертого',
        5 => 'пятого',
        6 => 'шестого',
        7 => 'седьмого',
        8 => 'восьмого',
        9 => 'девятого',
        10 => 'десятого',
        11 => 'одиннадцатого',
        12 => 'двенадцатого'
    ];

    public function convert(int $hours, int $minutes): string
    {
        $minutes_old = $minutes;
        $hourWords = $this->hrs[$hours];
        if($minutes_old != 0){
            $minuteWords = $this->getMinuteWords($minutes);
        } else {
            $minuteWords = "";
        }

        if ($minutes_old == 0) {
            $hourWords = $this->numbers[$hours];
            if($hours > 1 && $hours < 5){
                $timeWords = "$hourWords часа";
            } elseif ($hours == 1){
                $timeWords = "$hourWords час";
            } else {
                $timeWords = "$hourWords часов";
            }
        } elseif($minutes_old == 15){
            if($hours == 12){
                $hourWords = $this->hrs2[1];
            } else{
                $hourWords = $this->hrs2[$hours + 1];
            }
            $timeWords = "$minuteWords $hourWords";
        }elseif ($minutes_old < 30) {
            $timeWords = "$minuteWords после $hourWords";
        } elseif ($minutes_old == 30){
            if($hours == 12){
                $hourWords = $this->hrs2[1];
            } else{
                $hourWords = $this->hrs2[$hours + 1];
            }
            $timeWords = "$minuteWords $hourWords";
        }
        else {
            if($hours == 12){
                $hourWords = $this->hrs[1];
            } else{
                $hourWords = $this->hrs[$hours + 1];
            }
            $timeWords = "$minuteWords до $hourWords";
        }
        $char = substr($timeWords,0,2);
        $char = mb_chr(mb_ord($char) - 32);
        $timeWords[0] = $char[0];
        $timeWords[1] = $char[1];
        if ($minutes_old < 10){
            return "$hours:0$minutes - $timeWords.";
        } else{
            return "$hours:$minutes_old - $timeWords.";
        }
    }
    private function getMinuteWords(int $minutes): string
    {
        $minutes_old = $minutes;
        if ($minutes > 30){
            $minutes = 60 - $minutes;
        }
        if ($minutes_old == 15) {
            return 'Четверть';
        } elseif ($minutes == 30) {
            return 'Половина';
        } elseif($minutes_old > 30 && $minutes < 10){
            if (($minutes > 1) && ($minutes < 5)) {
                return "{$this->lastmins[$minutes]}" . " минуты";
            } elseif ($minutes == 1) {
                return "{$this->lastmins[$minutes]}" . " минута";
            } else {
                return "{$this->lastmins[$minutes]}" . " минут";
            }
        } elseif ($minutes <= 20 || $minutes % 10 == 0)  {
            if (($minutes > 1) && ($minutes < 5)) {
                return $this->lastmins[$minutes] . " минуты";
            } elseif ($minutes == 1) {
                return $this->lastmins[$minutes] . " минута";
            } else {
                return $this->numbers[$minutes] . " минут";
            }
        } else {
            $lastDigit = $minutes % 10;
            $tens = $minutes - $lastDigit;
            if (($lastDigit > 1) && ($lastDigit < 5)) {
                return "{$this->numbers[$tens]} {$this->lastmins[$lastDigit]}" . " минуты";
            } elseif ($lastDigit == 1) {
                return "{$this->numbers[$tens]} {$this->lastmins[$lastDigit]}" . " минута";
            } else {
                return "{$this->numbers[$tens]} {$this->lastmins[$lastDigit]}" . " минут";
            }
        }
    }
}
//$converter = new TimeToWordConverter();
//echo $converter->convert(12, 36);
