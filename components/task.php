<?php

class Task {
    
    private int $taskId = 0;
    private string $dbTable = '';
    
    public function __construct(
        string $dbTable = '',
        int $taskId = 0
    ) {
        $this->dbTable = $dbTable;
        $this->taskId = $taskId;
    }

    public function getTaskId(): int {
        return $this->taskId;
    }

    /**
     * Complete the task
     */
    public function complete(): void {
       global $db, $userId, $firstPage, $secondPage;
       if(!$this->isCompleted()) {
            $db->query(
                "INSERT INTO `tasks_completed`
                (`completed_table`, `completed_task_id`, `user_id`) 
                VALUES ('$this->dbTable','$this->taskId',$userId)"
        );
        ?>
            <script>
                document.location.href = '/<?=$firstPage?>/<?=$secondPage?>'
            </script>
        <?
       }
    }

    /**
     * An unfinished task
     */
    public function up(): void {
        global $db, $secondPage;
        
        // Получаем значения для поиска
        $taskId = $this->taskId;
        $dbTable = $this->dbTable;
        $lang = $_SESSION['lang'];
        
        // Выполняем запрос для поиска предыдущего объекта
        $prevObjectQuery = "SELECT 
                                pc.page_content_id,
                                pc.object_table,
                                pc.object_id
                            FROM 
                                pages_content AS pc
                            JOIN (
                                SELECT page_content_id
                                FROM pages_content
                                WHERE object_table = '$dbTable' AND object_id = '$taskId' AND page_id = $secondPage AND lang = '$lang'
                                ORDER BY page_content_id DESC
                                LIMIT 1
                            ) AS subquery
                            ON pc.page_content_id < subquery.page_content_id
                            WHERE pc.page_id = $secondPage AND lang = '$lang'
                            ORDER BY pc.page_content_id DESC
                            LIMIT 1";
        
        $prevObject = $db->query($prevObjectQuery)->fetch_assoc();
        
        if ($prevObject !== null) {
            // Получаем значения для обновления
            $prevPageContentId = $prevObject['page_content_id'];
            $prevObjectTable = $prevObject['object_table'];
            $prevObjectId = $prevObject['object_id'];
            
            // Обновляем оба поля в одном запросе, меняя местами значения
            $db->query("
                UPDATE pages_content 
                SET 
                    object_table = CASE 
                                        WHEN object_table = '$dbTable' THEN '$prevObjectTable' 
                                        ELSE '$dbTable' 
                                    END,
                    object_id = CASE 
                                    WHEN object_id = '$taskId' THEN '$prevObjectId' 
                                    ELSE '$taskId' 
                                END
                WHERE 
                    (object_table = '$dbTable' AND object_id = '$taskId') OR 
                    (object_table = '$prevObjectTable' AND object_id = '$prevObjectId')
            ");
            
            // echo "Записи успешно обновлены.";
        } else {
            // echo "Не удалось найти предыдущий объект.";
        }
        loadPage();
    }
    
    public function down(): void {
        global $db, $secondPage;
        
        // Получаем значения для поиска
        $taskId = $this->taskId;
        $dbTable = $this->dbTable;
        $lang = $_SESSION['lang'];
        
        // Выполняем запрос для поиска следующего объекта
        $nextObjectQuery = "SELECT 
                                pc.page_content_id,
                                pc.object_table,
                                pc.object_id
                            FROM 
                                pages_content AS pc
                            JOIN (
                                SELECT page_content_id
                                FROM pages_content
                                WHERE object_table = '$dbTable' AND object_id = '$taskId' AND page_id = $secondPage AND lang = '$lang'
                                ORDER BY page_content_id ASC
                                LIMIT 1
                            ) AS subquery
                            ON pc.page_content_id > subquery.page_content_id
                            WHERE pc.page_id = $secondPage AND lang = '$lang'
                            ORDER BY pc.page_content_id ASC
                            LIMIT 1";
        
        $nextObject = $db->query($nextObjectQuery)->fetch_assoc();
        
        if ($nextObject !== null) {
            // Получаем значения для обновления
            $nextPageContentId = $nextObject['page_content_id'];
            $nextObjectTable = $nextObject['object_table'];
            $nextObjectId = $nextObject['object_id'];
            
            // Обновляем оба поля в одном запросе, меняя местами значения
            $db->query("
                UPDATE pages_content 
                SET 
                    object_table = CASE 
                                        WHEN object_table = '$dbTable' THEN '$nextObjectTable' 
                                        ELSE '$dbTable' 
                                    END,
                    object_id = CASE 
                                    WHEN object_id = '$taskId' THEN '$nextObjectId' 
                                    ELSE '$taskId' 
                                END
                WHERE 
                    (object_table = '$dbTable' AND object_id = '$taskId') OR 
                    (object_table = '$nextObjectTable' AND object_id = '$nextObjectId')
            ");
            
            // echo "Записи успешно обновлены.";
        } else {
            // echo "Не удалось найти следующий объект.";
        }
        loadPage();
    }
    
    /**
     * Checking if the task is completed
     */
    public function isCompleted(): bool {
        global $db, $userId;
        return (
            $db->query(
                "SELECT completed_id 
                FROM tasks_completed 
                WHERE completed_table = '$this->dbTable'
                AND completed_task_id = $this->taskId
                AND user_id = $userId" 
            )->fetch_assoc() != null
        ) ? true : false;
    }

}