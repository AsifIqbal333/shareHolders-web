<div class="mt-7">
    <!---- details---->
    <div class="grid sm:grid-cols-3 grid-cols-1 gap-2 mb-5">
        <div class="flex gap-2">
            <p class="h-3 w-3 rounded-full bg-[#121C30]"></p>
            <div class="-mt-1.5">
                <span class="text-gray-400">{{ __('Investment') }}</span>
                <p class="text-black font-semibold">${{ currency_format($investment) }}</p>
            </div>

        </div>
        <div class="flex gap-2">
            <p class="h-3 w-3 rounded-full bg-[#FFD147]"></p>
            <div class="-mt-1.5">
                <span class="text-gray-400">{{ __('Total rental income') }}</span>
                <p class="text-black font-semibold">${{ currency_format($rental_income) }}</p>
            </div>

        </div>
        <div class="flex gap-2">
            <p class="h-3 w-3 rounded-full bg-[#41CE8E]"></p>
            <div class="-mt-1.5">
                <span class="text-gray-400">{{ __('Value appreciation') }}</span>
                <p class="text-black font-semibold">${{ currency_format($value_appreciation) }}</p>
            </div>

        </div>
    </div>

    <!---- carts---->
    {{-- style="height: 20rem;" --}}
    <div class="shadow rounded p-4 border bg-white flex-1" style="height: 20rem;">
        <livewire:livewire-column-chart key="{{ $columnChartModel->reactiveKey() }}" :column-chart-model="$columnChartModel" />
        {{-- <div id="chart"></div> --}}
    </div>

    <!---- options---->
    <div class="mt-5 flex flex-col gap-5">
        <div class="w-full">
            <div class="flex items-center justify-between">
                <span class="text-gray-500 text-lg">{{ __('Initial Investment') }}</span>
                <p class="text-black text-xl font-semibold">${{ currency_format($investment) }}</p>
            </div>
            <input type="range" id="tier" wire:model.live="investment"
                min="{{ $property->minimum_investment_price }}" max="{{ $property->price }}" class="mt-3 w-full"
                step="500" style="filter: hue-rotate(300deg);">
        </div>

        <div class="w-full">
            <div class="flex items-center justify-between">
                <span class="text-gray-500 text-lg">{{ __('Property value growth (5 year)') }}</span>
                <p class="text-black text-xl font-semibold">{{ $growth }}%</p>
            </div>
            <input type="range" id="growth" wire:model.live="growth" min="1" max="100"
                class="mt-3 w-full" step="1" style="filter: hue-rotate(300deg);">
        </div>

        <div class="w-full">
            <div class="flex items-center justify-between">
                <span class="text-gray-500 text-lg">{{ __('Expected annual rental yield') }}</span>
                <p class="text-black text-xl font-semibold">{{ $net_yield }}%</p>
            </div>
            <input type="range" id="net_yield" wire:model.live="net_yield" min="1" max="10"
                class="mt-3 w-full" step="0.5" style="filter: hue-rotate(300deg);">
        </div>
    </div>

    <div class="mt-5 bg-gray-200 p-2 rounded-lg flex justify-center gap-2">
        <span class="text-sm">
            {{ __('Default values are based on property numbers') }}
        </span>
        <span data-tooltip-target="tooltip-default" class="">
            <i class="far fa-question-circle"></i>
        </span>
        <div id="tooltip-default" role="tooltip"
            class="absolute z-10 invisible inline-block w-80 px-3 py-2 text-md font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 text-center">
            {{ __('Default slider values for Projected property value growth and Expected annual rental yield are set to the actual property numbers. d annual rental yield are set to the actual property numbers. You can reset the sliders to see your returns based on the property net yield.') }}
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </div>
</div>


{{-- <script>
    document.addEventListener('livewire:initialized', () => {
        iniatilizeChart(@json($series));

        @this.on('chart-change', (event) => {
            // chart.updateSeries(event.series)
            iniatilizeChart(event.series);
        })

        function iniatilizeChart(series) {
            var options = {
                series: series,
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: true,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    }
                },
                responsive: [{
                    breakpoint: 480,
                }],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        borderRadius: 10,
                    },
                },
                xaxis: {
                    type: 'year',
                    categories: @json($years),
                },
                fill: {
                    opacity: 1
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        }
    });
</script> --}}
