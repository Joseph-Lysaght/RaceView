<?php

function test_fetch_tasks() {
    $url = 'http://localhost/Pitchat/source/fetch_tasks.php'; // Adjust path

	$postData = [
		'status' => 'completed',
		'category' => 'urgent',
		'car' => 'car03',
		'category_Array' => [false , true, true, true],
		'start' => 0,
		'length' => 10,
		'draw' => 1
	];
	
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_POST, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Request Error: ' . curl_error($ch);
        return;
    }

    curl_close($ch);

    $json = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "❌ Invalid JSON returned.\n";
        echo $response;
        return;
    }

    // Check basic DataTables server-side structure
    if (isset($json['data']) && isset($json['recordsTotal']) && isset($json['recordsFiltered'])) {
        echo "✅ JSON structure is valid.\n";
        echo "recordsTotal: " . $json['recordsTotal'] . "\n";
        echo "recordsFiltered: " . $json['recordsFiltered'] . "\n";
        echo "Sample data: \n";
        print_r(array_slice($json['data'], 0, 1)); // show 1 row sample
    } else {
        echo "❌ Missing expected DataTables keys.\n";
        print_r($json);
    }
}

test_fetch_tasks();

?>