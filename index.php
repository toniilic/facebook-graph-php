<?PHP

$url = 'http://www.texashillcountry.com';

$apiUrl = 'https://graph.facebook.com/?ids='.$url;

//open connection
$ch = curl_init();
$timeout=5;

//set the url
curl_setopt($ch,CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false); 

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

$data = json_decode($result,true);

echo '<pre>';
print_r($data);
echo '</pre>';

echo '<p>Likes: '.number_format($data[$url]['share']['share_count']).'</p>';

?>