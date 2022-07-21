<div class="p-4">
    <div class="flex justify-between">
        <h5 class="text-lg font-weight-bold">Terima Pembayaran Tiket</h5>
        <button type="button" title="Tutup" wire:click="closeModal()" class="self-start"><i
                class="cil-x"></i></button>
    </div>
    <hr/>
    <form wire:submit.prevent="submit" class="mt-4">
        <p>Apakah anda ingin menerima pembayaran ini?</p>
        <hr class="my-4"/>
        <div class="flex flex-wrap mb-2 justify-end">
            <button wire:loading.remove class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit">
                Ya
            </button>
            <div wire:loading>

                <p class="text-xl">Harap Tunggu, sedang membuat tiket</p>

            </div>
        </div>
    </form>
</div>
