@extends('MasterLayout.Master')

@section('title', 'RFQ')
@section('header', 'Request For Quotation')

@section('modal-button')
    <div id="add-rfq-btn"
        class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300 cursor-pointer hover:bg-gray-200 transition text-gray-700 font-medium">
        Add RFQ</div>
@endsection

@section('content')
    <div class="flex flex-col flex-1 h-full rounded-md border border-gray-300 relative bg-white overflow-y-auto">

        <div id="loading-indicator" class="p-6 text-center text-gray-500">
            Loading data...
        </div>

        <div id="rfq-container" class="hidden w-full">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Vendor</th>
                        <th scope="col" class="px-6 py-3">Company</th>
                        <th scope="col" class="px-6 py-3">Order Date</th>
                        <th scope="col" class="px-6 py-3 text-right">Action</th>
                    </tr>
                </thead>
                <tbody id="rfq-table-body">
                    <!-- Data injected here -->
                </tbody>
            </table>
        </div>

        <div id="error-message" class="hidden p-6 text-center text-red-500">
            Failed to load data.
        </div>

    </div>

    <!-- Add Modal -->
    <div id="add-rfq-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="add-modal-overlay"></div>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg z-10 m-4">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-xl font-bold text-gray-800">Create RFQ</h3>
                <button class="text-gray-500 hover:text-gray-700 font-bold text-xl" id="add-modal-close">&times;</button>
            </div>
            <div class="p-6">
                <form id="add-rfq-form">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="rfq-vendor">Vendor</label>
                        <select class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                            id="rfq-vendor" required>
                            <option value="">Select Vendor</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="rfq-company">Company</label>
                        <select class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                            id="rfq-company" required>
                            <option value="">Select Company</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="rfq-date">Order Date</label>
                        <input class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                            id="rfq-date" type="date" required>
                    </div>
                    
                    <div class="flex justify-end gap-2 mt-6">
                        <button type="button"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition"
                            id="add-modal-cancel">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit/Detail Modal -->
    <div id="detail-rfq-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="detail-modal-overlay"></div>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg z-10 m-4 overflow-hidden">
            <div class="p-4 border-b flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">RFQ Detail</h3>
                <button class="text-gray-500 hover:text-gray-700 font-bold text-xl" id="detail-modal-close">&times;</button>
            </div>

            <!-- Tabs -->
            <div class="flex gap-6 border-b border-gray-200 px-6 pt-2">
                <button class="tab-btn pb-2 text-sm font-medium text-blue-600 border-b-2 border-blue-600 active-tab"
                    data-tab="data">Data</button>
                <button
                    class="tab-btn pb-2 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700"
                    data-tab="control">Control</button>
            </div>

            <div class="p-6">
                <!-- Data Tab -->
                <div id="tab-data" class="tab-content block">
                    <form id="edit-rfq-form">
                        <input type="hidden" id="edit-rfq-id">
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit-rfq-vendor">Vendor</label>
                            <select class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                id="edit-rfq-vendor" required>
                                <option value="">Select Vendor</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit-rfq-company">Company</label>
                            <select class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                id="edit-rfq-company" required>
                                <option value="">Select Company</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit-rfq-date">Order Date</label>
                            <input class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                id="edit-rfq-date" type="date" required>
                        </div>

                        <div class="flex justify-end gap-2 mt-6">
                            <button type="button"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition"
                                id="detail-modal-cancel">Cancel</button>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Update</button>
                        </div>
                    </form>
                </div>

                <!-- Control Tab -->
                <div id="tab-control" class="tab-content hidden">
                    <div class="text-center">
                        <h3 class="text-lg font-bold mb-2 text-gray-800">Delete RFQ?</h3>
                        <p class="text-gray-500 mb-6 text-sm">This action cannot be undone.</p>
                        <div class="flex justify-center gap-3">
                            <button class="px-5 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition"
                                id="delete-cancel">Cancel</button>
                            <button class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition"
                                id="delete-confirm">Delete</button>
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
            const apiBase = 'https://dev-enterprise-api.labmopro.site/api';
            const rfqUrl = `${apiBase}/rfq`;
            const vendorUrl = `${apiBase}/vendors`;
            const companyUrl = `${apiBase}/companies`;

            // Function to populate selects (called once)
            function loadOptions() {
                // Load Vendors
                $.ajax({
                    url: vendorUrl,
                    method: 'GET',
                    success: function(response) {
                        if (response.status && response.data) {
                            const options = response.data.map(v => `<option value="${v.id}">${escapeHtml(v.name)}</option>`).join('');
                            $('#rfq-vendor, #edit-rfq-vendor').append(options);
                        }
                    }
                });

                // Load Companies
                $.ajax({
                    url: companyUrl,
                    method: 'GET',
                    success: function(response) {
                        if (response.status && response.data) {
                            const options = response.data.map(c => `<option value="${c.id}">${escapeHtml(c.name)}</option>`).join('');
                            $('#rfq-company, #edit-rfq-company').append(options);
                        }
                    }
                });
            }

            // --- Fetch & Render ---
            function fetchRfqs() {
                $('#loading-indicator').removeClass('hidden');
                $('#rfq-container').addClass('hidden');
                $('#rfq-table-body').empty();
                $('#error-message').addClass('hidden');

                $.ajax({
                    url: rfqUrl,
                    method: 'GET',
                    success: function(response) {
                        $('#loading-indicator').addClass('hidden');
                        if (response.status && response.data) {
                            renderRfqs(response.data);
                            $('#rfq-container').removeClass('hidden');
                        } else {
                            $('#error-message').text('Invalid data format received.').removeClass(
                                'hidden');
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#loading-indicator').addClass('hidden');
                        $('#error-message').text('Error fetching data: ' + error).removeClass('hidden');
                    }
                });
            }

            function renderRfqs(data) {
                if (data.length === 0) {
                    $('#rfq-table-body').html(
                        '<tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">No RFQs found.</td></tr>'
                    );
                    return;
                }

                let html = '';
                data.forEach(item => {
                    // Safe access to nested objects
                    const vendorName = item.vendor ? item.vendor.name : 'Unknown Vendor';
                    const companyName = item.company ? item.company.name : 'Unknown Company';
                    
                    html += `
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                #${item.id}
                            </td>
                            <td class="px-6 py-4">
                                ${escapeHtml(vendorName)}
                            </td>
                             <td class="px-6 py-4">
                                ${escapeHtml(companyName)}
                            </td>
                            <td class="px-6 py-4">
                                ${escapeHtml(item.order_date)}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="detail-btn font-medium text-blue-600 hover:underline" 
                                    data-id="${item.id}" 
                                    data-vendor-id="${item.vendor_id}" 
                                    data-company-id="${item.company_id}" 
                                    data-order-date="${item.order_date}">
                                    Detail
                                </button>
                            </td>
                        </tr>
                    `;
                });
                $('#rfq-table-body').html(html);
            }

            // --- Add Modal ---
            const addModal = $('#add-rfq-modal');

            $('#add-rfq-btn').click(() => {
                $('#add-rfq-form')[0].reset();
                // Set default date to today?
                // document.getElementById('rfq-date').valueAsDate = new Date();
                addModal.removeClass('hidden').addClass('flex');
            });

            function closeAddModal() {
                addModal.addClass('hidden').removeClass('flex');
            }

            $('#add-modal-close, #add-modal-cancel, #add-modal-overlay').click(closeAddModal);

            $('#add-rfq-form').submit(function(e) {
                e.preventDefault();

                const payload = {
                    vendor_id: $('#rfq-vendor').val(),
                    company_id: $('#rfq-company').val(),
                    order_date: $('#rfq-date').val()
                };

                $.ajax({
                    url: rfqUrl,
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(payload),
                    success: function(res) {
                        closeAddModal();
                        fetchRfqs();
                    },
                    error: function(xhr) {
                        alert('Failed to add RFQ: ' + (xhr.responseJSON?.message || xhr
                            .statusText));
                    }
                });
            });

            // --- Edit/Detail Modal ---
            const detailModal = $('#detail-rfq-modal');

            $(document).on('click', '.detail-btn', function() {
                const id = $(this).data('id');
                const vendorId = $(this).data('vendor-id');
                const companyId = $(this).data('company-id');
                const orderDate = $(this).data('order-date');

                $('#edit-rfq-id').val(id);
                $('#edit-rfq-vendor').val(vendorId);
                $('#edit-rfq-company').val(companyId);
                $('#edit-rfq-date').val(orderDate);

                // Reset tabs to Data
                $('.tab-btn[data-tab="data"]').click();

                detailModal.removeClass('hidden').addClass('flex');
            });

            function closeDetailModal() {
                detailModal.addClass('hidden').removeClass('flex');
            }

            $('#detail-modal-close, #detail-modal-cancel, #detail-modal-overlay').click(closeDetailModal);

            // Tabs
            $('.tab-btn').click(function() {
                const tab = $(this).data('tab');
                $('.tab-btn').removeClass('text-blue-600 border-blue-600 active-tab').addClass(
                    'text-gray-500 border-transparent');
                $(this).removeClass('text-gray-500 border-transparent').addClass(
                    'text-blue-600 border-blue-600 active-tab');
                $('.tab-content').addClass('hidden').removeClass('block');
                $(`#tab-${tab}`).removeClass('hidden').addClass('block');
            });

            // Update
            $('#edit-rfq-form').submit(function(e) {
                e.preventDefault();
                const id = $('#edit-rfq-id').val();

                const payload = {
                    vendor_id: $('#edit-rfq-vendor').val(),
                    company_id: $('#edit-rfq-company').val(),
                    order_date: $('#edit-rfq-date').val()
                };

                $.ajax({
                    url: `${rfqUrl}/${id}`,
                    method: 'PUT',
                    contentType: 'application/json',
                    data: JSON.stringify(payload),
                    success: function(res) {
                        closeDetailModal();
                        fetchRfqs();
                    },
                    error: function(xhr) {
                        alert('Failed to update RFQ: ' + (xhr.responseJSON?.message || xhr
                            .statusText));
                    }
                });
            });

            // Delete
            $('#delete-confirm').click(function() {
                const id = $('#edit-rfq-id').val();

                $.ajax({
                    url: `${rfqUrl}/${id}`,
                    method: 'DELETE',
                    success: function(res) {
                        closeDetailModal();
                        fetchRfqs();
                    },
                    error: function(xhr) {
                        alert('Failed to delete RFQ: ' + (xhr.responseJSON?.message || xhr
                            .statusText));
                    }
                });
            });

            $('#delete-cancel').click(closeDetailModal);

            // Utils
            function escapeHtml(text) {
                if (!text && text !== 0) return '';
                return String(text)
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
            }

            // Init
            loadOptions();
            fetchRfqs();
        });
    </script>
@endsection
