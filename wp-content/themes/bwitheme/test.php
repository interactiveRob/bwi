<?php
    

   
    $action  = '';
    if(isset($_GET['action']) && $_GET['action'] != "")
    {
       $action = $_GET['action'];
              
       $status = 'executing...';
       if($action == 'set_screen_width_session')
       {
            if(isset($_POST['ScreenWidth']) ) 
            {
                 $screenWidth =  $_POST['ScreenWidth'];
                 //$status = createTable();
                 $status = updateScreenSizeOption($screenWidth);

                 // $insertSql = "INSERT INTO wp_options (option_name, option_value)
                 //                VALUES ('screen_width', '".$screenWidth."')";
                 
                  echo json_encode( array('screen_width'=> $_POST['ScreenWidth'],
                                        'status' => $status,

                                       )
                                );
            
            } else {
                echo json_encode(array('outcome'=>'error','error'=>"Couldn't save dimension info"));
              }
        }elseif($action == 'get_screen_width_session')
        {

        }
            
    }

       function connectDb()
       {
            $servername = "127.0.0.1:3306";
            $username = "bwiairport";
            $password = "amIAlTf2PhlkBDjFr1YY";
            $dbname = "wp_bwiairport";
             // Create connection
            $connection = new mysqli($servername, $username, $password, $dbname);
            return $connection;

       }

        function getScreenSizeOption($option=false)
        {
            $screenWIdthOptionId = 0;
            $screenWIdthOptionValue= 0;
            // Create connection
            $status= 'checking...';
            $connection = connectDb();
            if ($connection->connect_error) 
            {
                  $status = 'connection error: ';
                  return $status;
            }
            else{
                    $selectSql = "SELECT * FROM  wp_options where option_name='screen_width' limit 1;";
                   //$selectSql = "SELECT * FROM  wp_screen_options where option_name='screen_width' limit 1;";
                    
                    $result = $connection->query($selectSql);
                    if ($result->num_rows > 0) 
                    {
                      while($row = $result->fetch_assoc()) 
                      {
                        $screenWIdthOptionId = $row["option_id"];
                        $screenWIdthOptionValue = $row["option_value"];
                      }
                     $status = "record found, ID: ". $screenWIdthOptionId . ", value: " . $screenWIdthOptionValue ;
                    }
                }
                  
         
                return [$screenWIdthOptionId, $screenWIdthOptionValue, $autoloadValue, $status];
        }

        function updateScreenSizeOption( $screenWidth)
        {
            // Create connection
            $status= 'checking...';
            $connection = connectDb();
            if ($connection->connect_error) 
            {
                  $status = 'connection error: ';
            }
            else{
                $screenWIdthOption = getScreenSizeOption();
                $screenWIdthOptionId = $screenWIdthOption[0];
                $screenWIdthOptionValue = $screenWIdthOption[1];
                if($screenWIdthOptionId == 0)
                {
                    $insertUpdateSql = "INSERT INTO wp_screen_options (option_id, option_name, option_value) VALUES ('3333','screen_width', '".$screenWidth."')";
                }else {
                     $insertUpdateSql = "UPDATE wp_options SET option_value='".$screenWidth."', autoload=false WHERE option_id=".$screenWIdthOptionId;
                    //$insertUpdateSql = "UPDATE wp_screen_options SET option_value='".$screenWidth."' WHERE option_id=".$screenWIdthOptionId;

                }
                
                  $status = "record found, ID: ". $screenWIdthOptionId . ", value: " . $screenWIdthOptionValue;
                  if ($connection->query($insertUpdateSql) === TRUE) 
                  {
                      $status .= " --- Record insert/updated successfully";
                  } else {
                      $status .= "--- Error insert/updating record: " . $connection->error;
                    }
            }
            return $status;
        }




        function createTable()
        {
           $sqlCreateTable = "CREATE TABLE if not exists wp_screen_options ( option_id int, option_name varchar(255),  option_value varchar(255) )";
           $connection = connectDb();
            if ($connection->connect_error) 
            {
                  $status = 'connection error: ';
            }
            else{  
                  if ($connection->query($sqlCreateTable) === TRUE) 
                       $status .= " --- Table Created successfully";
                  else $status .= "--- Error table creation: " . $connection->error;
                }
          return $status;      
       }
?>