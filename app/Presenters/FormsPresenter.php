<?php

declare(strict_types=1);

namespace App\Presenters;

use Contributte\FormsBootstrap\BootstrapForm;
use Contributte\FormsBootstrap\Enums\RenderMode;
use Contributte\Translation\Translator;
use Contributte\Translation\Wrappers\Message;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;


final class FormsPresenter extends Presenter
{
    /** @persistent */
    public $locale;

    /** @var Translator @inject */
    public $translator;


    protected function createComponentBootstrapForm(): BootstrapForm
    {
        $form = new BootstrapForm;
        $form->renderMode = RenderMode::VERTICAL_MODE;
        $form->setTranslator($this->translator);
        $form->addText('name', 'forms.name')
             ->setRequired('forms.field_required')
             ->setMaxLength(150)
             //->setOption('description', 'forms.name_desc');
             ->setOption('description', new Message('forms.name_desc', ['var1' => 1, 'var2' => 2]));
        $form->addText('surname', 'forms.surname')
             ->setRequired('forms.field_required')
             ->setMaxLength(150)
            ->setOption('description', 'forms.surname_desc');
        $form->addSubmit('send', 'forms.save');
        $form->onSuccess[] = [$this, 'bootstrapFormSucceeded'];

        return $form;
    }


    public function bootstrapFormSucceeded(BootstrapForm $form, $data): void
    {
        // tady zpracujeme data odeslaná formulářem
        $this->redirect('Homepage:');
    }


    protected function createComponentNetteForm(): Form
    {
        $form = new Form;
        $form->setTranslator($this->translator);
        $form->addText('name', 'forms.name')
             ->setRequired('forms.field_required')
             ->setMaxLength(150)
             ->setOption('description', new Message('forms.name_desc', ['var1' => 1, 'var2' => 2]));
        $form->addSubmit('send', 'forms.save');
        $form->onSuccess[] = [$this, 'netteFormSucceeded'];

        return $form;
    }


    public function netteFormSucceeded(Form $form, $data): void
    {
        // tady zpracujeme data odeslaná formulářem
        $this->redirect('Homepage:');
    }
}