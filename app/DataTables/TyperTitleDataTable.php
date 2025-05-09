<?php

namespace App\DataTables;

use App\Models\TyperTitle;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TyperTitleDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('show_badge', function ($query) {
                $class = $query->show ? 'badge-primary' : 'badge-danger';
                $text = $query->show ? 'Yes' : 'No';
                return '<span class="badge ' . $class . '" data-column="show_badge">' . $text . '</span>';
            })

            ->addColumn('show_toggle', function ($query) {
                $checked = $query->show ? 'checked' : '';
                return '
                <label class="custom-switch mt-0">
                    <input type="checkbox" class="custom-switch-input typer_title_status" data-id="' . $query->id . '" ' . $checked . '>
                    <span class="custom-switch-indicator"></span>
                </label>';
            })
            ->addColumn('action', function ($query) {
                return '<a href="' . route('admin.typer-title.edit', $query->id) . '" class="btn btn-primary"><i class="fas fa-edit"></i></a> <a href="' . route('admin.typer-title.destroy', $query->id) . '" class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>';
            })
            ->setRowId('id')
            ->rawColumns(['show_badge', 'show_toggle', 'action']); // ✅ Important
    }



    /**
     * Get the query source of dataTable.
     */
    public function query(TyperTitle $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('typertitle-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                // Button::make('excel'),
                // Button::make('csv'),
                // Button::make('pdf'),
                // Button::make('print'),
                // Button::make('reset'),
                // Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->width(50),
            Column::make('title'),

            // Show badge (Yes/No)
            Column::computed('show_badge')
                ->title('Visible')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),

            // Toggle switch
            Column::computed('show_toggle')
                ->title('Toggle')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }


    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'TyperTitle_' . date('YmdHis');
    }
}
