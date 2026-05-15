//import './bootstrap';
import Alpine from "alpinejs"
import persist from "@alpinejs/persist"

import ApexCharts from "apexcharts"
import jsVectorMap from "jsvectormap"
import "jsvectormap/dist/maps/world.js"

import "./tailadmin/js/index.js"

Alpine.plugin(persist)

window.Alpine = Alpine
window.ApexCharts = ApexCharts
window.jsVectorMap = jsVectorMap

Alpine.start()