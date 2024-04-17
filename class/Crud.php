<?php
require_once "Db.php";
class Crud extends Db
{

    public function insert($table_name, $data)
    {
        if (!empty($data)) {
            $fields = $placeholder = [];

            foreach ($data as $field => $value) {
                $fields[] = $field;
                $placeholder[] = ":{$field}";
            }
        }
        $sql = "INSERT INTO {$table_name}(" . implode(',', $fields) . ")VALUES(" . implode(',', $placeholder) . ")";
        $stmt = $this->db->prepare($sql);

        try {
            $this->db->beginTransaction();
            $stmt->execute($data);
            $this->db->commit();
            $insert_id = $this->db->lastInsertId();
            return $insert_id;
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }
    public function slugify($text, $slug_url, $table_name)
    {
        $text = preg_replace('/[^a-z0-9]+/i', '-', strtolower($text));
        $query = "SELECT $slug_url FROM $table_name WHERE $slug_url LIKE '$text%'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
                $data[] = $row[$slug_url];
            }
            if (in_array($text, $data)) {
                $count = 0;
                while (in_array(($text . '-' . ++$count), $data));
                $text = $text . '-' . $count;
            }
        }
        return $text;
    }
}
