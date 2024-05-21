<?php

if (!function_exists('carMake')) {
    function carMake()
    {
        return [
            'Abarth' => 'Abarth',
            'Acura' => 'Acura',
            'Alfa Romeo' => 'Alfa Romeo',
            'Aston Martin' => 'Aston Martin',
            'Audi' => 'Audi',
            'Bentley' => 'Bentley',
            'BMW' => 'BMW',
            'Bugatti' => 'Bugatti',
            'Buick' => 'Buick',
            'Cadillac' => 'Cadillac',
            'Chevrolet' => 'Chevrolet',
            'Chrysler' => 'Chrysler',
            'Citroen' => 'Citroen',
            'Dacia' => 'Dacia',
            'Daewoo' => 'Daewoo',
            'Daihatsu' => 'Daihatsu',
            'Dodge' => 'Dodge',
            'Ferrari' => 'Ferrari',
            'Fiat' => 'Fiat',
            'Ford' => 'Ford',
            'Genesis' => 'Genesis',
            'GMC' => 'GMC',
            'Honda' => 'Honda',
            'Hummer' => 'Hummer',
            'Hyundai' => 'Hyundai',
            'Infiniti' => 'Infiniti',
            'Isuzu' => 'Isuzu',
            'Jaguar' => 'Jaguar',
            'Jeep' => 'Jeep',
            'Kia' => 'Kia',
            'Koenigsegg' => 'Koenigsegg',
            'Lamborghini' => 'Lamborghini',
            'Land Rover' => 'Land Rover',
            'Lexus' => 'Lexus',
            'Lincoln' => 'Lincoln',
            'Lotus' => 'Lotus',
            'Maserati' => 'Maserati',
            'Mazda' => 'Mazda',
            'McLaren' => 'McLaren',
            'Mercedes-Benz' => 'Mercedes-Benz',
            'Mini' => 'Mini',
            'Mitsubishi' => 'Mitsubishi',
            'Nissan' => 'Nissan',
            'Opel' => 'Opel',
            'Pagani' => 'Pagani',
            'Peugeot' => 'Peugeot',
            'Porsche' => 'Porsche',
            'Ram' => 'Ram',
            'Renault' => 'Renault',
            'Rolls-Royce' => 'Rolls-Royce',
            'Saab' => 'Saab',
            'Seat' => 'Seat',
            'Skoda' => 'Skoda',
            'Smart' => 'Smart',
            'Subaru' => 'Subaru',
            'Suzuki' => 'Suzuki',
            'Tesla' => 'Tesla',
            'Toyota' => 'Toyota',
            'Volkswagen' => 'Volkswagen',
            'Volvo' => 'Volvo',

        ];
    }
}
if (!function_exists('carPowers')) {
    function carPowers()
    {
        return [
            '25KW (34KS)' => 34,
            '35KW (48KS)' => 48,
            '44KW (60KS)' => 60,
            '55KW (75KS)' => 75,
            '66KW (90KS)' => 90,
            '74KW (101KS)' => 101,
            '80KW (109KS)' => 109,
            '85KW (116KS)' => 116,
            '96KW (131KS)' => 131,
            '110KW (150KS)' => 150,
            '125KW (170KS)' => 170,
            '147KW (200KS)' => 200,
            '184KW (250KS)' => 250,
        ];
    }
}

if (!function_exists('partsName')) {
    function partsName()
    {
        return [

        ];
    }
}

