@extends('MasterLayout.Master')

@section('title', 'Companies')
@section('header', 'Companies')

@section('modal-button')
    <div id="add-company-btn"
        class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300 cursor-pointer hover:bg-gray-200 transition text-gray-700 font-medium">
        Add</div>
@endsection

@section('content')
    <div class="flex flex-col flex-1 h-full rounded-md border border-gray-300 relative bg-white overflow-y-auto">

        <div id="loading-indicator" class="p-6 text-center text-gray-500">
            Loading data...
        </div>

        <div id="companies-container" class="hidden w-full">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Address</th>
                        <th scope="col" class="px-6 py-3">Contact</th>
                        <th scope="col" class="px-6 py-3 text-right">Action</th>
                    </tr>
                </thead>
                <tbody id="companies-table-body">
                    <!-- Data injected here -->
                </tbody>
            </table>
        </div>

        <div id="error-message" class="hidden p-6 text-center text-red-500">
            Failed to load data.
        </div>

    </div>

    <!-- Add Modal -->
    <div id="add-company-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="add-modal-overlay"></div>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg z-10 m-4">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-xl font-bold text-gray-800">Add Company</h3>
                <button class="text-gray-500 hover:text-gray-700 font-bold text-xl" id="add-modal-close">&times;</button>
            </div>
            <div class="p-6">
                <form id="add-company-form">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="company-name">Name</label>
                        <input
                            class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                            id="company-name" type="text" placeholder="Company Name" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="company-address">Address</label>
                        <input
                            class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                            id="company-address" type="text" placeholder="Address" required>
                    </div>
                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="company-phone">Phone</label>
                            <input
                                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                id="company-phone" type="text" placeholder="Phone" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="company-email">Email</label>
                            <input
                                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                id="company-email" type="email" placeholder="Email" required>
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
    <div id="detail-company-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="detail-modal-overlay"></div>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg z-10 m-4 overflow-hidden">
            <div class="p-4 border-b flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">Company Detail</h3>
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
                    <form id="edit-company-form">
                        <input type="hidden" id="edit-company-id">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit-company-name">Name</label>
                            <input
                                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                id="edit-company-name" type="text" placeholder="Company Name" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2"
                                for="edit-company-address">Address</label>
                            <input
                                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                id="edit-company-address" type="text" placeholder="Address" required>
                        </div>
                        <div class="mb-4 grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                    for="edit-company-phone">Phone</label>
                                <input
                                    class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    id="edit-company-phone" type="text" placeholder="Phone" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                    for="edit-company-email">Email</label>
                                <input
                                    class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    id="edit-company-email" type="email" placeholder="Email" required>
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
                        <h3 class="text-lg font-bold mb-2 text-gray-800">Delete Company?</h3>
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
            const apiUrl = 'https://dev-enterprise-api.labmopro.site/api/companies';

            // --- Fetch & Render ---
            function fetchCompanies() {
                $('#loading-indicator').removeClass('hidden');
                $('#companies-container').addClass('hidden'); // Table container
                $('#companies-table-body').empty();
                $('#error-message').addClass('hidden');

                $.ajax({
                    url: apiUrl,
                    method: 'GET',
                    success: function(response) {
                        $('#loading-indicator').addClass('hidden');
                        if (response.status && response.data) {
                            renderCompanies(response.data);
                            $('#companies-container').removeClass('hidden');
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

            function renderCompanies(data) {
                if (data.length === 0) {
                    $('#companies-table-body').html(
                        '<tr><td colspan="4" class="px-6 py-4 text-center text-gray-500">No companies found.</td></tr>'
                    );
                    return;
                }

                let html = '';
                data.forEach(item => {
                    html += `
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                ${escapeHtml(item.name)}
                            </td>
                            <td class="px-6 py-4">
                                ${escapeHtml(item.address)}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col text-xs">
                                    <span class="font-medium">${escapeHtml(item.phone)}</span>
                                    <span>${escapeHtml(item.email)}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="detail-btn font-medium text-blue-600 hover:underline" 
                                    data-id="${item.id}" 
                                    data-name="${escapeHtml(item.name)}" 
                                    data-address="${escapeHtml(item.address)}" 
                                    data-phone="${escapeHtml(item.phone)}" 
                                    data-email="${escapeHtml(item.email)}">
                                    Detail
                                </button>
                            </td>
                        </tr>
                    `;
                });
                $('#companies-table-body').html(html);
            }

            // --- Add Modal ---
            const addModal = $('#add-company-modal');

            $('#add-company-btn').click(() => {
                $('#add-company-form')[0].reset();
                addModal.removeClass('hidden').addClass('flex');
            });

            function closeAddModal() {
                addModal.addClass('hidden').removeClass('flex');
            }

            $('#add-modal-close, #add-modal-cancel, #add-modal-overlay').click(closeAddModal);

            $('#add-company-form').submit(function(e) {
                e.preventDefault();

                const payload = {
                    name: $('#company-name').val(),
                    address: $('#company-address').val(),
                    phone: $('#company-phone').val(),
                    email: $('#company-email').val()
                };

                $.ajax({
                    url: apiUrl,
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(payload),
                    success: function(res) {
                        closeAddModal();
                        fetchCompanies();
                    },
                    error: function(xhr) {
                        alert('Failed to add company: ' + (xhr.responseJSON?.message || xhr
                            .statusText));
                    }
                });
            });

            // --- Edit/Detail Modal ---
            const detailModal = $('#detail-company-modal');

            $(document).on('click', '.detail-btn', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');
                const address = $(this).data('address');
                const phone = $(this).data('phone');
                const email = $(this).data('email');

                $('#edit-company-id').val(id);
                $('#edit-company-name').val(name);
                $('#edit-company-address').val(address);
                $('#edit-company-phone').val(phone);
                $('#edit-company-email').val(email);

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
            $('#edit-company-form').submit(function(e) {
                e.preventDefault();
                const id = $('#edit-company-id').val();

                const payload = {
                    name: $('#edit-company-name').val(),
                    address: $('#edit-company-address').val(),
                    phone: $('#edit-company-phone').val(),
                    email: $('#edit-company-email').val()
                };

                $.ajax({
                    url: `${apiUrl}/${id}`,
                    method: 'PUT',
                    contentType: 'application/json',
                    data: JSON.stringify(payload),
                    success: function(res) {
                        closeDetailModal();
                        fetchCompanies();
                    },
                    error: function(xhr) {
                        alert('Failed to update company: ' + (xhr.responseJSON?.message || xhr
                            .statusText));
                    }
                });
            });

            // Delete
            $('#delete-confirm').click(function() {
                const id = $('#edit-company-id').val();

                $.ajax({
                    url: `${apiUrl}/${id}`,
                    method: 'DELETE',
                    success: function(res) {
                        closeDetailModal();
                        fetchComponents();
                    },
                    error: function(xhr) {
                        alert('Failed to delete company: ' + (xhr.responseJSON?.message || xhr
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
            fetchCompanies();
        });
    </script>
@endsection
