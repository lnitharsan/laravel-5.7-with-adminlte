<?php

if (!function_exists('cache_buster')) {

    function cache_buster() {
        return '?v='.time();
//        return '?v=1.4.9';
    }

}

if (!function_exists('cicid')) {

    function cicid() {
        $cicid = Input::get('cicid');
        if(!$cicid) {
            $auth_user = AuthUser();
            if($auth_user) {
                $cicid = $auth_user->id;
            }
        }

        return $cicid;
    }

}


if (!function_exists('format_date')) {

    function format_date($date = null, $format = '', $now_format = null) {
        if (!empty($format) && !empty($date)) {
            if(!empty($now_format)) {
               // $data = new \DateTime();
                return DateTime::createFromFormat($now_format, $date)->format($format);
            }else {
                return date($format, strtotime($date));
            }
        }

        return null;
    }

}


if (!function_exists('post_time_in_words')) {

    function post_time_in_words($date) {
        $str_date = strtotime($date);
        $time = time();
        // Check how many X {$suffix}
        $diff = abs($time - $str_date);
        $years = floor($diff / (365 * 60 * 60 * 24 ));
        $days = floor($diff / (60 * 60 * 24));
        $hours = floor($diff / (60 * 60));
        $minutes = floor($diff / 60);

        if ($years == 0) {
            if ($days == 0) {
                if ($hours == 0) {
                    if ($minutes == 0) {
                        $when = "right now";
                    } else {
                        $when = $minutes == 1 ? "a minute" : $minutes . " minutes";
                    }
                } else {
                    $when = $hours == 1 ? "an hour" : $hours . " hours";
                }
            } else {
                $when = date('M j \a\t g:i a', $str_date);
            }
        } else {
            $when = date('M j, Y', $str_date);
        }

        return $when;
    }

}


if (!function_exists('thumbnailImgFit')) {

    function thumbnailImgFit($current_file, $thumb_file, $width = null, $height = null) {


        if(!File::exists($thumb_file))
            File::makeDirectory($thumb_file);

        Intervention\Image\Facades\Image::make($current_file)
            ->fit($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->save($thumb_file);


        return $thumb_file;
    }

}


if (!function_exists('AuthUser')) {

    function AuthUser($key = null) {
        $user = \Illuminate\Support\Facades\Auth::guard('auth');

        if($user->check()) {
            $user_data = $user->user();
            if(!empty($key)) {
                return $user_data->{$key};

            }else {
                return $user_data;

            }
        }

        return null;
    }

}


if (!function_exists('AuthAdmin')) {

    function AuthAdmin($key = null) {
        $user = \Illuminate\Support\Facades\Auth::guard('admin');

        if($user->check()) {
            $user_data = $user->user();
            if(!empty($key)) {
                return $user_data->{$key};

            }else {
                return $user_data;

            }
        }

        return null;
    }

}


if (!function_exists('AuthUserProfile')) {

    function AuthUserProfile() {
        $user = AuthUser();

        if($user) {
            $user_Details = $user ? $user->userDetails : null;
            if($user_Details) {
                if($user_Details->profile_image && Storage::exists("/profile/thumbnail/100x100_".$user_Details->profile_image)) {
                    return Storage::url("/profile/thumbnail/100x100_".$user_Details->profile_image);
                }elseif($user_Details->gender == 'female') {
                    return asset('public/images/User_Profile_Image-Female.png');
                }else {
                    return asset('public/images/User_Profile_Image-Male.png');
                }
            }
        }

        return null;
    }

}


if (!function_exists('is_package')) {

    function is_package($key = null) {
        $member_type = null;

        $user = AuthUser();
        if($user) {
            $user_Details = $user ? $user->userDetails : null;
            if($user_Details) {
                $member_type = $user_Details->member_type;
            }
        }

        $controller = new \App\Http\Controllers\Controller();
        $packages = $controller->getPackages();

        if(!empty($member_type) && isset($packages[$member_type])) {
            if(!empty($key) && isset($packages[$member_type][$key])) {
                return $packages[$member_type][$key];
            }
        }

        return false;
    }

}


if (!function_exists('get_selected_state')) {

    function get_selected_state($value, $compare) {
        if ($value === $compare) {
            return ' selected="selected"';
        }
        return '';
    }

}


if (!function_exists('get_months')) {

    function get_months($long = false) {

        if($long) {

            return array(
                1=>'January',
                2=>'February',
                3=>'March',
                4=>'April',
                5=>'May',
                6=>'June',
                7=>'July',
                8=>'August',
                9=>'September',
                10=>'October',
                11=>'November',
                12=>'December'
            );
        }else {

            return array(
                1 => 'Jan',
                2 => 'Feb',
                3 => 'Mar',
                4 => 'Apr',
                5 => 'May',
                6 => 'Jun',
                7 => 'Jul',
                8 => 'Aug',
                9 => 'Sep',
                10 => 'Oct',
                11 => 'Nov',
                12 => 'Dec',
            );
        }

    }

}



/**
 * Generate a querystring url for the application.
 *
 * Assumes that you want a URL with a querystring rather than route params
 * (which is what the default url() helper does)
 *
 * @param  string  $path
 * @param  mixed   $qs
 * @param  bool    $secure
 * @return string
 */
if (!function_exists('qs_url')) {
    function qs_url($path = null, $qs = array(), $secure = null) {
        $url = app('url')->to($path, $secure);
        if (count($qs)) {

            foreach ($qs as $key => $value) {
                $qs[$key] = sprintf('%s=%s', $key, urlencode($value));
            }
            $url = sprintf('%s?%s', $url, implode('&', $qs));
        }
        return $url;
    }
}


//Global variable
if (!function_exists('global_session')) {

    function global_session($key = null) {

        if(!$session = session($key)) {
            $sessionController = new \App\Http\Controllers\SessionController();
            return $sessionController->{$key}();
        }

        return $session;
    }

}


//Reflection class
if (!function_exists('get_class_constants')) {

    function get_class_constants($class) {
        $r = new ReflectionClass($class);
        return $r->getConstants();
    }

}
