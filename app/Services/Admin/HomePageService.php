<?php


namespace App\Services\Admin;


class HomePageService
{
    public function getAllTranslation($data)
    {
        $tranlations_all = [];
        foreach ($data as $item) {

            $temp_attr = $item->getAttributes();
            unset($temp_attr['created_at']);
            unset($temp_attr['updated_at']);
            unset($temp_attr['value']);
            $temp_arr['attributes'] = $temp_attr;

            $temp_arr['translations'] = $item->getTranslationsArray();
            $tranlations_all[] = $temp_arr;
        }
        
        return $tranlations_all;
    }
}