if (!function_exists('carGears')) {
    function carGears()
    {
        return [
            'Manual 4 gears' => 'Manual 4 gears',
            'Manual 5 gears' => 'Manual 5 gears',
            'Manual 6 gears' => 'Manual 6 gears',
            'Automatic' => 'Automatic',

        ];
    }
}
if (!function_exists('bodyType')) {
    function bodyType()
    {
        return [
            'Hatchbacks' => 'Hatchback',
            'Coupe' => 'Coupe',
            'SUV' => 'SUV',
            'Sedan' => 'Sedan',
            'Station wagon' => 'Station wagon',
            'Convertible' => 'Convertible',

        ];
    }
}
if (!function_exists('fuelType')) {
    function fuelType()
    {
        return [
            "Petrol" => "Petrol",
            "Diesel" => "Diesel",
            "Hybrid" => "Hybrid",


        ];
    }
}
if (!function_exists('doorNumber')) {
    function doorNumber()
    {
        return [
            "2/3" => "3",
            "4/5" => "5",



        ];
    }
}
if (!function_exists('mileage')) {
    function mileage()
    {
        return [
        '5000'=>'5000',
        '25000'=>'25000',
        '50000'=>'50000',
        '100000'=>'100000',
        '125000'=>'125000',
        '150000'=>'150000',
        '175000'=>'175000',
        '200000'=>'200000',

        ];
    }
}
if (!function_exists('carYear')) {
    function carYear()
    {
        return [
            '2024' => '2024',
            '2023' => '2023',
            '2022' => '2022',
            '2021' => '2021',
            '2020' => '2020',
            '2019' => '2019',
            '2018' => '2018',
            '2017' => '2017',
            '2016' => '2016',
            '2015' => '2015',
            '2014' => '2014',
            '2013' => '2013',
            '2012' => '2012',
            '2011' => '2011',
            '2010' => '2010',
            '2009' => '2009',
            '2008' => '2008',
            '2007' => '2007',
            '2006' => '2006',
            '2005' => '2005',
            '2004' => '2004',
            '2003' => '2003',
            '2002' => '2002',
            '2001' => '2001',
            '2000' => '2000',
            '1999' => '1999',
            '1998' => '1998',
            '1997' => '1997',
            '1996' => '1996',
            '1995' => '1995',
            '1994' => '1994',
            '1993' => '1993',
            '1992' => '1992',
            '1991' => '1991',
            '1990' => '1990',
            '1989' => '1989',
            '1988' => '1988',
            '1987' => '1987',
            '1986' => '1986',
            '1985' => '1985',
            '1984' => '1984',
            '1983' => '1983',
            '1982' => '1982',
            '1981' => '1981',
            '1980' => '1980',
            '1979' => '1979',
            '1978' => '1978',
            '1977' => '1977',
            '1976' => '1976',
            '1975' => '1975',
            '1974' => '1974',
            '1973' => '1973',
            '1972' => '1972',
            '1971' => '1971',
            '1970' => '1970'

        ];
    }
}
if (!function_exists('carModel')) {
    function carModel()
    {
        return [
            'Abarth'=> ['124 Spider', '595', '695',],
        'Acura'=> ['ILX', 'MDX', 'NSX', 'RDX', 'RLX', 'TLX'],
        'Alfa Romeo'=> ['4C', 'Giulia', 'Stelvio'],
        'Aston Martin'=> ['DB11', 'DBS Superleggera', 'DBX', 'Rapide', 'Vantage'],
        'Audi'=> 'A1', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'Q2', 'Q3', 'Q5', 'Q7', 'Q8', 'RS3', 'RS4', 'RS5', 'RS6', 'RS7', 'S3', 'S4', 'S5', 'S6', 'S7', 'S8', 'TT',
        'Bentley'=> ['Bentayga', 'Continental GT', 'Flying Spur'],
        'BMW'=> ['1 Series', '2 Series', '3 Series', '4 Series', '5 Series', '6 Series', '7 Series', '8 Series', 'X1', 'X2', 'X3', 'X4', 'X5', 'X6', 'X7', 'Z4'],
        'Bugatti'=> ['Chiron', 'Divo'],
        'Buick'=> ['Encore', 'Enclave', 'Envision', 'LaCrosse', 'Regal'],
        'Cadillac'=> ['ATS', 'CT4', 'CT5', 'CT6', 'Escalade', 'XT4', 'XT5', 'XT6'],
        'Chevrolet'=> ['Blazer', 'Camaro', 'Corvette', 'Equinox', 'Impala', 'Malibu', 'Silverado', 'Suburban', 'Tahoe', 'Traverse', 'Trax'],
        'Chrysler'=> ['300', 'Pacifica', 'Voyager'],
        'Citroen'=> ['C1', 'C3', 'C3 Aircross', 'C4', 'C4 Cactus', 'C5 Aircross', 'Grand C4 SpaceTourer'],
        'Dacia'=> ['Duster', 'Logan', 'Sandero'],
        'Daewoo'=> ['G2X', 'Gentra', 'Lacetti', 'Magnus', 'Matiz', 'Nubira'],
        'Daihatsu'=> ['Ayla', 'Be-go', 'Copen', 'Gran Max', 'Luxio', 'Sirion', 'Taft', 'Terios', 'Xenia'],
        'Dodge'=> ['Challenger', 'Charger', 'Durango', 'Journey'],
        'Ferrari'=> ['488 GTB', '488 Pista', '812 Superfast', 'GTC4Lusso', 'Portofino', 'Roma', 'SF90 Stradale'],
        'Fiat'=> ['500', '500L', '500X', 'Panda', 'Tipo'],
        'Ford'=> ['Bronco', 'EcoSport', 'Edge', 'Escape', 'Expedition', 'Explorer', 'F-150', 'Fiesta', 'Focus', 'Fusion', 'Mustang', 'Ranger', 'Transit'],
        'Genesis'=> ['G70', 'G80', 'G90'],
        'GMC'=> ['Acadia', 'Canyon', 'Sierra', 'Terrain', 'Yukon'],
        'Honda'=> ['Accord', 'Civic', 'Clarity', 'CR-V', 'Fit', 'HR-V', 'Insight', 'Odyssey', 'Passport', 'Pilot', 'Ridgeline'],
        'Hummer'=> ['H1', 'H2', 'H3'],
        'Hyundai'=> ['Accent', 'Azera', 'Elantra', 'Ioniq', 'Kona', 'Nexo', 'Palisade', 'Santa Fe', 'Sonata', 'Tucson', 'Veloster', 'Venue'],
        'Infiniti'=> ['Q50', 'Q60', 'QX50', 'QX60', 'QX80'],
        'Isuzu'=> ['D-Max', 'MUX'],
        'Jaguar'=> ['E-Pace', 'F-Pace', 'F-Type', 'I-Pace', 'XE', 'XF', 'XJ'],
        'Jeep'=> ['Cherokee', 'Compass', 'Gladiator', 'Grand Cherokee', 'Renegade', 'Wrangler'],
        'Kia'=> ['Cadenza', 'Forte', 'K5', 'Niro', 'Optima', 'Rio', 'Seltos', 'Sorento', 'Soul', 'Sportage', 'Stinger', 'Telluride'],
        'Koenigsegg'=> ['Agera', 'Gemera', 'Jesko', 'Regera'],
        'Lamborghini'=> ['Aventador', 'Huracan', 'Urus'],
        'Land Rover'=> ['Defender', 'Discovery', 'Discovery Sport', 'Range Rover', 'Range Rover Evoque', 'Range Rover Sport', 'Range Rover Velar'],
        'Lexus'=> ['ES', 'GS', 'GX', 'IS', 'LC', 'LS', 'LX', 'NX', 'RC', 'RX', 'UX'],
        'Lincoln'=> ['Aviator', 'Continental', 'Corsair', 'MKZ', 'Nautilus', 'Navigator'],
        'Lotus'=> ['Elise', 'Evora', 'Exige'],
        'Maserati'=> ['Ghibli', 'GranTurismo', 'Levante', 'Quattroporte'],
        'Mazda'=> ['CX-3', 'CX-30', 'CX-5', 'CX-9', 'Mazda2', 'Mazda3', 'Mazda6', 'MX-5 Miata'],
        'McLaren'=> ['540C', '570S', '600LT', '720S', 'GT', 'Senna'],
        'Mercedes-Benz'=> ['A-Class', 'C-Class', 'CLA-Class', 'CLS-Class', 'E-Class', 'G-Class', 'GLA-Class', 'GLB-Class', 'GLC-Class', 'GLE-Class', 'GLS-Class', 'S-Class', 'SL-Class', 'SLC-Class', 'V-Class'],
        'Mini'=> ['Clubman', 'Convertible', 'Countryman', 'Hardtop'],
        'Mitsubishi'=> ['Eclipse Cross', 'Mirage', 'Outlander', 'Outlander Sport'],
        'Nissan'=> ['370Z', 'Altima', 'Armada', 'Frontier', 'GT-R', 'Kicks', 'Leaf', 'Maxima', 'Murano', 'NV Cargo', 'NV Passenger', 'NV200', 'Pathfinder', 'Rogue', 'Rogue Sport', 'Sentra', 'Titan', 'Versa'],
        'Opel'=> ['Adam', 'Astra', 'Corsa', 'Crossland', 'Grandland', 'Insignia', 'Mokka', 'Zafira'],
        'Pagani'=> ['Huayra', 'Huayra Roadster', 'Huayra BC', 'Huayra Roadster BC'],
        'Peugeot'=> ['108', '208', '2008', '3008', '308', '5008', '508', 'Rifter'],
        'Porsche'=> ['911', '918 Spyder', 'Boxster', 'Cayenne', 'Cayman', 'Macan', 'Panamera', 'Taycan'],
        'Ram'=> ['1500', '2500', '3500', 'Chassis Cab', 'ProMaster', 'ProMaster City'],
        'Renault'=> ['Arkana', 'Captur', 'Clio', 'Duster', 'Kadjar', 'Koleos', 'Mégane', 'Twingo', 'Zoe'],
        'Rolls-Royce'=> ['Cullinan', 'Dawn', 'Ghost', 'Phantom', 'Wraith'],
        'Saab'=> ['9-3', '9-4X', '9-5', '9-7X'],
        'Seat'=> ['Arona', 'Ateca', 'Ibiza', 'León', 'Tarraco'],
        'Skoda'=> ['Fabia', 'Kamiq', 'Karoq', 'Kodiaq', 'Octavia', 'Scala', 'Superb'],
        'Smart'=> ['EQ fortwo', 'EQ forfour', 'fortwo', 'forfour'],
        'Subaru'=> ['BRZ', 'Forester', 'Impreza', 'Legacy', 'Outback', 'WRX', 'XV'],
        'Suzuki'=> ['Baleno', 'Ignis', 'Jimny', 'S-Cross', 'Swift', 'Vitara'],
        'Tesla'=> ['Model 3', 'Model S', 'Model X', 'Model Y', 'Roadster'],
        'Toyota'=> ['4Runner', '86', 'Avalon', 'C-HR', 'Camry', 'Corolla', 'Highlander', 'Land Cruiser', 'Mirai', 'Prius', 'RAV4', 'Sequoia', 'Sienna', 'Supra', 'Tacoma', 'Tundra', 'Yaris'],
        'Volkswagen'=> ['Arteon', 'Atlas', 'Beetle', 'Golf', 'ID.3', 'ID.4', 'Jetta', 'Passat', 'Tiguan', 'Touareg', 'Transporter'],
        'Volvo'=> ['S60', 'S90', 'V60', 'V90', 'XC40', 'XC60', 'XC90']



        ];
    }
}

?>

