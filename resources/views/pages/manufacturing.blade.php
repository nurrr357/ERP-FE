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
    <div class="flex flex-col flex-1 h-full rounded-md border border-gray-300 relative bg-white overflow-y-auto">
        <div class="flex items-center justify-between p-4 border-b border-gray-200 hover:bg-gray-50 transition">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <div class="flex items-center gap-3">
                    <h4 class="font-semibold text-gray-800">Electronics</h4>
                    <span class="px-2 py-0.5 text-xs font-bold text-black bg-yellow-400 rounded">Waiting</span>
                </div>
            </div>
            <button
                class="detail-btn px-3 py-1.5 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-50 transition">
                Detail
            </button>
        </div>
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
                    <form>
                        <div class="space-y-4 max-h-[60vh] overflow-y-auto p-4 custom-scrollbar">

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-1">Product</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="Placeholder">
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-1">Quantity To Produce</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="Placeholder">
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-1">Bill of Material</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="Placeholder">
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-1">Source</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="Placeholder">
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-1">Company</label>
                                <div class="relative">
                                    <select class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none">
                                        <option>Placeholder</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-1">Deadline</label>
                                <div class="relative">
                                    <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-500">
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-1">Responsible</label>
                                <div class="relative">
                                    <select class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none">
                                        <option>Placeholder</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-1">Planned Date</label>
                                <div class="relative">
                                    <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-500">
                                </div>
                            </div>

                        </div>

                        <div class="flex justify-end items-center gap-2 mt-4 px-4 pb-2">
                            <button type="button" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm add-modal-close">Batal</button>
                            <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition font-medium text-sm">Tambahkan</button>
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
                        <form>
                            <div class="space-y-4 max-h-[60vh] overflow-y-auto p-4 custom-scrollbar">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-1">Product</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500" value="Electronics">
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-1">Quantity To Produce</label>
                                    <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500" value="100">
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-1">Bill of Material</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500" value="BOM-001">
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-1">Source</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500" value="Internal">
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-1">Company</label>
                                    <div class="relative">
                                        <select class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none">
                                            <option selected>My Company</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-1">Deadline</label>
                                    <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-700" value="2023-12-31">
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-1">Responsible</label>
                                    <div class="relative">
                                        <select class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none">
                                            <option selected>Admin</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-1">Planned Date</label>
                                    <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-700" value="2023-11-01">
                                </div>
                            </div>

                            <div class="flex justify-end items-center gap-2 mt-4 px-4 pb-2">
                                <button type="button" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm detail-modal-close">Batal</button>
                                <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition font-medium text-sm">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="tab-product-detail" class="tab-content hidden">
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-1 bg-gray-50">
                        <div class="bg-white border-b border-gray-200 px-4 py-3 flex justify-between items-center font-semibold text-sm text-gray-700">
                            <div class="w-1/3">Product</div>
                            <div class="w-1/3 text-center">Tracking</div>
                            <div class="w-1/3 text-right">To Consume</div>
                        </div>

                        <div class="max-h-[60vh] overflow-y-auto custom-scrollbar bg-gray-50">
                            <div class="px-4 py-3 border-b border-gray-200 flex justify-between items-center text-sm">
                                <div class="w-1/3 text-gray-800 font-medium">[TP]</div>
                                <div class="w-1/3 flex justify-center">
                                    <div class="w-5 h-5 bg-green-500 rounded text-white flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="w-1/3 text-right text-gray-800">3.000</div>
                            </div>
                             <div class="px-4 py-3 border-b border-gray-200 flex justify-between items-center text-sm">
                                <div class="w-1/3 text-gray-800 font-medium">[RM-01]</div>
                                <div class="w-1/3 flex justify-center">
                                    <div class="w-5 h-5 bg-green-500 rounded text-white flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="w-1/3 text-right text-gray-800">1.500</div>
                            </div>
                        </div>

                        <div class="bg-gray-100 px-4 py-2 border-t border-gray-200 flex justify-between">
                            <button class="text-xs text-gray-500 hover:text-gray-700">Add a line</button>
                            <button class="text-xs text-gray-500 hover:text-gray-700">Clear all</button>
                        </div>
                    </div>
                </div>

                <div id="tab-control" class="tab-content hidden">
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 bg-gray-50">
                        <div class="flex flex-col items-center justify-center p-4 text-center text-gray-800">
                            <h3 class="text-lg font-bold mb-2 text-gray-800">Hapus Data?</h3>
                            <p class="text-gray-500 mb-6 text-sm">Tindakan ini tidak dapat dibatalkan.</p>
                            <div class="flex gap-3">
                                <button class="px-5 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition font-medium text-sm detail-modal-close">Batal</button>
                                <button class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm">Hapus</button>
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

            $('.add-modal-close').click(function() {
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

            $('.detail-btn').click(function() {
                openDetailModal();
            });

            $('.detail-modal-close, .detail-modal-overlay').click(function() {
                closeDetailModal();
            });

            // --- TAB SWITCHING LOGIC ---
            function switchTab(tabName) {
                // Remove active class from all tabs
                $('.tab-btn').removeClass('text-blue-600 border-blue-600 active-tab').addClass('text-gray-500 border-transparent');

                // Add active class to clicked tab
                $(`.tab-btn[data-tab="${tabName}"]`).removeClass('text-gray-500 border-transparent').addClass('text-blue-600 border-blue-600 active-tab');

                // Hide all tab contents
                $('.tab-content').addClass('hidden').removeClass('block');

                // Show target content
                $(`#tab-${tabName}`).removeClass('hidden').addClass('block');
            }

            // Initialize first tab active state
            switchTab('data');

            $('.tab-btn').click(function() {
                const tab = $(this).data('tab');
                switchTab(tab);
            });
        });
    </script>
@endsection
