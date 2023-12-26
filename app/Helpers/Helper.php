<?php

namespace App\Helpers;

class Helper{

    public static function menu($products, $parent_id = 0, $char = ''){
        $html = '';

        foreach($products as $key => $value){
            if($value->parent_id == $parent_id){
                $html .= '
                    <tr>
                        <td>'.$value->id .'</td>
                        <td>'. $char .$value->name .'</td>
                        <td>'.$value->description .'</td>
                        <td>'.$value->content .'</td>
                        <td>'.$value->updated_at .'</td>
                        <td>
                             <a href="/admin/menu/edit/'.$value->id .'" class ="text-warning p-4"> 
                                    <i class="fas fa-edit"></i>
                             </a>
                             
                             <a href="" class ="text-danger" onclick="removeRow('. $value->id .',\'/admin/menu/delete\')"> 
                                    <i class="fas fa-trash"></i>
                             </a>   
                        </td>
                    </tr>                
                ';

                unset($products[$key]);

                $html .= self::menu($products, $value->id, $char.='--');
            }
        }
        return $html;
    }
}