@extends('MasterLayout.Master')

@section('title', 'Manufacturing Order')
@section('header', 'Manufacturing Order')

@section('modal-button')
    <div id="add-manufacturing-btn"
        class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300 cursor-pointer hover:bg-gray-200 transition">
        Add
    </div>
@endsection

@section('content')
    <div id="mo-list-container" class="flex flex-col flex-1 h-full rounded-md border border-gray-300 relative bg-white overflow-y-auto">
        <!-- Data will be loaded here -->
        <div class="flex items-center justify-center h-full text-gray-500">Loading data...</div>
    </div>

    <div id="add-manufacturing-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="modal-overlay"></div>

        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10" id="modal-content">
            <div class="flex justify-between items-center p-4 border-b border-gray-200">
                <h3 class="text-xl font-bold text-gray-800">Manufacturing Order</h3>
                <button class="text-gray-500 hover:text-gray-700 focus:outline-none font-bold text-xl add-modal-close">
                    &times;
                </button>
            </div>

            <div class="p-6">
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-1 bg-gray-50">
                    <form id="add-mo-form">
                        <div class="space-y-4 max-h-[60vh] overflow-y-auto p-4 custom-scrollbar">

                            <div>
                                <label for="add-product" class="block text-gray-700 text-sm font-bold mb-1">Product</label>
                                <select id="add-product" name="product_id" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                                    <option value="">Pilih Product</option>
                                    <option value="1">apa jaa</option>
                                </select>
                            </div>

                            <div>
                                <label for="add-quantity" class="block text-gray-700 text-sm font-bold mb-1">Quantity To Produce</label>
                                <input id="add-quantity" name="quantity_to_produce" type="number" min="1"
                                    class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="0">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="add-production-date" class="block text-gray-700 text-sm font-bold mb-1">Production Date</label>
                                    <input id="add-production-date" name="production_date" type="date"
                                        class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-700">
                                </div>
                                <div>
                                    <label for="add-completion-date" class="block text-gray-700 text-sm font-bold mb-1">Completion Date</label>
                                    <input id="add-completion-date" name="completion_date" type="date"
                                        class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-700">
                                </div>
                            </div>

                            <div>
                                <label for="add-company" class="block text-gray-700 text-sm font-bold mb-1">Company</label>
                                <select id="add-company" name="company_id" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                                    <option value="1">PT. MAYANG MUARA</option>
                                </select>
                            </div>

                            <div>
                                <label for="add-status" class="block text-gray-700 text-sm font-bold mb-1">Status</label>
                                <select id="add-status" name="status" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                                    <option value="draft">Draft</option>
                                    <option value="confirm">Confirm</option>
                                    <option value="done">Done</option>
                                </select>
                            </div>

                        </div>

                        <div class="flex justify-end items-center gap-2 mt-4 px-4 pb-2">
                            <button type="button" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm add-modal-close">Batal</button>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition font-medium text-sm">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="detail-manufacturing-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)] detail-modal-overlay"></div>

        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10 overflow-hidden transform transition-all p-6">
            <div class="mb-4">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Manufacturing Order</h3>
                    <button class="text-gray-500 hover:text-gray-700 focus:outline-none font-bold text-xl detail-modal-close">
                        &times;
                    </button>
                </div>

                <div class="flex gap-6 border-b border-gray-200">
                    <button class="tab-btn pb-2 text-sm font-medium text-blue-600 border-b-2 border-blue-600 focus:outline-none transition active-tab" data-tab="data">
                        Data
                    </button>
                    <button class="tab-btn pb-2 text-sm font-medium text-gray-500 hover:text-gray-700/75 border-b-2 border-transparent focus:outline-none transition" data-tab="product-detail">
                        Product Detail
                    </button>
                    <button class="tab-btn pb-2 text-sm font-medium text-gray-500 hover:text-gray-700/75 border-b-2 border-transparent focus:outline-none transition" data-tab="control">
                        Control
                    </button>
                </div>
            </div>

            <div>
                <div id="tab-data" class="tab-content block">
                      <div class="border-2 border-dashed border-gray-300 rounded-lg p-1 bg-gray-50">
                        <form id="edit-mo-form">
                            <div class="space-y-4 max-h-[60vh] overflow-y-auto p-4 custom-scrollbar">
                                <div>
                                    <label for="edit-product" class="block text-gray-700 text-sm font-bold mb-1">Product</label>
                                    <select id="edit-product" name="product_id" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                                        <option value="1">apa jaa</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="edit-quantity" class="block text-gray-700 text-sm font-bold mb-1">Quantity To Produce</label>
                                    <input id="edit-quantity" name="quantity_to_produce" type="number" min="1"
                                        class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="0">
                                </div>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="edit-production-date" class="block text-gray-700 text-sm font-bold mb-1">Production Date</label>
                                        <input id="edit-production-date" name="production_date" type="date"
                                            class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-700">
                                    </div>
                                    <div>
                                        <label for="edit-completion-date" class="block text-gray-700 text-sm font-bold mb-1">Completion Date</label>
                                        <input id="edit-completion-date" name="completion_date" type="date"
                                            class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-700">
                                    </div>
                                </div>

                                <div>
                                    <label for="edit-company" class="block text-gray-700 text-sm font-bold mb-1">Company</label>
                                    <select id="edit-company" name="company_id" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                                        <option value="1">PT. MAYANG MUARA</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="edit-status" class="block text-gray-700 text-sm font-bold mb-1">Status</label>
                                    <select id="edit-status" name="status" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500">
                                        <option value="draft">Draft</option>
                                        <option value="confirm">Confirm</option>
                                        <option value="done">Done</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex justify-end items-center gap-2 mt-4 px-4 pb-2">
                                <button type="button" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm detail-modal-close">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition font-medium text-sm">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="tab-product-detail" class="tab-content hidden">
                     <!-- Content kept as placeholder or can be implemented later -->
                     <div class="flex items-center justify-center h-32 text-gray-500">
                        Product Details (Placeholder)
                     </div>
                </div>

                <div id="tab-control" class="tab-content hidden">
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 bg-gray-50">
                        <div class="flex flex-col items-center justify-center p-4 text-center text-gray-800">
                            <h3 class="text-lg font-bold mb-2 text-gray-800">Hapus Data?</h3>
                            <p class="text-gray-500 mb-6 text-sm">Tindakan ini tidak dapat dibatalkan.</p>
                            <div class="flex gap-3">
                                <button class="px-5 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition font-medium text-sm detail-modal-close">Batal</button>
                                <button id="btn-delete-mo" class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function() {
            // --- ADD MODAL ---
            const modal = $('#add-manufacturing-modal');

            function openModal() {
                modal.removeClass('hidden').addClass('flex');
            }

            function closeModal() {
                modal.addClass('hidden').removeClass('flex');
            }

            $('#add-manufacturing-btn').click(function() {
                openModal();
            });

            $('.add-modal-close, #modal-overlay').click(function() {
                closeModal();
            });

            // --- DETAIL MODAL ---
            const detailModal = $('#detail-manufacturing-modal');

            function openDetailModal() {
                detailModal.removeClass('hidden').addClass('flex');
            }

            function closeDetailModal() {
                detailModal.addClass('hidden').removeClass('flex');
                // Reset tabs to default (Data) when closing
                switchTab('data');
            }

            $('.detail-modal-close, .detail-modal-overlay').click(function() {
                closeDetailModal();
            });

            // --- TAB SWITCHING LOGIC ---
            function switchTab(tabName) {
                $('.tab-btn').removeClass('text-blue-600 border-blue-600 active-tab').addClass('text-gray-500 border-transparent');
                $(`.tab-btn[data-tab="${tabName}"]`).removeClass('text-gray-500 border-transparent').addClass('text-blue-600 border-blue-600 active-tab');
                $('.tab-content').addClass('hidden').removeClass('block');
                $(`#tab-${tabName}`).removeClass('hidden').addClass('block');
            }

            switchTab('data');

            $('.tab-btn').click(function() {
                const tab = $(this).data('tab');
                switchTab(tab);
            });

            // --- MO CRUD LOGIC ---
            const moContainer = $('#mo-list-container');
            const apiUrl = 'https://dev-enterprise-api.labmopro.site/api/manufacturing-orders';
            let currentMoId = null;

            function loadMoData() {
                axios.get(apiUrl)
                    .then(function(response) {
                        const data = response.data.data;
                        moContainer.empty();

                        if (Array.isArray(data) && data.length > 0) {
                            data.forEach(function(item) {
                                const productName = item.product ? item.product.name : `Product #${item.product_id}`;
                                const companyName = item.company ? item.company.name : `Company #${item.company_id}`;
                                
                                let statusColor = 'bg-gray-100 text-gray-800';
                                if (item.status === 'done') statusColor = 'bg-green-100 text-green-800';
                                else if (item.status === 'confirm') statusColor = 'bg-blue-100 text-blue-800';
                                else if (item.status === 'draft') statusColor = 'bg-yellow-100 text-yellow-800';

                                const html = `
                                    <div class="flex items-center justify-between p-4 border-b border-gray-200 hover:bg-gray-50 transition">
                                        <div class="flex items-center gap-4">
                                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-gray-800">${productName}</h4>
                                                <div class="text-sm text-gray-500 flex gap-2">
                                                    <span>Qty: ${item.quantity_to_produce}</span>
                                                    <span>&bull;</span>
                                                    <span>${companyName}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <span class="px-2 py-0.5 text-xs font-bold rounded capitalize ${statusColor}">
                                                ${item.status}
                                            </span>
                                            <button
                                                class="detail-btn px-3 py-1.5 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-50 transition"
                                                data-id="${item.id}"
                                                data-item='${JSON.stringify(item)}'>
                                                Detail
                                            </button>
                                        </div>
                                    </div>
                                `;
                                moContainer.append(html);
                            });
                        } else {
                            moContainer.html('<div class="flex items-center justify-center h-full text-gray-500">No data available</div>');
                        }
                    })
                    .catch(function(error) {
                        console.error('Error fetching MO data:', error);
                        moContainer.html('<div class="flex items-center justify-center h-full text-red-500">Failed to load data</div>');
                    });
            }

            // Initial Load
            loadMoData();

            // Detail Button Click
            $(document).on('click', '.detail-btn', function() {
                const id = $(this).data('id');
                const item = $(this).data('item');
                currentMoId = id;

                // Populate Edit Form
                $('#edit-product').val(item.product_id);
                $('#edit-quantity').val(item.quantity_to_produce);
                $('#edit-production-date').val(item.production_date);
                $('#edit-completion-date').val(item.completion_date);
                $('#edit-company').val(item.company_id);
                $('#edit-status').val(item.status);

                openDetailModal();
            });

            // Add Form Submit
            $('#add-mo-form').on('submit', function(e) {
                e.preventDefault();
                const formData = {
                    product_id: $('#add-product').val(),
                    quantity_to_produce: $('#add-quantity').val(),
                    production_date: $('#add-production-date').val(),
                    completion_date: $('#add-completion-date').val(),
                    company_id: $('#add-company').val(),
                    status: $('#add-status').val(),
                };

                axios.post(apiUrl, formData)
                    .then(function(response) {
                        alert('Berhasil menambahkan Order!');
                        closeModal();
                        $('#add-mo-form')[0].reset();
                        loadMoData();
                    })
                    .catch(function(error) {
                        console.error('Error adding MO:', error);
                        alert('Gagal menambahkan order.');
                    });
            });

            // Edit Form Submit
            $('#edit-mo-form').on('submit', function(e) {
                e.preventDefault();
                if (!currentMoId) return;

                const formData = {
                    product_id: $('#edit-product').val(),
                    quantity_to_produce: $('#edit-quantity').val(),
                    production_date: $('#edit-production-date').val(),
                    completion_date: $('#edit-completion-date').val(),
                    company_id: $('#edit-company').val(),
                    status: $('#edit-status').val(),
                };

                axios.put(`${apiUrl}/${currentMoId}`, formData)
                    .then(function(response) {
                        alert('Berhasil memperbarui Order!');
                        closeDetailModal();
                        loadMoData();
                    })
                    .catch(function(error) {
                        console.error('Error updating MO:', error);
                        alert('Gagal memperbarui order.');
                    });
            });

            // Delete Button Click
            $('#btn-delete-mo').click(function() {
                if (!currentMoId) return;
                if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) return;

                axios.delete(`${apiUrl}/${currentMoId}`)
                    .then(function(response) {
                        alert('Berhasil menghapus Order!');
                        closeDetailModal();
                        loadMoData();
                    })
                    .catch(function(error) {
                        console.error('Error deleting MO:', error);
                        alert('Gagal menghapus order.');
                    });
            });
        });
    </script>
@endsection
