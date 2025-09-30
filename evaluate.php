<?php 
function reverseWordsLetters(string $s): string { 
    $parts = preg_split('/(\s+)/', $s, -1, PREG_SPLIT_DELIM_CAPTURE); // Разделяем строку, сохраняя пробелы
    $result = [];
    foreach ($parts as $part) {
        if (preg_match('/^\s+$/', $part)) {
            $result[] = $part;
        } else {
            $wordResult = '';
            $i = 0;
            $n = strlen($part);
            while ($i < $n) {
                if (!ctype_alpha(mb_substr($part, $i, 1, 'UTF-8'))) { // если не буква, добавляем в массив
                    $wordResult .= mb_substr($part, $i, 1, 'UTF-8');
                    $i++;
                } else {
                    $start = $i;
                    while ($i < $n && ctype_alpha(mb_substr($part, $i, 1, 'UTF-8'))) {
                        $i++;
                    }
                    $group = mb_substr($part, $start, $i - $start, 'UTF-8');  //
                    $cases = [];
                    $groupLen = mb_strlen($group, 'UTF-8');
                    for ($j = 0; $j < $groupLen; $j++) {
                        $char = mb_substr($group, $j, 1, 'UTF-8');
                        $cases[] = ctype_upper($char);  //проверка на верхний регистр
                    }
                    $revGroup = mb_strrev($group); // применяем реверс
                    $newGroup = '';
                    for ($j = 0; $j < $groupLen; $j++) {
                        $char = mb_substr($revGroup, $j, 1, 'UTF-8');
                        $newGroup .= $cases[$j] ? mb_strtoupper($char, 'UTF-8') : mb_strtolower($char, 'UTF-8');
                    }
                    $wordResult .= $newGroup;
                }
            }
            $result[] = $wordResult;
        }
    }
    return implode('', $result); //склеиваем массив в строку без разделителей
}

// Функция для multibyte reverse (PHP не имеет встроенной mb_strrev)
if (!function_exists('mb_strrev')) {
    function mb_strrev(string $str, string $encoding = 'UTF-8'): string {
        return implode('', array_reverse(mb_str_split($str, 1, $encoding)));
    }
}

