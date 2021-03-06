<?php

/*
ffffff - 16777215
ffff00 - 16776960
ff9900 - 16750848
ff00ff - 16711935
ff0000 - 16711680
663300 - 6697728
00ffff - 65535
00ff00 - 65280
0000ff - 255
000000 - 0
*/



$colorsName = [
    'white' => ['Белый', 'организованные, самостоятельные', 'Любителями белого цвета, зачастую, являются организованные и логичные люди, не имеющие большого беспорядка в жизни.'],
    'yellow' => ['Жёлтый', 'проницательные, креативные', 'Желтый цвет обычно идет с солнечной и проницательной личностью и сильным чувством юмора.'],
    'pink' => ['Розовый', 'нежные, сочувствующие', 'Обычно это натуры нежные, обаятельные, мягкие, они могут разволноваться из-за пустяков, склонны давать обещания, которые не в силах выполнить.'],
    'orange' => ['Оранжевый', 'энергичные, общительные', 'Выбор оранжевого цвета — говорит о большом энергетическом потенциале человека. Такие люди любят заводить новых друзей и вести социальную жизнь.'],
    'red' => ['Красный', 'упорны, решительны', 'Те, кто предпочитает красный, живут полной жизнью, упорны и решительны в своих начинаниях.'],
    'sky' => ['Голубой', 'дружелюбны, общительные', 'Люди, его предпочитающие – это натуры мечтательные, романтичные, любящие путешествия. Особенно их тянет к воде. Любители голубого цвета дружелюбны, общительны, у них всегда много друзей.'],
    'gray' => ['Серый', 'организованные, самостоятельные', 'Любителями серого цвета, зачастую, являются организованные и логичные люди, не имеющие большого беспорядка в жизни.'],
    'green' => ['Зелёный', 'лояльны, откровенны', 'Те, кто любит зеленый цвет, часто ласковы, лояльны и откровенны. Они также заботятся о том, что другие думают о них и считают их репутацию очень важной.'],
    'purpule' => ['Фиолетовый', 'мечтательные, чувствительные', 'Любителями фиолетового цвета, зачастую, являются мечтательные и ранимые личности, которые вместе с этим сочетают в себе гордость и величавость.'],
    'brown' => ['Коричневый', 'надёжные, дружелюбные', 'Вы хороший друг и стараетесь изо всех сил быть надежным. Крики не то, что вы хотите; вы просто хотите стабильной жизни.'],
    'blue' => ['Синий', 'заботливые, честные', 'Если ваш любимый цвет синий – вы надежны, любите гармонию, чувствительны и всегда стараетесь думать о других. Вы любите держать вещи в чистоте и порядке и чувствовать, что стабильность является самым важным аспектом в жизни.'],
    'black' => ['Чёрный', 'чувствительные, закрытые', 'Люди, предпочитающие чёрный цвет – это чувствительные и художественные личности. Вместе с этим они внимательные к деталям в своей жизни и неохотно делятся ими с другими.'],
];

/*
65535

6684671

6697728


ff
ee
dd
cc
bb
aa
99
88
77
66
55
44
33
22
11
99
88
77
66
55
44
33
22
11
00
*/


