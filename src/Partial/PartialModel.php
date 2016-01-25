<?php namespace Anomaly\PartialsModule\Partial;

use Anomaly\PartialsModule\Partial\Contract\PartialInterface;
use Anomaly\PartialsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Model\Partials\PartialsPartialsEntryModel;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class PartialModel
 *
 * @method        Builder ordered()
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Partial
 */
class PartialModel extends PartialsPartialsEntryModel implements PartialInterface
{

    /**
     * The cache minutes.
     *
     * @var int
     */
    protected $ttl = 99999;

    /**
     * Always eager load these.
     *
     * @var array
     */
    protected $with = [
        'type',
        'entry'
    ];

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the partial type.
     *
     * @return null|TypeInterface
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the related entry.
     *
     * @return null|EntryInterface
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Get the related entry ID.
     *
     * @return null|int
     */
    public function getEntryId()
    {
        return $this->entry_id;
    }
}
