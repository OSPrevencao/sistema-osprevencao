<?php
date_default_timezone_set("America/Sao_Paulo");
require __DIR__.'/vendor/autoload.php';
$credentials = require __DIR__.'/config/calendar-credentials.php';

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google_Client();
    $client->setApplicationName('Google Calendar API PHP Quickstart');
    $client->setScopes(Google_Service_Calendar::CALENDAR);

    $client->setAuthConfig(__DIR__.'/config/calendar_client_id.json');
    $client->setAccessType('offline');

    // Load previously authorized credentials from a file.
    $credentialsPath = __DIR__.'/config/credentials.json';
    if (file_exists($credentialsPath)) {
        $accessToken = json_decode(file_get_contents($credentialsPath), true);
    } else {
        // Request authorization from the user.
        $authUrl = $client->createAuthUrl();
        printf("Open the following link in your browser:\n%s\n", $authUrl);
        print 'Enter verification code: ';
        $authCode = trim(fgets(STDIN));

        // Exchange authorization code for an access token.
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

        // Store the credentials to disk.
        if (!file_exists(dirname($credentialsPath))) {
            mkdir(dirname($credentialsPath), 0700, true);
        }
        file_put_contents($credentialsPath, json_encode($accessToken));
        printf("Credentials saved to %s\n", $credentialsPath);
    }
    $client->setAccessToken($accessToken);

    // Refresh the token if it's expired.
    if ($client->isAccessTokenExpired()) {
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
    }
    return $client;
}


// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Calendar($client);


$summary = $_POST['description'];
$start = new DateTime($_POST['start']);
// $descricao = new $_POST['descricao'];

//insere o evento
$event = array(
  'summary' => $summary,
  // 'location' => '800 Howard St., San Francisco, CA 94103',
  'description' =>  $summary,
  'start' => array(
    'dateTime' => $start->format(DateTime::ATOM),
    'timeZone' => 'America/Sao_Paulo',
  )
  // 'reminders' => array(
  //   'useDefault' => FALSE,
  //   'overrides' => array(
  //     array('method' => 'email', 'minutes' => 24 * 60),
  //     array('method' => 'popup', 'minutes' => 10),
  //   ),
  // ),
);
echo $start->format(DateTime::ATOM), PHP_EOL, date_default_timezone_get(), PHP_EOL;

if (!isset($_POST['allDay'])) {
  $end = new DateTime($_POST['end']);
  $event['end'] = [
    'dateTime' => $end->format(DateTime::ATOM),
    'timeZone' => 'America/Sao_Paulo',
  ];
}
try {
  $gEvent = new Google_Service_Calendar_Event($event);
  $calendarId = $credentials['calendar_address'];
  $event = $service->events->insert($calendarId, $gEvent);
  
} catch (Exception $e) {
  echo "Message: ", $e->getMessage(), ", Line: ", $e->getLine(), ", File: ", $e->getFile(), PHP_EOL;
  echo "<pre>";
  var_dump($event);
  echo "</pre>";

  http_response_code(500);
}

http_response_code(201);
exit();