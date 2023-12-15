<?php

    if (!function_exists('dateFormat')) {

        function dateFormat($date)
        {
            return date('d M, Y', strtotime($date));
        }
    }