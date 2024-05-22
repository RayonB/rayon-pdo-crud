
switch ($method) {
    case 'GET':
        // Check if an ID parameter is provided
        if(isset($_GET['id'])) {
            // Read operation (fetch a single product by ID)
            $id = $_GET['id'];
            $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result) {
                echo json_encode($result);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Product not found']);
            }
        } else {
            