<?php
class Movie {
    static public function getData() {
        $file = file_get_contents(getcwd().'/data/movies.json');
        $data = json_decode(str_replace(array("\r", "\n"), '', $file), true);
        return $data;
    }
    static public function getFilters($data) {
        $rtn = [];

        foreach($data as $item) {
            $rtn['titles'][str_replace(' ','_', $item['title'])] = $item['title'];
            $rtn['year'][$item['year']] = $item['year'];
            foreach ($item['genres'] as $key=>$value) {
                $rtn['genres'][$value] = $value;
            }
            foreach ($item['actors'] as $key=>$value) {
                $rtn['actors'][str_replace(' ','_', $value)] = $value;
            }
        }
        return $rtn;
    }
}
