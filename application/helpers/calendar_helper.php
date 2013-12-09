<?php

if (!function_exists('generate_ics'))
{
    function generate_ics($date, $task, $heureDebut = 12, $heureFin = 14)
    {

        if (empty($heureDebut))
        {
            $heureDebut = 12;
        }

        if (empty($heureFin))
        {
            $heureFin = 14;
        }

        $heureDebut = str_replace(':', '', $heureDebut);
        $heureDebut = str_pad($heureDebut, 6, "0", STR_PAD_RIGHT);

        $heureFin = str_replace(':', '', $heureFin);
        $heureFin = str_replace('.', '', $heureFin);
        $heureFin = str_pad($heureFin, 6, "0", STR_PAD_RIGHT);

        $date = strtotime($date);
        $CI   = & get_instance();
        $CI->load->helper('file');
        $CI->load->helper('date');
        $ics =
            'BEGIN:VCALENDAR
CALSCALE:GREGORIAN
X-WR-TIMEZONE;VALUE=TEXT:US/Pacific
METHOD:PUBLISH
PRODID:-//Codepotato //iCal 1.0//EN
X-WR-CALNAME;VALUE=TEXT:Example
VERSION:2.0';

        $datestring = "%Y%m%d";
        $date       = mdate($datestring, $date);
        $ics .=
            '
BEGIN:VEVENT
SEQUENCE:5
DTSTART;TZID=Europe/Paris:' . $date . 'T' . $heureDebut . '
SUMMARY:' . $task . '
DTEND;TZID=Europe/Paris:' . $date . 'T' . $heureFin . '
BEGIN:VALARM
TRIGGER;VALUE=DURATION:-P1D
ACTION:DISPLAY
DESCRIPTION:Event reminder
END:VALARM
END:VEVENT';


        $ics .=
            '
END:VCALENDAR';

        return $ics;
    }


}


if (!function_exists('download_ics'))
{
    function download_ics($date, $task, $name, $heureDebut = 12, $heureFin = 14)
    {
        $CI = & get_instance();
        $CI->load->helper('download');

        $file = generate_ics($date, $task, $heureDebut, $heureFin);
        force_download($name . '.ics', $file);
    }
}