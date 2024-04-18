<?php

class UserGet {

    private string $access_token = '';
    private array $user_data = [];

    public function __construct(string $access_token = '') {
        $this->access_token = $access_token;
        // Validation

        if(isSession()){
            $data = $this->getData();
            if(count($data) == 0) header('Location: /exit');
            $this->user_data = $data;
        }
    }

    public function isAuthorized(): bool {
        if(!$this->user_data) {
            $_SESSION['access_token'] = null;
            $this->access_token = '';
        }

        return ($this->access_token) ? true : false;
    }

    /**
     * private
     * Get full user data
     */
    private function getData(): array {
        global $db;

        $data = $db->query(
            "SELECT * FROM `users` 
            WHERE `user_access_token` = '$this->access_token'"
        )->fetch_assoc();
        return ($data) ? $data : [];

    }

    /**
     * Get full name
     */
    public function getFullName(): array {
        if(!$this->isAuthorized()) return false;
        return array(
            'name' => $this->user_data['user_name'],
            'surname' => $this->user_data['user_surname'],
            'fullname' => $this->user_data['user_name']." ".$this->user_data['user_surname']
        );
    }

    public function getUserId(): int {
        if(!$this->isAuthorized()) return false;
        return intval($this->user_data['user_id']);
    }

    public function getPermission(): array {
        global $db;
        if(!$this->isAuthorized()) return false;
        $permission_id = intval($this->user_data['permission_id']);

        switch($permission_id) {
            case 2:
                if(!isset($_SESSION['editor'])) $_SESSION['editor'] = false;
                if(!isset($_SESSION['editor-tab'])) $_SESSION['editor-tab'] = false;
                break;
            case 3:
                if(!isset($_SESSION['editor'])) $_SESSION['editor'] = false;
                if(!isset($_SESSION['editor-tab'])) $_SESSION['editor-tab'] = false;
                break;
        }

        if($permission_id == 3) {
            if(!isset($_SESSION['superId'])) $_SESSION['superId'] = 3;
            if(!isset($_SESSION['superMode'])) $_SESSION['superMode'] = true;
            $superId = $_SESSION['superId'];
            return $db->query(
                "SELECT `permission_name` as `name`, `permission_prefix` as `prefix` 
                FROM `permissions` WHERE `permission_id` = $superId"
            )->fetch_assoc();
        }
        $_SESSION['superId'] = null;
        $_SESSION['superMode'] = null;
        return $db->query(
            "SELECT `permission_name` as `name`, `permission_prefix` as `prefix` 
            FROM `permissions` WHERE `permission_id` = $permission_id"
        )->fetch_assoc();
    }

    public function isExists(): bool {
        if(!$this->isAuthorized()) return false;
        return ($this->user_data != null) ? true : false;
    }

    public function getEmail(): string {
        if(!$this->isAuthorized()) return false;
        return $this->user_data['user_email'];
    }

}