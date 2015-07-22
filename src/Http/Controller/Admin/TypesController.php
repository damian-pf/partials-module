<?php namespace Anomaly\PartialsModule\Http\Controller\Admin;

use Anomaly\PartialsModule\Type\Contract\TypeInterface;
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
        /* @var TypeInterface $type */
        $type = $types->find($id);

        $breadcrumbs->put($type->getName(), 'admin/partials/types/fields/' . $type->getId());
        $breadcrumbs->put('module::breadcrumb.fields', 'admin/partials/types/fields/' . $type->getId());

        return $table
            ->setButtons(
                [
                    'edit' => [
                        'href' => '{request.path}/assignment/{entry.id}'
                    ]
                ]
            )
            ->setStream($type->getEntryStream())
            ->render();
    }

    /**
     * Return the modal for choosing a
     * field to assign to the type.
     *
     * @param FieldRepositoryInterface $fields
     * @return \Illuminate\View\View
     */
    public function choose(FieldRepositoryInterface $fields, TypeRepositoryInterface $types, $id)
    {
        /* @var TypeInterface $type */
        $type = $types->find($id);

        return view(
            'module::ajax/choose_field',
            [
                'fields' => $fields->findByNamespace('partials')->notAssignedTo($type->getEntryStream())->unlocked(),
                'id'     => $id
            ]
        );
    }

    /**
     * Assign a field to a type's entry stream.
     *
     * @param AssignmentFormBuilder    $form
     * @param TypeRepositoryInterface  $types
     * @param FieldRepositoryInterface $fields
     * @param                          $id
     * @param                          $field
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function assign(
        AssignmentFormBuilder $form,
        TypeRepositoryInterface $types,
        FieldRepositoryInterface $fields,
        $id,
        $field
    ) {
        /* @var TypeInterface $type */
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
        TypeRepositoryInterface $types,
        BreadcrumbCollection $breadcrumbs,
        $id,
        $assignment
    ) {
        /* @var TypeInterface $type */
        $type = $types->find($id);

        $breadcrumbs->put('module::breadcrumb.fields', 'admin/partials/types/fields/' . $type->getId());

        return $form->render($assignment);
    }
}
