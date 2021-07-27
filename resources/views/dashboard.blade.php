<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" >
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center p-6 bg-white border-b border-gray-200" style="height: 500px">

                    <div id="chart" style="height: 600px;width:600px">

                    </div>

                    <div id="chart2" style="height: 600px;width:600px">

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    console.log({!! $categories !!})
        options = {
            series: {!! $categories !!}.map((item)=>item.count),
            labels: {!! $categories !!}.map((item)=>item.category),
            chart: {
                type: 'donut'

            },
            plotOptions: {
                pie: {

                    donut: {

                        labels: {
                            show: true,

                            name: {
                                show: true
                            },
                            value: {
                                show: true
                            },
                            total: {
                                show: true
                            }
                        }
                    }
                }
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();





    console.log({!! $Hiddens !!})
    options2 = {
            series: {!! $Hiddens !!}.map((item) => item.count),
            labels: {!! $Hiddens !!}.map((item) => {
                    if (item.is_hidden == 1)
                    return "hidden"
                    else return "show"
                }),
                chart: {
                    type: 'donut'
                },
                plotOptions: {
                    pie: {

                        donut: {
                            labels: {
                                show: true,

                                name: {
                                    show: true
                                },
                                value: {
                                    show: true
                                },
                                total: {
                                    show: true
                                }
                            }
                        }
                    }
                }
            }

            var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);

            chart2.render();
</script>
