<?php

namespace App\Http\Controllers;

use App\Order;
use App\Item;
use App\Animal;
use Illuminate\Http\Request;

class OrderController extends Controller{
    public function index(Request $request){
        $data["animals"] = $this->getAnimals($request);
        $data["items"] = $this->getItems($request);
        $total =0;
        foreach($data['items'] as $array => $item){
            $total+= $item->getTotalPriceAux();
        }
        $data['total'] =$total;
        return view('order.index')->with("data", $data);
    }

    public function getAnimals(Request $request){
        if($request->session()->has('animals')){
            $animals = $request->session()->get('animals');
        } else {
            $animals = [];
        }
        return $animals;
    }

    public function getItems(Request $request){
        if($request->session()->has('items')){
            $items = $request->session()->get('items');
        } else {
            $items = [];
        }
        return $items;
    }

    public function create(Request $request){

        $order = Order::make([
            'client' => auth()->user()->getId(),
            'payment' => $request->input('payment')
        ]);
        $order->save();

        $id = $order->getId();

        $animals = $this->getAnimals($request);
        foreach ($animals as $animal) {
            $animal->setOrder($id);
            $animal->save();
        }
        $items = $this->getItems($request);
        foreach ($items as $item) {
            $idProd = $item->getProductAux()->getId();
            $item->setProduct($idProd);
            $item->setOrder($id);
            $item->save();
        }
        $order->save();
        return redirect()->route('order.showOrder', ['id' => $id]);
    }

    public function showOrder(Request $request, $id){
        $request->session()->forget('animals');
        $request->session()->forget('items');

        $data = [];
        $order = Order::findOrFail($id);

        $data["title"] = "Order";
        $data["order"] = $order;
        $data["animals"] = Animal::where('order_id', $id)->get();
        $data["items"] = Item::where('order_id', $id)->with('product')->get();
        return view('order.detail')->with("data", $data);
    }

    
    public function show(){
        $client = auth()->user()->getId();
        $data["orders"] = Order::where('client', $client)->get();
        //Crear la vista de las órdenes pero sin mucho detalle, que solo diga la fecha y el precio total
    }

    public function flush(Request $request){
        $request->session()->forget('animals');
        $request->session()->forget('items');
        return redirect()->route('home.index');
    }
}
