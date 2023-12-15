<div>
    <a wire:click="export" class="btn btn-outline-primary">
        <button type="button" class="mx-4 mt-4 px-2 py-1focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  py-1 me-2 mb-2 dark:bg-bule-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">Livewire Laravel Export Export</button>
    </a>

    @if($exporting && !$exportFinished)
        <div class="d-inline" wire:poll="updateExportProgress">Exporting...please wait.</div>
    @endif

    @if($exportFinished)
        Done. Download file <a class="stretched-link text-red-600" wire:click="downloadExport"><button>here</button></a>
    @endif
</div>