<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documents') }}
        </h2>
    </x-slot>

    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ isset($document) ? route('documents-edit-action', ['offer' => $offer, 'id' => $document->id]) : route('documents-create-action', ['offer' => $offer]) }}" method="post">
                        @csrf

                        <div class="form-gorup">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ isset($document) ? $document->name : '' }}" required>
                        </div>

                        <div class="form-gorup">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ isset($document) ? $document->description : '' }}</textarea>
                        </div>

                        <input type="submit" value="{{ isset($document) ? __('edit') : __('add') }}" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
