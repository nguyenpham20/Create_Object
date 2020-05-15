# Create_Object
Mã nguồn của lớp Application:

<?php
class Application {
    private static $instance;

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new Application();
        }
        return self::$instance;
    }
}

$app1 = Application::getInstance();
$app2 = Application::getInstance();
Trong ví dụ trên, chúng ta không khởi tạo đối tượng của lớp Application sử dụng constructor mà sử dụng một phương thức static là getInstance(). Biến $instance giúp cho chúng ta trỏ đến một đối tượng duy nhất của Application, và cũng chỉ có một đối tượng duy nhất được sinh ra. Ở những lần sau, khi gọi phương thức getInstance() thì đối tượng có sẵn đó sẽ được trả về mà không tạo thêm đối tượng mới.

Giữ cho constructor là private

Có một vấn đề với mã nguồn trên, đó là người dùng vẫn có thể sử dụng constructor của lớp Application, do đó vẫn có khả năng tạo ra nhiều đối tượng của lớp này. Chúng ta có thể cải tiến mã nguồn để không cho phép người dùng sử dụng constructor nữa, bằng cách biến constructor thành private.

<?php
class Application {
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new Application();
            echo 'alo';
        }
        return self::$instance;
    }
}

$app1 = Application::getInstance();
$app2 = Application::getInstance();
$app3 = new Application(); //Error
Ở đoạn mã đã cải tiến này, hàm __construct() đã được khai báo là private, do đó sẽ không được phép khởi tạo đối tượng sử dụng constructor nữa, mà bắt buộc phải sử dụng phương thức getInstance().

Lưu ý: Cách làm này còn được gọi là Singleton Pattern, chúng ta sẽ tìm hiểu kỹ hơn về Design Pattern trong phần sau của khoá học.
