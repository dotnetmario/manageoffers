<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>{{ __('Offers') }}</h1>
                    <hr>
                    <div class="row">
                        @if(count($offers))
                            @foreach ($offers as $o)
                                <div class="col-md-4 h-100 card">
                                    <a href="{{ route('offer', ['id' => $o->id]) }}" class="text-dark text-decoration-none d-inline-block" style="min-height: 200px">
                                        <h2>{{ $o->name }}</h2>
                                        <p>{{ $o->description }}</p>
                                    </a>

                                    <a href="{{ route('offers-delete-action', ['id' => $o->id]) }}" class="btn btn-danger d-inline">{{ __('Delete') }}</a>
                                    <a href="{{ route('offers-edit', ['id' => $o->id]) }}" class="btn btn-warning d-inline">{{ __('Update') }}</a>
                                </div>
                            @endforeach
                        @else
                            {{ __('No offers to show!!') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
