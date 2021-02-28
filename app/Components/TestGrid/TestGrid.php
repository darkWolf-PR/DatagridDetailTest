<?php

declare(strict_types=1);

namespace App\Components\TestGrid;

use App\Components\BaseGrid\BaseGrid;
use App\Model\TestRepository;
use Ublaboo\DataGrid\DataGrid;


class TestGrid extends BaseGrid
{
    /** @var TestRepository */
    protected $items;

    /** @var string $templateFile */
    private $templateFile = __DIR__ . '/Test.grid.latte';


    public function __construct(TestRepository $items)
    {
        parent::__construct();
        $this->items = $items;
    }


    public function render()
    {
        $this->template->setFile($this->templateFile);
        $this->template->render();
    }


    /**
     * @param  string $name
     * @throws \Ublaboo\DataGrid\Exception\DataGridColumnStatusException
     * @throws \Ublaboo\DataGrid\Exception\DataGridException
     */
    protected function createComponentGrid(string $name)
    {
        /** @var DataGrid $grid */
        $grid = new DataGrid($this, $name);
        $grid->setDataSource($this->items->getGridData());
        /*$grid->setDataSource([
            ['id' => 1, 'entry_date' => '2021-02-25 21:55:08', 'name' => 'John', 'is_active' => 1, 'content' => 'Lorem ipsum...'],
            ['id' => 2, 'entry_date' => '2021-02-26 21:55:08', 'name' => 'Boby', 'is_active' => 0, 'content' => 'Lorem ipsum 2...'],
        ]); // Array*/
        $grid->setItemsPerPageList([20, 30, 50]);
        $grid->setDefaultSort(['entry_date' => 'DESC']);

        //columns
        $grid->addColumnNumber('id', 'admin.id')
             ->setAlign('left')
             ->setSortable();
        $grid->addColumnDateTime('entry_date', 'admin.entry_date')
             ->setFormat('Y-m-d')
             ->setAlign('left')
             ->setSortable();
        $grid->addColumnText('name', 'admin.name');

        $grid->addColumnStatus('is_active', 'status')
             ->addOption(1, 'on')
             ->setClass('btn-success')
             ->endOption()
             ->addOption(0, 'off')
             ->setClass('btn-danger')
             ->endOption()
            ->onChange[] = [$this, 'changeStatus'];

        //filters
        $grid->addFilterText('name', 'Search', ['name']);
        $grid->addFilterText('entry_date', 'Search', ['entry_date']);
        $grid->addFilterSelect('is_active', 'status', ['' => 'all', 1 => 'on', 0 => 'off']);

        //action
        //$grid->setItemsDetail(function() { return 'Lorem Ipsum'; });
        //$grid->setItemsDetail(__DIR__ . '/Grid_item_detail.latte');
        $grid->setItemsDetail(function($item) {
            return $item->content;
        });
    }
}