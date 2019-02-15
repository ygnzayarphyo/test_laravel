<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class ABCController extends Controller
{
  function insert(){
    try {
          $pdo=\DB::connection()->getPdo();
          if(\DB::connection()->getDatabaseName()){
              echo "Yes! Successfully connected to the DB: " . \DB::connection()->getDatabaseName();
              $generator = \ProbablyRational\RandomNameGenerator\All::create();
              $name=$generator->getName();
              $status=\DB::insert("insert into users (name, email, phone, password) values(?,?,?,?)", [$name,"$name@gmail.com", "093992828", "$name"]);
              if($status==1)
                echo "<br/>Record $name inserted successfully. <br/>";
          }else{
              die("Could not find the database. Please check your configuration.");
          }
      } catch (Exception $e) {
          die("Could not open connection to database server.  Please check your configuration.");
      }
  }
}
