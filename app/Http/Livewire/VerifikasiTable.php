<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Jenssegers\Mongodb\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class VerifikasiTable extends PowerGridComponent
{
    use ActionButton;

    protected $listeners = ['refreshComponent' => '$refresh'];

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */
    public function datasource(): Collection
    {
        return Booking::where('booking_status', false)->get();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
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
        ->addColumn('payment_method')
        ->addColumn('payment_no')
        ->addColumn('payment_total')
        ->addColumn('ticket_type')
        ->addColumn('ticket_total')
        ->addColumn('payment_proof');
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
            Column::make('Id', 'id')
            ->visibleInExport(false)
            ->hidden(),
            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),
            Column::make('Email', 'email')
                ->searchable()
                ->sortable(),
            Column::make('Whatsapp', 'whatsapp'),
            Column::make('Jenis Tiket', 'ticket_type')
                ->sortable(),
            Column::make('Jumlah Tiket', 'ticket_total')
                ->sortable(),
            Column::make('Jenis Akun Pembayaran', 'payment_method')
                ->searchable()
                ->sortable(),
            Column::make('Nomer Akun Pembayaran', 'payment_no')
                ->searchable(),
            Column::make('Jumlah Pembayaran', 'payment_total')
                ->sortable(),
        ];
    }

    public function actions(): array
    {

        $accept = "accept";
        $reject = "reject";
         return [
             // make(string $action, string $caption)
             Button::make('detail', 'Bukti')
                ->openModal('components.modal-pembayaran', ['payment' => 'payment_proof', 'id'=> 'id', 'total' => 'ticket_total'])
                ->class('bg-blue-400 px-2 py-1 rounded text-white'),
                Button::make('detail', 'Terima')
                ->class('bg-green-500 px-2 py-1 rounded text-white')
                ->openModal('components.modal-accept-reject', ['id' => 'id', 'total' => 'ticket_total']),
                Button::make('detail', 'Tolak')
                ->openModal('components.modal-reject', ['id' => 'id', 'total' => 'ticket_total'])
                ->class('bg-red-500 px-2 py-1 rounded text-white')
         ];
    }
}
