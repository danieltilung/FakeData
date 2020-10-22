<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MainController extends Controller
{
  

    public function view(){
        return view('main');
    }
       
    public function experiment(Request $request){
        
            
        $faker = \Faker\Factory::create($request->select_country);

        $array_detail = array();


        for($i =0;$i<count($request->input_row);$i++){
            $array_fake_data = array();
            for($a=0;$a < $request->input_count;$a++)
            {

                if($request->select_type[$i] == "name"){
                    array_push($array_fake_data,$faker->unique()->name);
                }
        
                else if($request->select_type[$i] == "quantity"){
                    array_push($array_fake_data,$faker->randomDigit );
                }
                else if($request->select_type[$i] == "salary"){
                    array_push($array_fake_data,$faker->randomElement($array = array (1000000,2000000,3000000,4000000,5000000,6000000,7000000)) );
                }
        
                else if($request->select_type[$i] == "dob"){
                    array_push($array_fake_data, $faker->date($format = 'd-m-Y', $max = '2000-01-01'));
    
                }
        
                else if($request->select_type[$i] == "address"){
                    array_push($array_fake_data,$faker->address);

                }
        
                else if($request->select_type[$i] == "gender"){
                    array_push($array_fake_data,$faker->randomElement(['Male', 'Female']));

                }  

                else if($request->select_type[$i] == "increment"){
                    array_push($array_fake_data,$a+1);
                }
            }

            array_push($array_detail,array($request->input_row[$i] => $array_fake_data,'type'=>$request->select_type[$i]));
        }
     


        $json_array["data"] = $array_detail;
        
        $json_data = json_encode($json_array);
     
        return $json_data;
    }
 
}
