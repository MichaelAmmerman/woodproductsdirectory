<?php
// Enable CORS for external access (adjust domain as needed)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Database connection details
$host = "208.109.75.17";
$user = "Search";
$password = "WoodUser2025!";
$dbname = "Wood_Industry_Directory";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed."]);
    exit();
}

// Read JSON input
$input = json_decode(file_get_contents("php://input"), true);
$whereClause = isset($input['query']) ? $input['query'] : "";

// Allow only specific column names to avoid SQL injection
$allowedColumns = [
    "Company_Name", "Physical_Address", "City", "Zip", "County",
    "Number_Of_Employees", "Industry_Class", "Species_Produced",
    "Products_Produced", "Methods_Bought", "Sells_To_Public"
];

// Extract and validate column names from the WHERE clause
$columnPattern = '/\b([a-zA-Z_][a-zA-Z0-9_]*)\b\s+LIKE\b/';
preg_match_all($columnPattern, $whereClause, $matches);

foreach ($matches[1] as $col) {
    if (!in_array($col, $allowedColumns)) {
        echo json_encode(["error" => "Invalid column in query."]);
        exit();
    }
}

// Final query
$sql = "
    SELECT 
        Company_Name, Physical_Address, City, Zip, County,
        Number_Of_Employees, Industry_Class, Species_Produced,
        Products_Produced, Methods_Bought
    FROM Wood_Industry_Directory.Info
    $whereClause
";

// Run query
$result = $conn->query($sql);

// Collect and return data
if ($result && $result->num_rows > 0) {
    $output = [];
    while ($row = $result->fetch_assoc()) {
        $output[] = $row;
    }
    echo json_encode($output);
} else {
    echo json_encode([]);
}

$conn->close();
?>