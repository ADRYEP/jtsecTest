<?php

namespace App\Interfaces;

interface BaseServiceInterface
{   
    
    /**
     * Get all elements
     *
     * @return void
     */
    public function getAll();

    /**
     * Create new element by object
     *
     * @param  mixed $data
     *
     * @return void
     */
    public function create(array $data);

    /**
     * Update a specific model identify by id with data
     *
     * @param  mixed $data
     * @param  mixed $id
     *
     * @return void
     */
    public function update(array $data, int $id);

    /**
     * Delete a specific model by id
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function delete(int $id);
}