<?php

if (!function_exists('tr_upper')) {
    function tr_upper(string $text): string
    {
        $map = [
            'i' => 'İ',
            'ı' => 'I',
            'ğ' => 'Ğ',
            'ü' => 'Ü',
            'ş' => 'Ş',
            'ö' => 'Ö',
            'ç' => 'Ç',
            'ə' => 'Ə',
        ];

        return mb_strtoupper(strtr($text, $map), 'UTF-8');
    }
}


if (!function_exists('course_to_word')) {
    /**
     * Convert course number to Turkish ordinal word
     * 
     * @param int|null $course
     * @return string
     */
    function course_to_word(?int $course): string
    {
        if ($course === null) {
            return 'ikinci';
        }

        $words = [
            1 => 'birinci',
            2 => 'ikinci',
            3 => 'üçüncü',
            4 => 'dördüncü',
            5 => 'beşinci',
            6 => 'altıncı',
        ];

        return $words[$course] ?? 'ikinci';
    }
}

function course_to_word_english(?int $course): string
{
    if ($course === null) {
        return 'second';
    }

    $words = [
        1 => 'first',
        2 => 'second',
        3 => 'third',
        4 => 'fourth',
        5 => 'fifth',
        6 => 'sixth',
    ];

    return $words[$course] ?? 'second';
}


// if (!function_exists('degree_type_to_word')) {
//     function degree_type_to_word(string $degreeName, bool $thesis): string
//     {
//         $isThesis = $thesis ? "(THESIS)" : "(Without THESIS)";
//         $degrees = [
//             "Bachelor's" => "UNDERGRADUATE",
//             "Master's" => "MASTER'S DEGREE " . $isThesis,
//             "PhD" => "DOCTORATE (PhD)",
//         ];
//         return $degrees[$degreeName] ?? $degreeName;
//     }
// }


// if (!function_exists('degree_type_to_word_turkish')) {
//     function degree_type_to_word_turkish(string $degreeName, bool $thesis): string
//     {
//         $isThesis = $thesis ? "(TEZLİ)" : "(TEZSİZ)";
//         $degrees = [
//             "Bachelor's" => "Lisans",
//             "Master's" => "YÜKSEK LİSANS " . $isThesis,
//             "PhD" => "DOKTORA",
//         ];
//         return $degrees[$degreeName] ?? $degreeName;
//     }
// }


if (!function_exists('language_to_polish')) {
    /**
     * Return language in Polish and English format: "Polish / English"
     */
    function language_to_polish(?string $language): string
    {
        if (empty($language)) {
            return 'N/A';
        }
        $map = [
            'Afrikaans' => 'Afrikaans', 'Albanian' => 'Albański', 'Amharic' => 'Amharski',
            'Arabic' => 'Arabski', 'Armenian' => 'Ormiański', 'Azerbaijani' => 'Azerbejdżański',
            'Basque' => 'Baskijski', 'Belarusian' => 'Białoruski', 'Bengali' => 'Bengalski',
            'Bosnian' => 'Bośniacki', 'Bulgarian' => 'Bułgarski', 'Burmese' => 'Birmański',
            'Catalan' => 'Kataloński', 'Cebuano' => 'Cebuański', 'Chinese (Mandarin)' => 'Chiński (mandaryński)',
            'Chinese (Cantonese)' => 'Chiński (kantoński)', 'Croatian' => 'Chorwacki', 'Czech' => 'Czeski',
            'Danish' => 'Duński', 'Dutch' => 'Niderlandzki', 'English' => 'Angielski',
            'Estonian' => 'Estoński', 'Filipino' => 'Filipiński', 'Finnish' => 'Fiński',
            'French' => 'Francuski', 'Galician' => 'Galicyjski', 'Georgian' => 'Gruziński',
            'German' => 'Niemiecki', 'Greek' => 'Grecki', 'Gujarati' => 'Gudżarati',
            'Hebrew' => 'Hebrajski', 'Hindi' => 'Hinduski', 'Hungarian' => 'Węgierski',
            'Icelandic' => 'Islandzki', 'Indonesian' => 'Indonezyjski', 'Irish' => 'Irlandzki',
            'Italian' => 'Włoski', 'Japanese' => 'Japoński', 'Javanese' => 'Jawajski',
            'Kannada' => 'Kannada', 'Kazakh' => 'Kazachski', 'Khmer' => 'Khmerski',
            'Korean' => 'Koreański', 'Kurdish' => 'Kurdyjski', 'Lao' => 'Laotański',
            'Latvian' => 'Łotewski', 'Lithuanian' => 'Litewski', 'Macedonian' => 'Macedoński',
            'Malay' => 'Malajski', 'Malayalam' => 'Malajalam', 'Maltese' => 'Maltański',
            'Marathi' => 'Marathi', 'Mongolian' => 'Mongolski', 'Nepali' => 'Nepalski',
            'Norwegian' => 'Norweski', 'Pashto' => 'Paszto', 'Persian (Farsi)' => 'Perski (Farsi)',
            'Polish' => 'Polski', 'Portuguese' => 'Portugalski', 'Punjabi' => 'Pendżabski',
            'Romanian' => 'Rumuński', 'Russian' => 'Rosyjski', 'Serbian' => 'Serbski',
            'Sinhala' => 'Syngaleski', 'Slovak' => 'Słowacki', 'Slovenian' => 'Słoweński',
            'Somali' => 'Somalijski', 'Spanish' => 'Hiszpański', 'Swahili' => 'Suahili',
            'Swedish' => 'Szwedzki', 'Tagalog' => 'Tagalski', 'Tamil' => 'Tamilski',
            'Telugu' => 'Telugu', 'Thai' => 'Tajski', 'Turkish' => 'Turecki',
            'Ukrainian' => 'Ukraiński', 'Urdu' => 'Urdu', 'Uzbek' => 'Uzbecki',
            'Vietnamese' => 'Wietnamski', 'Welsh' => 'Walijski', 'Yoruba' => 'Joruba',
            'Zulu' => 'Zulu',
        ];
        $trimmed = trim($language);
        $pl = $map[$trimmed] ?? null;
        if ($pl) {
            return $pl . ' / ' . $trimmed;
        }
        return $trimmed;
    }
}

