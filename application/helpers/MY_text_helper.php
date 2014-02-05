<?php

if (!function_exists('closeTags')) {

    function closeTags($string) {
        // coded by Constantin Gross <connum at googlemail dot com> / 3rd of June, 2006
        // (Tiny little change by Sarre a.k.a. Thijsvdv)
        $donotclose = array('br', 'img', 'input'); //Tags that are not to be closed
        //prepare vars and arrays
        $tagstoclose = '';
        $tags = array();

        //put all opened tags into an array  /<(([A-Z]|[a-z]).*)(( )|(>))/isU
        preg_match_all("/<(([A-Z]|[a-z]).*)(( )|(>))/isU", $string, $result);
        $openedtags = $result[1];
        // Next line escaped by Sarre, otherwise the order will be wrong
        // $openedtags=array_reverse($openedtags);
        //put all closed tags into an array
        preg_match_all("/<\/(([A-Z]|[a-z]).*)(( )|(>))/isU", $string, $result2);
        $closedtags = $result2[1];

        //look up which tags still have to be closed and put them in an array
        for ($i = 0; $i < count($openedtags); $i++) {
            if (in_array($openedtags[$i], $closedtags)) {
                unset($closedtags[array_search($openedtags[$i], $closedtags)]);
            }
            else
                array_push($tags, $openedtags[$i]);
        }

        $tags = array_reverse($tags); //now this reversion is done again for a better order of close-tags
        //prepare the close-tags for output
        for ($x = 0; $x < count($tags); $x++) {
            $add = strtolower(trim($tags[$x]));
            if (!in_array($add, $donotclose))
                $tagstoclose.='</' . $add . '>';
        }

        //and finally
        return $string . $tagstoclose;
    }

}

if (!function_exists('word_limiter_close_tags')) {

    function word_limiter_close_tags($str, $n = 100, $end_char = '&#8230;') {
        if (strlen($str) < $n) {
            return closeTags($str);
        }

        $words = explode(' ', preg_replace("/\s+/", ' ', preg_replace("/(\r\n|\r|\n)/", " ", $str)));

        if (count($words) <= $n) {
            return closeTags($str);
        }

        $str = '';
        for ($i = 0; $i < $n; $i++) {
            $str .= $words[$i] . ' ';
        }

        $str = closeTags($str);
        return trim($str) . $end_char;
    }

}

