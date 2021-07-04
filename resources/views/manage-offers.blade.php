<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Offers') }}
        </h2>
    </x-slot>

    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ isset($offer) ? route('offers-edit-action', ['id' => $offer->id]) : route('offers-create-action') }}" method="post">
                        @csrf

                        <div class="form-gorup">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ isset($offer) ? $offer->name : '' }}" required>
                        </div>

                        <div class="form-gorup">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ isset($offer) ? $offer->description : '' }}</textarea>
                        </div>

                        <input type="submit" value="{{ isset($offer) ? __('edit') : __('add') }}" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
