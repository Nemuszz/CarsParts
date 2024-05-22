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
            'cooler' => 'cooler',
        ];
    }
}
if (!function_exists('partsSection')) {
    function partsSection()
    {
        return [
            'Engine parts' => 'Engine',
            'Suspension parts' => 'Suspension',
            'Brake parts' => 'Brake',
            'Electrical parts' => 'Electrical',
            'Interior parts' => 'Interior',
            'Exterior parts' => 'Exterior',
            'Transmission parts' => 'Transmission',
            'Wheel parts' => 'Wheel',
            'Exhaust parts' => 'Exhaust',
            'Cooling System parts' => 'Cooling',
            'Fuel System parts' => 'Fuel',
            'Body parts' => 'Body',
            'Ignition parts' => 'Ignition',
            'Emission System parts' => 'Emission',
            'Steering parts' => 'Steering',
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


?>

