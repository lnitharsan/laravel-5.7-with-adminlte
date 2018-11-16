<?php

define('SUPER_ADMIN', 'super_admin');

final class Status {

    const PENDING = 'pending';
    const COMPLETE = 'complete';
    const COMPLETED = 'completed';
    const ENABLE = 'enable';
    const ENABLED = 'enabled';
    const DISABLE = 'disable';
    const DISABLED = 'disabled';
    const ACCEPT = 'accept';
    const ACCEPTED = 'accepted';
    const DECLINE = 'decline';
    const DECLINED = 'declined';
    const CANCEL = 'cancel';
    const CANCELLED = 'cancelled';
    const REMIND_ME_LATER = 'remind_me_later';
}

final class Date_Day {

    const PAST = 'Past';
    const LAST_MONTH = 'Last Month';
    const LAST_WEEK = 'Last Week';
    const THIS_WEEK = 'This Week';
    const YESTERDAY = 'Yesterday';
    const TODAY = 'Today';
    const TOMORROW = 'Tomorrow';
    const NEXT_WEEK = 'Next Week';
    const THIS_MONTH = 'This Month';
    const UPCOMING = 'Upcoming';
}

final class Empty_Value {

    const NOT_SPECIFIED = 'Not Specified';
    const NOT_AVAILABLE = 'Not Available';
    const ANY = 'ANY';
    const SHORT = 'N\A';
    const NOT_APPLICABLE = 'Not Applicable';
    const EMPTY_DATE = "0000-00-00 00:00:00";
    const NONE = "None";
    const TIMER = "00:00:00";
    const NOT_YET = "Not Yet";
}

final class DateFormat {

    const SQL_FORMAT = "Y-m-d H:i:s";
    const SQL_DATE = "Y-m-d";
    const SQL_TIME = "H:i:s";
    const DEFAULT_DATE = '0000-00-00 00:00:00';
    const HUMAN = 'M j, Y \a\t g:i a';
    const CALENDER = 'F d, Y';
    const DATEPICKER = 'Y-m-d';
    const FULL_DATE = 'D M j Y';
    const SHORT = 'M j, Y';
    const TIME_ONLY = 'g:i a';
    const DAY_OF_WEEK = "l";
    const MONTH_YEAR = 'M Y';

}

final class Days_of_Week {

    const MONDAY = "monday";
    const TUESDAY = "tuesday";
    const WEDNESDAY = "wednesday";
    const THURSDAY = "thursday";
    const FRIDAY = "friday";
    const SATURDAY = "saturday";
    const SUNDAY = "sunday";
}



final class Notification_Key {

    const POST_LIKE = "post_like";
    const POST_COMMENT = "post_comment";
    const EVENT_LIKE = "event_like";
    const EVENT_COMMENT = "event_comment";
    const FRIEND_REQUEST = "friend_request";
    const FRIEND_ACCEPT = "friend_accept";
}


//Privacy
final class Network_Privacy {

    const PUBLIC = 'public';
    const MY_TEAM_AND_FRIENDS = 'my_team_and_friends';
    const MY_TEAM = 'my_team';
    const FRIENDS = 'friends';
    const ONLY_ME = 'only_me';
}

//Package
final class Member_Package {

    const FREE = 'free';
    const ELITE = 'elite';
    const MILLIONAIRES = 'millionaires';
    const ELITE_MILLIONARIES = 'elite_millionaires';
}


