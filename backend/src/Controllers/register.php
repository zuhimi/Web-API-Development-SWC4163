<?php 

use Slim\Http\Request; //namespace 
use Slim\Http\Response; //namespace 

//include adminProc.php file 
include __DIR__ .'/function/registerProc.php';


//alow cors
//end

// FOR register

//read table register 
$app->get('/register', function (Request $request, Response $response, array $arg){

    return $this->response->withJson(array('data' => 'success'), 200); });  
 
// read all data from table register 
$app->get('/allregister',function (Request $request, Response $response,  array $arg) { 

    $data = getallregister($this->db); 
    if (is_null($data)) { 

        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404); 
} 
    return $this->response->withJson(array('data' => $data), 200); }); 

//request table order by condition (register id) 
$app->get('/register/[{id}]', function ($request, $response, $args){   
    $shop_name = $args['id']; 
    if (!is_numeric($shop_name)) { 

        return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);  
} 
    $data = getregister($this->db, $shop_name); 
    if (empty($data)) { 

        return $this->response->withJson(array('error' => 'no data'), 500); 
} 

return $this->response->withJson(array('data' => $data), 200);});

//post method order
$app->post('/register/add', function ($request, $response, $args) { 

    $form_data = $request->getParsedBody(); 
    $data = createregister($this->db, $form_data); 
    if (is_null($data)) { 

        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404); 
} 
    return $this->response->withJson(array('data' => $data), 200); }); 


//delete row Order
$app->delete('/register/del/[{id}]', function ($request, $response, $args){   
    $shop_name = $args['id']; 
    
   if (!is_numeric($shop_name)) { 

       return $this->response->withJson(array('error' => 'numeric paremeter required'), 422); } 
       $data = deleteregister($this->db,$shop_name); 
       if (empty($data)) { 

           return $this->response->withJson(array($shop_name=> 'is successfully deleted'), 202);}; }); 
 

   
//put table order 
$app->put('/register/put/[{id}]', function ($request, $response, $args){
    $shop_name = $args['id']; 
    
    if (!is_numeric($shop_name)) { 
        
        return $this->response->withJson(array('error' => 'numeric paremeter required'), 422); } 
        $form_dat=$request->getParsedBody(); 
        $data=updateregister($this->db,$form_dat,$shop_name); 
        if ($data <=0)
        return $this->response->withJson(array('data' => 'successfully updated'), 200); 
});
   