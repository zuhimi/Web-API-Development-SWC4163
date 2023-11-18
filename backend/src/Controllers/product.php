<?php

use Slim\Http\Request;
use Slim\Http\Response;

include __DIR__ . '/function/productProc.php';

// Allow CORS
// ...

// FOR PRODUCT

// Read table product
$app->get('/product', function (Request $request, Response $response, array $arg) {
    return $this->response->withJson(array('data' => 'success'), 200);
});

// Read all data from table product
$app->get('/allproduct', function (Request $request, Response $response, array $arg) {
    $data = getallproduct($this->db);
    if (is_null($data)) {
        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404);
    }
    return $this->response->withJson(array('data' => $data), 200);
});

// Request table order by condition (product id)
$app->get('/product/[{id}]', function ($request, $response, $args) {
    $product_id = $args['id'];
    if (!is_numeric($product_id)) {
        return $this->response->withJson(array('error' => 'numeric parameter required'), 500);
    }
    $data = getproduct($this->db, $product_id);
    if (empty($data)) {
        return $this->response->withJson(array('error' => 'no data'), 500);
    }
    return $this->response->withJson(array('data' => $data), 200);
});

// Post method order
$app->post('/product/add', function ($request, $response, $args) {
    $form_data = $request->getParsedBody();
    $data = createproduct($this->db, $form_data);
    if (is_null($data)) {
        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404);
    }
    return $this->response->withJson(array('data' => $data), 200); });

// Delete row Order
$app->delete('/product/del/[{id}]', function ($request, $response, $args) {
    $product_id = $args['id'];

    if (!is_numeric($product_id)) {
        return $this->response->withJson(array('error' => 'numeric parameter required'), 422);
    }

    $data = deleteproduct($this->db, $product_id);
    if (empty($data)) {
        return $this->response->withJson(array($product_id => 'is successfully deleted'), 202);
    }
});

// Put table order
$app->put('/product/put/[{id}]', function ($request, $response, $args) {
    $product_id = $args['id'];

    if (!is_numeric($product_id)) {
        return $this->response->withJson(array('error' => 'numeric parameter required'), 422);
    }

    $form_data = $request->getParsedBody();
    $data = updateproduct($this->db, $form_data, $product_id);

    if ($data <= 0) {
        return $this->response->withJson(array('data' => 'successfully updated'), 200);
    }
});