<div class="w-full grid grid-cols-1 md:grid-cols-3 gap-4">
    <div
        class="h-52 p-5 flex flex-col justify-center border-2 border-amber-500 bg-white shadow-lg rounded-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
        <div class="flex items-center mb-3">
            <i class="fas fa-donate text-amber-500 text-3xl mr-3"></i>
            <h3 class="text-xl font-bold text-gray-800">
                Zakat Terkumpul
            </h3>
        </div>
        <div class="flex items-baseline">
            <p class="text-3xl font-bold text-amber-600">
                @formatJumlah($zakatIncome)
            </p>
            <p class="ml-2 text-lg text-gray-600">
                liter
            </p>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-200">
            <p class="text-sm text-gray-500 flex items-center">
                <i class="fas fa-users-line text-amber-500 mr-2"></i>
                {{ $zakatIncomePerson }} Orang
            </p>
        </div>
    </div>
    <div
        class="h-52 p-5 flex flex-col justify-center border-2 border-blue-500 bg-white shadow-lg rounded-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
        <div class="flex items-center mb-3">
            <i class="fas fa-arrow-right-from-bracket text-blue-500 text-3xl mr-3"></i>
            <h3 class="text-xl font-bold text-gray-800">
                Zakat Keluar
            </h3>
        </div>
        <div class="flex items-baseline">
            <p class="text-3xl font-bold text-blue-600">
                @formatJumlah($zakatOutcome)
            </p>
            <p class="ml-2 text-lg text-gray-600">
                liter
            </p>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-200">
            <p class="text-sm text-gray-500 flex items-center">
                <i class="fas fa-people-carry-box text-blue-500 mr-2"></i>
                {{ $zakatOutcomePerson }} Penerima
            </p>
        </div>
    </div>
    <div
        class="h-52 p-5 flex flex-col justify-center border-2 border-emerald-500 bg-white shadow-lg rounded-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
        <div class="flex items-center mb-3">
            <i class="fas fa-circle-check text-emerald-500 text-3xl mr-3"></i>
            <h3 class="text-xl font-bold text-gray-800">
                Zakat Tersampaikan
            </h3>
        </div>
        <div class="flex items-baseline">
            <p class="text-3xl font-bold text-emerald-600">
                {{ $zakatDelivered }}
            </p>
            <p class="ml-2 text-lg text-gray-600">
                penerima
            </p>
        </div>
        <div class="mt-4 pt-3 border-t border-gray-200">
            <p class="text-sm text-gray-500 flex items-center">
                <i class="fas fa-hands-holding text-emerald-500 mr-2"></i>
                Total {{ $zakatOutcomePerson }} Orang Penerima
            </p>
        </div>
    </div>
</div>
