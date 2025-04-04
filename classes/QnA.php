<?php
class QnA {
    private $db;
    
    public function __construct() {
        $config = require __DIR__ . '/../config/database.php';
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        
        try {
            $this->db = new PDO($dsn, $config['username'], $config['password']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    

   return array 
 
    public function getAllQuestionsAndAnswers(): array {
        try {
            $stmt = $this->db->query("SELECT question, answer FROM qna ORDER BY created_at DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching QnA: " . $e->getMessage());
            return [];
        }
    }
    

    public function insertUniqueQuestionAnswer(string $question, string $answer): bool {
        try {
            $check = $this->db->prepare("SELECT COUNT(*) FROM qna WHERE question = :question");
            $check->execute([':question' => $question]);
            
            if ($check->fetchColumn() > 0) {
                return false;
            }
            
        
            $stmt = $this->db->prepare("INSERT INTO qna (question, answer) VALUES (:question, :answer)");
            return $stmt->execute([':question' => $question, ':answer' => $answer]);
        } catch (PDOException $e) {
            error_log("Insert error: " . $e->getMessage());
            return false;
        }
    }
}