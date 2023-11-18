<?php 
//get all register 
function getallregister($db) {

    
    $sql = 'Select * FROM register '; 
    $stmt = $db->prepare ($sql); 
    $stmt ->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
} 

//get register by id 
function getregister($db, $shop_name) {

    $sql = 'Select o.shop_name,o.shop_email,o.shop_no, FROM register o  ';
    $sql .= 'Where o.id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int) $shop_name;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 

}

//add new register
function createregister($db, $form_data) { 
    //stop at sisni
    $sql = 'Insert into register ( shop_name, shop_email, shop_no)'; 
    $sql .= 'values (:shop_name, :shop_email, :shop_no)';  
    $stmt = $db->prepare ($sql); 
    $stmt->bindParam(':shop_name', ($form_data['shop_name']));
    $stmt->bindParam(':shop_email', ($form_data['shop_email']));
    $stmt->bindParam(':shop_no', ($form_data['shop_no']));
    $stmt->execute(); 
    return $db->lastInsertID();
}


//delete register by id 
function deleteregister($db,$shop_name) { 

    $sql = ' Delete from register where id = :id';
    $stmt = $db->prepare($sql);  
    $id = (int)$shop_name; 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->execute(); 
} 

//update register by id 
function updateregister($db,$form_data,$shop_name) { 

    $sql = 'UPDATE register SET shop_name = :shop_name, shop_email = :shop_email , shop_no = :shop_no '; 
    $sql .=' WHERE id = :id'; 
    $stmt = $db->prepare ($sql); 
    $id = (int)$shop_name;  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':shop_name', ($form_data['shop_name']));
    $stmt->bindParam(':shop_email', ($form_data['shop_email']));
    $stmt->bindParam(':shop_no', ($form_data['shop_no']));
    $stmt->execute(); 
}