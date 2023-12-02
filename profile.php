<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/mongodb/mongodb/src/functions.php';
use MongoDB\Client;
// Replace the placeholder with your Atlas connection string
$uri = 'mongodb+srv://simhaprogrammer:simha111@cluster0.5ehvd7s.mongodb.net/?retryWrites=true&w=majority';
// Create a new client and connect to the server
$m = new MongoDB\Client($uri);
try {
    // Send a ping to confirm a successful connection
    $client->selectDatabase('admin')->command(['ping' => 1]);
    echo "Pinged your deployment. You successfully connected to MongoDB!\n";
    $db = $m->login_signup_guvi;
   echo "Database mydb selected";
   $collection = $db->details;
   echo "Collection selected succsessfully";

   if(isset($_POST['submit_details'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];

    $document = array( 
        "firstName" => $firstName, 
        "lastName" => $lastName, 
        "email" => $email,
        "age" => $age,
        "phone" => $phone,
        "dob" => $dob
     );
      
     $collection->insert($document);
     die("Document inserted successfully");
   }
	
   
} catch (Exception $e) {
    printf($e->getMessage());
}
?>