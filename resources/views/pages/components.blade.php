@extends('MasterLayout.Master')

@section('title', 'Components')
@section('header', 'Components')

@section('modal-button')
    <div id="add-component-btn"
        class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300 cursor-pointer hover:bg-gray-200 transition text-gray-700 font-medium">
        Add</div>
@endsection

@section('content')
    <div class="flex flex-col flex-1 h-full rounded-md border border-gray-300 relative bg-white overflow-y-auto">

        <div id="loading-indicator" class="p-6 text-center text-gray-500">
            Loading data...
        </div>

        <div id="components-list" class="hidden">
            <!-- Data will be injected here -->
        </div>

        <div id="error-message" class="hidden p-6 text-center text-red-500">
            Failed to load data.
        </div>

    </div>

    <!-- Add Modal -->
    <div id="add-component-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="add-modal-overlay"></div>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg z-10 m-4">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-xl font-bold text-gray-800">Add Component</h3>
                <button class="text-gray-500 hover:text-gray-700 font-bold text-xl" id="add-modal-close">&times;</button>
            </div>
            <div class="p-6">
                <form id="add-component-form">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="component-name">Name</label>
                        <input
                            class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                            id="component-name" type="text" placeholder="Component Name" required>
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
    <div id="detail-component-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="detail-modal-overlay"></div>
        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg z-10 m-4 overflow-hidden">
            <div class="p-4 border-b flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">Component Detail</h3>
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
                    <form id="edit-component-form">
                        <input type="hidden" id="edit-component-id">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="edit-component-name">Name</label>
                            <input
                                class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                id="edit-component-name" type="text" placeholder="Component Name" required>
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
                        <h3 class="text-lg font-bold mb-2 text-gray-800">Delete Component?</h3>
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
            const apiUrl = 'https://dev-enterprise-api.labmopro.site/api/components';

            // --- Fetch & Render ---
            function fetchComponents() {
                $('#loading-indicator').removeClass('hidden');
                $('#components-list').addClass('hidden').empty();
                $('#error-message').addClass('hidden');

                $.ajax({
                    url: apiUrl,
                    method: 'GET',
                    success: function(response) {
                        $('#loading-indicator').addClass('hidden');
                        if (response.status && response.data) {
                            renderComponents(response.data);
                            $('#components-list').removeClass('hidden');
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

            function renderComponents(data) {
                if (data.length === 0) {
                    $('#components-list').html(
                        '<div class="p-4 text-center text-gray-500">No components found.</div>');
                    return;
                }

                let html = '';
                // Sort by ID desc or created_at to show newest first? API sends array, usually ID ascending.
                // I will reverse it to show newest top?
                // data.reverse(); 
                // No, sticking to default order.

                data.forEach(item => {
                    html += `
                        <div class="flex items-center justify-between p-4 border-b border-gray-200 hover:bg-gray-50 transition">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-sm">
                                    ${item.id}
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">${escapeHtml(item.name)}</h4>
                                    <span class="text-xs text-gray-400">Created: ${formatDate(item.created_at)}</span>
                                </div>
                            </div>
                            <button class="detail-btn px-3 py-1.5 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-50 transition" 
                                data-id="${item.id}" data-name="${escapeHtml(item.name)}">
                                Detail
                            </button>
                        </div>
                    `;
                });
                $('#components-list').html(html);
            }

            // --- Add Modal ---
            const addModal = $('#add-component-modal');

            $('#add-component-btn').click(() => {
                $('#add-component-form')[0].reset();
                addModal.removeClass('hidden').addClass('flex');
            });

            function closeAddModal() {
                addModal.addClass('hidden').removeClass('flex');
            }

            $('#add-modal-close, #add-modal-cancel, #add-modal-overlay').click(closeAddModal);

            $('#add-component-form').submit(function(e) {
                e.preventDefault();
                const name = $('#component-name').val();

                // Show simple loading or disable button?
                // For now just ajax
                $.ajax({
                    url: apiUrl,
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        name: name
                    }),
                    success: function(res) {
                        closeAddModal();
                        fetchComponents();
                        // alert('Component added successfully!');
                    },
                    error: function(xhr) {
                        alert('Failed to add component: ' + (xhr.responseJSON?.message || xhr
                            .statusText));
                    }
                });
            });

            // --- Edit/Detail Modal ---
            const detailModal = $('#detail-component-modal');

            $(document).on('click', '.detail-btn', function() {
                const id = $(this).data('id');
                const name = $(this).data('name');

                $('#edit-component-id').val(id);
                $('#edit-component-name').val(name);

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
                // Remove active class from all
                $('.tab-btn').removeClass('text-blue-600 border-blue-600 active-tab').addClass(
                    'text-gray-500 border-transparent');
                // Add to clicked
                $(this).removeClass('text-gray-500 border-transparent').addClass(
                    'text-blue-600 border-blue-600 active-tab');

                // Switch content
                $('.tab-content').addClass('hidden').removeClass('block');
                $(`#tab-${tab}`).removeClass('hidden').addClass('block');
            });

            // Update
            $('#edit-component-form').submit(function(e) {
                e.preventDefault();
                const id = $('#edit-component-id').val();
                const name = $('#edit-component-name').val();

                $.ajax({
                    url: `${apiUrl}/${id}`,
                    method: 'PUT',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        name: name
                    }),
                    success: function(res) {
                        closeDetailModal();
                        fetchComponents();
                    },
                    error: function(xhr) {
                        alert('Failed to update component: ' + (xhr.responseJSON?.message || xhr
                            .statusText));
                    }
                });
            });

            // Delete logic within Control tab
            $('#delete-confirm').click(function() {
                const id = $('#edit-component-id').val();
                // Optional: ask again? The tab itself is a confirmation interface essentially. 
                // But double safety is good.
                // if(!confirm('Are you sure?')) return; 

                $.ajax({
                    url: `${apiUrl}/${id}`,
                    method: 'DELETE',
                    success: function(res) {
                        closeDetailModal();
                        fetchComponents();
                    },
                    error: function(xhr) {
                        alert('Failed to delete component: ' + (xhr.responseJSON?.message || xhr
                            .statusText));
                    }
                });
            });

            // Cancel delete just closes modal or switches back to data? 
            // The button says "Cancel", implies closing modal usually in this design.
            $('#delete-cancel').click(closeDetailModal);

            // Utils
            function escapeHtml(text) {
                if (!text) return '';
                return String(text)
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
            }

            function formatDate(dateString) {
                if (!dateString) return '';
                const date = new Date(dateString);
                return date.toLocaleDateString() + ' ' + date.toLocaleTimeString();
            }

            // Init
            fetchComponents();
        });
    </script>
@endsection
