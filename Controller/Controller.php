<?php

namespace ApiCep\Controller;

use Exception;

abstract class Controller
{
   public static function getResponseAsJSON($data)
   {
    header("Acess-Control-Allow-Origin: ");
    header("Content-type: application/json; charset=utf-8");
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

    exit(json_encode($data));
   }
   
   protected static function setResponseJSON ($data, $request_status = true)
   {
      $response = array('response_data' => $data, 'response_sucessful' => $request_status);
      
      header("Access-Control-Allow-Origin: ");
      header("Content-type: application/json; charset=utf-8");
      header("Cache-Control: no-cache, must-revalidate");
      header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
      header("Programa: public");

      exit(json_encode($response));
   }

   protected static function getExceptionAsJSON(Exception $e)
   {
      $Exception = [
         'message' => $e->getMessage(),
         'code' => $e->getCode(),
         'file' => $e->getFile(),
         'line' => $e->getLine(),
         'traceAsString' => $e->getTraceAsString(),
         'previous' => $e->getPrevious()
      ];

      http_response_code(400);

      header("Access-Control-Allow-Origin: ");
      header("Content-type: application/json; charset=utf-8");
      header("Cache-Control: no-cache, must-revalidate");
      header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
      header("Programa: public");

        exit(json_encode($Exception));
   }

   protected static function isGet()
   {
      if($_SERVER['REQUEST_METHOD'] !== 'GET')
         throw new Exception("O método de requisição deve ser GET");
   }

   protected static function isPost()
   {
      if($_SERVER['REQUEST_METHOD'] !== 'POST')
         throw new Exception("O método de requisição deve ser POST");
   }

   public static function getIntFromUrl($var_get, $var_name = null) : int
   {
      self::isGet();

      if(!empty($var_get))
      return(int) $var_get;

      else
       throw new Exception(("Variavel $var_name não identificada."));
   }

   protected static function getStringFromUrl($var_get, $var_name = null):string
   {
      self::isGet();

      if(!empty($var_get))
      return(string) $var_get;

      else
      throw new Exception(("Variavel $var_name não identificada."));
   }

   
}