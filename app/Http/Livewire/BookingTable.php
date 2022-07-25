<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Jenssegers\Mongodb\Eloquent\Builder as EloquentBuilder;
use Jenssegers\Mongodb\Query\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class BookingTable extends PowerGridComponent
{
    use ActionButton;


    function __construct()
    {

    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */
    public function datasource(): EloquentBuilder
    {
        return Booking::query();
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
            ->addColumn('booking_status_formatter',function ($entry) {
                return $entry->booking_status ? "Terverifikasi" : "Belum Terverifikasi";
            })
            ->addColumn('booking_time_formatted', function ($entry) {
                $dt = new DateTime(Carbon::parse($entry->booking_time)->format('Y-m-d H:i:s'), new DateTimeZone('Asia/Jakarta'));
                return $dt->format('Y-m-d');
            });
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
                ->sortable()
                ->makeInputText(),
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
            Column::make('Tanggal Pemesanan', 'booking_time_formatted')
                ->sortable(),
            Column::make('Status', 'booking_status_formatter')
                ->sortable()
        ];
    }
}
