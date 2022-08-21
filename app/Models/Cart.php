<?php

namespace App\Models;

class Cart 
{
	public $products=null;
	public $totalPrice=0;
	public $totalQuanity=0;

	public function __construct($cart){
		if($cart){
			$this->products=$cart->products;
			$this->totalPrice=$cart->totalPrice;
			$this->totalQuanity=$cart->totalQuanity;
		}
	}

	public function AddCart($product,$id){
		$newProd=['quanity'=>0,'price'=>$product->Price,'prodInfo'=>$product];
		if($this->products)
		{
			if(array_key_exists($id,$this->products)){
				$newProd=$this->products[$id];
			}
		}
		
		$newProd['quanity']++;
		$newProd['price']=$newProd['quanity']*$product->Price;
		$this->products[$id]=$newProd;
		$this->totalPrice+=$product->Price;
		$this->totalQuanity++;
	}
	
	public function DelItemCart($id){
		$this->totalPrice-=$this->products[$id]['price'];
		$this->totalQuanity-=$this->products[$id]['quanity'];
		unset($this->products[$id]);
	}

	public function UpdateItemCart($id,$qty){
		$this->totalPrice-=$this->products[$id]['price'];
		$this->totalQuanity-=$this->products[$id]['quanity'];

		$this->products[$id]['quanity']=$qty;
		$this->products[$id]['price']=$qty*$this->products[$id]['prodInfo']->Price;

		$this->totalPrice+=$this->products[$id]['price'];
		$this->totalQuanity+=$this->products[$id]['quanity'];
	}

}
