<?php

    // redirect function to take you in another page after a number of seconds

    function redirectPage ($page = NULL, $time = 0){
        if($page == 'back'){// go back to previous page
            if($_SERVER['HTTP_REFERER']){
                header("refresh:$time;url=".$_SERVER['HTTP_REFERER']);
            }
        }elseif($page){
                header("refresh:$time;url=".$page);
        }else{
            header("refresh:$time;url=index.php");
        }
        exit();
    }

    // function to create default ID

    function createID(){
        $characters = 'ABCDEFGHIGKLMNOPQRSTUVWXYZ0123456789';
        $length     = strlen($characters);
        $random     = '';
        for($i=0 ; $i < 20 ; $i++){
            $random .= $characters[mt_rand(0,$length - 1)];
        }
        return $random;
    }

    // function to set queries

    function query($type,$table,$props,$values = NULL, $wprops = NULL,$orderBy = NULL,$orderDir = 'ASC',$limit = NULL){
        // $type : to choice one of types : SELECT, INSERT , UPDATE and DELETE
        // $table: to choice the table who set query on it
        // $props: to choice COLUMN select, insert, update OR COLUMN include in WHERE clause when delete
        // $values: to give the values of $props and $wprops
        // $wprops: COLUMN include in WHERE clause . This have only AND condition.
        global $pdo;
        
        
        try{
            // SELECT Statement 
            if($type == 'select'){
                $columnSelect = '';
                foreach($props as $prop){
                    $columnSelect .= $prop.', ';
                }
                $where = NULL;
                if($wprops){
                    $where = 'WHERE ';
                    foreach($wprops as $wprop){
                        $where .= $wprop.' = ? AND '; 
                    }
                    $where = substr_replace($where,'',-4);
                }
                $order = NULL;
                if($orderBy){
                    $order = "ORDER BY $orderBy $orderDir";
                }
                if($limit){
                    $limit = "LIMIT $limit";
                }
                $columnSelect = substr_replace($columnSelect,'',-2);

                $query = $pdo->prepare("SELECT $columnSelect FROM $table $where $order $limit");

                $query->execute($values);

                return $query;
            }
            // UPDATE Statement
            elseif($type == 'update'){
                $set = 'SET ';
                foreach($props as $prop){
                    $set .= $prop.' = ?, ';
                }
                $set = substr_replace($set,' ',-2);
                $where = NULL;
                if($wprops){
                    $where = 'WHERE ';
                    foreach($wprops as $wprop){
                        $where .= $wprop.' = ? AND ';
                    }
                    $where = substr_replace($where,'',-4);
                }

                $query = $pdo->prepare("UPDATE $table $set $where");
                $query->execute($values);
                return true;
            }
            // INSERT Statement
            elseif($type == 'insert'){
                $columns = '(';
                foreach($props as $prop){
                    $columns .= $prop.',';
                }
                $columns = substr_replace($columns,') ',-1);
                $vals = 'VALUES (';
                foreach($values as $val){
                    $vals .= '?,';
                }
                $vals = substr_replace($vals,')',-1);
                
                $query = $pdo->prepare("INSERT INTO $table $columns $vals");
                $query->execute($values);
                return true;
            }
            // DELETE Statement
            elseif($type == 'delete'){
                $where = 'WHERE ';
                foreach($props as $prop){
                    $where .= $prop.'=? AND ';
                }
                $where = substr_replace($where,'',-4);

                $query = $pdo->prepare("DELETE FROM $table $where");
                $query->execute();
                return true;
            }
        }catch(PDOException $e){
            if(str_contains($e->getMessage(),'Duplicate entry')){
                if(str_contains($e->getMessage(),'Username')){
                    echo '<div class="alert alert-danger">Username has been used</div>';
                    return false;
                }if(str_contains($e->getMessage(),'Email')){
                    echo '<div class="alert alert-danger">Email has been used</div>';
                    return false;
                }
            }
        }
    }

    // function to filter input field
    // $input : it is the string value of name attribute of the input field
    // $method : it is the method of the form , get or post
    // $filter : it is the $filter of filter_var function , it has a default value as you show
    
    function filter_in($input,$method = 'post',$filter = FILTER_SANITIZE_STRING){
        $result = NULL;
        switch($filter){
            case 'email':$filter = FILTER_SANITIZE_EMAIL;break;
            case 'float':$filter = FILTER_SANITIZE_NUMBER_FLOAT;break;
            case 'int'  :$filter = FILTER_SANITIZE_NUMBER_INT;break;
            default:$filter = FILTER_SANITIZE_STRING;break;
            
        }
        if($method == 'get'){
            $result = isset($_GET[$input])?filter_var($_GET[$input],$filter):0;
        }else{
            $result = filter_var($_POST[$input],$filter);
        }
        return $result;
    }

    // array of all countrie
    $countries = array(
        'Afghanistan', 'Akrotiri', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Anguilla', 'Antarctica', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Ashmore and Cartier Islands', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Bassas de India', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswanna', 'Bouvet Island', 'Brazil', 'British Indian Ocean Territory', 'British Virgin Islands', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burma', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Clipperton Island', 'Cocoas (Keeling) Islands', 'Colombia', 'Comoros', 'Congo (Democratic Republic)', 'Congo (Republic)', 'Cook Islands', 'Coral Sea Islands', 'Costa Rica', 'Cote lvoire', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Dhekelia', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Europa Island', 'Falkland Islands (Islas Malvinas)', 'Faroe Islands', 'Fiji', 'Finland', 'France', 'French Guinea', 'French Polynesia', 'French Southern and Antarctic Lands', 'Gabon', 'Gambia', 'Gaza Strip', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Glorioso Islands', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guernsey', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard Island and McDonald Islands', 'Holy See (Vatican City)', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Isle of Man', 'Israel', 'Italy', 'Jamaica', 'Jan Mayen', 'Japan', 'Jersey', 'Jordan', 'Juan de Nova Island', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea (North)', 'Korea (South)', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macau', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Micronesia (Federated States)', 'Moldova', 'Monaco', 'Mongolia', 'Montserrat', 'Morocco', 'Mozambique', 'Namibia', 'Nauru', 'Navassa Island', 'Nepal', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'Northern Mariana Islands', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Panama', 'Papua New Guinea', 'Paracel Islands', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn Islands', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Reunion', 'Romania', 'Russia', 'Rwanda', 'Saint Helena', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Pierre and Miquelon', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia and Montenegro', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia and the South Sandwich Islands', 'Spain', 'Spratly Islands', 'Sri Lanka', 'Sudan', 'Suriname', 'Svalbard', 'Swaziland', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tokelau', 'Tonga', 'Trinidad and Tobago', 'Tromelin Island', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks and Caicos Islands', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Venezuela', 'Vietnam', 'Virgin Islands', 'Wake Island', 'Wallis and Futuna', 'West Bank', 'Western Sahara', 'Yemen', 'Zambia', 'Zimbabwe'
    );