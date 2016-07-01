<?php

namespace modules\orm\core\interfaces;

/**
 * Interface EntityInterface
 *
 * @package modules\orm\core\interfaces
 */
interface EntityInterface
{
    /**
     * Load data from database.
     *
     * @param int|string $id Record Id.
     *
     * @return void
     */
    public function load($id);

    /**
     * Get all records from database.
     *
     * @return void
     */
    public function loadAll();

    /**
     * Get record Id.
     *
     * @return int|string|null
     */
    public function getId();

    /**
     * Save record to database. If the record doesn't exist yet — add it.
     *
     * @return void
     */
    public function save();

    /**
     * Delete record from the database.
     *
     * @return void
     */
    public function delete();
}
