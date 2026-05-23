<?php
class BaseCrud extends Model {
    protected $table;
    public function all(){ return $this->db->query("SELECT * FROM {$this->table} WHERE deleted_at IS NULL ORDER BY id DESC")->fetchAll(); }
}
