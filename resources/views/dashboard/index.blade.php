<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }

    #welcomePopup {
        animation: fadeIn 0.5s ease-in-out;
    }

    #welcomePopup.hidden {
        animation: fadeOut 0.5s ease-in-out;
    }
</style>
<div class="row gy-5 g-xl-10">
    <div class="col-xl-4 ">
        <div class="card card-xl-stretch mb-xl-10" style="background-color: #CBE1F5">
            <div class="card-body d-flex flex-column">
                <div class="d-flex flex-column flex-grow-1" style="position: relative;">
                    <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Total Registered Jobs</a>
                    <div class="mixed-widget-13-chart" style="height: 100px; min-height: 100px;">
                        <div id="apexchartsl5alyucw" class="apexcharts-canvas apexchartsl5alyucw apexcharts-theme-light"
                            style="width: 226px; height: 100px;"><svg id="SvgjsSvg1006" width="226" height="100"
                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                style="background: transparent;">
                                <g id="SvgjsG1008" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(0, 0)">
                                    <defs id="SvgjsDefs1007">
                                        <clipPath id="gridRectMaskl5alyucw">
                                            <rect id="SvgjsRect1011" width="233" height="103" x="-3.5"
                                                y="-1.5" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff">
                                            </rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskl5alyucw"></clipPath>
                                        <clipPath id="nonForecastMaskl5alyucw"></clipPath>
                                        <clipPath id="gridRectMarkerMaskl5alyucw">
                                            <rect id="SvgjsRect1012" width="230" height="104" x="-2"
                                                y="-2" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff">
                                            </rect>
                                        </clipPath>
                                        <linearGradient id="SvgjsLinearGradient1017" x1="0" y1="0"
                                            x2="0" y2="1">
                                            <stop id="SvgjsStop1018" stop-opacity="0.4"
                                                stop-color="rgba(255,255,255,0.4)" offset="0.2"></stop>
                                            <stop id="SvgjsStop1019" stop-opacity="0" stop-color="rgba(255,255,255,0)"
                                                offset="1.2"></stop>
                                            <stop id="SvgjsStop1020" stop-opacity="0" stop-color="rgba(255,255,255,0)"
                                                offset="1.2"></stop>
                                            <stop id="SvgjsStop1021" stop-opacity="0.4"
                                                stop-color="rgba(255,255,255,0.4)" offset="1.2"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g id="SvgjsG1024" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1025" class="apexcharts-xaxis-texts-g"
                                            transform="translate(0, -4)"></g>
                                    </g>
                                    <g id="SvgjsG1033" class="apexcharts-grid">
                                        <g id="SvgjsG1034" class="apexcharts-gridlines-horizontal"
                                            style="display: none;">
                                            <line id="SvgjsLine1036" x1="0" y1="0" x2="226"
                                                y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1037" x1="0" y1="10" x2="226"
                                                y2="10" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1038" x1="0" y1="20" x2="226"
                                                y2="20" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1039" x1="0" y1="30" x2="226"
                                                y2="30" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1040" x1="0" y1="40" x2="226"
                                                y2="40" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1041" x1="0" y1="50" x2="226"
                                                y2="50" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1042" x1="0" y1="60" x2="226"
                                                y2="60" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1043" x1="0" y1="70" x2="226"
                                                y2="70" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1044" x1="0" y1="80" x2="226"
                                                y2="80" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1045" x1="0" y1="90" x2="226"
                                                y2="90" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1046" x1="0" y1="100" x2="226"
                                                y2="100" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1035" class="apexcharts-gridlines-vertical"
                                            style="display: none;"></g>
                                        <line id="SvgjsLine1048" x1="0" y1="100" x2="226"
                                            y2="100" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                        <line id="SvgjsLine1047" x1="0" y1="1" x2="0"
                                            y2="100" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1013" class="apexcharts-area-series apexcharts-plot-series">
                                        <g id="SvgjsG1014" class="apexcharts-series" seriesName="NetxProfit"
                                            data:longestSeries="true" rel="1" data:realIndex="0">
                                            <path id="SvgjsPath1022"
                                                d="M0 100L0 75C15.82 75 29.380000000000003 58.33333333333333 45.2 58.33333333333333C61.02 58.33333333333333 74.58000000000001 75 90.4 75C106.22 75 119.78 33.33333333333333 135.6 33.33333333333333C151.42 33.33333333333333 164.98000000000002 66.66666666666666 180.8 66.66666666666666C196.62 66.66666666666666 210.18 16.666666666666657 226 16.666666666666657C226 16.666666666666657 226 16.666666666666657 226 100M226 16.666666666666657C226 16.666666666666657 226 16.666666666666657 226 16.666666666666657 "
                                                fill="url(#SvgjsLinearGradient1017)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-area" index="0"
                                                clip-path="url(#gridRectMaskl5alyucw)"
                                                pathTo="M 0 100L 0 75C 15.82 75 29.380000000000003 58.33333333333333 45.2 58.33333333333333C 61.02 58.33333333333333 74.58000000000001 75 90.4 75C 106.22 75 119.78 33.33333333333333 135.6 33.33333333333333C 151.42 33.33333333333333 164.98000000000002 66.66666666666666 180.8 66.66666666666666C 196.62 66.66666666666666 210.18 16.666666666666657 226 16.666666666666657C 226 16.666666666666657 226 16.666666666666657 226 100M 226 16.666666666666657z"
                                                pathFrom="M -1 100L -1 100L 45.2 100L 90.4 100L 135.6 100L 180.8 100L 226 100">
                                            </path>
                                            <path id="SvgjsPath1023"
                                                d="M0 75C15.82 75 29.380000000000003 58.33333333333333 45.2 58.33333333333333C61.02 58.33333333333333 74.58000000000001 75 90.4 75C106.22 75 119.78 33.33333333333333 135.6 33.33333333333333C151.42 33.33333333333333 164.98000000000002 66.66666666666666 180.8 66.66666666666666C196.62 66.66666666666666 210.18 16.666666666666657 226 16.666666666666657C226 16.666666666666657 226 16.666666666666657 226 16.666666666666657 "
                                                fill="none" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="3" stroke-dasharray="0"
                                                class="apexcharts-area" index="0"
                                                clip-path="url(#gridRectMaskl5alyucw)"
                                                pathTo="M 0 75C 15.82 75 29.380000000000003 58.33333333333333 45.2 58.33333333333333C 61.02 58.33333333333333 74.58000000000001 75 90.4 75C 106.22 75 119.78 33.33333333333333 135.6 33.33333333333333C 151.42 33.33333333333333 164.98000000000002 66.66666666666666 180.8 66.66666666666666C 196.62 66.66666666666666 210.18 16.666666666666657 226 16.666666666666657"
                                                pathFrom="M -1 100L -1 100L 45.2 100L 90.4 100L 135.6 100L 180.8 100L 226 100">
                                            </path>
                                            <g id="SvgjsG1015" class="apexcharts-series-markers-wrap"
                                                data:realIndex="0">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1054" r="0" cx="0"
                                                        cy="0"
                                                        class="apexcharts-marker w8fitjepvk no-pointer-events"
                                                        stroke="#e4e6ef" fill="#3f4254" fill-opacity="1"
                                                        stroke-width="3" stroke-opacity="0.9"
                                                        default-marker-size="0"></circle>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1016" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine1049" x1="0" y1="0" x2="226"
                                        y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                        stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1050" x1="0" y1="0" x2="226"
                                        y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1051" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1052" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1053" class="apexcharts-point-annotations"></g>
                                </g>
                                <g id="SvgjsG1032" class="apexcharts-yaxis" rel="0"
                                    transform="translate(-18, 0)"></g>
                                <g id="SvgjsG1009" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend" style="max-height: 50px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;">
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(255, 255, 255);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: inherit; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                <div class="apexcharts-xaxistooltip-text"
                                    style="font-family: inherit; font-size: 12px;"></div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 227px; height: 142px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
                <div class="pt-5">
                    <span class="text-dark fw-bolder fs-3x me-2 lh-0">2.412</span>
                    <span class="text-dark fw-bolder fs-6 lh-0">Jobs</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card card-xl-stretch mb-xl-10" style="background-color: #CBE1F5">
            <div class="card-body d-flex flex-column">
                <div class="d-flex flex-column flex-grow-1" style="position: relative;">
                    <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Total Registered Applicants</a>
                    <div class="mixed-widget-13-chart" style="height: 100px; min-height: 100px;">
                        <div id="apexchartsl5alyucw" class="apexcharts-canvas apexchartsl5alyucw apexcharts-theme-light"
                            style="width: 226px; height: 100px;"><svg id="SvgjsSvg1006" width="226" height="100"
                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                style="background: transparent;">
                                <g id="SvgjsG1008" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(0, 0)">
                                    <defs id="SvgjsDefs1007">
                                        <clipPath id="gridRectMaskl5alyucw">
                                            <rect id="SvgjsRect1011" width="233" height="103" x="-3.5"
                                                y="-1.5" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff">
                                            </rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskl5alyucw"></clipPath>
                                        <clipPath id="nonForecastMaskl5alyucw"></clipPath>
                                        <clipPath id="gridRectMarkerMaskl5alyucw">
                                            <rect id="SvgjsRect1012" width="230" height="104" x="-2"
                                                y="-2" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff">
                                            </rect>
                                        </clipPath>
                                        <linearGradient id="SvgjsLinearGradient1017" x1="0" y1="0"
                                            x2="0" y2="1">
                                            <stop id="SvgjsStop1018" stop-opacity="0.4"
                                                stop-color="rgba(255,255,255,0.4)" offset="0.2"></stop>
                                            <stop id="SvgjsStop1019" stop-opacity="0" stop-color="rgba(255,255,255,0)"
                                                offset="1.2"></stop>
                                            <stop id="SvgjsStop1020" stop-opacity="0" stop-color="rgba(255,255,255,0)"
                                                offset="1.2"></stop>
                                            <stop id="SvgjsStop1021" stop-opacity="0.4"
                                                stop-color="rgba(255,255,255,0.4)" offset="1.2"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g id="SvgjsG1024" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1025" class="apexcharts-xaxis-texts-g"
                                            transform="translate(0, -4)"></g>
                                    </g>
                                    <g id="SvgjsG1033" class="apexcharts-grid">
                                        <g id="SvgjsG1034" class="apexcharts-gridlines-horizontal"
                                            style="display: none;">
                                            <line id="SvgjsLine1036" x1="0" y1="0" x2="226"
                                                y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1037" x1="0" y1="10" x2="226"
                                                y2="10" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1038" x1="0" y1="20" x2="226"
                                                y2="20" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1039" x1="0" y1="30" x2="226"
                                                y2="30" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1040" x1="0" y1="40" x2="226"
                                                y2="40" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1041" x1="0" y1="50" x2="226"
                                                y2="50" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1042" x1="0" y1="60" x2="226"
                                                y2="60" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1043" x1="0" y1="70" x2="226"
                                                y2="70" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1044" x1="0" y1="80" x2="226"
                                                y2="80" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1045" x1="0" y1="90" x2="226"
                                                y2="90" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1046" x1="0" y1="100" x2="226"
                                                y2="100" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1035" class="apexcharts-gridlines-vertical"
                                            style="display: none;"></g>
                                        <line id="SvgjsLine1048" x1="0" y1="100" x2="226"
                                            y2="100" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                        <line id="SvgjsLine1047" x1="0" y1="1" x2="0"
                                            y2="100" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1013" class="apexcharts-area-series apexcharts-plot-series">
                                        <g id="SvgjsG1014" class="apexcharts-series" seriesName="NetxProfit"
                                            data:longestSeries="true" rel="1" data:realIndex="0">
                                            <path id="SvgjsPath1022"
                                                d="M0 100L0 75C15.82 75 29.380000000000003 58.33333333333333 45.2 58.33333333333333C61.02 58.33333333333333 74.58000000000001 75 90.4 75C106.22 75 119.78 33.33333333333333 135.6 33.33333333333333C151.42 33.33333333333333 164.98000000000002 66.66666666666666 180.8 66.66666666666666C196.62 66.66666666666666 210.18 16.666666666666657 226 16.666666666666657C226 16.666666666666657 226 16.666666666666657 226 100M226 16.666666666666657C226 16.666666666666657 226 16.666666666666657 226 16.666666666666657 "
                                                fill="url(#SvgjsLinearGradient1017)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-area" index="0"
                                                clip-path="url(#gridRectMaskl5alyucw)"
                                                pathTo="M 0 100L 0 75C 15.82 75 29.380000000000003 58.33333333333333 45.2 58.33333333333333C 61.02 58.33333333333333 74.58000000000001 75 90.4 75C 106.22 75 119.78 33.33333333333333 135.6 33.33333333333333C 151.42 33.33333333333333 164.98000000000002 66.66666666666666 180.8 66.66666666666666C 196.62 66.66666666666666 210.18 16.666666666666657 226 16.666666666666657C 226 16.666666666666657 226 16.666666666666657 226 100M 226 16.666666666666657z"
                                                pathFrom="M -1 100L -1 100L 45.2 100L 90.4 100L 135.6 100L 180.8 100L 226 100">
                                            </path>
                                            <path id="SvgjsPath1023"
                                                d="M0 75C15.82 75 29.380000000000003 58.33333333333333 45.2 58.33333333333333C61.02 58.33333333333333 74.58000000000001 75 90.4 75C106.22 75 119.78 33.33333333333333 135.6 33.33333333333333C151.42 33.33333333333333 164.98000000000002 66.66666666666666 180.8 66.66666666666666C196.62 66.66666666666666 210.18 16.666666666666657 226 16.666666666666657C226 16.666666666666657 226 16.666666666666657 226 16.666666666666657 "
                                                fill="none" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="3" stroke-dasharray="0"
                                                class="apexcharts-area" index="0"
                                                clip-path="url(#gridRectMaskl5alyucw)"
                                                pathTo="M 0 75C 15.82 75 29.380000000000003 58.33333333333333 45.2 58.33333333333333C 61.02 58.33333333333333 74.58000000000001 75 90.4 75C 106.22 75 119.78 33.33333333333333 135.6 33.33333333333333C 151.42 33.33333333333333 164.98000000000002 66.66666666666666 180.8 66.66666666666666C 196.62 66.66666666666666 210.18 16.666666666666657 226 16.666666666666657"
                                                pathFrom="M -1 100L -1 100L 45.2 100L 90.4 100L 135.6 100L 180.8 100L 226 100">
                                            </path>
                                            <g id="SvgjsG1015" class="apexcharts-series-markers-wrap"
                                                data:realIndex="0">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1054" r="0" cx="0"
                                                        cy="0"
                                                        class="apexcharts-marker w8fitjepvk no-pointer-events"
                                                        stroke="#e4e6ef" fill="#3f4254" fill-opacity="1"
                                                        stroke-width="3" stroke-opacity="0.9"
                                                        default-marker-size="0"></circle>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1016" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine1049" x1="0" y1="0" x2="226"
                                        y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                        stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1050" x1="0" y1="0" x2="226"
                                        y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1051" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1052" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1053" class="apexcharts-point-annotations"></g>
                                </g>
                                <g id="SvgjsG1032" class="apexcharts-yaxis" rel="0"
                                    transform="translate(-18, 0)"></g>
                                <g id="SvgjsG1009" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend" style="max-height: 50px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;">
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(255, 255, 255);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: inherit; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                <div class="apexcharts-xaxistooltip-text"
                                    style="font-family: inherit; font-size: 12px;"></div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 227px; height: 142px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
                <div class="pt-5">
                    <span class="text-dark fw-bolder fs-3x me-2 lh-0">3.982</span>
                    <span class="text-dark fw-bolder fs-6 lh-0">Applicants</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card card-xl-stretch mb-xl-10" style="background-color: #CBE1F5">
            <div class="card-body d-flex flex-column">
                <div class="d-flex flex-column flex-grow-1" style="position: relative;">
                    <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Total Listed Companies</a>
                    <div class="mixed-widget-13-chart" style="height: 100px; min-height: 100px;">
                        <div id="apexchartsl5alyucw" class="apexcharts-canvas apexchartsl5alyucw apexcharts-theme-light"
                            style="width: 226px; height: 100px;"><svg id="SvgjsSvg1006" width="226" height="100"
                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                style="background: transparent;">
                                <g id="SvgjsG1008" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(0, 0)">
                                    <defs id="SvgjsDefs1007">
                                        <clipPath id="gridRectMaskl5alyucw">
                                            <rect id="SvgjsRect1011" width="233" height="103" x="-3.5"
                                                y="-1.5" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff">
                                            </rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskl5alyucw"></clipPath>
                                        <clipPath id="nonForecastMaskl5alyucw"></clipPath>
                                        <clipPath id="gridRectMarkerMaskl5alyucw">
                                            <rect id="SvgjsRect1012" width="230" height="104" x="-2"
                                                y="-2" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff">
                                            </rect>
                                        </clipPath>
                                        <linearGradient id="SvgjsLinearGradient1017" x1="0" y1="0"
                                            x2="0" y2="1">
                                            <stop id="SvgjsStop1018" stop-opacity="0.4"
                                                stop-color="rgba(255,255,255,0.4)" offset="0.2"></stop>
                                            <stop id="SvgjsStop1019" stop-opacity="0" stop-color="rgba(255,255,255,0)"
                                                offset="1.2"></stop>
                                            <stop id="SvgjsStop1020" stop-opacity="0" stop-color="rgba(255,255,255,0)"
                                                offset="1.2"></stop>
                                            <stop id="SvgjsStop1021" stop-opacity="0.4"
                                                stop-color="rgba(255,255,255,0.4)" offset="1.2"></stop>
                                        </linearGradient>
                                    </defs>
                                    <g id="SvgjsG1024" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1025" class="apexcharts-xaxis-texts-g"
                                            transform="translate(0, -4)"></g>
                                    </g>
                                    <g id="SvgjsG1033" class="apexcharts-grid">
                                        <g id="SvgjsG1034" class="apexcharts-gridlines-horizontal"
                                            style="display: none;">
                                            <line id="SvgjsLine1036" x1="0" y1="0" x2="226"
                                                y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1037" x1="0" y1="10" x2="226"
                                                y2="10" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1038" x1="0" y1="20" x2="226"
                                                y2="20" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1039" x1="0" y1="30" x2="226"
                                                y2="30" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1040" x1="0" y1="40" x2="226"
                                                y2="40" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1041" x1="0" y1="50" x2="226"
                                                y2="50" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1042" x1="0" y1="60" x2="226"
                                                y2="60" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1043" x1="0" y1="70" x2="226"
                                                y2="70" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1044" x1="0" y1="80" x2="226"
                                                y2="80" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1045" x1="0" y1="90" x2="226"
                                                y2="90" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1046" x1="0" y1="100" x2="226"
                                                y2="100" stroke="#e0e0e0" stroke-dasharray="0"
                                                stroke-linecap="butt" class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1035" class="apexcharts-gridlines-vertical"
                                            style="display: none;"></g>
                                        <line id="SvgjsLine1048" x1="0" y1="100" x2="226"
                                            y2="100" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                        <line id="SvgjsLine1047" x1="0" y1="1" x2="0"
                                            y2="100" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1013" class="apexcharts-area-series apexcharts-plot-series">
                                        <g id="SvgjsG1014" class="apexcharts-series" seriesName="NetxProfit"
                                            data:longestSeries="true" rel="1" data:realIndex="0">
                                            <path id="SvgjsPath1022"
                                                d="M0 100L0 75C15.82 75 29.380000000000003 58.33333333333333 45.2 58.33333333333333C61.02 58.33333333333333 74.58000000000001 75 90.4 75C106.22 75 119.78 33.33333333333333 135.6 33.33333333333333C151.42 33.33333333333333 164.98000000000002 66.66666666666666 180.8 66.66666666666666C196.62 66.66666666666666 210.18 16.666666666666657 226 16.666666666666657C226 16.666666666666657 226 16.666666666666657 226 100M226 16.666666666666657C226 16.666666666666657 226 16.666666666666657 226 16.666666666666657 "
                                                fill="url(#SvgjsLinearGradient1017)" fill-opacity="1"
                                                stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                stroke-dasharray="0" class="apexcharts-area" index="0"
                                                clip-path="url(#gridRectMaskl5alyucw)"
                                                pathTo="M 0 100L 0 75C 15.82 75 29.380000000000003 58.33333333333333 45.2 58.33333333333333C 61.02 58.33333333333333 74.58000000000001 75 90.4 75C 106.22 75 119.78 33.33333333333333 135.6 33.33333333333333C 151.42 33.33333333333333 164.98000000000002 66.66666666666666 180.8 66.66666666666666C 196.62 66.66666666666666 210.18 16.666666666666657 226 16.666666666666657C 226 16.666666666666657 226 16.666666666666657 226 100M 226 16.666666666666657z"
                                                pathFrom="M -1 100L -1 100L 45.2 100L 90.4 100L 135.6 100L 180.8 100L 226 100">
                                            </path>
                                            <path id="SvgjsPath1023"
                                                d="M0 75C15.82 75 29.380000000000003 58.33333333333333 45.2 58.33333333333333C61.02 58.33333333333333 74.58000000000001 75 90.4 75C106.22 75 119.78 33.33333333333333 135.6 33.33333333333333C151.42 33.33333333333333 164.98000000000002 66.66666666666666 180.8 66.66666666666666C196.62 66.66666666666666 210.18 16.666666666666657 226 16.666666666666657C226 16.666666666666657 226 16.666666666666657 226 16.666666666666657 "
                                                fill="none" fill-opacity="1" stroke="#ffffff" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="3" stroke-dasharray="0"
                                                class="apexcharts-area" index="0"
                                                clip-path="url(#gridRectMaskl5alyucw)"
                                                pathTo="M 0 75C 15.82 75 29.380000000000003 58.33333333333333 45.2 58.33333333333333C 61.02 58.33333333333333 74.58000000000001 75 90.4 75C 106.22 75 119.78 33.33333333333333 135.6 33.33333333333333C 151.42 33.33333333333333 164.98000000000002 66.66666666666666 180.8 66.66666666666666C 196.62 66.66666666666666 210.18 16.666666666666657 226 16.666666666666657"
                                                pathFrom="M -1 100L -1 100L 45.2 100L 90.4 100L 135.6 100L 180.8 100L 226 100">
                                            </path>
                                            <g id="SvgjsG1015" class="apexcharts-series-markers-wrap"
                                                data:realIndex="0">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1054" r="0" cx="0"
                                                        cy="0"
                                                        class="apexcharts-marker w8fitjepvk no-pointer-events"
                                                        stroke="#e4e6ef" fill="#3f4254" fill-opacity="1"
                                                        stroke-width="3" stroke-opacity="0.9"
                                                        default-marker-size="0"></circle>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1016" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine1049" x1="0" y1="0" x2="226"
                                        y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                        stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1050" x1="0" y1="0" x2="226"
                                        y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1051" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1052" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1053" class="apexcharts-point-annotations"></g>
                                </g>
                                <g id="SvgjsG1032" class="apexcharts-yaxis" rel="0"
                                    transform="translate(-18, 0)"></g>
                                <g id="SvgjsG1009" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend" style="max-height: 50px;"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;">
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(255, 255, 255);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: inherit; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                <div class="apexcharts-xaxistooltip-text"
                                    style="font-family: inherit; font-size: 12px;"></div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 227px; height: 142px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
                <div class="pt-5">
                    <span class="text-dark fw-bolder fs-3x me-2 lh-0">1.300</span>
                    <span class="text-dark fw-bolder fs-6 lh-0">Companies</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-bordered mb-10">
    <div class="card-body">
        <div class="d-flex align-items-start">
            <div class="me-auto me-3">
                <h2>Total Registered Applicants</h2>
            </div>
            <div class="d-flex align-items-center">
                <div class="position-relative">
                    <select name="select_bulan" id="select_bulan" class="form-select form-select-solid"
                        style="width: 100px;">
                        <option value="" selected disabled hidden>Tahun</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="totalapplicants" class="h-100 mt-2"></div>
    </div>
