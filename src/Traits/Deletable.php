    <?php


namespace Laurel\Deletable\Traits;


use Laurel\Deletable\Exceptions\ModelCannotBeDeletedException;

/**
    Trait for manipulating deleting
*/
trait Deletable
{
    public function deleteIf() : bool
    {
        return true;
    }

    /**
        Overwrite delete method. Now it use conditiond from deleteIf method
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
