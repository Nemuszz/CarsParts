@include('Layouts.nav')

<div class=" mx-auto max-w-screen-xl bg-white p-8 rounded-lg shadow-md">
    <div class="flex h-auto">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 h-50 flex flex-col">
            <div class="p-4 flex justify-between items-center">
                <span class="text-2xl font-semibold">Dashboard</span>

            </div>
            <nav class="flex-1 overflow-y-auto">
                <a href="{{route('user.profile', ['id'=> auth()->user()->id])}}" class="block p-4 hover:bg-gray-700">Profile</a>
                <a href="{{route('car.add')}}" class="block p-4 hover:bg-gray-700">Add car</a>
                <a href="{{route('car.yours', ['id'=> auth()->user()->id])}}" class="block p-4 hover:bg-gray-700">Your car</a>
                <a href="#" class="block p-4 hover:bg-gray-700">Purchased parts</a>
                <a href="#" class="block p-4 hover:bg-gray-700">Contact</a>
            </nav>

        </div>
        <!-- Main Content -->
        <div class="flex-1 p-10 ">
            <div class="w-15 mx-auto bg-white rounded-lg shadow-md p-8">
                <div>

                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Change car</h2>


                </div>
                <form class="mt-8 space-y-6 form-horizontal" action="{{route('car.update', $car)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div id="imageInputs">
                            <label for="images">Images:</label>
                            <input required type="file" class="form-control" name="image" placeholder="image" multiple accept="image/*">
                        </div>
                        <button type="button" id="addImageInput">Add Image</button>

                        <div class="flex flex-col space-y-2 mx-4">
                            <label class="text-black-400">Make</label>
                            <select required  id='car_make' name="make" class="px-4 py-2 rounded-lg border-2 border-black  bg-white text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                                @foreach (carMake() as $label => $value)
                                    <option value="{{ $value }}" {{ $car->make == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col space-y-2 mx-4">
                            <label class="text-black-400" for="car_model">Select Model:</label>
                            <select  required name="model" id="car_model" class="px-4 py-2 rounded-lg border-2 border-black  bg-white text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500 ">
                                <option value="">Change</option>
                                @foreach (carModel() as $label => $values)
                                    @foreach(array($values) as $value) @endforeach
                                    <option {{ $car->model == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            <div>

                                <h3 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Description</h3>
                            </div>
                            <div class="flex flex-col space-y-2 mx-4">
                                <label class="text-black-400">Year</label>
                                <select required name="year" class="px-4 py-2 rounded-lg border-2 border-black  bg-white text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500 ">

                                    <option value="{{$year}}">{{$year}}</option>
                                    @for($i = 0; $i < 50 ;$i++)
                                        <option @if($car->year == $year - 1) selected @endif value="{{$year-= 1}}">{{$year}}</option>
                                    @endfor

                                </select>
                            </div>
                            <div class="flex flex-col space-y-2 mx-4">
                                <label for="mileage" class="">Mileage</label>
                                <input id="mileage" name="mileage" type="number" class="appearance-none rounded-none relative block w-full px-3 py-2 border-2 border-black placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Mileage" value="{{$car->mileage}}">
                            </div>
                            <div class="flex flex-col space-y-2 mx-4">
                                <label for="price" class="">Price</label>
                                <input id="price" name="price" type="number" class="appearance-none rounded-none relative block w-full px-3 py-2 border-2 border-black placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Price in euros" value="{{$car->price}}">
                            </div>
                            <div class="flex flex-col space-y-2 mx-4">
                                <label class="text-black-400">Body type</label>
                                <select required name="power" class="px-4 py-2 rounded-lg border-2 border-black  bg-white text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                                    @foreach (bodyType() as $label => $value)
                                        <option value="{{ $value }}" {{ $car->body_type == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>

                                <label class="text-black-400">Fuel type</label>
                                <select required name="power" class="px-4 py-2 rounded-lg border-2 border-black  bg-white text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                                    @foreach (fuelType() as $label => $value)
                                        <option value="{{ $value }}" {{ $car->fuel_type == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col space-y-2 mx-4">
                                <label class="text-black-400">Power</label>

                                <select required name="power" class="px-4 py-2 rounded-lg border-2 border-black bg-white text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                                    @foreach (carPowers() as $label => $value)
                                        <option value="{{ $value }}" {{ $car->power == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>

                                <label class="text-black-400">Gear</label>
                                <select required name="gear" class="px-4 py-2 rounded-lg border-2 border-black  bg-white text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                                    @foreach (carGears() as $label => $value)
                                        <option value="{{ $value }}" {{ $car->gear == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>

                                <label class="text-black-400">Number of doors</label>
                                <select required name="number_of_doors" class="px-4 py-2 rounded-lg border-2 border-black bg-white text-gray-800 focus:outline-none focus:bg-white focus:ring focus:ring-blue-500">
                                    @foreach (doorNumber() as $label => $value)
                                        <option value="{{ $value }}" {{ $car->number_of_doors == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    <label for="description" class="">Description</label>
                                    <textarea name="description" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Description"> {{$car->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <input  id="phone" name="user_car_id" type="hidden"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone number" value="{{auth()->user()->id}}">
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



                    <div class="flex items-center justify-center">
                        <button  type="submit" class="group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add your car
                        </button>
                    </div>


                </form>

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
    const carBrandSelect = document.getElementById('car_make');
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
