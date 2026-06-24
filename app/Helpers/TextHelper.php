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
    function language_to_polish(?string $language): string
    {
        if (empty($language)) {
            return 'N/A';
        }
        $map = [
            'Afrikaans' => 'Afrikanca',
            'Albanian' => 'Arnavutça',
            'Amharic' => 'Amharca',
            'Arabic' => 'Arapça',
            'Armenian' => 'Ermenice',
            'Azerbaijani' => 'Azerbaycanca',
            'Basque' => 'Baskça',
            'Belarusian' => 'Belarusça',
            'Bengali' => 'Bengalce',
            'Bosnian' => 'Boşnakça',
            'Bulgarian' => 'Bulgarca',
            'Burmese' => 'Birmanca',
            'Catalan' => 'Katalanca',
            'Cebuano' => 'Sebuano',
            'Chinese (Mandarin)' => 'Çince (Mandarin)',
            'Chinese (Cantonese)' => 'Çince (Kanton)',
            'Croatian' => 'Hırvatça',
            'Czech' => 'Çekçe',
            'Danish' => 'Danca',
            'Dutch' => 'Hollandaca',
            'English' => 'İngilizce',
            'Estonian' => 'Estonca',
            'Filipino' => 'Filipince',
            'Finnish' => 'Fince',
            'French' => 'Fransızca',
            'Galician' => 'Galiçyaca',
            'Georgian' => 'Gürcüce',
            'German' => 'Almanca',
            'Greek' => 'Yunanca',
            'Gujarati' => 'Güceratça',
            'Hebrew' => 'İbranice',
            'Hindi' => 'Hintçe',
            'Hungarian' => 'Macarca',
            'Icelandic' => 'İzlandaca',
            'Indonesian' => 'Endonezce',
            'Irish' => 'İrlandaca',
            'Italian' => 'İtalyanca',
            'Japanese' => 'Japonca',
            'Javanese' => 'Cava dili',
            'Kannada' => 'Kannada',
            'Kazakh' => 'Kazakça',
            'Khmer' => 'Kmerce',
            'Korean' => 'Korece',
            'Kurdish' => 'Kürtçe',
            'Lao' => 'Laosça',
            'Latvian' => 'Letonca',
            'Lithuanian' => 'Litvanca',
            'Macedonian' => 'Makedonca',
            'Malay' => 'Malayca',
            'Malayalam' => 'Malayalamca',
            'Maltese' => 'Maltaca',
            'Marathi' => 'Marathi',
            'Mongolian' => 'Moğolca',
            'Nepali' => 'Nepalce',
            'Norwegian' => 'Norveççe',
            'Pashto' => 'Peştuca',
            'Persian (Farsi)' => 'Farsça',
            'Polish' => 'Lehçe',
            'Portuguese' => 'Portekizce',
            'Punjabi' => 'Pencapça',
            'Romanian' => 'Rumence',
            'Russian' => 'Rusça',
            'Serbian' => 'Sırpça',
            'Sinhala' => 'Sinhala',
            'Slovak' => 'Slovakça',
            'Slovenian' => 'Slovence',
            'Somali' => 'Somalice',
            'Spanish' => 'İspanyolca',
            'Swahili' => 'Svahili',
            'Swedish' => 'İsveççe',
            'Tagalog' => 'Tagalogca',
            'Tamil' => 'Tamilce',
            'Telugu' => 'Telugu',
            'Thai' => 'Tayca',
            'Turkish' => 'Türkçe',
            'Ukrainian' => 'Ukraynaca',
            'Urdu' => 'Urduca',
            'Uzbek' => 'Özbekçe',
            'Vietnamese' => 'Vietnamca',
            'Welsh' => 'Galce',
            'Yoruba' => 'Yoruba',
            'Zulu' => 'Zuluca',
        ];
        $trimmed = trim($language);
        $pl = $map[$trimmed] ?? null;
        if ($pl) {
            // return $pl . ' / ' . $trimmed;
            return $trimmed . ' / ' . $pl;
        }
        return $trimmed;
    }
}