</div>


<div class="row mb-9">
    <div class="col-12 col-xl-4">
        <div class="card card-bordered mb-10 me-3">
            <div class="card-body">
                <div class="table-responsive" id="informasi">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex flex-column">
                            <h2 class="me-3">Company of Interest to Applicants</h2>
                            <span class="text-gray-400 mt-1  fw-semibold fs-6">Top 10 Companies
                            </span>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle rounded tdFirstCenter"
                            id="tableTopSeller">
                            <thead>
                                <tr class="fw-bolder">
                                    <th class="ps-4" width="20">No</th>
                                    <th>Logo</th>
                                    <th>Company Name</th>
                                    <th>Total Applicants</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="display-flex" style="justify-content: flex-start;"
                                    style="align-items: center">
                                    <td class="ps-4" width="20">1</td>
                                    <td><img src="/assets/media/avatars/blank.png"
                                            class="rounded-circle w-50px h-50px">
                                    </td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>PT Neraca Abadi</b>
                                    </td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>246</b>
                                    </td>
                                </tr>
                                <tr class="display-flex" style="justify-content: flex-start;"
                                    style="align-items: center">
                                    <td class="ps-4" width="20">2</td>
                                    <td><img src="/assets/media/avatars/blank.png"
                                            class="rounded-circle w-50px h-50px">
                                    </td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>Obdi Corp</b>
                                    </td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>238</b>
                                    </td>
                                </tr>
                                <tr class="display-flex" style="justify-content: flex-start;"
                                    style="align-items: center">
                                    <td class="ps-4" width="20">3</td>
                                    <td><img src="/assets/media/avatars/blank.png"
                                            class="rounded-circle w-50px h-50px"></td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>Sushi Bersinar</b>
                                    </td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>219</b>
                                    </td>
                                </tr>
                                <tr class="display-flex" style="justify-content: flex-start;"
                                    style="align-items: center">
                                    <td class="ps-4" width="20">4</td>
                                    <td><img src="/assets/media/avatars/blank.png"
                                            class="rounded-circle w-50px h-50px"></td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>PT Sumber Mega</b>
                                    </td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>208</b>
                                    </td>
                                </tr>
                                <tr class="display-flex" style="justify-content: flex-start;"
                                    style="align-items: center">
                                    <td class="ps-4" width="20">5</td>
                                    <td><img src="/assets/media/avatars/blank.png"
                                            class="rounded-circle w-50px h-50px"></td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>Hohobiz</b>
                                    </td>
                                    <td class="display-flex" style="flex-direction:column">
                                        <b>201</b>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-8">
        <div class="card card-bordered  mb-10 ">
            <div class="card-body">
                <div class="bg-white p-7  m-3">

                    <div class="d-flex justify-content-between">
                        <div class="">
                            <h2 class="">Total of Accepted and Rejected Applicants</h2>
                        </div>
                    </div>
                    <small>Top 10 Companies</small>

                    <div id="totalacc" class="h-100"></div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.javascript')
