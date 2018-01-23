<?php
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU Library General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# Copyright (C) 2001 by Edward Rudd <eddie@omegaware.com>

define ('BASKET_ID','id');
define ('BASKET_NAME','name');
define ('BASKET_PRICE','price');
define ('BASKET_QUANTITY','quantity');
define ('BASKET_TAX','tax');
define ('BASKET_DATA','tax');

class Basket {
	var $basket_items;

        function Basket() {
		$this->basket_items=array();
        }
        function Add_Item($ID,$name,$quantity=1,$price=0,$tax=0,$data=NULL) {
		// find next item..
		$pos = $this->next_pos();
                $this->basket_items[$pos] = array(
		    BASKET_ID=>$ID,
		    BASKET_NAME=>$name,
		    BASKET_QUANTITY=>$quantity,
            	    BASKET_PRICE=>$price,
		    BASKET_TAX=>$tax,
            	    BASKET_DATA=>$data
		);
                return ($pos);
        }
        function Del_Item($pos) {
                $this->basket_items[$pos]=NULL;
        }
        function Get_Item_ID($pos) {
                return $this->basket_items[$pos][BASKET_ID];
        }
        function Get_Item_Name($pos) {
                return $this->basket_items[$pos][BASKET_NAME];
        }
        function Get_Item_Price($pos) {
                return $this->basket_items[$pos][BASKET_PRICE];
        }
        function Get_Item_Quantity($pos) {
                return $this->basket_items[$pos][BASKET_QUANTITY];
        }
        function Get_Item_Data($pos) {
                return $this->basket_items[$pos][BASKET_DATA];
        }
        function Set_Item_Quantity($pos,$quantity) {
                $this->basket_items[$pos][BASKET_QUANTITY]=$quantity;
        }
        function Inc_Item_Quantity($pos) {
                $this->basket_items[$pos][BASKET_QUANTITY]++;
        }
        function Set_Item_Data($pos,$data) {
                $this->basket_items[$pos][BASKET_QUANTITY]=$data;
        }
        function Enum_Items($start=false) {
                static $current;
		$total = count($this->basket_items);
                if (!$start && $current>=$total) return -1;
                if (!$start) {
                        $current++;
                } else {
                        $current=0;
                }
                while (($this->basket_items[$current]==NULL) && ($current<$total)) {
                        $current++;
                }
                return ($current<$total) ? $current : -1;
        }
        function Empty_Basket() {
                $this->basket_items=array();
        }
        function Get_Basket_Count() {
            $num=0;
            for ($i=0;$i<count($this->basket_items);$i++) {
				if ($this->basket_items[$i]!=NULL) $num++;
            }
            return $num;
        }
	function Next_Pos() {
	    for ($i=0;$i<count($this->basket_items);$i++) {
		if ($this->basket_items[$i]==NULL) {
		    return $i;
		}
	    }
	    return count($this->basket_items);
	}
	function Search_Item($ID) {
	    if (empty($ID)) return -1;
	    for ($i=0;$i<count($this->basket_items);$i++) {
		if ($this->basket_items[$i][BASKET_ID]==$ID) {
		    return $i;
		}
	    }
	    return -1;
	}
}
?>
