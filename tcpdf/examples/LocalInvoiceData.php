<?php
// autoload.php (Mock for local development)

// Dummy autoloader simulating Composer autoloading
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../src/'; // Adjust if needed

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return; // not our namespace
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Dummy session setup
if (!isset($_SESSION)) session_start();

// Dummy implementation of required classes
// namespace App\settings;
class settings {
    private $values = [
        "company_name" => "DEMO COMPANY INC.",
        "address" => "123 Main Street",
        "city" => "Providence",
        "state" => "RI",
        "zip" => "02909",
        "tel" => "401-123-4567"
    ];

    public function getValue($key) {
        return $this->values[$key] ?? '';
    }
}

namespace App\dataTableQuery;
class dataTableQuery {
    public function indexByQueryAllData($query) {
        // Mock data to simulate invoice records
        return [
            (object)[
                'id' => 1,
                'customer_id' => 101,
                'date' => '2024-06-01',
                'due_date' => '2024-07-01',
                'terms_id' => 1,
                'tax_rate' => 0.07,
                'tax_amount' => 5.60,
                'amount' => 80.00,
                'total_amount' => 85.60
            ]
        ];
    }

    public function indexByQuerySingleData($query) {
        return (object)[
            'id' => 1,
            'customer_id' => 101,
            'customer_code' => 'CUST101',
            'customer_name' => 'John Doe',
            'address' => '456 Elm Street',
            'city' => 'Cranston',
            'state' => 'RI',
            'zip' => '02920',
            'date' => '2024-06-01',
            'due_date' => '2024-07-01',
            'terms_id' => 1,
            'tax_rate' => 0.07,
            'tax_amount' => 5.60,
            'amount' => 80.00,
            'total_amount' => 85.60
        ];
    }
}
