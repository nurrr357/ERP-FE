@extends('MasterLayout.Master')

@section('title', 'Vendors')
@section('header', 'Vendors')

@section('modal-button')
    <div id="add-vendor-btn"
        class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300 cursor-pointer hover:bg-gray-200 transition text-gray-700 font-medium">
        Add</div>
@endsection

@section('content')
    <div class="flex flex-col flex-1 h-full rounded-md border border-gray-300 relative bg-white overflow-y-auto">

        <div id="loading-indicator" class="p-6 text-center text-gray-500">
            Loading data...
        </div>

        <div id="vendors-container" class="hidden w-full">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-3">Vendor Name</th>
                        <th scope="col" class="px-6 py-3">Type</th>
                        <th scope="col" class="px-6 py-3">Contact</th>
                        <th scope="col" class="px-6 py-3">Address</th>
                        <th scope="col" class="px-6 py-3">Tags</th>
                        <th scope="col" class="px-6 py-3 text-right">Action</th>
                    </tr>
                </thead>
                <tbody id="vendors-table-body">
                    <!-- Data injected here -->
                </tbody>
            </table>
        </div>

        <div id="error-message" class="hidden p-6 text-center text-red-500">
            Failed to load data.
        </div>

    </div>

    <!-- Add Modal -->
    <div id="add-vendor-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="add-modal-overlay"></div>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg z-10 m-4">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-xl font-bold text-gray-800">Add Vendor</h3>
                <button class="text-gray-500 hover:text-gray-700 font-bold text-xl" id="add-modal-close">&times;</button>
            </div>
            <div class="p-6">
                <form id="add-vendor-form">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="vendor-name">Name</label>
                        <input
                            class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                            id="vendor-name" type="text" placeholder="Vendor Name" required>
                    </div>
                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="vendor-type">Type</label>
                            <input
                                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                id="vendor-type" type="text" placeholder="e.g. company" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="vendor-tags">Tags</label>
                            <input
                                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                id="vendor-tags" type="text" placeholder="e.g. raw, reliable">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="vendor-address">Address</label>
                        <input
                            class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                            id="vendor-address" type="text" placeholder="Address" required>
                    </div>
                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="vendor-phone">Phone</label>
                            <input
                                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                id="vendor-phone" type="text" placeholder="Phone" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="vendor-email">Email</label>
                            <input
                                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                id="vendor-email" type="email" placeholder="Email" required>
                        </div>
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
    <div id="detail-vendor-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="detail-modal-overlay"></div>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg z-10 m-4 overflow-hidden">
            <div class="p-4 border-b flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">Vendor Detail</h3>
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
                    <form id="edit-vendor-form">
                        <input type="hidden" id="edit-vendor-id">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit-vendor-name">Name</label>
                            <input
                                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                id="edit-vendor-name" type="text" placeholder="Vendor Name" required>
                        </div>
                        <div class="mb-4 grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                    for="edit-vendor-type">Type</label>
                                <input
                                    class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    id="edit-vendor-type" type="text" placeholder="Type" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                    for="edit-vendor-tags">Tags</label>
                                <input
                                    class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    id="edit-vendor-tags" type="text" placeholder="Tags">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2"
                                for="edit-vendor-address">Address</label>
                            <input
                                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                id="edit-vendor-address" type="text" placeholder="Address" required>
                        </div>
                        <div class="mb-4 grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                    for="edit-vendor-phone">Phone</label>
                                <input
                                    class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    id="edit-vendor-phone" type="text" placeholder="Phone" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                    for="edit-vendor-email">Email</label>
                                <input
                                    class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    id="edit-vendor-email" type="email" placeholder="Email" required>
                            </div>
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
                        <h3 class="text-lg font-bold mb-2 text-gray-800">Delete Vendor?</h3>
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
            const apiUrl = 'https://dev-enterprise-api.labmopro.site/api/vendors';

            // --- Fetch & Render ---
            function fetchVendors() {
                $('#loading-indicator').removeClass('hidden');
                $('#vendors-container').addClass('hidden');
                $('#vendors-table-body').empty();
                $('#error-message').addClass('hidden');

                $.ajax({
                    url: apiUrl,
                    method: 'GET',
                    success: function(response) {
                        $('#loading-indicator').addClass('hidden');
                        if (response.status && response.data) {
                            renderVendors(response.data);
                            $('#vendors-container').removeClass('hidden');
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

            function renderVendors(data) {
                if (data.length === 0) {
                    $('#vendors-table-body').html(
                        '<tr><td colspan="6" class="px-6 py-4 text-center text-gray-500">No vendors found.</td></tr>'
                    );
                    return;
                }

                let html = '';
                data.forEach(item => {
                    // Handle Tags
                    let tagsHtml = '';
                    if (item.tags) {
                        tagsHtml = item.tags.split(',').map(tag =>
                            `<span class="inline-block bg-gray-100 text-gray-800 text-xs font-medium mr-1 px-2 py-0.5 rounded border border-gray-300 whitespace-nowrap">${escapeHtml(tag.trim())}</span>`
                        ).join('');
                    }

                    html += `
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                ${escapeHtml(item.name)}
                            </td>
                             <td class="px-6 py-4">
                                <span class="capitalize text-gray-600">${escapeHtml(item.type)}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col text-xs">
                                    <span class="font-medium">${escapeHtml(item.phone)}</span>
                                    <span>${escapeHtml(item.email)}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-600 line-clamp-2">${escapeHtml(item.address)}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1 w-32">
                                     ${tagsHtml}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="detail-btn font-medium text-blue-600 hover:underline" 
                                    data-id="${item.id}" 
                                    data-name="${escapeHtml(item.name)}" 
                                    data-type="${escapeHtml(item.type)}" 
                                    data-address="${escapeHtml(item.address)}" 
                                    data-phone="${escapeHtml(item.phone)}" 
                                    data-email="${escapeHtml(item.email)}"
                                    data-tags="${escapeHtml(item.tags)}">
                                    Detail
                                </button>
                            </td>
                        </tr>
                    `;
                });
                $('#vendors-table-body').html(html);
            }

            // --- Add Modal ---
            const addModal = $('#add-vendor-modal');

            $('#add-vendor-btn').click(() => {
                $('#add-vendor-form')[0].reset();
                addModal.removeClass('hidden').addClass('flex');
            });

            function closeAddModal() {
                addModal.addClass('hidden').removeClass('flex');
            }

            $('#add-modal-close, #add-modal-cancel, #add-modal-overlay').click(closeAddModal);

            $('#add-vendor-form').submit(function(e) {
                e.preventDefault();

                const payload = {
                    name: $('#vendor-name').val(),
                    type: $('#vendor-type').val(),
                    address: $('#vendor-address').val(),
                    phone: $('#vendor-phone').val(),
                    email: $('#vendor-email').val(),
                    tags: $('#vendor-tags').val()
                };

                $.ajax({
                    url: apiUrl,
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(payload),
                    success: function(res) {
                        closeAddModal();
                        fetchVendors();
                    },
                    error: function(xhr) {
                        alert('Failed to add vendor: ' + (xhr.responseJSON?.message || xhr
                            .statusText));
                    }
                });
            });

            // --- Edit/Detail Modal ---
            const detailModal = $('#detail-vendor-modal');

            $(document).on('click', '.detail-btn', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const type = $(this).data('type');
                const address = $(this).data('address');
                const phone = $(this).data('phone');
                const email = $(this).data('email');
                const tags = $(this).data('tags');

                $('#edit-vendor-id').val(id);
                $('#edit-vendor-name').val(name);
                $('#edit-vendor-type').val(type);
                $('#edit-vendor-address').val(address);
                $('#edit-vendor-phone').val(phone);
                $('#edit-vendor-email').val(email);
                $('#edit-vendor-tags').val(tags);

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
            $('#edit-vendor-form').submit(function(e) {
                e.preventDefault();
                const id = $('#edit-vendor-id').val();

                const payload = {
                    name: $('#edit-vendor-name').val(),
                    type: $('#edit-vendor-type').val(),
                    address: $('#edit-vendor-address').val(),
                    phone: $('#edit-vendor-phone').val(),
                    email: $('#edit-vendor-email').val(),
                    tags: $('#edit-vendor-tags').val()
                };

                $.ajax({
                    url: `${apiUrl}/${id}`,
                    method: 'PUT',
                    contentType: 'application/json',
                    data: JSON.stringify(payload),
                    success: function(res) {
                        closeDetailModal();
                        fetchVendors();
                    },
                    error: function(xhr) {
                        alert('Failed to update vendor: ' + (xhr.responseJSON?.message || xhr
                            .statusText));
                    }
                });
            });

            // Delete
            $('#delete-confirm').click(function() {
                const id = $('#edit-vendor-id').val();

                $.ajax({
                    url: `${apiUrl}/${id}`,
                    method: 'DELETE',
                    success: function(res) {
                        closeDetailModal();
                        fetchVendors();
                    },
                    error: function(xhr) {
                        alert('Failed to delete vendor: ' + (xhr.responseJSON?.message || xhr
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
            fetchVendors();
        });
    </script>
@endsection
