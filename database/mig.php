<?php

// الاتصال بقاعدة البيانات
$conn = mysqli_connect("localhost", "root", "12345678", "todolist");

// التحقق من نجاح الاتصال
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// إنشاء الجدول
$sql = "CREATE TABLE task (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL
)";

// تنفيذ الاستعلام والتحقق من نجاحه
if (mysqli_query($conn, $sql)) {
    echo "Table task created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// إغلاق الاتصال بقاعدة البيانات
mysqli_close($conn);

?>
