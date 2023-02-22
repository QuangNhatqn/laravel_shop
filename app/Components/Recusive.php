<?php
namespace App\Components;
 class Recusive {
     private $data;
     private $htmlSelect = "";

     public function __construct($data)
     {
        $this->data = $data;
     }

     public function optionRecusive($id, $current_id="", $current_parent_id="", $text = "", $disabled = ""){
         foreach ($this->data as $value){
             //filter child category
             if($value['parent_id'] == $id){
                 //select parent category
                 if(!empty($current_parent_id) && $value['id'] == $current_parent_id){
                     $this->htmlSelect .= "<option selected value='{$value['id']}'>" . $text . $value['name'] . "</option>";
                 } else {
                     //view edit: disabled current category and child current category
                     if($value['id'] == $current_id) $disabled = "disabled";
                     $this->htmlSelect .= "<option {$disabled} value='{$value['id']}'>" . $text . $value['name'] . "</option>";
                 }
                 //recusive to get child category
                 $this->optionRecusive($value['id'], $current_id, $current_parent_id, '-' . $text, $disabled);
                 //view edit: un-disabled other category
                 if($value['id'] == $current_id) $disabled = "";
             }
         }
         return $this->htmlSelect;
     }

     public function optionCategoryRecusive($id, $category_id="", $text = ""){
         foreach ($this->data as $value){
             //filter child category
             if($value['parent_id'] == $id){
                 //select parent category
                 if(!empty($category_id) && $value['id'] == $category_id){
                     $this->htmlSelect .= "<option selected value='{$value['id']}'>" . $text . $value['name'] . "</option>";
                 } else {
                     $this->htmlSelect .= "<option value='{$value['id']}'>" . $text . $value['name'] . "</option>";
                 }
                 //recusive to get child category
                 $this->optionCategoryRecusive($value['id'], $category_id, '-' . $text);
             }
         }
         return $this->htmlSelect;
     }
 }
