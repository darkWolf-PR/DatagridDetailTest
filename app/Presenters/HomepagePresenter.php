<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Components\TestGrid\ITestGridFactory;
use App\Components\TestGrid\TestGrid;
use Nette;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /** @var ITestGridFactory @inject */
    public $gridFactory;


    public function __construct()
    {
        parent::__construct();
    }


    public function beforeRender()
    {
        //default app ajaxification
        if ($this->isAjax()) {
            //ignore calls from datagrid ajax
            if (!isset($this->getPayload()->_datagrid_url)) {
                $this->redrawControl('title');
                $this->redrawControl('flashes');
                $this->redrawControl('content');
            }
        }
    }


    /**
     * @return TestGrid
     */
    protected function createComponentTestGrid(): TestGrid
    {
        return $this->gridFactory->create();
    }
}
