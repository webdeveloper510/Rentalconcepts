<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6">Competition Stores</h1>

                <div class="row">
                    <div class="col-6">
                        <!-- Dropdown for Group Selection -->
                        <div class="mb-4">
                            <select id="groupSelect" class="mt-1 block w-1/3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">--Select Group--</option>
                                <option value="A">Group A</option>
                                <option value="B">Group B</option>
                                <option value="C">Group C</option>
                                <option value="D">Group D</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- Table to Display Store Data -->
                        <table id="storeTable" class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-center">Store Number</th>
                                    <th scope="col" class="text-center">Customer Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be dynamically populated here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#groupSelect').on('change', function() {
            const group = $(this).val();

            if (group) {
                $.ajax({
                    url: '{{ route("competition-data.index") }}',
                    type: 'GET',
                    data: {
                        group: group
                    },
                    success: function(data) {
                        // console.log(data);
                        const tableBody = $('#storeTable tbody');
                        tableBody.empty();

                        data.forEach(function(store) {
                            const row = `
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200 text-center">${store.Location}</td>
                                <td class="py-2 px-4 border-b border-gray-200 text-center">${store.Customers}</td>
                            </tr>
                        `;
                            tableBody.append(row);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('An error occurred: ' + xhr.responseText);
                    }
                });
            }
        });
    </script>

</x-app-layout>