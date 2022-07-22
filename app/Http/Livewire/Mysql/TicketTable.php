<?php

namespace App\Http\Livewire\Mysql;

use App\Models\Mysql\Booking;
use App\Models\Mysql\Ticket;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class TicketTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\Mysql\Ticket>
    */
    public function datasource(): Builder
    {
        return Booking::query()->where('booking_status', 'Belum Terverifikasi');
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
        ->addColumn('id')
        ->addColumn('name')
        ->addColumn('email')
        ->addColumn('whatsapp')
        ->addColumn('payment_proof')
        ->addColumn('payment_no')
        ->addColumn('payment_method')
        ->addColumn('ticket_total')
        ->addColumn('ticket_type')
        ->addColumn('booking_status')
        ->addColumn('payment_total')
        ->addColumn('created_at_formatted', fn (Booking $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
        ->addColumn('updated_at_formatted', fn (Booking $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->makeInputRange()
                ->hidden(),

            Column::make('NAME', 'name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('EMAIL', 'email')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('WHATSAPP', 'whatsapp')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('PAYMENT NO', 'payment_no')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('PAYMENT METHOD', 'payment_method')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('TICKET TOTAL', 'ticket_total')
                ->makeInputRange(),

            Column::make('TICKET TYPE', 'ticket_type')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('PAYMENT TOTAL', 'payment_total')
                ->sortable()
                ->searchable()
                ->makeInputText(),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Ticket Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [

            Button::make('detail', 'Bukti')
               ->openModal('components.mysql.modal-bukti', ['id'=> 'id'])
               ->class('bg-blue-400 px-2 py-1 rounded text-white'),
               Button::make('detail', 'Terima')
               ->class('bg-green-500 px-2 py-1 rounded text-white')
               ->openModal('components.mysql.modal-accept', ['id' => 'id']),
               Button::make('detail', 'Tolak')
               ->openModal('components.mysql.modal-reject', ['id' => 'id'])
               ->class('bg-red-500 px-2 py-1 rounded text-white')
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Ticket Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($ticket) => $ticket->id === 1)
                ->hide(),
        ];
    }
    */
}
