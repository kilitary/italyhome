<?php

$restaurants =
    [
        [
            'url' => 'https://chemi.su/',
            'cost' => 0,
            'color' => '#fBff00',
            'name' => 'Чеми ',
            'min_sum' => 600,
            'city' => 'spb',
            'delivery_time' => 30,
            'coords' => [[30.3005843870479, 59.90853057464229],
                [30.30063559728989, 59.90852497886059],
                [30.318273803771827, 59.9083741044681],
                [30.317349763503447, 59.9266197630824],
                [30.33502226736756, 59.934219467931555],
                [30.337142735927344, 59.939307106450144],
                [30.331896610836683, 59.94679625920456],
                [30.341661217286816, 59.9556080306794],
                [30.33772235051524, 59.96318392935068],
                [30.334527514990384, 59.97247260994529],
                [30.32825696970061, 59.97724737111222],
                [30.31923984237954, 59.980645057889355],
                [30.300139544801727, 59.983974004572616],
                [30.28924965886298, 59.983839323403515],
                [30.273038270238708, 59.9818982185818],
                [30.207381195303974, 59.979320225849605],
                [30.18946171534289, 59.98279776823818],
                [30.182918816834423, 59.99298417614137],
                [30.190668180074102, 60.0041485254683],
                [30.204358899284085, 60.01149496375145],
                [30.225377121695036, 60.00896016300584],
                [30.232214003746698, 60.01275309358705],
                [30.221341598780246, 60.022042259441335],
                [30.197580726333555, 60.03016770538837],
                [30.223985487043006, 60.037673474036886],
                [30.195191850359382, 60.06228988972488],
                [30.205193684867215, 60.06441407167137],
                [30.21517524270592, 60.063139793579296],
                [30.227709136472363, 60.05297609565782],
                [30.250633410057528, 60.060510654756605],
                [30.266863851094843, 60.058441850680374],
                [30.305204493002353, 60.06749035675328],
                [30.32067253433518, 60.077332067270376],
                [30.32330190219021, 60.0844815208025],
                [30.350217532961185, 60.08385386249378],
                [30.376175300088395, 60.07865149572563],
                [30.385974011255755, 60.051351580387205],
                [30.432424736020412, 60.041929142690954],
                [30.4317867553667, 60.02338761293443],
                [30.43569732994433, 59.974285834905736],
                [30.416980711575277, 59.974897585732336],
                [30.39308646498621, 59.97774153804695],
                [30.382257584239586, 59.97938846839312],
                [30.376445358495083, 59.9812392233049],
                [30.37056983470727, 59.97678776068338],
                [30.366482123155734, 59.97697088190854],
                [30.360681309587957, 59.97929927922843],
                [30.34508533455998, 59.97753839431833],
                [30.357106678631595, 59.953312353066735],
                [30.372491842773403, 59.956089556466125],
                [30.386707944129107, 59.9694418801706],
                [30.408904737270547, 59.96294964201618],
                [30.407426784288315, 59.959229598719844],
                [30.438297428035487, 59.96016711101983],
                [30.4347191051972, 59.939567228992566],
                [30.44647361057598, 59.93651505999886],
                [30.47423768882687, 59.93197713604202],
                [30.470776474130478, 59.919583690508695],
                [30.48267293986652, 59.906554992044626],
                [30.444488859400913, 59.89813461663668],
                [30.433027645938264, 59.90665182469295],
                [30.41734067934369, 59.912943622237776],
                [30.40992997281246, 59.920230705219915],
                [30.40045069408493, 59.926494458142955],
                [30.39064704410107, 59.92447199486189],
                [30.396989039299537, 59.91963173185015],
                [30.39329595075781, 59.91869001589519],
                [30.366771899081385, 59.91412810723197],
                [30.358067621425665, 59.91438455733265],
                [30.34455682521521, 59.91636491667624],
                [30.34134571162193, 59.91597489828058],
                [30.318393539679143, 59.90817124485788],
                [30.32055003572713, 59.90849454826717],
                [30.328811239492996, 59.90310574569936],
                [30.33726556230789, 59.90411890754193],
                [30.338286210381796, 59.90500764780835],
                [30.340045739495523, 59.901407645694185],
                [30.341461945855382, 59.898367818064],
                [30.34150486119962, 59.89500427921888],
                [30.34339313634611, 59.89362426697667],
                [30.345195580804095, 59.88974267417416],
                [30.3442943585751, 59.8871978275121],
                [30.34532432683683, 59.883919431750925],
                [30.347169686639056, 59.88036027952829],
                [30.348929215752836, 59.87813831184567],
                [30.353134919488202, 59.87375865767018],
                [30.357083131158074, 59.86579612870858],
                [30.361931101932345, 59.856073846603756],
                [30.365188114662025, 59.851853038435095],
                [30.36578892948136, 59.850665548526415],
                [30.36535977603897, 59.84911095201089],
                [30.371239178199566, 59.8373195568686],
                [30.37407159091931, 59.83008283502824],
                [30.374801151771308, 59.82844085165458],
                [30.378277294654602, 59.824033021006365],
                [30.381453030128238, 59.817333726540284],
                [30.381109707374346, 59.81610177367663],
                [30.36651849033331, 59.81482654626466],
                [30.35656213047003, 59.81510753277241],
                [30.35072564365362, 59.814286180888345],
                [30.34111260654426, 59.81106542095838],
                [30.335781732395695, 59.810195545823696],
                [30.328829446629108, 59.8101955458147],
                [30.32360409743296, 59.81103939507418],
                [30.291932573385086, 59.82601653161245],
                [30.284894456929948, 59.8319579679092],
                [30.279562981069773, 59.83409924682508],
                [30.28312381302426, 59.84172347195902],
                [30.290719828954447, 59.852066790253346],
                [30.292644636431607, 59.85204686769248],
                [30.295262472430142, 59.86454524520611],
                [30.298672996174346, 59.8755367682293],
                [30.30094750941891, 59.884467580920266],
                [30.30262120784419, 59.887228311130166],
                [30.302535377155717, 59.88964376129652],
                [30.299496637875624, 59.89855333640715],
                [30.30053506836895, 59.90766099896066],
                [30.3005843870479, 59.90853057464229]

            ]
        ],

        [
            'url' => 'https://moskovsky.hitchrest.ru/',
            'cost' => 0,
            'color' => '#aBcf00',
            'name' => 'Хитч Московский ',
            'min_sum' => 1200,
            'city' => 'spb',
            'delivery_time' => 30,
            'coords' => [[30.30147874519632, 59.88801998407898],
                [30.2980031415406, 59.897372395465695],
                [30.300707347455187, 59.907756770558244],
                [30.315126903118767, 59.90758433864012],
                [30.33194971806105, 59.91292931087065],
                [30.343279368939925, 59.915860058113736],
                [30.348772533002418, 59.907584338630755],
                [30.36593867069765, 59.885160534885266],
                [30.379671580854158, 59.872562046469156],
                [30.394121543386753, 59.858605657264114],
                [30.418200073194562, 59.8345029570848],
                [30.42334991450293, 59.82689831116703],
                [30.422914299576917, 59.8239412910396],
                [30.408680196649282, 59.82110795239496],
                [30.388424154169343, 59.817650116220626],
                [30.332591291315108, 59.80910123225952],
                [30.277788396722727, 59.83443886221325],
                [30.29006218517504, 59.845864180972974],
                [30.29126381481351, 59.85264407864825],
                [30.294697042352542, 59.866199716932314],
                [30.30147874519632, 59.88801998407898]
            ]
        ],

        [
            'url' => 'https://moskovsky.hitchrest.ru/',
            'cost' => 0,
            'color' => '#1Bdf00',
            'name' => 'Хитч Московский ',
            'min_sum' => 800,
            'city' => 'spb',
            'delivery_time' => 30,
            'coords' => [[30.29617456611083, 59.89663358727568],
                [30.29823450263429, 59.9079297182272],
                [30.34465841358899, 59.91733004031819],
                [30.344661036466743, 59.91502869590728],
                [30.36738341609757, 59.8844591568815],
                [30.42170663310739, 59.83096396314946],
                [30.425642731118007, 59.82381125908508],
                [30.442668562645878, 59.8297341966211],
                [30.41533849275291, 59.86435123607118],
                [30.382648707401472, 59.88894581739575],
                [30.390609226419524, 59.89318330206423],
                [30.365207510496123, 59.91378195308526],
                [30.344678817647374, 59.91577587185904],
                [30.34457782865607, 59.9173387193949],
                [30.298148671945793, 59.907951272029884],
                [30.27523187812257, 59.90827457760186],
                [30.26767877753662, 59.886368874355284],
                [30.258752385935047, 59.87532428610147],
                [30.259782354196776, 59.85961392102075],
                [30.233689824899894, 59.851151408896044],
                [30.27351526435303, 59.83318300139337],
                [30.276605169138193, 59.833874273942506],
                [30.288621465524905, 59.84683296860892],
                [30.300981084665537, 59.88843932471803],
                [30.29617456611083, 59.89663358727568]
            ]
        ],

        [
            'url' => 'https://apresskidomoy.ru/',
            'cost' => 0,
            'color' => '#9Bdf00',
            'name' => 'Apres ski ',
            'min_sum' => 3500,
            'city' => 'spb',
            'delivery_time' => 80,
            'coords' => [[30.230831583211703, 60.10182266228549],
                [30.196432054984964, 60.10059546022247],
                [30.154442270467463, 60.10662205130813],
                [30.12361047545189, 60.12078625815411],
                [30.10094164548326, 60.130528086002926],
                [30.109362581164774, 60.15580255135567],
                [30.14918802061791, 60.188473490958806],
                [30.214762666614163, 60.18949927511377],
                [30.222819232052053, 60.17423628695639],
                [30.259737947375925, 60.11144797498834],
                [30.230831583211703, 60.10182266228549]

            ]
        ],

        [
            'url' => 'https://apresskidomoy.ru/',
            'cost' => 0,
            'color' => '#0Bdf00',
            'name' => 'Apres ski ',
            'min_sum' => 3500,
            'city' => 'spb',
            'delivery_time' => 90,
            'coords' => [[29.75838574418922, 60.17606768617847],
                [29.817780580615043, 60.16032900385215],
                [29.91150769243141, 60.146637043538725],
                [29.949444856738033, 60.143384362116436],
                [29.976395692919727, 60.15656428511089],
                [29.970215883349372, 60.18068521169259],
                [29.94549664506811, 60.20239594735779],
                [29.895371522997856, 60.23348385974987],
                [29.849022951220473, 60.243384784043066],
                [29.78756817827124, 60.23826399110723],
                [29.729203310107224, 60.198636064206006],
                [29.75838574418922, 60.17606768617847]
            ]
        ],

        [
            'url' => 'https://apresskidomoy.ru/',
            'cost' => 0,
            'color' => '#2Bdf00',
            'name' => 'Apres ski ',
            'min_sum' => 3500,
            'city' => 'spb',
            'delivery_time' => 80,
            'coords' => [[30.252821001056134, 60.250196544271155],
                [30.45440194884092, 60.255300753579476],
                [30.627436616809668, 60.26041887454861],
                [30.60840823713238, 60.25352544766895],
                [30.627832005892582, 60.25209131539469],
                [30.65088669673327, 60.247516325245044],
                [30.681203231735008, 60.265665953891656],
                [30.671798459941577, 60.288983972920455],
                [30.66122866244847, 60.326718522347406],
                [30.579664262774884, 60.41835798574515],
                [30.412415590380665, 60.4926440780229],
                [30.166596498583786, 60.51973272538809],
                [30.04712018022445, 60.46553270798631],
                [30.014847841357266, 60.36910363390074],
                [30.04574688920883, 60.256012639989905],
                [30.252821001056134, 60.250196544271155]
            ]
        ],

        [
            'url' => 'https://apresskidomoy.ru/',
            'cost' => 0,
            'color' => '#1Bdf00',
            'name' => 'Apres ski ',
            'min_sum' => 2000,
            'city' => 'spb',
            'delivery_time' => 45,
            'coords' => [[30.224165983725495, 60.17960583657094],
                [30.259318507379515, 60.11817842031297],
                [30.380988365017892, 60.10672091702579],
                [30.447726582031258, 60.065069724344276],
                [30.50190477577065, 60.06694544050051],
                [30.55333638747883, 60.0743115205967],
                [30.617747462457665, 60.10138340320542],
                [30.694384553821596, 60.150668027584636],
                [30.6857187074684, 60.212326555371135],
                [30.657826786896383, 60.24384360920509],
                [30.619114093210545, 60.25057278186665],
                [30.54332254210284, 60.25730056743442],
                [30.427279451282487, 60.25525321970986],
                [30.324969270618386, 60.253205743526316],
                [30.25767801085267, 60.24979299774878],
                [30.219225862415232, 60.21496260187256],
                [30.224165983725495, 60.17960583657094]
            ]
        ]
    ];