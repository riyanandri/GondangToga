@section('nav-title')
    Dasbor Admin
@endsection
<div class="bg-white pb-4 px-4 rounded-md w-full">
    <div class="px-6 pt-6 2xl:container">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <div
                class="h-full group p-6 sm:p-8 rounded-3xl bg-white border border-gray-200/50 bg-opacity-50 shadow-2xl shadow-gray-600/10">
                <h5 class="text-xl text-gray-700">Data Kategori</h5>
                <div class="my-8">
                    <h1 class="text-5xl font-bold text-gray-800">{{ \App\Models\Category::count() }}</h1>
                    <span class="text-gray-500">Total data kategori</span>
                </div>
            </div>
            <div
                class="h-full group p-6 sm:p-8 rounded-3xl bg-white border border-gray-200/50 bg-opacity-50 shadow-2xl shadow-gray-600/10">
                <h5 class="text-xl text-gray-700">Data Tanaman</h5>
                <div class="my-8">
                    <h1 class="text-5xl font-bold text-gray-800">{{ \App\Models\Plant::count() }}</h1>
                    <span class="text-gray-500">Total data tanaman</span>
                </div>
            </div>
            <div
                class="h-full group p-6 sm:p-8 rounded-3xl bg-white border border-gray-200/50 bg-opacity-50 shadow-2xl shadow-gray-600/10">
                <h5 class="text-xl text-gray-700">Data Produk</h5>
                <div class="my-8">
                    <h1 class="text-5xl font-bold text-gray-800">{{ \App\Models\Product::count() }}</h1>
                    <span class="text-gray-500">Total data produk</span>
                </div>
            </div>
        </div>
    </div>
</div>
