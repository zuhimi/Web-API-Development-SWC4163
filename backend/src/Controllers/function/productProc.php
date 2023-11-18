<?php

// Get all PRODUCTS
function getallproduct($db) {
    $sql = 'SELECT * FROM product ';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get Product by ID
function getproduct($db, $product_id) {
    $sql = 'SELECT o.product_id, o.product_name, o.product_brand, o.price FROM product o ';
    $sql .= 'Where o.id = :id';
    $stmt = $db->prepare($sql);
    $id = (int)$product_id;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Add new Product
function createproduct($db, $form_data) {
    $sql = 'INSERT INTO product (product_id, product_name, product_brand, price) ';
    $sql .= 'VALUES (:product_id, :product_name, :product_brand, :price)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':product_id', $form_data['product_id']);
    $stmt->bindParam(':product_name', $form_data['product_name']);
    $stmt->bindParam(':product_brand', $form_data['product_brand']);
    $stmt->bindParam(':price', $form_data['price']);
    $stmt->execute();
    return $db->lastInsertID();
}

// Delete Product by ID
function deleteproduct($db, $product_id) {
    $sql = 'DELETE FROM product where id = :id';
    $stmt = $db->prepare($sql);
    $id = (int)$product_id;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

// Update Product by ID
function updateproduct($db, $form_data, $product_id) {
    $sql = 'UPDATE product SET product_id = :product_id,  product_name = :product_name, product_brand = :product_brand, price = :price ';
    $sql .= ' WHERE id = :id'; 
    $stmt = $db->prepare($sql);
    $id = (int)$product_id;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $form_data['product_id']);
    $stmt->bindParam(':product_name', $form_data['product_name']);
    $stmt->bindParam(':product_brand', $form_data['product_brand']);
    $stmt->bindParam(':price', $form_data['price']);
    $stmt->execute();
}