<?php


namespace Laurel\Deletable\Traits;


use Laurel\Deletable\Exceptions\ModelCannotBeDeletedException;


/**
 * Trait for manipulating of the deleting
 *
 * Trait Deletable
 * @package Laurel\Deletable\Traits
 */
trait Deletable
{
    /**
     * Method, which sets deleting condition
     *
     * @return bool
     */
    public function deleteIf() : bool
    {
        return true;
    }


    /**
     * Overwriting of the default delete method of the Eloquent models
     *
     * @return mixed
     * @throws ModelCannotBeDeletedException
     */
    public function delete()
    {
        if ($this->deleteIf()) {
            return parent::delete();
        } else {
            throw new ModelCannotBeDeletedException("Model " . static::class . "cannot be deleted");
        }
    }
}