if (!function_exists('nationality_to_polish')) {
    function nationality_to_polish(?string $nationality): string
    {
        if (empty($nationality)) {
            return 'N/A';
        }
        $map = [
            'Afghan' => 'Afganlı',
            'Albanian' => 'Arnavut',
            'Algerian' => 'Cezayirli',
            'Andorran' => 'Andorralı',
            'Angolan' => 'Angolalı',
            'Antiguans' => 'Antigualu',
            'Argentine' => 'Arjantinli',
            'Armenian' => 'Ermeni',
            'Australian' => 'Avustralyalı',
            'Austrian' => 'Avusturyalı',
            'Azerbaijani' => 'Azerbaycanlı',
            'Bahamian' => 'Bahamalı',
            'Bahraini' => 'Bahreynli',
            'Bangladeshi' => 'Bangladeşli',
            'Barbadian' => 'Barbadoslu',
            'Barbudans' => 'Barbudalı',
            'Batswana' => 'Botsvanalı',
            'Belarusian' => 'Belaruslu',
            'Belgian' => 'Belçikalı',
            'Belizean' => 'Belizeli',
            'Beninese' => 'Beninli',
            'Bhutanese' => 'Butanlı',
            'Bolivian' => 'Bolivyalı',
            'Bosnian' => 'Boşnak',
            'Brazilian' => 'Brezilyalı',
            'British' => 'İngiliz',
            'Bruneian' => 'Bruneyли',
            'Bulgarian' => 'Bulgar',
            'Burkinese' => 'Burkina Fasolu',
            'Burmese' => 'Birmanyalı',
            'Burundian' => 'Burundili',
            'Cambodian' => 'Kamboçyalı',
            'Cameroonian' => 'Kamerunlu',
            'Canadian' => 'Kanadalı',
            'Cape Verdean' => 'Yeşil Burun Adalı',
            'Central African' => 'Orta Afrikalı',
            'Chadian' => 'Çadlı',
            'Chilean' => 'Şilili',
            'Chinese' => 'Çinli',
            'Colombian' => 'Kolombiyalı',
            'Comoran' => 'Komorlu',
            'Congolese' => 'Kongolu',
            'Costa Rican' => 'Kosta Rikalı',
            'Croatian' => 'Hırvat',
            'Cuban' => 'Kübalı',
            'Cypriot' => 'Kıbrıslı',
            'Czech' => 'Çek',
            'Danish' => 'Danimarkalı',
            'Djibouti' => 'Cibutili',
            'Dominican' => 'Dominikakalı',
            'Dutch' => 'Hollandalı',
            'East Timorese' => 'Doğu Timorlu',
            'Ecuadorean' => 'Ekvadorlu',
            'Egyptian' => 'Mısırlı',
            'Emirati' => 'Emiratli',
            'Equatorial Guinean' => 'Ekvator Gineli',
            'Eritrean' => 'Eritreli',
            'Estonian' => 'Estonyalı',
            'Ethiopian' => 'Etiyopyalı',
            'Fijian' => 'Fijili',
            'Filipino' => 'Filipinli',
            'Finnish' => 'Finli',
            'French' => 'Fransız',
            'Gabonese' => 'Gabonlu',
            'Gambian' => 'Gambiyalı',
            'Georgian' => 'Gürcü',
            'German' => 'Alman',
            'Ghanaian' => 'Ganalı',
            'Greek' => 'Yunan',
            'Grenadian' => 'Grenadalı',
            'Guatemalan' => 'Guatemalalı',
            'Guinean' => 'Gineli',
            'Guinea-Bissauan' => 'Gine-Bissaulu',
            'Guyanese' => 'Guyaneli',
            'Haitian' => 'Haitili',
            'Herzegovinian' => 'Hersekli',
            'Honduran' => 'Honduraslı',
            'Hungarian' => 'Macar',
            'I-Kiribati' => 'Kiribatili',
            'Icelander' => 'İzlandalı',
            'Indian' => 'Hintli',
            'Indonesian' => 'Endonezyalı',
            'Iranian' => 'İranlı',
            'Iraqi' => 'Iraklı',
            'Irish' => 'İrlandalı',
            'Israeli' => 'İsrailli',
            'Italian' => 'İtalyan',
            'Ivorian' => 'Fildişi Sahilli',
            'Jamaican' => 'Jamaikalı',
            'Japanese' => 'Japon',
            'Jordanian' => 'Ürdünlü',
            'Kazakhstani' => 'Kazak',
            'Kenyan' => 'Kenyalı',
            'Kittian and Nevisian' => 'Saint Kitts ve Nevislı',
            'Kuwaiti' => 'Kuveytli',
            'Kyrgyz' => 'Kırgız',
            'Laotian' => 'Laoslu',
            'Latvian' => 'Letonyalı',
            'Lebanese' => 'Lübnanlı',
            'Liberian' => 'Liberya lı',
            'Libyan' => 'Libyalı',
            'Liechtensteiner' => 'Lihtenştaynlı',
            'Lithuanian' => 'Litvanyalı',
            'Luxembourger' => 'Lüksemburglu',
            'Macedonian' => 'Makedonyalı',
            'Malagasy' => 'Madagaskarlı',
            'Malawian' => 'Malavilı',
            'Malaysian' => 'Malezyalı',
            'Maldivian' => 'Maldivli',
            'Malian' => 'Malili',
            'Maltese' => 'Maltalı',
            'Marshallese' => 'Marshall Adalı',
            'Mauritanian' => 'Moritanyalı',
            'Mauritian' => 'Mauritiuslu',
            'Mexican' => 'Meksikalı',
            'Micronesian' => 'Mikronezlyalı',
            'Moldovan' => 'Moldovalı',
            'Monacan' => 'Monakolu',
            'Mongolian' => 'Moğol',
            'Montenegrin' => 'Karadağlı',
            'Moroccan' => 'Faslı',
            'Mozambican' => 'Mozambikli',
            'Namibian' => 'Namibyalı',
            'Nauruan' => 'Nauruluу',
            'Nepalese' => 'Nepalli',
            'New Zealander' => 'Yeni Zelandalı',
            'Nicaraguan' => 'Nikaragualı',
            'Nigerian' => 'Nijeryalı',
            'Nigerien' => 'Nijerli',
            'North Korean' => 'Kuzey Koreli',
            'Northern Irish' => 'Kuzey İrlandalı',
            'Norwegian' => 'Norveçli',
            'Omani' => 'Umanlı',
            'Pakistani' => 'Pakistanlı',
            'Palauan' => 'Palaulı',
            'Palestinian' => 'Filistinli',
            'Panamanian' => 'Panamalı',
            'Papua New Guinean' => 'Papua Yeni Gineli',
            'Paraguayan' => 'Paraguaylı',
            'Peruvian' => 'Perulu',
            'Polish' => 'Polonyalı',
            'Portuguese' => 'Portekizli',
            'Qatari' => 'Katarlı',
            'Romanian' => 'Rumen',
            'Russian' => 'Rus',
            'Rwandan' => 'Ruandalı',
            'Saint Lucian' => 'Saint Lucialı',
            'Salvadoran' => 'El Salvadorlu',
            'Samoan' => 'Samoalı',
            'San Marinese' => 'San Marinolu',
            'Sao Tomean' => 'São Tomé ve Príncipeli',
            'Saudi' => 'Suudi',
            'Scottish' => 'İskoç',
            'Senegalese' => 'Senegalli',
            'Serbian' => 'Sırp',
            'Seychellois' => 'Seyşelli',
            'Sierra Leonean' => 'Sierra Leoneli',
            'Singaporean' => 'Singapurlu',
            'Slovakian' => 'Slovak',
            'Slovenian' => 'Sloven',
            'Solomon Islander' => 'Solomon Adalı',
            'Somali' => 'Somalili',
            'South African' => 'Güney Afrikalı',
            'South Korean' => 'Güney Koreli',
            'Spanish' => 'İspanyol',
            'Sri Lankan' => 'Sri Lankalı',
            'Sudanese' => 'Sudanlı',
            'Surinamer' => 'Surinamlı',
            'Swazi' => 'Svazilandlı',
            'Swedish' => 'İsveçli',
            'Swiss' => 'İsviçreli',
            'Syrian' => 'Suriyeli',
            'Taiwanese' => 'Tayvanli',
            'Tajik' => 'Tacik',
            'Tanzanian' => 'Tanzanyalı',
            'Thai' => 'Taylandlı',
            'Togolese' => 'Togolu',
            'Tongan' => 'Tongalı',
            'Trinidadian or Tobagonian' => 'Trinidadlı',
            'Tunisian' => 'Tunuslu',
            'Turkish' => 'Türk',
            'Tuvaluan' => 'Tuvalulu',
            'Ugandan' => 'Ugandalı',
            'Ukrainian' => 'Ukraynalı',
            'Uruguayan' => 'Uruguaylı',
            'Uzbekistani' => 'Özbek',
            'Vanuatuan' => 'Vanuatulu',
            'Vatican' => 'Vatikanlı',
            'Venezuelan' => 'Venezuelalı',
            'Vietnamese' => 'Vietnamlı',
            'Welsh' => 'Gallli',
            'Yemenite' => 'Yemenli',
            'Zambian' => 'Zambiyalı',
            'Zimbabwean' => 'Zimbabveli',
        ];
        $trimmed = trim($nationality);
        $pl = $map[$trimmed] ?? null;
        if ($pl) {
            // return $pl . ' / ' . $trimmed;
            return $trimmed . ' / ' . $pl;
        }
        $countryMap = [
            'Azerbaijan' => 'Azerbaycan',
            'Turkey' => 'Türkiye',
            'Poland' => 'Polonya',
            'Germany' => 'Almanya',
            'France' => 'Fransa',
            'Russia' => 'Rusya',
            'Ukraine' => 'Ukrayna',
            'Georgia' => 'Gürcistan',
            'Iran' => 'İran',
            'Iraq' => 'Irak',
            'Saudi Arabia' => 'Suudi Arabistan',
            'Egypt' => 'Mısır',
            'Libya' => 'Libya',
            'Nigeria' => 'Nijerya',
            'South Africa' => 'Güney Afrika',
            'India' => 'Hindistan',
            'Pakistan' => 'Pakistan',
            'China' => 'Çin',
            'Japan' => 'Japonya',
            'Indonesia' => 'Endonezya',
            'Brazil' => 'Brezilya',
            'Argentina' => 'Arjantin',
            'Mexico' => 'Meksika',
            'Canada' => 'Kanada',
            'United States' => 'Amerika Birleşik Devletleri',
            'United Kingdom' => 'Birleşik Krallık',
        ];
        $countryPl = $countryMap[$trimmed] ?? null;
        if ($countryPl) {
            // return $countryPl . ' / ' . $trimmed;
            return $trimmed . ' / ' . $countryPl;
        }
        return strtoupper($trimmed);
    }
}
