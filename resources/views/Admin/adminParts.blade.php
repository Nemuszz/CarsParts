@include('Layouts.nav')

<div class="mx-auto max-w-screen-xl min-h-screen bg-white p-4 md:p-8 rounded-lg shadow-md">
    <!-- Main Content -->
    @include('Layouts.adminNav')
        <!-- Main Content -->
        <div class="flex-1 p-10 ">
            <div class="w-15 mx-auto bg-white rounded-lg shadow-md p-8">
                <div>

                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Parts</h2>

                </div>
                <form class="mt-8 space-y-6 form-horizontal" action="{{route('admin.parts.insert')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div id="imageInputs">
                            <label for="images">Images:</label>

                            <input required type="file" name="images[]" class="imageInput" accept="image/*">
                        </div>
                        <button type="button" id="addImageInput">Add Image</button>
                        <div class="flex flex-col space-y-2 mx-4">
                            <label class="text-black-400">Make</label>
                            <select required  id='car_brand' name="make" class="px-4 py-2 rounded-lg border-2 border-black bg-white text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                                <option value="Abarth">Abarth</option>
                                @foreach(allMakes() as $label => $value)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col space-y-2 mx-4">
                            <label class="text-black-400" for="car_model">Select Model:</label>
                            <select  required name="model" id="car_model" class="min-w-36 px-4 py-2 rounded-lg border-2 border-black bg-white text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500 ">
                                <option value="">Select model</option>
                            </select>
                        </div>
                        <div class="flex flex-col space-y-2 mx-4">
                            <label class="text-gray-400">Section</label>
                            <select  id="part-selection" name="section" class="min-w-36 px-4 py-2 rounded-lg border-2 border-black bg-white text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500 ">
                                <option value="">Select section</option>
                                @foreach(partsSection() as $label => $value)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                                <!-- Add more options for make -->
                            </select>
                        </div>
                        <div class="flex flex-col space-y-2 mx-4">
                            <label class="text-gray-400">Name</label>
                            <select id="part-name" name="name" class="min-w-36 px-4 py-2 rounded-lg border-2 border-black bg-white text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500 ">
                                <option value="">Select name</option>

                            </select>
                        </div>

                        <div class="flex flex-col space-y-2 mx-4">
                            <label for="price" class="">Price</label>
                            <input id="price" name="price" type="number" class="px-4 py-2 rounded-lg border-2 border-black bg-white text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500" placeholder="Price in euros" >
                        </div>
                        <div class="flex flex-col space-y-2 mx-4">
                            <label for="amount" class="">Amount</label>
                            <input id="amount" name="amount" type="number" class="px-4 py-2 rounded-lg border-2 border-black bg-white text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500" placeholder="Price in euros" >
                        </div>
                        <div class="">
                            <label for="description" class="">Description</label>
                            <textarea name="description" class="appearance-none rounded-none relative block w-full px-3 py-2 border-2 border-black bg-white placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Description"></textarea>
                        </div>
                        <div class="flex items-center justify-center ">
                            <button  type="submit" class="group relative flex justify-center py-2 px-4 mt-3 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Add part
                            </button>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger text-red">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                </form>


                <div class="flex-1">
                    <div class="mx-auto bg-white rounded-lg shadow-md p-4 md:p-8">
                        <div>
                            <h2 class="mt-6 mb-4 text-center text-lg md:text-3xl font-extrabold text-gray-900 border-b-2 border-gray-300 pb-2">Parts</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full divide-y divide-gray-200">
                                <thead class="bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Make</th>
                                    <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Model</th>
                                    <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Section</th>
                                    <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Amount</th>
                                    <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Price</th>
                                    <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Part code</th>
                                    <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Add amount</th>
                                    <th scope="col" class="px-2 py-1 text-left text-xs font-medium text-white uppercase tracking-wider">Delete</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($parts as $part)
                                    <tr>
                                        <td class="px-2 py-1 whitespace-nowrap">{{$part->make}}</td>
                                        <td class="px-2 py-1 whitespace-nowrap">{{$part->model}}</td>
                                        <td class="px-2 py-1 whitespace-nowrap">{{$part->section}}</td>
                                        <td class="px-2 py-1 whitespace-nowrap">{{$part->name}}</td>
                                        <td class="px-2 py-1 whitespace-nowrap">{{$part->amount}}</td>
                                        <td class="px-2 py-1 whitespace-nowrap">{{$part->price}}</td>
                                        <td class="px-2 py-1 whitespace-nowrap">{{$part->part_code}}</td>
                                        <td class="px-2 py-1 whitespace-nowrap"><a onclick="toggleForm({{ $part->id }})">Add amount</a></td>
                                        <td class="px-2 py-1 whitespace-nowrap"><a class="text-red-600" href="{{route('parts.delete',$part)}}">Delete</a></td>



                                    </tr>

                                    <div id="modal{{ $part->id }}" class="modal-overlay hidden fixed inset-0 flex justify-center items-center bg-black bg-opacity-50">
                                        <div class="modal-content bg-white rounded-lg p-8">
                                            <form action="{{route('parts.amount.insert',['part'=> $part])}}" method="POST" class="flex flex-col space-y-4 items-center">
                                                {{csrf_field()}}
                                                <h4 class="text-lg font-semibold mb-2 text-center">Add amount to: <strong>{{ $part->make }} {{ $part->model }}</strong></h4>
                                                <p class="text-gray-600 text-center">{{ $part->section }} {{ $part->name }}</p>
                                                <input type="number" name='amount' class="border border-gray-300 rounded-md mb-4 px-3 py-2 focus:outline-none focus:border-blue-400" placeholder="Enter amount">
                                                <div class="flex flex-col items-center">
                                                    <button type="submit" class="bg-blue-500 text-white font-semibold py-2 w-20 rounded-md hover:bg-blue-600 transition-colors duration-300">Add</button>
                                                    <button type="button" onclick="toggleForm({{ $part->id }})" class="bg-gray-300 text-gray-600 font-semibold py-2 w-20 mt-2 rounded-md hover:bg-gray-400 transition-colors duration-300">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


    </div>
        </div>
