<x-app-layout>
    

    <div class="w-full">
        <div class="w-full">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-0.5">
                {{-- <x-jet-welcome /> --}}
                <p class="text-lg text-center font-bold m-5">Welcome to the site</p>
                
                <div class="markdown-body editormd-preview-container" previewcontainer="true" style="padding: 20px;">
                    <h3 class="text-lg font-bold m-5" id="h3-installation"><a name="installation" class="reference-link"></a><span class="header-link octicon octicon-link"></span>Installation</h3>
                    <ol class="list-decimal">
                        <li>Please change .<em>env </em> database name according to yours</li>
                        <li>Run <code class="bg-gray-100 border">php artisan migrate</code>.</li>
                        <li>Run <code class="bg-gray-100 border">php artisan db:seed</code>.</li>
                    </ol>
                    <h3 class="text-lg font-bold m-5" id="h3-unit-testing-"><a name="Unit Testing:" class="reference-link"></a><span class="header-link octicon octicon-link"></span>Unit Testing:</h3>
                    <ol class="list-decimal">
                        <li>Testing type = CLI</li>
                        <li>Directory = <code class="bg-gray-100 border">tests\Unit\Bridgenote</code></li>
                        <li>Cmd <code class="bg-gray-100 border">php artisan test</code> or <code class="bg-gray-100 border">vendor/bin/phpunit</code></li>
                    </ol>
                    <h3 class="text-lg font-bold m-5" id="h3-user"><a name="User" class="reference-link"></a><span class="header-link octicon octicon-link"></span>User</h3>
                    <ol class="list-decimal">
                        <li>Default password = <code class="bg-gray-100 border">password</code></li>
                    </ol>
                </div>

                <div class="mb-20"></div>
                <!-- fill for tailwind preview bottom overflow -->
            </div>
        </div>
    </div>
</x-app-layout>
