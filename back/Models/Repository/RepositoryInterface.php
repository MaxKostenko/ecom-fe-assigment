<?php

namespace Models\Repository;

interface RepositoryInterface {
    public function getList();

    public function setList($data);
}