</div>
</div>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#addImageInput').click(function() {
            $('#imageInputs').append('<input type="file" name="images[]" class="imageInput" accept="image/*"><br>');
        });
    });

    const modelsByBrand = {
        'Abarth': ['124 Spider', '595', '695'],
        'Acura': ['ILX', 'MDX', 'NSX', 'RDX', 'RLX', 'TLX'],
        'Alfa Romeo': ['4C', 'Giulia', 'Stelvio'],
        'Aston Martin': ['DB11', 'DBS Superleggera', 'DBX', 'Rapide', 'Vantage'],
        'Audi': ['A1', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'Q2', 'Q3', 'Q5', 'Q7', 'Q8', 'RS3', 'RS4', 'RS5', 'RS6', 'RS7', 'S3', 'S4', 'S5', 'S6', 'S7', 'S8', 'TT'],
        'Bentley': ['Bentayga', 'Continental GT', 'Flying Spur'],
        'BMW': ['1 Series', '2 Series', '3 Series', '4 Series', '5 Series', '6 Series', '7 Series', '8 Series', 'X1', 'X2', 'X3', 'X4', 'X5', 'X6', 'X7', 'Z4'],
        'Bugatti': ['Chiron', 'Divo'],
        'Buick': ['Encore', 'Enclave', 'Envision', 'LaCrosse', 'Regal'],
        'Cadillac': ['ATS', 'CT4', 'CT5', 'CT6', 'Escalade', 'XT4', 'XT5', 'XT6'],
        'Chevrolet': ['Blazer', 'Camaro', 'Corvette', 'Equinox', 'Impala', 'Malibu', 'Silverado', 'Suburban', 'Tahoe', 'Traverse', 'Trax'],
        'Chrysler': ['300', 'Pacifica', 'Voyager'],
        'Citroen': ['C1', 'C3', 'C3 Aircross', 'C4', 'C4 Cactus', 'C5 Aircross', 'Grand C4 SpaceTourer'],
        'Dacia': ['Duster', 'Logan', 'Sandero'],
        'Daewoo': ['G2X', 'Gentra', 'Lacetti', 'Magnus', 'Matiz', 'Nubira'],
        'Daihatsu': ['Ayla', 'Be-go', 'Copen', 'Gran Max', 'Luxio', 'Sirion', 'Taft', 'Terios', 'Xenia'],
        'Dodge': ['Challenger', 'Charger', 'Durango', 'Journey'],
        'Ferrari': ['488 GTB', '488 Pista', '812 Superfast', 'GTC4Lusso', 'Portofino', 'Roma', 'SF90 Stradale'],
        'Fiat': ['500', '500L', '500X', 'Panda', 'Tipo'],
        'Ford': ['Bronco', 'EcoSport', 'Edge', 'Escape', 'Expedition', 'Explorer', 'F-150', 'Fiesta', 'Focus', 'Fusion', 'Mustang', 'Ranger', 'Transit'],
        'Genesis': ['G70', 'G80', 'G90'],
        'GMC': ['Acadia', 'Canyon', 'Sierra', 'Terrain', 'Yukon'],
        'Honda': ['Accord', 'Civic', 'Clarity', 'CR-V', 'Fit', 'HR-V', 'Insight', 'Odyssey', 'Passport', 'Pilot', 'Ridgeline'],
        'Hummer': ['H1', 'H2', 'H3'],
        'Hyundai': ['Accent', 'Azera', 'Elantra', 'Ioniq', 'Kona', 'Nexo', 'Palisade', 'Santa Fe', 'Sonata', 'Tucson', 'Veloster', 'Venue'],
        'Infiniti': ['Q50', 'Q60', 'QX50', 'QX60', 'QX80'],
        'Isuzu': ['D-Max', 'MUX'],
        'Jaguar': ['E-Pace', 'F-Pace', 'F-Type', 'I-Pace', 'XE', 'XF', 'XJ'],
        'Jeep': ['Cherokee', 'Compass', 'Gladiator', 'Grand Cherokee', 'Renegade', 'Wrangler'],
        'Kia': ['Cadenza', 'Forte', 'K5', 'Niro', 'Optima', 'Rio', 'Seltos', 'Sorento', 'Soul', 'Sportage', 'Stinger', 'Telluride'],
        'Koenigsegg': ['Agera', 'Gemera', 'Jesko', 'Regera'],
        'Lamborghini': ['Aventador', 'Huracan', 'Urus'],
        'Land Rover': ['Defender', 'Discovery', 'Discovery Sport', 'Range Rover', 'Range Rover Evoque', 'Range Rover Sport', 'Range Rover Velar'],
        'Lexus': ['ES', 'GS', 'GX', 'IS', 'LC', 'LS', 'LX', 'NX', 'RC', 'RX', 'UX'],
        'Lincoln': ['Aviator', 'Continental', 'Corsair', 'MKZ', 'Nautilus', 'Navigator'],
        'Lotus': ['Elise', 'Evora', 'Exige'],
        'Maserati': ['Ghibli', 'GranTurismo', 'Levante', 'Quattroporte'],
        'Mazda': ['CX-3', 'CX-30', 'CX-5', 'CX-9', 'Mazda2', 'Mazda3', 'Mazda6', 'MX-5 Miata'],
        'McLaren': ['540C', '570S', '600LT', '720S', 'GT', 'Senna'],
        'Mercedes-Benz': ['A-Class', 'C-Class', 'CLA-Class', 'CLS-Class', 'E-Class', 'G-Class', 'GLA-Class', 'GLB-Class', 'GLC-Class', 'GLE-Class', 'GLS-Class', 'S-Class', 'SL-Class', 'SLC-Class', 'V-Class'],
        'Mini': ['Clubman', 'Convertible', 'Countryman', 'Hardtop'],
        'Mitsubishi': ['Eclipse Cross', 'Mirage', 'Outlander', 'Outlander Sport'],
        'Nissan': ['370Z', 'Altima', 'Armada', 'Frontier', 'GT-R', 'Kicks', 'Leaf', 'Maxima', 'Murano', 'NV Cargo', 'NV Passenger', 'NV200', 'Pathfinder', 'Rogue', 'Rogue Sport', 'Sentra', 'Titan', 'Versa'],
        'Opel': ['Adam', 'Astra', 'Corsa', 'Crossland', 'Grandland', 'Insignia', 'Mokka', 'Zafira'],
        'Pagani': ['Huayra', 'Huayra Roadster', 'Huayra BC', 'Huayra Roadster BC'],
        'Peugeot': ['108', '208', '2008', '3008', '308', '5008', '508', 'Rifter'],
        'Porsche': ['911', '918 Spyder', 'Boxster', 'Cayenne', 'Cayman', 'Macan', 'Panamera', 'Taycan'],
        'Ram': ['1500', '2500', '3500', 'Chassis Cab', 'ProMaster', 'ProMaster City'],
        'Renault': ['Arkana', 'Captur', 'Clio', 'Duster', 'Kadjar', 'Koleos', 'Mégane', 'Twingo', 'Zoe'],
        'Rolls-Royce': ['Cullinan', 'Dawn', 'Ghost', 'Phantom', 'Wraith'],
        'Saab': ['9-3', '9-4X', '9-5', '9-7X'],
        'Seat': ['Arona', 'Ateca', 'Ibiza', 'León', 'Tarraco'],
        'Skoda': ['Fabia', 'Kamiq', 'Karoq', 'Kodiaq', 'Octavia', 'Scala', 'Superb'],
        'Smart': ['EQ fortwo', 'EQ forfour', 'fortwo', 'forfour'],
        'Subaru': ['BRZ', 'Forester', 'Impreza', 'Legacy', 'Outback', 'WRX', 'XV'],
        'Suzuki': ['Baleno', 'Ignis', 'Jimny', 'S-Cross', 'Swift', 'Vitara'],
        'Tesla': ['Model 3', 'Model S', 'Model X', 'Model Y', 'Roadster'],
        'Toyota': ['4Runner', '86', 'Avalon', 'C-HR', 'Camry', 'Corolla', 'Highlander', 'Land Cruiser', 'Mirai', 'Prius', 'RAV4', 'Sequoia', 'Sienna', 'Supra', 'Tacoma', 'Tundra', 'Yaris'],
        'Volkswagen': ['Arteon', 'Atlas', 'Beetle', 'Golf', 'ID.3', 'ID.4', 'Jetta', 'Passat', 'Tiguan', 'Touareg', 'Transporter'],
        'Volvo': ['S60', 'S90', 'V60', 'V90', 'XC40', 'XC60', 'XC90']
    }

    const carBrandSelect = document.getElementById('car_brand');
    const carModelSelect = document.getElementById('car_model');


    carBrandSelect.addEventListener('change', function() {
        // Check if carBrandSelect value is empty
        const selectedBrand = this.value;
        const models = modelsByBrand[selectedBrand] || [];

        // Clear existing options
        carModelSelect.innerHTML = '';

        // Add new options
        models.forEach(model => {
            const option = document.createElement('option');
            option.value = model;
            option.text = model;
            carModelSelect.appendChild(option);
        });
    });






    const partsBySection = {
        'Engine': ['Piston', 'Cylinder Head', 'Crankshaft', 'Camshaft', 'Connecting Rod', 'Engine Block', 'Timing Belt', 'Timing Chain', 'Valve', 'Valve Cover', 'Oil Pump', 'Oil Pan', 'Turbocharger', 'Supercharger', 'Fuel Injector', 'Throttle Body', 'Intake Manifold', 'Exhaust Manifold'],
        'Suspension': ['Shock Absorber', 'Strut Assembly', 'Control Arm', 'Ball Joint', 'Tie Rod', 'Sway Bar', 'Stabilizer Bar', 'Leaf Spring', 'Coil Spring', 'Control Arm Bushing', 'Bushing', 'Strut Mount', 'Control Arm Bushing', 'Shock Mount', 'Suspension Bushing', 'Suspension Link', 'Trailing Arm', 'Panhard Rod'],
        'Brake': ['Brake Pads', 'Brake Rotors', 'Brake Calipers', 'Brake Drum', 'Brake Shoes', 'Brake Lines', 'Brake Master Cylinder', 'Brake Booster', 'Brake Fluid Reservoir', 'Parking Brake Cable', 'Brake Hardware Kit', 'Brake Disc', 'Brake Fluid'],
        'Electrical': ['Battery', 'Alternator', 'Starter Motor', 'Ignition Coil', 'Spark Plug', 'Distributor', 'Ignition Switch', 'Ignition Module', 'Ignition Control Unit', 'Ignition Wire Set', 'Glow Plug', 'Voltage Regulator', 'Battery Cable', 'Battery Terminal', 'Headlight', 'Tail Light', 'Turn Signal Light', 'Fog Light'],
        'Interior': ['Seats', 'Dashboard', 'Steering Wheel', 'Door Panel', 'Console', 'Cup Holder', 'Center Armrest', 'Glove Box', 'Floor Mats', 'Carpet', 'Headliner', 'Sun Visor', 'Seat Belt', 'Seat Cover', 'Trim Panel', 'Pedal', 'Shift Knob', 'Mirror'],
        'Exterior': ['Bumper', 'Grille', 'Fender', 'Hood', 'Trunk Lid', 'Quarter Panel', 'Roof', 'Windshield', 'Side Mirror', 'Door Handle', 'Window Regulator', 'Door', 'Spoiler', 'Molding', 'Emblem', 'Trim', 'Weatherstripping', 'Sunroof', 'Running Board'],
        'Transmission': ['Transmission Fluid', 'Transmission Filter', 'Transmission Mount', 'Clutch', 'Clutch Master Cylinder', 'Clutch Slave Cylinder', 'Flywheel', 'Torque Converter', 'Shift Cable', 'Shift Linkage', 'Transmission Pan', 'Transmission Control Module', 'Transmission Valve Body', 'Transmission Solenoid', 'Transmission Sensor', 'Transmission Cooler'],
        'Wheel': ['Tire', 'Wheel Hub', 'Wheel Bearing', 'Wheel Seal', 'Wheel Stud', 'Wheel Spacer', 'Wheel Bolt', 'Wheel Nut', 'Wheel Cover', 'Wheel Center Cap', 'Wheel Valve Stem', 'Tire Pressure Sensor', 'Tire Pressure Monitor', 'Tire Valve', 'Tire Patch Kit', 'Tire Iron', 'Wheel Alignment Kit'],
        'Exhaust': ['Muffler', 'Catalytic Converter', 'Exhaust Pipe', 'Exhaust Manifold', 'Exhaust Gasket', 'Exhaust Hanger', 'Exhaust Flange', 'Exhaust Tip', 'Exhaust Clamp', 'Oxygen Sensor', 'EGR Valve', 'PCV Valve', 'Resonator', 'Tailpipe'],
        'Cooling': ['Radiator', 'Water Pump', 'Thermostat', 'Coolant Temperature Sensor', 'Cooling Fan', 'Cooling Hose', 'Expansion Tank', 'Coolant Reservoir Cap', 'Coolant Reservoir', 'Heater Core', 'Heater Hose', 'Oil Cooler', 'Intercooler', 'Fan Clutch', 'Fan Blade'],
        'Fuel': ['Fuel Pump', 'Fuel Filter', 'Fuel Injector', 'Fuel Pressure Regulator', 'Fuel Tank', 'Fuel Filler Neck', 'Fuel Line', 'Fuel Hose', 'Fuel Pressure Sensor', 'Fuel Rail', 'Gas Cap', 'Carburetor', 'Throttle Position Sensor', 'Idle Air Control Valve'],
        'Body': ['Door', 'Trunk', 'Hood', 'Fender', 'Bumper', 'Quarter Panel', 'Roof', 'Windshield', 'Side Mirror', 'Window', 'Sunroof', 'Grille', 'Molding', 'Emblem', 'Trim', 'Weatherstrip', 'Rock Panel', 'Running Board', 'Frame'],
        'Ignition': ['Spark Plug', 'Ignition Coil', 'Distributor', 'Ignition Control Module', 'Ignition Switch', 'Ignition Lock Cylinder', 'Spark Plug Wire Set', 'Ignition Rotor', 'Ignition Cap', 'Ignition Condenser', 'Ignition Points', 'Ignition Module', 'Glow Plug'],
        'Emission': ['Oxygen Sensor', 'EGR Valve', 'PCV Valve', 'Catalytic Converter', 'Evaporative Emission Control Valve', 'Evaporative Emission Canister', 'Evaporative Emission Purge Solenoid', 'Secondary Air Injection Pump', 'Secondary Air Injection Valve', 'Exhaust Gas Recirculation Temperature Sensor', 'Exhaust Gas Recirculation Pressure Sensor', 'Evaporative Emission Control Pressure Sensor'],
        'Steering': ['Power Steering Pump', 'Power Steering Hose', 'Power Steering Rack', 'Steering Column', 'Steering Wheel', 'Steering Shaft', 'Steering Gearbox', 'Steering Knuckle', 'Steering Linkage', 'Steering Damper', 'Steering Stabilizer', 'Pitman Arm', 'Idler Arm']

    }

    const partSelection = document.getElementById('part-selection');
    const partName = document.getElementById('part-name');

    partSelection.addEventListener('change', function() {

        const selectedPart = this.value;
        const parts = partsBySection[selectedPart] || [];

        // Clear existing options


        if (parts.length === 0) {
            const option = document.createElement('option');
            option.value = '';
            option.text = 'Select Section';
            partName.appendChild(option);
        } else {
            parts.forEach(part => {
                const option = document.createElement('option');
                option.value = part;
                option.text = part;
                partName.appendChild(option);
            });
        }
    });



    function toggleForm(partId) {
        var modal = document.getElementById('modal' + partId);
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
        } else {
            modal.classList.add('hidden');
        }
    }
</script>
@include('Layouts.footer')
