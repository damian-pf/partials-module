<?php namespace Anomaly\PartialsModule\Type;

use Anomaly\PartialsModule\Type\Command\CreateTypeStream;
use Anomaly\PartialsModule\Type\Command\DeleteTypeStream;
use Anomaly\PartialsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class TypeObserver
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Type
 */
class TypeObserver extends EntryObserver
{

    /**
     * Fired after a partial type is created.
     *
     * @param EntryInterface|TypeInterface $entry
     */
    public function created(EntryInterface $entry)
    {
        $this->commands->dispatch(new CreateTypeStream($entry));

        parent::created($entry);
    }

    /**
     * Fired after a partial type is deleted.
     *
     * @param EntryInterface|TypeInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->commands->dispatch(new DeleteTypeStream($entry));

        parent::deleted($entry);
    }
}
