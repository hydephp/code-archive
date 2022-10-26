@php
use Hyde\Framework\Models\Pages\MarkdownPage;
@endphp

<x-hyde-admin::header>
    <x-hyde-admin::card>
        <article class="prose">
            <h2>Your Blog Posts</h2>
            <p class="">Here you'll find an overview of your Markdown blog posts.</p>
        </article>
    </x-hyde-admin::card>
</x-hyde-admin::header>

<div class="px-4 md:px-10 mx-auto w-full -m-28">
    <div class="flex">
        <x-hyde-admin::card class="w-full">
            <div class="rounded-t mb-3 px-0 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-0 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-lg text-slate-700"> Markdown Posts </h3>
                    </div>
                    <div class="relative w-full px-0 max-w-full flex-grow flex-1 text-right">
                        {{-- <button
                            class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button">
                            Create new
                        </button> --}}
                    </div>
                </div>
            </div>
            <div class="block w-full overflow-x-auto prose max-w-full">
                <!-- Projects table -->
                <table class="table-auto dashboard-table">
                    <thead class="bg-slate-100">
                        <tr>
                            <th class="px-3 pt-2">Title</th>
                            <th class="px-3 pt-2">Date</th>
                            <th class="px-3 pt-2">Category</th>
                            <th class="px-3 pt-2">Author</th>
                            <th class="px-3 pt-2">Source File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (MarkdownPost::all() as $post)
                        <tr>
                            <td class="px-3">
                                <a href="{{ $post->getRoute() }}">
                                    {{ $post->title }}
                                </a>
                            </td>
							<td class="px-3">
                                {{ $post->date->short }}
                            </td>
							<td class="px-3">
                                {{ $post->category ?? 'Uncategorized' }}
                            </td>
							<td class="px-3">
                                {{ $post->author->getName() }}
                            </td>
                            <td class="px-3">
                                {{ $post->getSourcePath() }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-hyde-admin::card>
    </div>
</div>