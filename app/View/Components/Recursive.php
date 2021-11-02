<?php

namespace App\View\Components;

use App\Category;

class Recursive
{
    private $htmlSelect;
    public function __construct()
    {
        $this->htmlSelect = '';
    }

    public function categoryRecursive($id = 0, $text = '')
    {
        $data = Category::where('id_parent',$id)->get();
        foreach ($data as $item){
            $this->htmlSelect .= '<option value="'.$item->id.'">'.$text.$item->name.'</option>';
            $this->categoryRecursive($item->id, $text.'--');
        }
        return $this->htmlSelect;
    }

    public function categoryRecursiveEdit($idparentEdit,$id = 0, $text= '')
    {
        $data = Category::where('id_parent',$id)->get();
        foreach ($data as $item){
            if ($idparentEdit == $item->id)
            {
                $this->htmlSelect .= '<option selected value="'.$item->id.'">'.$text.$item->name.'</option>';
            }else{
                $this->htmlSelect .= '<option value="'.$item->id.'">'.$text.$item->name.'</option>';
            }
            $this->categoryRecursiveEdit($idparentEdit, $item->id, $text.'--');
        }
        return  $this->htmlSelect;
    }


}
