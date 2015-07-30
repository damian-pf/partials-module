<?php namespace Anomaly\PartialsModule\Partial\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface PartialRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial\Contract
 */
interface PartialRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a partial by it's selector.
     *
     * @param $selector
     * @return null|PartialInterface
     */
    public function findBySelector($selector);
}
