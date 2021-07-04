<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Offer') }} - {{ $offer->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <p>{{ $offer->description }}</p>
                    </div>
                    <hr>
                    <h1>{{ __('documents') }} <a class="btn btn-primary float-end" href="{{ route('documents-create', ['offer' => $offer->id]) }}">{{ __('Add') }}</a></h1>
                    <hr>
                    <div class="row">
                        @if(count($documents))
                            @foreach ($documents as $d)
                                <div class="col-md-4 h-100 card">
                                    <div class="text-dark text-decoration-none d-inline-block" style="min-height: 200px">
                                        <h2>{{ $d->name }}</h2>
                                        <p>{{ $d->description }}</p>
                                    </div>

                                    <a href="{{ route('documents-delete-action', ['offer' => $offer->id, 'id' => $d->id]) }}" class="btn btn-danger d-inline">{{ __('Delete') }}</a>
                                    <a href="{{ route('documents-edit', ['offer' => $offer->id, 'id' => $d->id]) }}" class="btn btn-warning d-inline">{{ __('Update') }}</a>
                                </div>
                            @endforeach
                        @else
                            {{ __('No documents to show!!') }}
                        @endif
                    </div>
                    <hr>
                    <h1>{{ __('Task') }}
                        @if(!$offer->task()->count())
                            <a class="btn btn-primary float-end" href="{{ route('task-create', ['offer' => $offer->id]) }}" >{{ __('Add') }}</a>
                        @endif
                    </h1>
                    <hr>
                    <div class="row">
                        @if(isset($task))
                            <div class="col-md-4 h-100 card">
                                <div class="text-dark text-decoration-none d-inline-block" style="min-height: 200px">
                                    <h2>{{ $task->name }}</h2>
                                    <p>{{ $task->description }}</p>
                                </div>

                                <a href="{{ route('task-delete-action', ['offer' => $offer->id, 'id' => $task->id]) }}" class="btn btn-danger d-inline">{{ __('Delete') }}</a>
                                <a href="{{ route('task-edit', ['offer' => $offer->id, 'id' => $task->id]) }}" class="btn btn-warning d-inline">{{ __('Update') }}</a>
                            </div>
                        @else
                            {{ __('No task to show!!') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
