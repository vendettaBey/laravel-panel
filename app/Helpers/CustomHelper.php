<?php


namespace App\Helpers;

use App\Models\Code;

class CustomHelper
{
    public function test()
    {
        return 'test';
    }

    public function unixTimeToYearMonthDay($unixTime)
    {
        $secondsInDay = 86400;
        $secondsInMonth = $secondsInDay * 30;
        $secondsInYear = $secondsInDay * 365;

        $years = floor($unixTime / $secondsInYear);
        $unixTime = $unixTime % $secondsInYear;

        $months = floor($unixTime / $secondsInMonth);
        $unixTime = $unixTime % $secondsInMonth;

        $days = floor($unixTime / $secondsInDay);

        if ($months == 12) {
            $years++;
            $months = 0;
        }

        $result = '';
        if ($years > 0) {
            $result .= $years . ' yıl ';
        }
        if ($months > 0) {
            $result .= $months . ' ay ';
        }
        if ($days > 0) {
            $result .= $days . ' gün';
        }
        return $result;
    }

    public function calculateDateDiff($date1, $date2)
    {
        $diff = date_diff(date_create($date1), date_create($date2));

        $year = $diff->y;
        $month = $diff->m;
        $day = $diff->d;

        if ($month == 12) {
            $year++;
            $month = 0;
        }

        if ($year != 0)
            $res = $year . ' yıl ' . $month . ' ay ' . $day . ' gün';
        else if ($month != 0)
            $res = $month . ' ay ' . $day . ' gün';
        else
            $res = $day . ' gün';


        return $res;
    }


    public function domainParcala($str)
    {
        $parts = explode('.', $str, 2);
        return $parts;
    }


    public static function truncateContent($content, $limit)
    {
        if (strlen($content) <= $limit) {
            return $content;
        }

        $truncated = substr($content, 0, $limit);
        $lastSpaceIndex = strrpos($truncated, ' ');

        if ($lastSpaceIndex !== false) {
            $truncated = substr($truncated, 0, $lastSpaceIndex);
        }

        $showMoreLink = '<a href="#" class="show-more">Daha fazla göster</a>';
        $showLessLink = '<a href="#" class="show-less">Daralt</a>';
        $fullContent = '<span class="full-content">' . $content . '</span>';

        return $truncated . $showMoreLink . $fullContent . $showLessLink;
    }

    function kisaltVeGizle($metin, $karakterSayisi = 100)
    {
        if (strlen($metin) <= $karakterSayisi) {
            return $metin;
        }

        $kisaltma = substr($metin, 0, $karakterSayisi) . '...';

        $html = '<span class="gizle-goster" style="display:inline;">' . $kisaltma . '</span>';
        $html .= '<span class="goster" style="display:none;">' . $metin . '</span>';
        $html .= '<button class="text-danger" onclick="gizleGoster(this)">Devamı</button>';

        return $html;
    }

    function kisalt($string, $limit)
    {
        $output = $string;

        if (strlen($string) > $limit) {
            $output = substr($string, 0, $limit) . '...';
        }

        return $output;
    }


    public static function seoUyumlu($string)
    {
        // Türkçe karakterleri İngilizce karakterlere dönüştür
        $string = str_replace(
            ['ç', 'ğ', 'ı', 'i', 'ö', 'ş', 'ü', 'Ç', 'Ğ', 'İ', 'Ö', 'Ş', 'Ü'],
            ['c', 'g', 'i', 'i', 'o', 's', 'u', 'C', 'G', 'I', 'O', 'S', 'U'],
            $string
        );

        // Harf dışındaki karakterleri kaldır
        $string = preg_replace('/[^a-zA-Z0-9]+/', '-', $string);

        // Birden fazla "-" karakterini tek "-" ile değiştir
        $string = preg_replace('/-+/', '-', $string);

        // Başta ve sonda "-" karakterini kaldır
        $string = trim($string, '-');

        // Tüm karakterleri küçük harfe dönüştür
        $string = strtolower($string);

        return $string;
    }

    public function kodlar()
    {
        $kodlar = Code::all();
        return $kodlar;
    }





}

?>