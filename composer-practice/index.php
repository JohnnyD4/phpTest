<form action="index.php" method="POST">
	Search for gifs:<br>
	<input type="text" name="search" value="friends"><br>
	<button type="submit">Submit</button>
</form>
<?php
/**
 * Created by Sublime.
 * User: John Davis
 * Date: 7/26/17
 * Time: 12:51 PM
 */
require 'vendor/autoload.php';
$client = new \GuzzleHttp\Client();
$res = $client->request('GET', "https://api.giphy.com/v1/gifs/search?q=".$_GET['search']."&api_key=dc6zaTOxFJmzC&limit=10");
$json_object = json_decode($res->getBody());
// var_dump( $json_object->data[0]->url);
$offset = isset( $_GET['offset']);
for($x = 0; $x < 5; $x++) {
	$url = $json_object->data[$x]->images->original->url;
// echo $url;
echo "<img src=$url>";
echo "";
};
