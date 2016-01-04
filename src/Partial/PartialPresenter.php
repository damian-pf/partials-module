<?php namespace Anomaly\PartialsModule\Partial;

use Anomaly\PartialsModule\Partial\Command\RenderPartial;
use Anomaly\PartialsModule\Partial\Contract\PartialInterface;
use Anomaly\Streams\Platform\Entry\EntryPresenter;
use Anomaly\Streams\Platform\Support\Decorator;

/**
 * Class PartialPresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial
 */
class PartialPresenter extends EntryPresenter
{

    /**
     * The decorated object.
     * This is for IDE hinting.
     *
     * @var PartialInterface
     */
    protected $object;

    /**
     * Alias for rendered()
     *
     * @return string
     */
    public function render()
    {
        return $this->rendered();
    }

    /**
     * Return a rendered partial.
     *
     * @return string
     */
    public function rendered()
    {
        return $this->dispatch(new RenderPartial($this->getObject()));
    }

    /**
     * Catch calls to fields on
     * the page's related entry.
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        $entry = $this->object->getEntry();

        if ($entry->hasField($key)) {
            return (New Decorator())->decorate($entry)->{$key};
        }

        return parent::__get($key);
    }
}
