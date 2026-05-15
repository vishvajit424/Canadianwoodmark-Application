<x-app-layout>
    <div class="grid grid-cols-12 gap-4 md:gap-6">
      <div class="col-span-12 space-y-6 xl:col-span-12">
                <!-- Metric Group One -->
                 @include('layouts.partials.metric-group.dashboard-items')
                <!-- <include src="./partials/metric-group/metric-group-01.html" /> -->
                <!-- Metric Group One -->

                <!-- ====== Chart One Start -->
                @include('layouts.partials.chart.chart-01')
                <!-- <include src="./partials/chart/chart-01.html" /> -->
                <!-- ====== Chart One End -->
              </div>
              <!-- <div class="col-span-12 xl:col-span-5">-->
                <!-- ====== Chart Two Start -->
                 <!-- @include('layouts.partials.chart.chart-02') -->
                <!-- ====== Chart Two End -->
              </div>

              <div class="col-span-12">
                <!-- ====== Chart Three Start -->
                 <!-- @include('layouts.partials.chart.chart-03') -->
                <!-- ====== Chart Three End -->
              </div>

              <div class="col-span-12 xl:col-span-5">
                <!-- ====== Map One Start -->
                <!-- <include src="./partials/map-01.html" /> -->
                <!-- ====== Map One End -->
              </div>

              <div class="col-span-12 xl:col-span-7">
                <!-- ====== Table One Start -->
                <include src="./partials/table/table-01.html" />
                <!-- ====== Table One End -->
              </div> -->
          </div>
</x-app-layout>
