<?php

namespace App\View\Components;

use App\Menu;

class MenuRecusive
{
    private $html;
    public function __construct()
    {
        $this->html = '';
    }

    public function MenuRecursiveAdd($idparent = 0, $subMark = '')
    {
        $data = Menu::where('id_parent',$idparent)->get();
        foreach ($data as $item){
            $this->html .= '<option value="'.$item->id.'">'.$subMark.$item->name.'</option>';
            $this->MenuRecursiveAdd($item->id, $subMark.'--');
        }
        return $this->html;
    }

    public function MenuRecursiveEdit($idparentEdit,$idparent = 0, $subMark = '')
    {
        $data = Menu::where('id_parent',$idparent)->get();
        foreach ($data as $item){
            if ($idparentEdit == $item->id)
            {
                $this->html .= '<option selected value="'.$item->id.'">'.$subMark.$item->name.'</option>';
            }else{
                $this->html .= '<option value="'.$item->id.'">'.$subMark.$item->name.'</option>';
            }
            $this->MenuRecursiveEdit($idparentEdit, $item->id, $subMark.'--');
        }
        return $this->html;
    }
}
