<?php

namespace App\Http\Controllers;

use App\Models\itemchar;
use App\Models\itemquantity;
use App\Models\item;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;
use Symfony\Component\Console\Input\Input;

class XMLController extends Controller
{
    public function create(Request $req)
    {
        if($req->isMethod("POST")){

            $xmlDataString = file_get_contents(public_path('TeDhenat.xml'));
            $xmlObject = simplexml_load_string($xmlDataString);
                    
            $json = json_encode($xmlObject);
            $phpDataArray = json_decode($json, true); 
            //print_r($phpDataArray);
            
            if(count($phpDataArray['item']) > 0){
                $item= array();
                $availability = array();
                $characteristics = array();
                foreach($phpDataArray['item'] as $index => $data){    
                    $item[] = [
                        "ISBN" => $data['ISBN'],
                        "id" => $data['ISBN'],
                        "title" => $data['title'],
                        "link" => $data['link'],
                        "image" => $data['image'],
                        "price" => $data['price'],
                        "description" => $data['description'],
                        "pages" => $data['pages'],
                    ];
                    $characteristics[]=[
                        "ISBN" => $data['ISBN'],
                        "year" => $data['year'],
                        "author" => $data['author'],
                        "language" => $data['language'],
                        "type" => $data['type'],
                    ];
                    $availability[]=[
                        "ISBN" => $data['ISBN'],
                        "availability" => $data['availability'],
                        "quantity" => $data['quantity'],
                        "returnable" => $data['returnable'],
                    ];
            }
                item::insert($item);
                itemchar::insert($characteristics);
                itemquantity::insert($availability);

            }
                return back()->with('success','Data saved successfully!');
            
        }
    
        return view("xml-data");
    }
}
