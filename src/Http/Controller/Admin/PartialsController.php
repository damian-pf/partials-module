<?php namespace Anomaly\PartialsModule\Http\Controller\Admin;

use Anomaly\PartialsModule\Partial\Contract\PartialRepositoryInterface;
use Anomaly\PartialsModule\Partial\Form\Command\AddEntryFormFromPartial;
use Anomaly\PartialsModule\Partial\Form\Command\AddEntryFormFromRequest;
use Anomaly\PartialsModule\Partial\Form\Command\AddPartialFormFromPartial;
use Anomaly\PartialsModule\Partial\Form\Command\AddPartialFormFromRequest;
use Anomaly\PartialsModule\Partial\Form\PartialEntryFormBuilder;
use Anomaly\PartialsModule\Partial\Table\PartialTableBuilder;
use Anomaly\PartialsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Support\Authorizer;
use Illuminate\Routing\Redirector;

/**
 * Class PartialsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\PartialsModule\Http\Controller\Admin
 */
class PartialsController extends AdminController
{

    /**
     * Return a tree of existing partials.
     *
     * @param PartialTableBuilder $tree
     * @return \Illuminate\Http\Response
     */
    public function index(PartialTableBuilder $tree)
    {
        return $tree->render();
    }

    /**
     * Return the modal for choosing a partial type.
     *
     * @param TypeRepositoryInterface $types
     * @return \Illuminate\View\View
     */
    public function choose(TypeRepositoryInterface $types)
    {
        return view('module::ajax/choose_type', ['types' => $types->all()]);
    }

    /**
     * Return the form for creating a new partial.
     *
     * @param PartialEntryFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(PartialEntryFormBuilder $form)
    {
        $this->dispatch(new AddPartialFormFromRequest($form));
        $this->dispatch(new AddEntryFormFromRequest($form));

        return $form->render();
    }

    /**
     * Return the form for editing an existing partial.
     *
     * @param PartialRepositoryInterface $partials
     * @param PartialEntryFormBuilder    $form
     * @param                            $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(PartialRepositoryInterface $partials, PartialEntryFormBuilder $form, $id)
    {
        $partial = $partials->find($id);

        $this->dispatch(new AddPartialFormFromPartial($form, $partial));
        $this->dispatch(new AddEntryFormFromPartial($form, $partial));

        return $form->render($id);
    }

    /**
     * Redirect to a partial's URL.
     *
     * @param PartialRepositoryInterface $partials
     * @param Redirector                 $redirector
     * @param                            $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function view(PartialRepositoryInterface $partials, Redirector $redirector, $id)
    {
        $first   = $partials->first();
        $partial = $partials->find($id);

        // Redirect to home if this is the first partial.
        if ($first && $first->getId() === $partial->getId()) {
            return $redirector->to('/');
        }

        return $redirector->to($partial->path());
    }

    /**
     * Delete a partial and go back.
     *
     * @param PartialRepositoryInterface $partials
     * @param Authorizer                 $authorizer
     * @param                            $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(PartialRepositoryInterface $partials, Authorizer $authorizer, $id)
    {
        $authorizer->authorize('anomaly.module.partials::partials.delete');

        $partials->delete($partials->find($id));

        return redirect()->back();
    }
}
