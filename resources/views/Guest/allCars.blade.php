
@include('Layouts.nav')
<div class=" mx-auto max-w-screen-xl">
<header class="bg-gray-900 text-white py-20 px-8">
    <form action="{{route('search')}}" method="GET">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-6">Find Your Dream Car</h1>
        <p class="text-lg mb-8">Browse through our collection of high-quality secondhand cars</p>
        <div class="flex justify-center flex-wrap">

                <div class="flex flex-col space-y-2 mx-4">
                    <label class="text-gray-400">Year</label>
                    <select name="year" class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                        <option value="">Select Year</option>
                        @foreach(carYear() as $label => $value)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                        <!-- Add more options for years -->
                    </select>
                </div>
            <div class="flex flex-col space-y-2 mx-4">
                <label class="text-gray-400">Mileage</label>
                <select name="mileage" class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                    <option value="">Select Mileage</option>
                    @foreach(mileage() as $label => $value)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach

                    <!-- Add more options for mileage -->
                </select>
            </div>
            <div class="flex flex-col space-y-2 mx-4">
                <label class="text-gray-400">Make</label>
                <select id='car_brand' name="make" class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                    <option value="">Select Make</option>
                    @foreach(allMakes() as $label => $value)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                    <!-- Add more options for make -->
                </select>
            </div>
            <!-- Model, Price, Search Button -->
            <div class="flex flex-col space-y-2 mx-4">
                <label class="text-gray-400">Model</label>
                <select  name="model" id="car_model" class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                    <option value="">Select Model</option>

                    <!-- Add more options for model -->
                </select>
            </div>
            <div class="flex flex-col space-y-2 mx-4">
                <label class="text-gray-400">Price</label>
                <input name="price" placeholder="Up till price                      $" class="px-4 py-2 rounded-lg border-none bg-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
            </div>
            <div class="flex flex-col space-y-2 mx-4">
                <label class="text-gray-400 invisible">Condition</label>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg focus:outline-none focus:bg-blue-600">Search</button>
            </div>
        </div>
    </div>

    </form>
</header>





    <section class="container mx-auto my-12">
        <!-- Car Listings -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($cars as $car)
                <a href="{{ route('car.permalink', $car) }}" class="flex items-stretch">
                    <div class="bg-white rounded shadow-md p-4 car-card flex flex-col justify-between w-full ">
                        <!-- Car Image -->
                        @if(isset($images[$car->id]))
                            <img class="max-h-25 rounded mb-2 w-full h-full" src="{{ asset('images/' . $images[$car->id]->path) }}" alt="Car Image">
                        @else
                            <img src="{{ asset('images/placeholder.jpg') }}" alt="Car Image">
                        @endif

                        <!-- Car Details -->
                        <div>
                            <h2 class="text-xl font-bold mb-4">{{ $car->make }} {{ $car->model }}</h2>
                            <p class="text-gray-600 flex justify-between mb-2">
                                <span>{{ $car->year }}</span>
                                <span><strong>{{ $car->price }} €</strong></span>
                            </p>

                        </div>

                    </div>
                </a>
            @endforeach
        </div>
    </section>

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
</script>
@include('Layouts.footer')

