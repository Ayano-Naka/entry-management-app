<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;
use App\Calendar\CalendarView;
use Google_Service_Calendar_Event;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
            /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);

        $calendarId = env('GOOGLE_CALENDAR_ID');
        $calendarId = "phhjeji2uirevrqqmk91i8jiho@group.calendar.google.com";

        $event = new Google_Service_Calendar_Event(array(
            //タイトル
            'summary' => 'test',
            'start' => array(
                // 開始日時
                'dateTime' => '2021-11-08T11:00:00+09:00',
                'timeZone' => 'Asia/Tokyo',
            ),
            'end' => array(
                // 終了日時
                'dateTime' => '2021-11-08T12:00:00+09:00',
                'timeZone' => 'Asia/Tokyo',
            ),

            'location' => "place",

            'description' =>"memo"
        ));

        $event = $service->events->insert($calendarId, $event);
        echo "イベントを追加しました";

        $calendar = new CalendarView(time());

		return view('calendar', 
        ["calendar" => $calendar]
        );
    }

    public function getClient()
    {

    $client = new Google_Client();

    $client->setApplicationName('Google Calendar API plus Laravel');

    $client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);

    $client->setAuthConfig(storage_path('app/api-key/velvety-castle-328007-b62e42ee7e81.json'));

    return $client;

    }

    // public function show(){
        
	// 	$calendar = new CalendarView(time());

	// 	return view('calendar', 
    //     ["calendar" => $calendar]
    //     );
	// }
}
