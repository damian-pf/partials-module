<?php namespace Anomaly\PartialsModule\Type\Command;

use Anomaly\PartialsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateTypeStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Type\Command
 */
class CreateTypeStream implements SelfHandling
{

    use DispatchesJobs;

    /**
     * The partial type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Create a new CreateTypeStream instance.
     *
     * @param TypeInterface $type
     */
    public function __construct(TypeInterface $type)
    {
        $this->type = $type;
    }

    /**
     * Handle the command.
     *
     * @param StreamRepositoryInterface $streams
     */
    public function handle(StreamRepositoryInterface $manager, Repository $config)
    {
        $manager->create(
            [
                $config->get('app.fallback_locale') => [
                    'name'        => $this->type->getName(),
                    'description' => $this->type->getDescription()
                ],
                'namespace'                         => 'partials',
                'slug'                              => $this->type->getSlug() . '_partials',
                'translatable'                      => true,
                'locked'                            => false
            ]
        );
    }
}
