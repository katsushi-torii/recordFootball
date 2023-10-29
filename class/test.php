<?php
    class Result {
        static function pageHead(){
            $htmlHead = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>House List</title>
                <link rel="stylesheet" href="../css/style.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
            </head>
            <body>
            ';
            return $htmlHead;
        }

        static function mainContent(){
            $htmlMain = '<main class="result">';
            $htmlMain .= self::formRow();
            return $htmlMain;
        }

        static function formRow(){
            $form = '
            <section class="hForm">
                <section class="hLayer">
                    <form action="#">
                        <aside>
                            <label for="checkIn">Check In:</label>
                            <input type="date" name="checkIn" id="checkIn">
                        </aside>
                        <aside>
                            <label for="checkOut">Check Out:</label>
                            <input type="date" name="checkOut" id="checkOut">
                        </aside>
                        <aside class="hLocation">
                            <label for="location">Location:</label>
                            <select name="location" id="hLocation" multiple>
                                <option selected value="All Vancouver">All Vancouver</option>
                                <option value="West End">West End</option>
                                <option value="Kensington-Cedar Cottage">Kensington-Cedar Cottage</option>
                                <option value="Downtown Eastside">Downtown Eastside</option>
                                <option value="Hastings Sunrise">Hastings Sunrise</option>
                                <option value="Grandview-Woodland">Grandview-Woodland</option>
                                <option value="Renfrew-Collingwood">Renfrew-Collingwood</option>
                                <option value="Mount Pleasant">Mount Pleasant</option>
                                <option value="Kitsilano">Kitsilano</option>
                                <option value="Downtown">Downtown</option>
                                <option value="Riley Park">Riley Park</option>
                                <option value="Arbutus Ridge">Arbutus Ridge</option>
                                <option value="Dunbar Southlands">Dunbar Southlands</option>
                                <option value="Killarney">Killarney</option>
                                <option value="South Cambie">South Cambie</option>
                                <option value="Fairview">Fairview</option>
                                <option value="West Point Grey">West Point Grey</option>
                                <option value="Strathcona">Strathcona</option>
                                <option value="Sunset">Sunset</option>
                                <option value="Kerrisdale">Kerrisdale</option>
                                <option value="Victoria-Fraserview">Victoria-Fraserview</option>
                                <option value="Marpole">Marpole</option>
                                <option value="Shaughnessy">Shaughnessy</option>
                                <option value="Oakridge">Oakridge</option>
                            </select>
                        </aside>
                        <aside class="hPeople">
                            <label for="guest">Guests:</label>
                            <input type="number" name="guest" id="guest">
                        </aside>
                        <input type="submit" value="Search">
                    </form>
                    <figure class="accordion">
                        <input type="checkbox" id="hMap">
                        <label for="hMap">Vancouver Map <i class="fa-solid fa-chevron-down"></i></label>
                        <img src="./inc/img/hMap.jpg" alt="">
                    </figure>
                </section>
            </section>
            ';
            return $form;
        }

        static function roomList(array $acmList,$location,$guestNum,$sort){
            if($location == ""){//when form is not used
                $location = "All Vancouver"; //to pop up "Rooms in: All Vancouver"
            }

            $htmlList = '
            <section class="rList" id="list">
                <article>
                    <aside class="rTitle">
                        <h2>Rooms in:</h2>
                        <h2 class="rLocation">'.$location.'</h2>
                        <!-- this part changes due to the selected places -->
                    </aside>
                    <ul>
                        <li><i class="fa-solid fa-house"></i>: Entire home/apt</li>
                        <li><i class="fa-solid fa-hotel"></i>: Hotel room</li>
                        <li><i class="fa-solid fa-person-shelter"></i>: Private room</li>
                        <li><i class="fa-solid fa-people-roof"></i>: Shared room</li>
                        <li><i class="fa-solid fa-person-half-dress"></i>: Number of guests</li>
                    </ul>
                </article>
                <aside>
                    <a href="?sortBy=price&checkIn=&checkOut=&location='.$location.'&guest='.$guestNum.'#list">Price <i class="fa-solid fa-angles-down"></i></a>
                    <a href="?sortBy=priceDesc&checkIn=&checkOut=&location='.$location.'&guest='.$guestNum.'#list">Price <i class="fa-solid fa-angles-up"></i></a>
                </aside>
                <section>
            ';
            foreach($acmList as $acm){
                $htmlList .= self::room($acm);
            }
            $htmlList .= '
                </section>
            </section>
            ';

            return $htmlList;
        }

        static function room($acm){
            //START: giving icon according to the room type
            $roomIcon = "";
            $price = "";
            if($acm->getType() == "Entire home/apt"){
                $roomIcon = '<i class="fa-solid fa-house"></i>';
            }else if($acm->getType() == "Hotel room"){
                $roomIcon = '<i class="fa-solid fa-hotel"></i>';
            }else if($acm->getType() == "Private room"){
                $roomIcon = '<i class="fa-solid fa-person-shelter"></i>';
            }else if($acm->getType() == "Shared room"){
                $roomIcon = '<i class="fa-solid fa-people-roof"></i>';
            }
            //END: giving icon according to the room type
            if($acm->getSpecial()==1) {
                $price = '<h4 class="rPrice"><div class="shiver"><del>$'. $acm->getPrice().'</del></div>'.$acm->NEW_PRICE.' CAD /Night</h4>';
            }else {
                $price .= '<h4 class="rPrice">'.$acm->getPrice().' CAD /Night</h4>';
            }
            
            $htmlRoom = '
            <a href="../description/?accommodation_id='.$acm->getId().'" class="rAcm">
                <figure>
                    <img class="rPicture" src="'.$acm->getPicture().'">
                    <figcaption>
                        <span>'
                            .$price.
                        '</span>
                    </figcaption>
                </figure>
                <article>
                    <h3>'.$acm->getName().'</h3>
                    <h4 class="rPlace">'.'Location: '.$acm->getNeighbourhood().'</h4>
                    <section>'.
                    $roomIcon
                        .'<aside>
                            <i id="rType" class="fa-solid fa-person-half-dress"></i>
                            <h4 class="rPeople">'.$acm->getGuests().'</h4>
                        </aside>
                    </section>
                    <span class="rHost"><h5 class="hostName">Host: '.$acm->getHostName().'</h5></span>
                </article>
            </a>
            ';
   
            return $htmlRoom;
        }

        public static function pagination($number) {
           $minus;
            if($number-1<=0){
                $minus=1;
            }else {
                $minus=$number-1;

            }
            $page='
            <section class="page">
            <a href="?page='.($minus).'"><i class="fa-solid fa-chevron-left"></i></a>
            <p>'.$number.'</p>
            <a href="?page='.($number+1).'"><i class="fa-solid fa-chevron-right"></i></a>
            </section>

            ';

            return $page;
        }

        static function toTopRow(){
            $toTop = '
                <aside class="rToTop">
                    <a href="#">
                        <h3>Go to Top</h3>
                    </a>
                    <!-- jump to header -->
                </aside>
            </main>
            ';
            return $toTop;
        }

        static function pageEnd(){
            $htmlEnd = '
                </body>
            </html>
            ';
            return $htmlEnd;
        }
    }