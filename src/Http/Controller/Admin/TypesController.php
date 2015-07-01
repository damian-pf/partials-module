<?php namespace Anomaly\PartialsModule\Http\Controller\Admin;

use Anomaly\PartialsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\PartialsModule\Type\Form\TypeFormBuilder;
use Anomaly\PartialsModule\Type\Table\TypeTableBuilder;
use Anomaly\Streams\Platform\Assignment\Form\AssignmentFormBuilder;
use Anomaly\Streams\Platform\Assignment\Table\AssignmentTableBuilder;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;

/**
 * Class TypesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Http\Controller\Admin
 */
class TypesController extends AdminController
{

    /**
     * Return an index of existing partial types.
     *
     * @param TypeTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TypeTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return a form for a new partial type.
     *
     * @param TypeFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(TypeFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return a form for editing an existing partial type.
     *
     * @param TypeFormBuilder     $form
     * @param                     $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(TypeFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Return a table of existing partial type assignments.
     *
     * @param AssignmentTableBuilder      $table
     * @param TypeRepositoryInterface     $types
     * @param BreadcrumbCollection        $breadcrumbs
     * @param                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function fields(
        AssignmentTableBuilder $table,
        TypeRepositoryInterface $types,
        BreadcrumbCollection $breadcrumbs,
        $id
    ) {
        $type = $types->find($id);

        $breadcrumbs->put('module::breadcrumb.fields', 'admin/partials/types/fields/' . $type->getId());

        return $table
            ->setButtons(
                [
                    'edit' => [
                        'href' => '{request.path}/assignment/{entry.id}'
                    ]
                ]
            )
            ->setOption('title', $type->getName() . ' fields')
            ->setOption(
                'description',
                'This is a list of assigned fields for the "' . $type->getName() . '" partial type'
            )
            ->setStream($type->getEntryStream())
            ->render();
    }

    public function assign(
        AssignmentFormBuilder $form,
        TypeRepositoryInterface $types,
        StreamRepositoryInterface $streams,
        FieldRepositoryInterface $fields,
        $id,
        $field
    ) {
        $type = $types->find($id);

        return $form
            ->setActions(
                [
                    'save' => [
                        'redirect' => 'admin/partials/types/fields/' . $id
                    ]
                ]
            )
            ->setStream($type->getEntryStream())
            ->setField($fields->find($field))
            ->render();
    }

    /**
     * Return a form for an existing partial type field and assignment.
     *
     * @param AssignmentFormBuilder       $form
     * @param StreamRepositoryInterface   $streams
     * @param TypeRepositoryInterface     $types
     * @param BreadcrumbCollection        $breadcrumbs
     * @param                             $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function assignment(
        AssignmentFormBuilder $form,
        StreamRepositoryInterface $streams,
        TypeRepositoryInterface $types,
        BreadcrumbCollection $breadcrumbs,
        $id,
        $assignment
    ) {
        $type = $types->find($id);

        $breadcrumbs->put('module::breadcrumb.fields', 'admin/partials/types/fields/' . $type->getId());

        return $form->render($assignment);
    }
}
