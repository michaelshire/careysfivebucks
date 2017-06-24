<html>
 <head>
  <title>Carey's Five Bucks</title>
 </head>
 <body>
 <?php 
 
 // Method: POST, PUT, GET etc
 // Data: array("param" => "value") ==> index.php?param=value
 
 function CallAPI($method, $url, $data = false)
 {
     $curl = curl_init();
 
     switch ($method)
     {
         case "POST":
             curl_setopt($curl, CURLOPT_POST, 1);
 
             if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
             break;
         case "PUT":
             curl_setopt($curl, CURLOPT_PUT, 1);
             break;
         default:
             if ($data)
                 $url = sprintf("%s?%s", $url, http_build_query($data));
     }

     // Optional Authentication:
     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
     curl_setopt($curl, CURLOPT_USERPWD, "username:password");
 
     curl_setopt($curl, CURLOPT_URL, $url);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 
     $result = curl_exec($curl);
 
     curl_close($curl);
 
     return $result;
 } 
 
 ?> 
 <?= CallAPI(GET, 'https://api.coinmarketcap.com/v1/ticker/bitcoin/?convert=CAD'); ?>
  Tracking the value of $5 CAD purchased on June 13, 2017
 </body>
 </html>
