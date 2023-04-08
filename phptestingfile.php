<?php
include("includes/classes/TestClassGetConnectionTest.php");

class CommentTest extends \PHPUnit\Framework\TestCase {
    public function testGetContent(){
        $user = new DatabaseConnection();
        $result = $user -> getAllUsernames();

        self::assertEquals("Admin", $result);
    }
   
}

?>