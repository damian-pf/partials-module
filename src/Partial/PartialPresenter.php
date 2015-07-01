<?php namespace Anomaly\PartialsModule\Partial;

use Anomaly\PartialsModule\Partial\Contract\PartialInterface;
use Anomaly\Streams\Platform\Entry\EntryPresenter;

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
     * Return the view link.
     *
     * @return string
     */
    public function viewLink()
    {
        return app('html')->link(
            'admin/partials/view/' . $this->object->getId(),
            $this->object->getTitle(),
            ['target' => '_blank']
        );
    }
}
