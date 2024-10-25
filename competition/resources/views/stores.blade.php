<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-5 text-center">
                        {{ __('Assign Stores to Groups') }}
                    </h2>
                    <form id="groupsForm">
                        @csrf
                        <div class="row">
                            @foreach(['A', 'B', 'C', 'D'] as $group)
                            <div class="col-md-3 col-sm-6 mb-4">
                                <div class="bg-light p-4 rounded shadow">
                                    <h2 class="font-semibold text-lg mb-4 text-center">Group {{ $group }}</h2>
                                    <div>
                                        @foreach($locations as $location)
                                        @php
                                        // Check if the location is assigned to the current group
                                        $isAssigned = $assignedGroups->where('location_id', $location->locationid)
                                        ->where('group', $group)
                                        ->where('assigned', 1)
                                        ->isNotEmpty();
                                        @endphp
                                        <label class="d-block mb-2">
                                            <input type="checkbox" name="group_{{ $group }}[]" value="{{ $location->locationid }}" onchange="updateGroup('{{ $group }}', '{{ $location->locationid }}', this.checked)" {{ $isAssigned ? 'checked' : '' }}>
                                            {{ $location->location }}
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function updateGroup(group, locationId, isChecked) {
            $.ajax({
                url: '{{ route("stores.updateGroups") }}',
                type: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    group: group,
                    location_id: locationId,
                    assigned: isChecked ? 1 : 0
                },
                success: function(response) {
                    // console.log('Success:', response);
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                }
            });
        }
    </script>
</x-app-layout>