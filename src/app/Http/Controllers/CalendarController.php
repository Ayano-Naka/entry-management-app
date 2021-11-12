<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Google_Client;
use Carbon\Carbon;
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

    public function index(Request $request, Google_Service_Calendar_Event $event){

        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);

        $calendarId = "phhjeji2uirevrqqmk91i8jiho@group.calendar.google.com";

        $event = new Google_Service_Calendar_Event(array(
            //タイトル
            'summary' => $request->input('summary'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),

            'start' => array(
                // 開始日時
                'dateTime' => Carbon::parse($request->input('start'))->format(DATE_RFC3339),
                'timeZone' => 'Asia/Tokyo',
            ),
            'end' => array(
                // 終了日時
                'dateTime' => Carbon::parse($request->input('end'))->format(DATE_RFC3339),
                'timeZone' => 'Asia/Tokyo',
            ),
        ));

        $event = $service->events->insert($calendarId, $event);

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

    public function show(){
        
		$calendar = new CalendarView(time());

		return view('calendar', 
        ["calendar" => $calendar]
        );
	}
}
