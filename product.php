<?php 
    ob_start();
    session_start();
    $pageTitle = 'Products';
    if(isset($_SESSION['username'])){
        include 'init.php';
        global $getUser;
        $page = isset($_GET['do'])?$_GET['do']:'manage';
        if($getUser->Type == 'customer'){
            redirectPage();
        }else{
            echo '<div class="container">';
            if($page == 'manage'){
                ?>
                    <div class="our-hotels border rounded my-4 py-3">
                        <h2 class="text-uppercase text-center text-second-color">our hotels</h2>
                        <?php
                            $getHotels = query('select','Hotels',['*'],[$getUser->UserID],['UserID']);
                            if($getHotels->rowCount()){

                            }else{
                                echo '<p class="text-center">There are no hotel added yet</p>';
                            }
                        ?>
                    </div>
                    <a href="?do=AddNewHotel" class="btn btn-sm btn-main">Add New Hotel</a>
                <?php
            }elseif($page == 'AddNewHotel'){
                ?>
                <div class="new-hotel border rounded my-4 p-3 mx-auto">
                    
                    <form action="?do=AddHotel" method="POST" style="width:414px;max-width:100%;" class="mx-auto" enctype="multipart/form-data">
                        <div id="addHotel" style="min-height:800px;">
                            <div class="hotel">
                                <h3 class="text-center my-4">Add New Hotel</h3>
                                <label class="fw-bold text-main-color">Name</label>
                                <input type="text" name="name-hotel" placeholder="Enter the name of your hotel" class="form-control my-3">
                                <label class="fw-bold text-main-color">Description</label>
                                <textarea name="description-hotel" rows="3" class="form-control my-3" placeholder="Add your hotel description here"></textarea>
                                <label class="fw-bold text-main-color">Country</label>
                                <select name="country" class="form-select my-3">
                                    <option hidden>Country</option>
                                    <?php foreach($countries as $country){
                                        echo '<option value="'.$country.'">'.$country.'</option>';
                                    } ?>
                                </select>
                                <label class="fw-bold text-main-color">State</label>
                                <input type="text" name="state" placeholder="Enter the State" class="form-control my-3">
                                <label class="fw-bold text-main-color">City</label>
                                <input type="text" name="city" placeholder="Enter the city" class="form-control my-3">
                                <label class="fw-bold text-main-color">Street</label>
                                <input type="text" name="street" placeholder="Enter the street name" class="form-control my-3">
                                <label class="fw-bold text-main-color">Languages</label>
                                <div class="languages mx-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="languages[]" value="english" id="englishLanguages">
                                        <label class="form-check-label" for="englishLanguages">
                                            English
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="languages[]" value="french" id="frenchLanguages">
                                        <label class="form-check-label" for="frenchLanguages">
                                            French
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="languages[]" value="germany" id="germanyLanguages">
                                        <label class="form-check-label" for="germanyLanguages">
                                            Germany
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="languages[]" value="arabic" id="arabicLanguages">
                                        <label class="form-check-label" for="arabicLanguages">
                                            Arabic
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="languages[]" value="italian" id="italyLanguages">
                                        <label class="form-check-label" for="italyLanguages">
                                            Italian
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="languages[]" value="spanish" id="spanishLanguages">
                                        <label class="form-check-label" for="spanishLanguages">
                                            Spanish
                                        </label>
                                    </div>
                                    <input type="text" name="languages2" placeholder="Add other languages" class="form-control my-2">
                                </div>
                                <label class="fw-bold text-main-color">Size</label>
                                <input type="number" name="size" placeholder="How number of rooms your hotel have ?" min="10" class="form-control my-3">
                                <label class="fw-bold text-main-color">Photos</label>
                                <div class="input-group my-3">
                                    <input type="file" name="photo-hotel[]" class="form-control" id="photoHotel" accept="image/*" multiple>
                                    <label class="input-group-text" for="photoHotel">Upload</label>
                                </div>
                                <button class="btn btn-sm btn-main w-100 my-3" type="button" id="from-hotel-to-room">Next</button>
                            </div>
                            <div class="room">
                                <h3 class="text-center mb-4">Add Rooms</h3>
                                <label class="fw-bold text-main-color">Type</label>
                                <select name="type-room" class="form-select my-3">
                                    <option hidden>Choice Type</option>
                                    <option value="standard">Standard</option>
                                    <option value="suite">Suite</option>
                                    <option value="familty">Family</option>
                                    <option value="penthouse">Penthouse</option>
                                    <option value="villa">Villa</option>
                                    <option value="other">Other</option>
                                </select>
                                <label class="fw-bold text-main-color">Description</label>
                                <textarea name="description-room" class="form-control my-3" rows="3" placeholder="Add description to your room"></textarea>
                                <label class="fw-bold text-main-color">Beds</label>
                                <input type="number" name="beds" placeholder="Enter the number of Beds" min="1" class="form-control my-3">
                                <label class="fw-bold text-main-color">Kitchens</label>
                                <input type="number" name="kitchens" placeholder="Enter the number of Kitchens" min="1" class="form-control my-3">
                                <label class="fw-bold text-main-color">Bathrooms</label>
                                <input type="number" name="bathrooms" placeholder="Enter the number of Bathrooms" min="1" class="form-control my-3">
                                <label class="fw-bold text-main-color">Photos</label>
                                <div class="input-group my-3">
                                    <input type="file" name="photo-room[]" class="form-control" id="photoHotel" accept="image/*" multiple>
                                    <label class="input-group-text" for="photoHotel">Upload</label>
                                </div>
                                <label class="fw-bold text-main-color">Price</label>
                                <div class="input-group my-3">
                                    <input type="text" name="price" placeholder="Enter Price of the room" class="form-control w-75">
                                    <select name="currency" class="form-select w-25">
                                        <option value="$">$</option>
                                        <option value="€">€</option>
                                        <option value="£">£</option>
                                    </select>
                                </div>
                                <button class="btn btn-sm btn-main w-100 my-3" type="button" id="from-room-to-amenities">Next</button>
                                
                                <button class="btn btn-sm btn-outline-info" type="button" id="from-room-to-hotel"><i class="fa-solid fa-chevron-left fa-2xs"></i> Previous</button>
                            </div>
                            <div class="amenities">
                                <h3 class="text-center mb-4">Amenities</h3>
                                <p class="text-dark">Check all amenities your hotel have</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="wifi" value="1" id="wifi-amenity">
                                    <label class="form-check-label" for="wifi-amenity" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="Wi-Fi" data-bs-content="High-speed internet access provided in hotel rooms and public areas, allowing guests to stay connected online for work, entertainment, or communication purposes.">
                                        Wi-Fi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="breakfast" value="1" id="breakfast-amenity">
                                    <label class="form-check-label" for="breakfast-amenity" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="Breakfast" data-bs-content=" Complimentary or paid meal options offered by the hotel to guests, typically including a variety of breakfast items such as cereals, pastries, fruits, juices, coffee, and hot dishes like eggs and bacon.">
                                        Breakfast
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="parking" value="1" id="parking-amenity">
                                    <label class="form-check-label" for="parking-amenity" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="Parking" data-bs-content="On-site parking facilities available to guests, either free or for an additional fee, providing convenient and secure parking for their vehicles during their stay.">
                                        Parking
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="fitness" value="1" id="fitness-amenity">
                                    <label class="form-check-label" for="fitness-amenity" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="Fitness Center" data-bs-content="A dedicated area within the hotel equipped with exercise machines, weights, and other fitness equipment for guests to use for their workouts and fitness routines.">
                                        Fitness
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pool" value="1" id="pool-amenity">
                                    <label class="form-check-label" for="pool-amenity" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="Swimming Pool" data-bs-content="A pool located on the hotel premises, either indoors or outdoors, where guests can swim, relax, and enjoy leisure time during their stay.">
                                        Pool
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="front-desk" value="1" id="front-desk-amenity">
                                    <label class="form-check-label" for="front-desk-amenity" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="24-Hour Front Desk" data-bs-content="Round-the-clock reception services provided by hotel staff to assist guests with check-in, check-out, inquiries, and any other needs or requests they may have at any time of day or night.">
                                        24Hours Front Desk
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="room-service" value="1" id="room-service-amenity">
                                    <label class="form-check-label" for="room-service-amenity" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="Room Service" data-bs-content="The option for guests to order food and beverages from the hotel's restaurant or kitchen to be delivered directly to their hotel room, providing convenience and dining options without needing to leave the room.">
                                        Room Service
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="house-keeping" value="1" id="house-keeping-amenity">
                                    <label class="form-check-label" for="house-keeping-amenity" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="HouseKeeping" data-bs-content="Regular cleaning and maintenance services provided by hotel staff to ensure the cleanliness and tidiness of guest rooms and public areas throughout the hotel.">
                                        House Keeping
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="air-conditioning" value="1" id="air-conditioning-amenity">
                                    <label class="form-check-label" for="air-conditioning-amenity" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="Air Conditioning/ Heating" data-bs-content="Climate control systems installed in hotel rooms to regulate the temperature and provide guests with a comfortable environment, regardless of the weather conditions outside.">
                                        Air Conditioning
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="in-room" value="1" id="in-room-amenity">
                                    <label class="form-check-label" for="in-room-amenity" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="In-Room Amenities" data-bs-content="Additional features and facilities provided in hotel rooms for guests' convenience and comfort, such as flat-screen TVs, coffee makers, mini-fridges, and in-room safes.">
                                        In-Room
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="business-center" value="1" id="business-center-amenity">
                                    <label class="form-check-label" for="business-center-amenity" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="Business Center" data-bs-content="A dedicated area within the hotel equipped with computers, printers, fax machines, and other office equipment, providing business travelers with facilities to conduct work-related tasks during their stay.">
                                        Business Center
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="restaurant" value="1" id="restaurant-amenity">
                                    <label class="form-check-label" for="restaurant-amenity" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="Restaurant" data-bs-content="A dining facility within a hotel where guests and visitors can enjoy meals and beverages.">
                                        Restaurant
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pet-friendly" value="1" id="pet-friendly-amenity">
                                    <label class="form-check-label" for="pet-friendly-amenity" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="Pet-Friendly Amenities" data-bs-content="Facilities and services provided by the hotel to accommodate guests traveling with pets, such as pet-friendly rooms, pet beds, food and water bowls, and access to pet-walking areas.">
                                        Pet Friendly
                                    </label>
                                </div>
                                <div class="form-check" >
                                    <input class="form-check-input" type="checkbox" name="laundry" value="1" id="laundry-amenity">
                                    <label class="form-check-label" for="laundry-amenity" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-title="Laudry Servides" data-bs-content=" On-site laundry facilities or valet laundry services offered by the hotel to guests, providing options for washing, drying, and ironing clothes during their stay.">
                                        Laundry
                                    </label>
                                </div>
                                <input type="submit" value="Add Hotel" class="btn btn-main btn-sm w-100 my-3">
                                <button class="btn btn-sm btn-outline-info" id="from-amenities-to-room" type="button"><i class="fa-solid fa-chevron-left fa-2xs"></i> Previous</button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
            }elseif($page == 'AddHotel'){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                     
                    // hotel
                    $hotelName      = filter_in('name-hotel');
                    $hotelDesc      = filter_in('description-hotel');
                    $country        = filter_in('country');
                    $state          = filter_in('state');
                    $city           = filter_in('city');
                    $street         = filter_in('street');
                    $hotelSize      = filter_in('size','int');

                    // languages

                    if(isset($_POST['languages'])){
                        $languages      = $_POST['languages'];
                        $lang           = array();
                        
                        foreach($languages as $langs){
                            $lang[] = filter_var($langs,FILTER_SANITIZE_STRING);
                        }
                        $languages2     = filter_in('languages2');
                        $lang2          = explode(' ',$languages2);
                        foreach($lang2 as $langu){
                            array_push($lang,$langu);
                        }
                        $lang = json_encode($lang);
                    }else{
                        $lang = NULL;
                    }
                    

                    
                    // room
                    $type           = filter_in('type-room');
                    $roomDesc       = filter_in('description-room');
                    $beds           = filter_in('beds','int');
                    $kitchens       = filter_in('kitchens','int');
                    $bathrooms      = filter_in('bathrooms','int');
                    $price          = filter_in('price','float');
                    $currency       = filter_in('currency');

                    
                    // amenities
                    $wifi               = isset($_POST['wifi'])?filter_in('wifi','int'):0;
                    $breakfast          = isset($_POST['breakfast'])?filter_in('breakfast','int'):0;
                    $parking            = isset($_POST['parking'])?filter_in('parking','int'):0;
                    $fitness            = isset($_POST['fitness'])?filter_in('fitness','int'):0;
                    $pool               = isset($_POST['pool'])?filter_in('pool','int'):0;
                    $frontdesk          = isset($_POST['front-desk'])?filter_in('front-desk','int'):0;
                    $roomservice        = isset($_POST['room-service'])?filter_in('room-service','int'):0;
                    $housekeeping       = isset($_POST['house-keeping'])?filter_in('house-keeping','int'):0;
                    $airconditioning    = isset($_POST['air-conditioning'])?filter_in('air-conditioning','int'):0;
                    $inroom             = isset($_POST['in-room'])?filter_in('in-room','int'):0;
                    $businesscenter     = isset($_POST['business-center'])?filter_in('business-center','int'):0;
                    $restaurant         = isset($_POST['restaurant'])?filter_in('restaurant','int'):0;
                    $petfriendly        = isset($_POST['pet-friendly'])?filter_in('pet-friendly','int'):0;
                    $laundry            = isset($_POST['laundry'])?filter_in('laundry','int'):0;

                    $formError = array();
                    // error of each input field
                    if(empty($hotelName)){
                        $formError[] = '<div class="alert alert-danger">Please Write the name of the hotel</div>';
                    }if(empty($hotelDesc)){
                        $formError[] = '<div class="alert alert-danger">Please Write the description of the hotel</div>';
                    }if(empty($hotelName)){
                        $formError[] = '<div class="alert alert-danger">Please Write the name of the hotel</div>';
                    }if(empty($country) || $country == 'Country'){
                        $formError[] = '<div class="alert alert-danger">Please Write the Country</div>';
                    }if(empty($state)){
                        $formError[] = '<div class="alert alert-danger">Please Write the State of the hotel</div>';
                    }if(empty($city)){
                        $formError[] = '<div class="alert alert-danger">Please Write the City of the hotel</div>';
                    }if(empty($street)){
                        $formError[] = '<div class="alert alert-danger">Please Write the Street of the hotel</div>';
                    }if(empty($lang) || !$lang){
                        $formError[] = '<div class="alert alert-danger">Please Set a language at least</div>';
                    }if(empty($hotelSize)){
                        $formError[] = '<div class="alert alert-danger">Please set the size of the hotel</div>';
                    }if(empty($type)){
                        $formError[] = '<div class="alert alert-danger">Please Write the type of the room</div>';
                    }if(empty($roomDesc)){
                        $formError[] = '<div class="alert alert-danger">Please Write the Description of the room</div>';
                    }if(empty($beds)){
                        $formError[] = '<div class="alert alert-danger">Please set the number of beds in the room</div>';
                    }if(empty($kitchens)){
                        $formError[] = '<div class="alert alert-danger">Please set how many kitchens the room</div>';
                    }if(empty($bathrooms)){
                        $formError[] = '<div class="alert alert-danger">Please set how many bathrooms in the room</div>';
                    }if(empty($price)){
                        $formError[] = '<div class="alert alert-danger">Please set the price of the room</div>';
                    }if(empty($currency)){
                        $formError[] = '<div class="alert alert-danger">Please set the currency of price of the room</div>';
                    }
                    // take photos of hotels and rooms
                    $hotelPhoto     = $_FILES['photo-hotel'];
                    $roomPhoto      = $_FILES['photo-room'];
                    // extensions accept for images
                    $exAccept   = array('jpeg','jpg','png','gif');

                    $hotelPhotosNames      = $hotelPhoto['name'];
                    $hotelPhotosSizes      = $hotelPhoto['size'];
                    $hotelPhotostmp_names  = $hotelPhoto['tmp_name'];

                    $roomPhotosNames      = $roomPhoto['name'];
                    $roomPhotosSizes      = $roomPhoto['size'];
                    $roomPhotostmp_names  = $roomPhoto['tmp_name'];

                    // number of photo
                    $hotelPhotoLength = ($hotelPhoto['size'][0]);
                    $roomPhotoLength  = ($roomPhoto['size'][0]);

                    if($hotelPhotoLength){
                        foreach ($hotelPhotosNames as $name){
                            if(!in_array(pathinfo($name,PATHINFO_EXTENSION),$exAccept)){
                                $formError[] = '<div class="alert alert-danger">Extension must be : jpeg, png and gif</div>';
                                break;
                            }
                        }
                        foreach($hotelPhotosSizes as $size){
                            if($size > 2097152){
                                $formError[] = '<div class="alert alert-danger">Size must be less then <b>2 MB</b></div>';
                                break;
                            }
                        }
                    }
                    
                    if($roomPhotoLength){
                        foreach ($roomPhotosNames as $name){
                            if(!in_array(pathinfo($name,PATHINFO_EXTENSION),$exAccept)){
                                $formError[] = '<div class="alert alert-danger">Extension must be : jpeg, png and gif</div>';
                                break;
                            }
                        }
                        foreach($roomPhotosSizes as $size){
                            if($size > 2097152){
                                $formError[] = '<div class="alert alert-danger">Size must be less then <b>2 MB</b></div>';
                                break;
                            }
                        }
                    }
                    
                    
                    if(!empty($formError)){
                        foreach($formError as $error){
                            echo '<div class="m-5">';
                            echo $error;
                            echo '</div>';
                        }
                    }else{
                        // add hotel photo to database
                        if($hotelPhotoLength){
                            $newNamesHotel = array();
                            foreach($hotelPhotosNames as $name){
                                $newNamesHotel[] = $getUser->Username.'-'.createID().'.'.pathinfo($name,PATHINFO_EXTENSION);
                            }
                            $hotelimagesUpload = json_encode($newNamesHotel);
                            $n = 0;
                            foreach($hotelPhotostmp_names as $tmp){
                                if(!file_exists('layout/imgs/'.$getUser->Username)){
                                    mkdir('layout/imgs/'.$getUser->Username);
                                }
                                move_uploaded_file($tmp,'layout/imgs/'.$getUser->Username.'/'.$newNamesHotel[$n]);
                                $n++;
                            }
                        }else{
                            $hotelimagesUpload = NULL;
                        }
                        
                        // add room photos to database
                        if($roomPhotoLength){
                            $newNamesRoom = array();
                            foreach($roomPhotosNames as $name){
                                $newNamesRoom[] = $getUser->Username.'-'.createID().'.'.pathinfo($name,PATHINFO_EXTENSION);
                            }
                            $roomimagesUpload = json_encode($newNamesRoom);
                            $n = 0;
                            foreach($roomPhotostmp_names as $tmp){
                                if(!file_exists('layout/imgs/'.$getUser->Username)){
                                    mkdir('layout/imgs/'.$getUser->Username);
                                }
                                move_uploaded_file($tmp,'layout/imgs/'.$getUser->Username.'/'.$newNamesRoom[$n]);
                                $n++;
                            }
                        }else{
                            $roomimagesUpload = NULL;
                        }

                        // add hotel to database 
                        $addHotel = query('insert','Hotels',['Name','Description','Country','State','City','Street','Languages','Size','Photos','UserID'],[$hotelName,$hotelDesc,$country,$state,$city,$street,$lang,$hotelSize,$hotelimagesUpload,$getUser->UserID]);
                        $CurrentHotelId = query('select','Hotels',['HotelID'],[$getUser->UserID],['UserID'],'HotelID','DESC',1)->fetchObject()->HotelID;
                        // add room to database
                        $addRoom = query('insert','Rooms',['Type','Description','Beds','Kitchens','Bathrooms','Photo','Price','Currency','HotelID'],[$type,$roomDesc,$beds,$kitchens,$bathrooms,$roomimagesUpload,$price,$currency,$CurrentHotelId]);
                        // add amenitites to database
                        $addAmenities = query('insert','Amenities',['Wifi','Breakfast','Parking','Fitness','Pool','24H_FrontDesk','RoomService','Housekeeping','AirConditioning','InRoom','BusinessCenter','Restaurant','PetFriendly','Laundry','HotelID'],[$wifi,$breakfast,$parking,$fitness,$pool,$frontdesk,$roomservice,$housekeeping,$airconditioning,$inroom,$businesscenter,$restaurant,$petfriendly,$laundry,$CurrentHotelId]);
                        echo '<div class="alert alert-success my-5">Hotel added with success</div>';
                        redirectPage('product.php',3);
                        
                    }
                    

                }else{
                    redirectPage();
                }
            }
            echo '</div>';
        }
    }else{
        redirectPage();
    }

    include $templates . 'footer.php';
    ob_end_flush();
?>