<?php
    $themeRootDirectory = __DIR__;

    $action  = '';
    if(isset($_GET['action']) && $_GET['action'] != ""){
        $action = $_GET['action'];
    }

    switch ($action){
        case 'get_flights_data':{

             $siteRootDir =  isset($_POST['siteRootDir']) ? $_POST['siteRootDir'] : '' ;    
             $hudArrivalDeparture = isset($_POST['hud_arrival_depature']) ? $_POST['hud_arrival_depature'] : '' ;  
            
             $filePath = $themeRootDirectory.'/cache/flight-data.json'.'?' .uniqid().'1';
             $data = file_get_contents($themeRootDirectory.'/cache/flight-data.json'.'?' .uniqid().'1');   //use unique id to ignore cached file
             $flights = json_decode($data); 
   
            $flightsArrivals = array();
            $flightsDepartures = array();
            if($flights && !empty($flights->Arrivals) )
            {
               
                foreach($flights->Arrivals as $key => $arivalFlight)
                {
                   $flightsArrivals[] = $arivalFlight;
                }
            }
            if($flights && !empty($flights->Departures) )
            {
               
                foreach($flights->Departures as $key => $aDepartureFlight)
                {
                   $flightsDepartures[] = $aDepartureFlight;
                }
            }
              array_multisort( array_column($flightsArrivals, "scheduled_time_24Format"), SORT_ASC, $flightsArrivals );
              array_multisort( array_column($flightsDepartures, "scheduled_time_24Format"), SORT_ASC, $flightsDepartures );
             //print_r($flightsArrivals);

             $data = array();
             if($flights){
                 if(!empty($flights->Arrivals)){
                    if(isset($_POST['flight']) && $_POST['flight'] != "" && $hudArrivalDeparture == "arrival"){
                        foreach($flightsArrivals as $key => $flight){
                        //foreach($flights->Arrivals as $key => $flight){
                             $flightArray = json_decode(json_encode($flight), true);                            
                             if(in_array($_POST['flight'],$flightArray) && in_array($_POST['date'],$flightArray)){
                                $data['Arrivals'] .= '<tr class="schedule_row schedule_row_lg testtablevalue" data-section="Arrivals" data-key="'.$key.'">';
                                // $data['Arrivals'] .= '<td class="schedule_table_item schedule_table_item_key"  hidden>'.$key.'</td>';
                                $data['Arrivals'] .= '<td class="schedule_table_item schedule_table_item_key" data-order='.$key.'>'.$flight->scheduled_time.'</td>';
                                $data['Arrivals'] .= '<td class="schedule_table_item schedule_table_item_key">'.$flight->actual_time.'</td>';
                                $data['Arrivals'] .= '<td class="schedule_table_item schedule_table_item_key">'.$flight->city.'</td>';
                                $data['Arrivals'] .=  '<td class="schedule_table_item"><a class="schedule_table_item_link" href="'.$siteRootDir.'/wayfinding?airline='.$flight->airline_code.'">';
                                $data['Arrivals'] .=  '<img src="'.$themeRootDirectory.'/assets/custom/images/'.$flight->airline_logo_gif.'.gif" alt="Southwest logo">';
                                $data['Arrivals'] .=  '<span class="schedule_table_item_key">'.$flight->airline.'</span>';
                                $data['Arrivals'] .=  '</a></td>';
                                $data['Arrivals'] .= '<td class="schedule_table_item">';
                                $data['Arrivals'] .= '<span class="schedule_table_item_label schedule_table_item_key">'.$flight->flight_number.'</span>';
                                $data['Arrivals'] .= '</td>
                                                     <td class="schedule_table_item">';
                                $data['Arrivals'] .= '<a class="schedule_table_item_link" href="'.$siteRootDir.'/wayfinding?gate='.$flight->gate.'">';
                                $data['Arrivals'] .= '<span class="schedule_table_item_key">'.$flight->gate.'</span>';
                                $data['Arrivals'] .= '</a>
                                                      </td>';
                                $data['Arrivals'] .=  '<td class="schedule_table_item">';
                                $data['Arrivals'] .= '<span class="schedule_table_item_label schedule_table_item_key">'.$flight->baggage_claim.'</span>';
                                $data['Arrivals'] .= '</td>';
                                $data['Arrivals'] .= '<td class="schedule_table_item">';
                                $data['Arrivals'] .= '<span class="schedule_table_status schedule_table_item_key'.$flight->status_text.' ">'.$flight->status_text.'</span>';
                                $data['Arrivals'] .= '</td>
                                                      </tr>'; 
                            }else{
                                continue;
                            }
                        }
                    }else{
                        if(isset($_POST['airlineName']) && $_POST['airlineName'] != "" && $hudArrivalDeparture == 'arrival'){
                             foreach($flightsArrivals as $key => $flight){
                            //foreach($flights->Arrivals as $key => $flight){
                                $flightArray = json_decode(json_encode($flight), true);
                                if(in_array($_POST['airlineName'],$flightArray)){
                                    $data['Arrivals'] .= '<tr class="schedule_row schedule_row_lg testtablevalue2" data-section="Arrivals" data-key="'.$key.'">';
                                    // $data['Arrivals'] .= '<td class="schedule_table_item schedule_table_item_key" hidden>'.$key.'</td>';
                                    $data['Arrivals'] .= '<td class="schedule_table_item schedule_table_item_key" data-order='.$key.'>'.$flight->scheduled_time.'</td>';
                                    $data['Arrivals'] .= '<td class="schedule_table_item schedule_table_item_key">'.$flight->actual_time.'</td>';
                                    $data['Arrivals'] .= '<td class="schedule_table_item schedule_table_item_key">'.$flight->city.'</td>';
                                    $data['Arrivals'] .=  '<td class="schedule_table_item"><a class="schedule_table_item_link" href="'.$siteRootDir.'/wayfinding?airline='.$flight->airline_code.'">';
                                    $data['Arrivals'] .=  '<img src="'.$themeRootDirectory.'/assets/custom/images/'.$flight->airline_logo_gif.'.gif" alt="Southwest logo">';
                                    $data['Arrivals'] .=  '<span class="schedule_table_item_key">'.$flight->airline.'</span>';
                                    $data['Arrivals'] .=  '</a></td>';
                                    $data['Arrivals'] .= '<td class="schedule_table_item">';
                                    $data['Arrivals'] .= '<span class="schedule_table_item_label schedule_table_item_key">'.$flight->flight_number.'</span>';
                                    $data['Arrivals'] .= '</td>
                                                            <td class="schedule_table_item">';
                                    $data['Arrivals'] .= '<a class="schedule_table_item_link" href="'.$siteRootDir.'/wayfinding?gate='.$flight->gate.'">';
                                    $data['Arrivals'] .= '<span class="schedule_table_item_key">'.$flight->gate.'</span>';
                                    $data['Arrivals'] .= '</a>
                                                            </td>';
                                    $data['Arrivals'] .=  '<td class="schedule_table_item">';
                                    $data['Arrivals'] .= '<span class="schedule_table_item_label schedule_table_item_key">'.$flight->baggage_claim.'</span>';
                                    $data['Arrivals'] .= '</td>';
                                    $data['Arrivals'] .= '<td class="schedule_table_item">';
                                    $data['Arrivals'] .= '<span class="schedule_table_status schedule_table_item_key '.$flight->status_text.' ">'.$flight->status_text.'</span>';
                                    $data['Arrivals'] .= '</td>
                                                            </tr>'; 
                                }else{
                                    continue;
                                }
                            }
                        }else{
                            $data['Arrival_Arrays'] = $flightsArrivals;
                            foreach($flightsArrivals as $key => $flight){
                           // foreach($flights->Arrivals as $key => $flight){

                                $data['Arrivals'] .= '<tr class="schedule_row schedule_row_lg testtablevalue3" data-section="Arrivals" data-key="'.$key.'">';
                                // $data['Arrivals'] .= '<td class="schedule_table_item schedule_table_item_key" hidden>'.$key.'</td>';
                                $data['Arrivals'] .= '<td class="schedule_table_item schedule_table_item_key" data-order='.$key.'>'.$flight->scheduled_time.'</td>';
                                $data['Arrivals'] .= '<td class="schedule_table_item schedule_table_item_key">'.$flight->actual_time.'</td>';
                                $data['Arrivals'] .= '<td class="schedule_table_item schedule_table_item_key">'.$flight->city.'</td>';
                                $data['Arrivals'] .=  '<td class="schedule_table_item"><a class="schedule_table_item_link" href="'.$siteRootDir.'/wayfinding?airline='.$flight->airline_code.'">';
                                $data['Arrivals'] .=  '<img src="'.$themeRootDirectory.'/assets/custom/images/'.$flight->airline_logo_gif.'.gif" alt="Southwest logo">';
                                $data['Arrivals'] .=  '<span class="schedule_table_item_key">'.$flight->airline.'</span>';
                                $data['Arrivals'] .=  '</a></td>';
                                $data['Arrivals'] .= '<td class="schedule_table_item">';
                                $data['Arrivals'] .= '<span class="schedule_table_item_label schedule_table_item_key">'.$flight->flight_number.'</span>';
                                $data['Arrivals'] .= '</td>
                                                        <td class="schedule_table_item">';
                                $data['Arrivals'] .= '<a class="schedule_table_item_link" href="'.$siteRootDir.'/wayfinding?gate='.$flight->gate.'">';
                                $data['Arrivals'] .= '<span class="schedule_table_item_key">'.$flight->gate.'</span>';
                                $data['Arrivals'] .= '</a>
                                                        </td>';
                                $data['Arrivals'] .=  '<td class="schedule_table_item">';
                                $data['Arrivals'] .= '<span class="schedule_table_item_label schedule_table_item_key">'.$flight->baggage_claim.'</span>';
                                $data['Arrivals'] .= '</td>';
                                $data['Arrivals'] .= '<td class="schedule_table_item">';
                                $data['Arrivals'] .= '<span class="schedule_table_status schedule_table_item_key '.$flight->status_text.' ">'.$flight->status_text.'</span>';
                                $data['Arrivals'] .= '</td>
                                                        </tr>'; 
                            }
                        }                        
                    }
                 }   

                 if(!empty($flights->Departures)){
                    if(isset($_POST['flight']) && $_POST['flight'] != "" && $hudArrivalDeparture == "departure"){
                         foreach($flightsDepartures as $key => $flight){
                        // foreach($flights->Departures as $key => $flight){
                            $flightArray = json_decode(json_encode($flight), true);
                            if(in_array($_POST['flight'],$flightArray) && in_array($_POST['date'],$flightArray)){
                                $data['Departures'] .= '<tr class="schedule_row schedule_row_lg" data-section="Departures" data-key="'.$key.'">';
                                // $data['Departures'] .= '<td class="schedule_table_item schedule_table_item_key" hidden>'.$key.'</td>';
                                $data['Departures'] .= '<td class="schedule_table_item schedule_table_item_key" data-order='.$key.'>'.$flight->scheduled_time.'</td>';
                                $data['Departures'] .= '<td class="schedule_table_item schedule_table_item_key">'.$flight->actual_time.'</td>';
                                $data['Departures'] .= '<td class="schedule_table_item schedule_table_item_key">'.$flight->city.'</td>';
                                $data['Departures'] .=  '<td class="schedule_table_item"><a class="schedule_table_item_link" href="'.$siteRootDir.'/wayfinding?airline='.$flight->airline_code.'">';
                                $data['Departures'] .=  '<img src="'.$themeRootDirectory.'/assets/custom/images/'.$flight->airline_logo_gif.'.gif" alt="Southwest logo">';
                                $data['Departures'] .=  '<span class="schedule_table_item_key">'.$flight->airline.'</span>';
                                $data['Departures'] .=  '</a></td>';
                                $data['Departures'] .= '<td class="schedule_table_item">';
                                $data['Departures'] .= '<span class="schedule_table_item_label schedule_table_item_key">'.$flight->flight_number.'</span>';
                                $data['Departures'] .= '</td>
                                                    <td class="schedule_table_item">';
                                $data['Departures'] .= '<a class="schedule_table_item_link" href="'.$siteRootDir.'/wayfinding?gate='.$flight->gate.'">';
                                $data['Departures'] .= '<span class="schedule_table_item_key">'.$flight->gate.'</span>';
                                $data['Departures'] .= '</a>
                                                    </td>';
                                $data['Departures'] .=  '<td class="schedule_table_item">';
                                $data['Departures'] .= '<span class="schedule_table_item_label schedule_table_item_key">'.$flight->baggage_claim.'</span>';
                                $data['Departures'] .= '</td>';
                                $data['Departures'] .= '<td class="schedule_table_item">';
                                $data['Departures'] .= '<span class="schedule_table_status schedule_table_item_key '.$flight->status_text.' ">'.$flight->status_text.'</span>';
                                $data['Departures'] .= '</td>
                                                    </tr>'; 
                            }else{
                                continue;
                            }
                        }
                       
                    }else{
                        if(isset($_POST['airlineName']) && $_POST['airlineName'] != "" && $hudArrivalDeparture == 'departure'){
                             foreach($flightsDepartures as $key => $flight){
                           // foreach($flights->Departures as $key => $flight){
                                $flightArray = json_decode(json_encode($flight), true);
                                if(in_array($_POST['airlineName'],$flightArray)){
                                    $data['Departures'] .= '<tr class="schedule_row schedule_row_lg" data-section="Departures" data-key="'.$key.'">';
                                    // $data['Departures'] .= '<td class="schedule_table_item schedule_table_item_key" hidden>'.$key.'</td>';
                                    $data['Departures'] .= '<td class="schedule_table_item schedule_table_item_key" data-order='.$key.'>'.$flight->scheduled_time.'</td>';
                                    $data['Departures'] .= '<td class="schedule_table_item schedule_table_item_key">'.$flight->actual_time.'</td>';
                                    $data['Departures'] .= '<td class="schedule_table_item schedule_table_item_key">'.$flight->city.'</td>';
                                    $data['Departures'] .=  '<td class="schedule_table_item"><a class="schedule_table_item_link" href="'.$siteRootDir.'/wayfinding?airline='.$flight->airline_code.'">';
                                    $data['Departures'] .=  '<img src="'.$themeRootDirectory.'/assets/custom/images/'.$flight->airline_logo_gif.'.gif" alt="Southwest logo">';
                                    $data['Departures'] .=  '<span class="schedule_table_item_key">'.$flight->airline.'</span>';
                                    $data['Departures'] .=  '</a></td>';
                                    $data['Departures'] .= '<td class="schedule_table_item">';
                                    $data['Departures'] .= '<span class="schedule_table_item_label schedule_table_item_key">'.$flight->flight_number.'</span>';
                                    $data['Departures'] .= '</td>
                                                        <td class="schedule_table_item">';
                                    $data['Departures'] .= '<a class="schedule_table_item_link" href="'.$siteRootDir.'/wayfinding?gate='.$flight->gate.'">';
                                    $data['Departures'] .= '<span class="schedule_table_item_key">'.$flight->gate.'</span>';
                                    $data['Departures'] .= '</a>
                                                        </td>';
                                    $data['Departures'] .=  '<td class="schedule_table_item">';
                                    $data['Departures'] .= '<span class="schedule_table_item_label schedule_table_item_key">'.$flight->baggage_claim.'</span>';
                                    $data['Departures'] .= '</td>';
                                    $data['Departures'] .= '<td class="schedule_table_item">';
                                    $data['Departures'] .= '<span class="schedule_table_status schedule_table_item_key '.$flight->status_text.' ">'.$flight->status_text.'</span>';
                                    $data['Departures'] .= '</td>
                                                        </tr>'; 
                                }else{
                                    continue;
                                }                               
                            }
                        }else{
                             foreach($flightsDepartures as $key => $flight){
                           // foreach($flights->Departures as $key => $flight){
                           
                                $data['Departures'] .= '<tr class="schedule_row schedule_row_lg" data-section="Departures" data-key="'.$key.'">';
                                // $data['Departures'] .= '<td class="schedule_table_item schedule_table_item_key" hidden>'.$key.'</td>';
                                $data['Departures'] .= '<td class="schedule_table_item schedule_table_item_key" data-order='.$key.'>'.$flight->scheduled_time.'</td>';
                                $data['Departures'] .= '<td class="schedule_table_item schedule_table_item_key">'.$flight->actual_time.'</td>';
                                $data['Departures'] .= '<td class="schedule_table_item schedule_table_item_key">'.$flight->city.'</td>';
                                $data['Departures'] .=  '<td class="schedule_table_item"><a class="schedule_table_item_link" href="'.$siteRootDir.'/wayfinding?airline='.$flight->airline_code.'">';
                                $data['Departures'] .=  '<img src="'.$themeRootDirectory.'/assets/custom/images/'.$flight->airline_logo_gif.'.gif" alt="Southwest logo">';
                                $data['Departures'] .=  '<span class="schedule_table_item_key">'.$flight->airline.'</span>';
                                $data['Departures'] .=  '</a></td>';
                                $data['Departures'] .= '<td class="schedule_table_item">';
                                $data['Departures'] .= '<span class="schedule_table_item_label schedule_table_item_key">'.$flight->flight_number.'</span>';
                                $data['Departures'] .= '</td>
                                                    <td class="schedule_table_item">';
                                $data['Departures'] .= '<a class="schedule_table_item_link" href="'.$siteRootDir.'/wayfinding?gate='.$flight->gate.'">';
                                $data['Departures'] .= '<span class="schedule_table_item_key">'.$flight->gate.'</span>';
                                $data['Departures'] .= '</a>
                                                    </td>';
                                $data['Departures'] .=  '<td class="schedule_table_item">';
                                $data['Departures'] .= '<span class="schedule_table_item_label schedule_table_item_key">'.$flight->baggage_claim.'</span>';
                                $data['Departures'] .= '</td>';
                                $data['Departures'] .= '<td class="schedule_table_item">';
                                $data['Departures'] .= '<span class="schedule_table_status schedule_table_item_key '.$flight->status_text.' ">'.$flight->status_text.'</span>';
                                $data['Departures'] .= '</td>
                                                    </tr>'; 
                               
                            }
                        }
                    }
                 } 
                             
                 if(!empty($flights->Airlines))
                 {
                    $data['Airlines'] = '<option value="">Select an Airline</option>';
                    foreach($flights->Airlines as $airline){
                        $data['Airlines'] .= '<option value="'.$airline.'">'.$airline.'</option>';
                    }
                 }

                 if(!empty($flights->Dates))
                 {
                    $data['Dates'] = '';
                    foreach($flights->Dates as $date){
                        $data['Dates'] .= '<option value="'.$date.'">'.$date.'</option>';
                    }
                 }
             } 
            // print_r($data);
             echo json_encode($data);

            break;     
        }

        case 'get_flight_details':{
        
             $hudArrivalDeparture = $_POST['hud_arrival_depature'];  
             $arraykey = $_POST['arrayIndex'];
             
             $data = file_get_contents($themeRootDirectory.'/cache/flight-data.json');   
             $flights = json_decode($data);
            
             $flight = [];   
             if(!empty($flights)){
                 if($hudArrivalDeparture == 'Arrivals'){
                    $flightArr = json_decode(json_encode($flights->Arrivals), true);
                    $flight = $flightArr[$arraykey];
                 }else{
                    $flightArr = json_decode(json_encode($flights->Arrivals), true);
                    $flight = $flightArr[$arraykey];
                 }
                 
             }

                echo json_encode($flight); 
            break;
        }

        case 'get_parking_data':{


            $parkingData = file_get_contents($themeRootDirectory.'/cache/parking-availability.json');   
            $parkingAvail = json_decode($parkingData); 

            $data = [];
            if(!empty($parkingAvail)){
                $data['parkingAvailability'] = $parkingAvail;
            }

                echo json_encode($data);

            break;
        }

        case 'get_hud_data':{

            $hudData = file_get_contents($themeRootDirectory.'/cache/hud-data.json');   
            $flightDates = json_decode($hudData); 
           
            $data = [];
            if(!empty($flightDates)){
                $data['flightDates'] = $flightDates;
            }

                echo json_encode($data);

            break;
        }

        case 'get_waitTimes_data':{

            $waitTimes = file_get_contents($themeRootDirectory.'/cache/wait-times.json'); 
            $waitTimes = json_decode($waitTimes); 

            $data = [];
            if(!empty($waitTimes)){
                $data['waitTimes'] = $waitTimes;
            }

                echo json_encode($data);

            break;
        }
        default:{
            break;
        }     
    }


 clearstatcache();
?>
