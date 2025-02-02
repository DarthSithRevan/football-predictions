<?php
// Handle form submission
$username = $_POST['username'];
$password = $_POST['password'];
$prediction = $_POST['prediction'];

// Connect to your database (example using Firebase Realtime Database)
// Example of Firebase Realtime Database connection in PHP:
$firebaseDbUrl = 'https://football-predictions-5427f-default-rtdb.europe-west1.firebasedatabase.app/';
$firebaseSecret = 'TGpZ4nu75fNHPoU53eksEFARcwmkpN3Q00zjlEEP';
$firebasePath = '/predictions.json';

$data = json_encode([
    'username' => $username,
    'prediction' => $prediction
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $firebaseDbUrl . $firebasePath);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data)
]);
curl_exec($ch);
curl_close($ch);

echo "Prediction submitted successfully!";
?>
