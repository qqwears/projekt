<?php

class Contact extends Database {
    public function create($data) {
        $query = "INSERT INTO contact (name, surname, email, text) VALUES (?, ?, ?, ?);";
        $prepared = $this->instance->prepare($query);

        return $prepared->execute($data);
    }
}
