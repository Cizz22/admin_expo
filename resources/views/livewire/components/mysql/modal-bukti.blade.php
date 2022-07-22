<div style="padding: 10px">
    <div class="flex justify-between">
        <h5 class="text-lg font-weight-bold">Bukti Pembayaran</h5>
        <button type="button" title="Tutup" wire:click="closeModal()" class="self-start"><i
                class="cil-x"></i></button>
    </div>
    <hr/>
    <div class="px-4 mt-4">
        <payment href="{{asset("storage/$booking->payment_proof")}}" target="_blank">
            <img src="{{asset("storage/$booking->payment_proof")}}" class="w-100 object-cover" alt="">
        </a>

    </div>
    <hr class="my-4"/>

    <div class="flex flex-row justify-end">
        <button
        onclick="Livewire.emit('openModal', 'components.mysql.modal-reject',{{json_encode(['id' => $booking->id])}})"
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mr-2" title="Tolak">
            Tolak
        </button>
        <button
        onclick="Livewire.emit('openModal', 'components.mysql.modal-accept',{{json_encode(['id' => $booking->id])}})"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full" title="Terima">
            Terima
        </button>
    </div>
</div>
