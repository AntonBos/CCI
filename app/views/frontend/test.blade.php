@extends('layout.frontend')
@section('content')
						<div class="contentHead">
                            <h1>Contact</h1>
                            <ul><li><a href="#">&nbsp;</a></li></ul>
                        </div>

                        <div class="contentBody">
                            <?php
// Do not edit below this line
// ---------------------------------------------------------------------------
$SVQuerystring = "svgroup=juniper_product_center&";
foreach (($_GET) as $SVGetKey => $SVGetValue) {
  $SVQuerystring = $SVQuerystring.$SVGetKey."=".$SVGetValue."&";
}

$SVURL = "http://juniper.sharedvue.net/Sharedvue/pull/";
$SVURL = $SVURL."?svhost=".$_SERVER["HTTP_HOST"];

if (!empty($_SERVER["PHP_SELF"])) {
  if ((isset($_SERVER['REDIRECT_URL'])) && (strpos($_SERVER['REDIRECT_URL'], $_SERVER['PHP_SELF']) === FALSE)) $SVURL = $SVURL . $_SERVER['REDIRECT_URL'];
  else $SVURL = $SVURL . $_SERVER['PHP_SELF'];
}

else if (!empty($_SERVER['SCRIPT_NAME'])) {
  if ((isset($_SERVER['REDIRECT_URL'])) && (strpos($_SERVER['REDIRECT_URL'], $_SERVER['SCRIPT_NAME']) === FALSE)) $SVURL = $SVURL . $_SERVER['REDIRECT_URL'];
  else $SVURL = $SVURL . $_SERVER['SCRIPT_NAME'];
}

if (strlen($SVQuerystring) > 0) {
  $SVURL = $SVURL.urlencode("?".$SVQuerystring);
}

if (function_exists('curl_init')) {
  $SVCurl = curl_init();
  curl_setopt($SVCurl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($SVCurl, CURLOPT_URL, $SVURL);
  $SVContent = curl_exec($SVCurl);
  $SVHTTPStatusCode = curl_getinfo($SVCurl, CURLINFO_HTTP_CODE);
  curl_close($SVCurl);
}
else {
  $SVContent = file_get_contents($SVURL);
  list($SVHTTPVersion,$SVHTTPStatusCode,$SVHTTPMsg) = explode(' ',$http_response_header[0], 3);
}

switch($SVHTTPStatusCode) {
  case 200:
    echo ($SVContent);
    break;
  default:
    echo "<!-- SharedVue Output: Could not reach SharedVue server: $SVHTTPMsg ($SVHTTPStatusCode) -->";
    break;
}
// ---------------------------------------------------------------------------
?>
                        </div>

@endsection