function FindColor($numcolor) {
    $colorsConst = [
        'white1' => '16777215',
        'yellow1' => '16776960',
        'pink1' => '16764159',
        'yellow2' => '16763904',
        'pink2' => '16751103',
        'orange1' => '16750848',
        'pink3' => '16738047',
        'orange2' => '16737792',
        'pink4' => '16724991',
        'red1' => '16724736',
        'pink5' => '16711935',
        'red2' => '16711680',//ff0000
        'white2' => '16580588',//ff0000
        'sky1' => '15663103',
        'yellow3' => '15662848',
        'gray1' => '15661563',
        'white3' => '15658734',
        'pink6' => '15597823',
        'red3' => '15597568',
        'gray2' => '15394800',
        'sky2' => '14548991',
        'yellow4' => '14548736',
        'white4' => '14540253',
        'pink7' => '14533850',
        'pink8' => '14483711',
        'red4' => '14483456',
        'gray3' => '13816019',
        'sky3' => '13434879',//ccffff
        'green1' => '13434624',
        'sky4' => '13421823',
        'gray4' => '13421772',
        'green2' => '13421568',
        'purpule1' => '13408767',
        'brown1' => '13408512',
        'purpule2' => '13395711',
        'brown2' => '13395456',
        'purpule3' => '13382655',
        'brown3' => '13382400',
        'purpule4' => '13369599',
        'red5' => '13369344',
        'brown4' => '13344886',
        'sky17' => '12962799',
        'red6' => '12919333',
        'brown5' => '12487536',
        'sky5' => '12320767',
        'green3' => '12320512',
        'pink9' => '12255487',
        'red7' => '12255232',
        'brown6' => '12158515',
        'sky6' => '11206655',
        'green4' => '11206400',
        'gray5' => '11184810',
        'purpule5' => '11141375',
        'red8' => '11141120',
        'sky7' => '10092543',
        'green5' => '10092288',
        'sky8' => '10079487',
        'green6' => '10079232',
        'sky9' => '10066431',
        'gray6' => '10066329',
        'green7' => '10066176',
        'purpule6' => '10053375',
        'brown7' => '10053120',
        'purpule7' => '10040319',
        'brown8' => '10040064',
        'purpule8' => '10027263',
        'red9' => '10027008',
        'brown9' => '9331203',
        'brown10' => '8999216',
        'sky10' => '8978431',
        'green8' => '8978176',
        'gray7' => '8947848',
        'purpule9' => '8913151',
        'red10' => '8912896',
        'sky11' => '7864319',
        'green9' => '7864064',
        'purpule10' => '7799039',
        'red11' => '7798784',
        'gray8' => '7829367',
        'brown11' => '7617045',
        'sky12' => '6750207',
        'green10' => '6749952',
        'sky13' => '6737151',
        'green11' => '6736896',
        'sky14' => '6724095',
        'green12' => '6723840',
        'blue1' => '6711039',
        'gray9' => '6710886',
        'green13' => '6710784',
        'purpule11' => '6697983',
        'brown12' => '6697728',
        'purpule12' => '6684927',
        'red12' => '6684672',
        'brown13' => '6045212',
        'gray10' => '5592405',
        'blue2' => '5636095',
        'green14' => '5635840',
        'purpule13' => '5570815',
        'red13' => '5570560',
        'blue3' => '4521983',
        'green15' => '4521728',
        'gray11' => '4473924',
        'purpule14' => '4456703',
        'red14' => '4456448',
        'blue4' => '4344680',
        'green17' => '3691053',
        'brown14' => '3548184',
        'sky15' => '3407871',
        'green16' => '3407616',
        'blue5' => '3394815',
        'green18' => '3394560',
        'blue6' => '3381759',
        'green19' => '3381504',
        'blue7' => '3368703',
        'green20' => '3368448',
        'blue8' => '3355647',
        'green21' => '3355392',
        'blue9' => '3342591',
        'brown15' => '3342336',
        'gray12' => '3026478',
        'blue10' => '2293759',
        'green22' => '2293504',
        'blue11' => '2228479',
        'brown16' => '2228224',
        'black1' => '1118481',
        'black2' => '1118464',
        'black3' => '1114129',
        'blue12' => '73010',
        'sky16' => '65535',
        'green23' => '65280',
        'blue13' => '39423',
        'green24' => '39168',
        'blue14' => '26367',
        'green25' => '26112',
        'blue15' => '13311',
        'green26' => '13056',
        'black4' => '4369',
        'blue16' => '255',
        'black5' => '0',
    ];

    $keys = array_keys($colorsConst);
    foreach(array_keys($keys) as $i ) {
        $this_value = $colorsConst[$keys[$i]];
        $nextval = $colorsConst[$keys[$i+1]];
        $nextnextval = $colorsConst[$keys[$i+2]];

        if ($numcolor == $colorsConst[$keys[$i]]) {
            return $keys[$i];
            break;
        }

        if (($numcolor < $colorsConst[$keys[$i]])&&($numcolor>=0))
            continue;
        else {
            $private1 = $colorsConst[$keys[$i]] - $numcolor;
            $private2 = $numcolor - $colorsConst[$keys[$i-1]];

            if ($private1 <= $private2)
                return $keys[$i-1];
            else return $keys[$i];

            break;
        }
    }


}



