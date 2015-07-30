<?php namespace Anomaly\PartialsModule\Partial;

use Anomaly\PartialsModule\Partial\Contract\PartialInterface;
use Anomaly\PartialsModule\Partial\Contract\PartialRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class PartialRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial
 */
class PartialRepository extends EntryRepository implements PartialRepositoryInterface
{

    /**
     * The partial model.
     *
     * @var PartialModel
     */
    protected $model;

    /**
     * Create a new PartialRepositoryInterface instance.
     *
     * @param PartialModel $model
     */
    public function __construct(PartialModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a partial by it's selector.
     *
     * @param $selector
     * @return null|PartialInterface
     */
    public function findBySelector($selector)
    {
        return $this->model->where('selector', $selector)->first();
    }
}
