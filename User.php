

<?php

class User extends DatabaseQuery
{
    protected static $db_fields = [
        'ID', 'username', 'password', 'group_rights', 'added', 'added_by', 'changed_by', 'status' // fields in database what we can use
    ];

    protected static $table_name = 'users'; // table name without PX

    //property list
    public $ID;
    public $username;
    public $password;
    public $group_rights;
    public $added;
    public $added_by;
    public $changed_by;
    public $status;

    public static function auth ($email, $password) {

        $oUser = User::findByEmail($email);

        if (is_object($oUser)) {
            if (password_verify($password, $oUser->password)) {

                return $oUser;
            }
        }

        return false;
    }

    public static function findByEmail ($email) {

        global $database;

        $sql = "SELECT * FROM " . PX . static::$table_name . " WHERE username='" . $database->escape_value($email) . "'";

        $results = static::find_by_query($sql);

        return !empty($results) ? reset($results) : false;
    }
}