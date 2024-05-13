<?php

class Article extends Database
{
    public function create($data)
    {
        $query = "INSERT INTO article (title, place, text, img) VALUES (?, ?, ?, ?);";
        $prepared = $this->instance->prepare($query);

        return $prepared->execute($data);
    }

    public function getOne($id)
    {
        $query = "SELECT * FROM article WHERE id = ?;";
        $prepared = $this->instance->prepare($query);

        $prepared->execute(array($id));
        return $prepared->fetch();
    }

    public function getAll()
    {
        $query = "SELECT * FROM article;";
        $prepared = $this->instance->prepare($query); // prevent sql injection

        $prepared->execute(); // executes sql
        $articles = $prepared->fetchAll(); // fetches the result

        return $articles;
    }

    public function update($id, $data)
    {
        $query = "UPDATE article SET title = :title, place = :place, text = :text WHERE id = :id;";
        $prepared = $this->instance->prepare($query);
        $data["id"] = $id;
        return $prepared->execute($data);
    }

    public function delete($id)
    {
        $query = "DELETE FROM article WHERE id = ?;";
        $prepared = $this->instance->prepare($query);

        $data = array($id);
        return $prepared->execute($data);
    }
}
