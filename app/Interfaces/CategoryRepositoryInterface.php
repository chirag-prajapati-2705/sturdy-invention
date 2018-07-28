<?php
/**
 * Created by PhpStorm.
 * User: Chirag-Chiku
 * Date: 9/12/2016
 * Time: 11:49 PM
 */

namespace App\Interfaces;

interface CategoryRepositoryInterface{
    public function getById($slug);

    public function getByCategory($category);

    public function getAllCategory();
}